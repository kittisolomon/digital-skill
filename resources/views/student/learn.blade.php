@extends('learner.index')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mt-4">
                <div>
                    <nav>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('learner.enrolled') }}">My Subjects</a></li>
                            <li class="breadcrumb-item active">{{ $subject->title }}</li>
                        </ol>
                    </nav>
                </div>
                <a href="{{ route('learner.enrolled') }}" class="btn btn-outline-primary">
                    <i class="bi bi-arrow-left"></i> Back to Subjects
                </a>
            </div>
        </div>
    </div>

    <section class="course-section py-5">
        <div class="row g-4">
            <!-- Course Content -->
            <div class="col-lg-8">
                <div class="d-flex justify-content-between ml-2 align-items-center flex-wrap mb-4">
                    <div>
                        <h4 class="mb-1 p-primary">{{ $subject->title }}</h4>
                        <p class="text-muted">By: <span
                                class="fw-medium text-dark pl-2">{{ $subject->teacher->name }}</span></p>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <i class="bx bx-share-alt fs-4 cursor-pointer"></i>
                        <i class="bx bx-bookmark fs-4 cursor-pointer"></i>
                    </div>
                </div>

                <div class="card shadow-sm border rounded-md">
                    <div class="card-body mt-4">
                        <div class="course-video position-relative">
                            {{-- poster="{{ asset($subject->photo_link ?? 'backend/images/default-subject.png') }}" --}}
                            @if ($currentLesson && $currentLesson->video_link)
                                <video class="w-100 rounded" controls>
                                    <source src="{{ asset($currentLesson->video_link) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            @else
                                <div class="alert alert-info">
                                    <i class="bi bi-info-circle me-2"></i> No video content available for this lesson.
                                </div>
                            @endif
                        </div>

                        <div class="card-body pt-4">
                            <h5 class="fw-bold">About this subject</h5>
                            <p>{{ $subject->description }}</p>
                            <hr>
                            <h5 class="fw-bold">By the numbers</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <p><i class="bx bx-group me-2"></i> Students: {{ $totalEnrolled }}</p>
                                    <p><i class="bx bx-globe me-2"></i> Language: English</p>
                                </div>
                                <div class="col-md-6">
                                    <p><i class="bx bx-video me-2"></i> Lessons: {{ $totalLessons }}</p>
                                    <p><i class="bx bx-time-five me-2"></i> Available Tests: {{ $totalTests ?? 0 }} Tests</p>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <p><i class="bx bx-book me-2"></i> Total Assignments: {{ $totalAssignments }}</p>
                                </div>
                            </div>
                            <hr>
                            @if(count($trackedLessons) === $totalLessons)
                                <h5 class="fw-bold">Tests/Assesment</h5>
                                <div class="row">
                                    @forelse ($tests as $test)
                                        <div class="col-md-6">
                                            <p><i class="bx bx-group me-2"></i> Title: {{ $test->title }}</p>
                                            <p><i class="bx bx-globe me-2"></i> Subject: {{$test->subject->title}}</p>
                                            <a href="{{ route('learner.test.view', ['test' => $test->id])}}" class="btn btn-sm btn-primary mt-2">
                                                <i class="bi bi-play-circle me-1"></i> Start Test
                                            </a>
                                        </div>
                                        <div class="col-md-6">
                                            <p><i class="bx bx-time-five me-2"></i> Duration: {{ $test->duration }}
                                                Mins
                                            </p>
                                            <p><i class="bx bx-video me-2"></i> Questions: {{ $test->questions->count() }}</p>
                                        </div>
                                        <hr class="my-4">
                                    @empty
                                        <div class="alert alert-info">
                                            <i class="bi bi-info-circle me-2"></i> No tests available for this subject.
                                        </div>
                                    @endforelse
                                </div>
                            @else
                                <!-- <div class="alert alert-warning">
                                    <i class="bi bi-exclamation-triangle me-2"></i> You must complete all lessons before accessing the tests.
                                </div> 
                                 <hr>
                                -->
                            @endif

                            @if ($currentLesson)
                               
                                <h5 class="fw-bold">Lesson Content</h5>
                                <div class="lesson-content">
                                    @if ($lessonContent)
                                        @if (isset($lessonContent['notes']))
                                            <div class="mb-4">
                                                <!-- <h6 class="fw-bold">Notes:</h6> -->
                                                {!! $lessonContent['notes'] !!}
                                            </div>
                                        @endif

                                        @if (isset($lessonContent['attachement']))
                                            <div class="mb-4">
                                                <h6 class="fw-bold">Attachment:</h6>
                                                <div class="d-flex gap-2 flex-wrap">
                                                    <a href="{{ route('learner.download', ['type' => 'lesson', 'id' => $currentLesson->id]) }}"
                                                        class="btn btn-sm btn-primary">
                                                        <i class="bi bi-download me-2"></i>Download Attachment
                                                    </a>
                                                    <!-- <a href="{{ $lessonContent['attachement'] }}" target="_blank" class="btn btn-sm btn-outline-secondary">
                                                        <i class="bi bi-eye me-2"></i>Preview
                                                    </a> -->
                                                </div>
                                                <small class="text-muted mt-2 d-block">
                                                    <i class="bi bi-info-circle me-1"></i>
                                                    Click "Download" to save the file to your device.
                                                </small>
                                            </div>
                                        @endif

                                        @if($lessonAssignments->count() > 0)
                                            <div class="mb-4">
                                                <h6 class="fw-bold text-colour">
                                                    <!-- <i class="bi bi-journal-check me-2"></i> -->
                                                    Lesson Assignment
                                                </h6>
                                                @foreach($lessonAssignments as $assignment)
                                                    <div class="mb-3">
                                                        <h6 class="text-colour mb-2">{{ $assignment->title }}</h6>
                                                        <div class="d-flex gap-2">
                                                            <a href="{{ route('learner.assignment.view', $assignment) }}" class="btn btn-sm btn-primary">
                                                                <i class="bi bi-eye me-1"></i>Preview Assignment
                                                            </a>
                                                            @if($assignment->file_link)
                                                                <a href="{{ route('learner.download', ['type' => 'assignment', 'id' => $assignment->id]) }}" class="btn btn-sm btn-outline-secondary">
                                                                    <i class="bi bi-download me-1"></i>Download Files
                                                                </a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif

                                        @if (isset($lessonContent['external_link']))
                                            <div class="mb-4">
                                                <h6 class="fw-bold">External Resource:</h6>
                                                <a href="{{ $lessonContent['external_link'] }}" class="btn btn-sm btn-info"
                                                    target="_blank">
                                                    <i class="bi bi-link-45deg me-2"></i>Visit External Link
                                                </a>
                                            </div>
                                        @endif
                                    @else
                                        <div class="alert alert-info">
                                            <i class="bi bi-info-circle me-2"></i> No additional content available for this
                                            lesson.
                                        </div>
                                    @endif
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="accordion shadow-sm" id="courseContent">
                    <div class="accordion-item">
                        <h1 class="" style="font-size: 2.25rem;">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#courseOverview">
                                Subject Content ({{ $totalLessons }} Lessons)
                            </button>
                        </h1>
                        <div id="courseOverview" class="accordion-collapse collapse show">
                            <div class="accordion-body">
                                <ul class="list-group">
                                    @foreach ($lessons as $index => $lesson)
                                        <a href="{{ route('learner.subject.learn', ['subject' => $subject->id, 'lesson' => $lesson->id]) }}"
                                            class="text-decoration-none">
                                            <li
                                                class="list-group-item d-flex align-items-center {{ $currentLesson && $currentLesson->id === $lesson->id ? 'bg-light' : '' }}">
                                                <input type="checkbox" class="form-check-input me-3"
                                                    @if (in_array($lesson->id, $trackedLessons) || ($index === 0 && !$currentLesson)) checked @endif disabled>
                                                <div>
                                                    <span class="d-block">{{ $index + 1 }}. {{ $lesson->title }}</span>
                                                    <small class="text-muted">{{ $lesson->topic }}</small>
                                                </div>
                                            </li>
                                        </a>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Subject Info Card -->
                <div class="card mt-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Subject Information</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            @if($subject->photo_link )
                                <img src="{{ asset($subject->photo_link) }}"
                                    alt="{{ $subject->title }}" class="rounded-circle me-3"
                                    style="width: 50px; height: 50px; object-fit: cover;">
                            @else
                                <div class="d-flex justify-content-center align-items-center rounded-circle me-3 mt-2 bg-light" style="width: 50px; height: 50px;">
                                    <i class="bi bi-book text-muted"></i>
                                </div>
                            @endif
                            <div>
                                <h6 class="mb-0">{{ $subject->title }}</h6>
                                <small class="text-muted">By {{ $subject->teacher->name ?? 'Unknown Teacher' }}</small>
                            </div>
                        </div>
                        <p class="text-muted">{{ Str::limit($subject->description, 150) }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .course-section {
            background-color: white;
            color: #012970;
        }

        .course-video {
            overflow: hidden;
            border-radius: 10px;
        }

        .cursor-pointer {
            cursor: pointer;
        }

        .accordion-header {
            font-size: 1.25rem;
        }

        .accordion-item {
            border: 1px solid #dee2e6;
        }

        /* Smooth Accordion Animation */
        .accordion-collapse {
            transition: height 0.3s ease-in-out, opacity 0.3s ease-in-out;
        }
    </style>
@endsection
