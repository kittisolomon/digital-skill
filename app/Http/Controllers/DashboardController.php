<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Course;
use App\Models\CourseEnrollment;
use App\Models\CourseProgress;
use App\Models\CourseContent;
use App\Models\Payment;
use App\Models\Subscriber;
use App\Models\Subject;
use App\Models\SubjectEnrollment;
use App\Models\ViewedLesson;


class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        switch ($user->role) {
            case 'admin':
                return $this->adminDashboard($user);
            
            case 'school':
                return $this->schoolDashboard($user);
            
            case 'teacher':
                return $this->teacherDashboard($user);
            
            case 'student':
                return $this->studentDashboard($user);
            
            default:
                abort(403, 'Unauthorized role');
        }
    }

    private function adminDashboard($user)
    {
        $countUsers = User::count();
        $coursesCount = Course::count();
        $totalRevenue = Payment::where('status', 0)->sum('transAmount');
        $subscribers = Subscriber::where('status', 'is_active')->count();

        $allRecentSales = Payment::with(['course', 'student'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        $allTopSales = Payment::with(['course', 'instructor'])
            ->where('status', 0)
            ->selectRaw('courseId, COUNT(*) as total_sold, SUM(transAmount) as total_revenue')
            ->groupBy('courseId')
            ->orderByDesc('total_sold')
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact(
            'user', 
            'countUsers', 
            'coursesCount', 
            'totalRevenue', 
            'subscribers', 
            'allRecentSales', 
            'allTopSales'
        ));
    }

    private function schoolDashboard($user)
    {
        $school_id = $user->id;

        // Get total teachers
        $totalTeachers = User::where('role', 'teacher')
            ->whereHas('teacherDetail', function($query) use ($school_id) {
                $query->where('school_id', $school_id);
            })
            ->count();

        // Get total learners
        $totalLearners = User::where('role', 'learner')
            ->whereHas('learnerDetail', function($query) use ($school_id) {
                $query->where('school_id', $school_id);
            })
            ->count();

        // Get total subjects
        $totalSubjects = Subject::where('school_id', $school_id)->count();

        // Get recent enrollments
        $recentEnrollments = SubjectEnrollment::with(['learner', 'subject'])
            ->whereHas('subject', function($query) use ($school_id) {
                $query->where('school_id', $school_id);
            })
            ->latest()
            ->take(5)
            ->get();

        // Get top enrolled subjects
        $topEnrolledSubjects = Subject::where('school_id', $school_id)
            ->whereHas('learners')
            ->withCount(['learners' => function($query) {
                $query->where('subject_enrollments.status', 'active');
            }])
            ->orderBy('learners_count', 'desc')
            ->take(5)
            ->get();

        return view('school.dashboard', compact(
            'user',
            'totalTeachers',
            'totalLearners',
            'totalSubjects',
            'recentEnrollments',
            'topEnrolledSubjects'
        ));
    }

    private function teacherDashboard($user)
    {
        // Get the number of subjects taught by the teacher
        $subjectCount = Subject::where('teacher_id', $user->id)->count();

        // Get count of students enrolled in teacher's subjects
        $enrolledCount = SubjectEnrollment::whereHas('subject', function($query) use ($user) {
            $query->where('teacher_id', $user->id);
        })->where('status', 'active')->count();

        // Get count of students who have completed all lessons in teacher's subjects
        $completedCount = 0;
        $teacherSubjects = Subject::where('teacher_id', $user->id)->with('lessons')->get();

        foreach ($teacherSubjects as $subject) {
            $totalLessons = $subject->lessons->count();
            if ($totalLessons > 0) {
                // Get all enrolled students for this subject
                $enrolledStudents = SubjectEnrollment::where('subject_id', $subject->id)
                    ->where('status', 'active')
                    ->get();

                foreach ($enrolledStudents as $enrollment) {
                    // Count viewed lessons for this student in this subject
                    $viewedLessonsCount = ViewedLesson::where('user_id', $enrollment->user_id)
                        ->where('subject_id', $subject->id)
                        ->where('is_viewed', true)
                        ->count();

                    // If student has viewed all lessons, they have completed the subject
                    if ($viewedLessonsCount >= $totalLessons) {
                        $completedCount++;
                    }
                }
            }
        }

        // Get recent subject enrollments for teacher's subjects
        $recentEnrollments = SubjectEnrollment::with(['learner', 'subject'])
            ->whereHas('subject', function($query) use ($user) {
                $query->where('teacher_id', $user->id);
            })
            ->latest()
            ->take(5)
            ->get();

        // Get most enrolled subjects for the teacher
        $topEnrolledSubjects = Subject::where('teacher_id', $user->id)
            ->whereHas('learners')
            ->withCount(['learners' => function($query) {
                $query->where('subject_enrollments.status', 'active');
            }])
            ->orderBy('learners_count', 'desc')
            ->take(5)
            ->get();

        return view('teacher.dashboard', compact(
            'user', 
            'subjectCount', 
            'enrolledCount', 
            'completedCount', 
            'recentEnrollments', 
            'topEnrolledSubjects'
        ));
    }

    private function studentDashboard($user)
    {
        $purchaseHistories = Payment::with(['course', 'instructor'])
            ->select('reference','transAmount','instructorId', 'courseId', 'status', 'created_at')
            ->where('customerId', $user->id)
            ->orderByDesc('created_at')
            ->take(5)
            ->get();

        $countLearning = CourseEnrollment::where('user_id', $user->id)->count();

        // Calculate total hours spent by the student
        $contentIds = CourseProgress::where('user_id', $user->id)
            ->pluck('content_id')
            ->unique()
            ->toArray();
        
        $totalSeconds = 0;
        if (!empty($contentIds)) {
            $totalSeconds = CourseContent::whereIn('id', $contentIds)->sum('duration');
        }
        $hoursSpent = $totalSeconds > 0 ? round($totalSeconds / 3600, 1) : 0;

        // Calculate completed courses
        $enrolledCourses = CourseEnrollment::with('course.contents')
            ->where('user_id', $user->id)
            ->get();
        
        $completedCourses = 0;
        foreach ($enrolledCourses as $enrollment) {
            $course = $enrollment->course;
            if (!$course) continue;
            
            $totalLessons = $course->contents->count();
            $completedLessons = CourseProgress::where('user_id', $user->id)
                ->where('course_id', $course->id)
                ->pluck('content_id')
                ->unique()
                ->count();
            
            if ($totalLessons > 0 && $completedLessons >= $totalLessons) {
                $completedCourses++;
            }
        }

        return view('student.dashboard', compact(
            'user', 
            'purchaseHistories', 
            'countLearning', 
            'hoursSpent', 
            'completedCourses'
        ));
    }
}
