@extends('admin.index')
@section('content')

<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mt-4">
            <div>
                {{-- <h3 class="mb-0">Dashboard</h3> --}}
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Course Management</a></li>
                        <li class="breadcrumb-item active">Course</li>
                        <li class="breadcrumb-item active">Edit Course</li>
                        <li class="breadcrumb-item active">{{ $course->title }}</li>
                    </ol>
                </nav>
            </div>
            <a href="{{ url()->previous() }}" class="btn btn-outline-primary">
                <i class="bi bi-arrow-left"></i> Back
            </a>
        </div>
    </div>
</div>
  <!-- End Page Title -->
<section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
             {{-- add Course form --}}
             <h5 class="card-title">Add Edit Course</h5>
            
             <form action="{{ route('admin.update.course', $course) }}" method="POST" class="row g-3" enctype="multipart/form-data">
                @csrf
                @method('PUT') <!-- Use PUT for update -->
            
                <div class="col-md-6">
                    <label for="courseName" class="form-label">Course Name</label>
                    <input type="text" name="title" class="form-control" id="courseName" value="{{ old('title', $course->title) }}">
                </div>
            
                <div class="col-md-6">
                    <label for="categorySelect" class="form-label">Category</label>
                    <select name="category_id" class="form-control" id="categorySelect">
                        <option value="">Select a category...</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $course->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            
                <div class="col-md-4">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" step="0.01" name="price" class="form-control" id="price" value="{{ old('price', $course->price) }}">
                </div>
            
                <div class="col-md-4">
                    <label for="duration" class="form-label">Duration</label>
                    <input type="text" name="total_duration" class="form-control" id="total_duration" value="{{ old('total_duration', $course->total_duration) }}">
                </div>
            
                <div class="col-md-4">
                    <label for="isPaid" class="form-label">Course Type</label>
                    <select id="isPaid" name="is_paid" class="form-control">
                        <option value="" disabled>Select Course Type...</option>
                        <option value="0" {{ old('is_paid', $course->is_paid) == '0' ? 'selected' : '' }}>Free</option>  
                        <option value="1" {{ old('is_paid', $course->is_paid) == '1' ? 'selected' : '' }}>Paid</option>  
                    </select>
                </div>
            
                <div class="col-md-12">
                    <label for="skillLevel" class="form-label">Skill Level</label>
                    <select id="skillLevel" name="skill_level" class="form-control">
                        <option value="" disabled>Select Skill Level...</option>
                        <option value="Beginner" {{ old('skill_level', $course->skill_level) == 'Beginner' ? 'selected' : '' }}>Beginner</option>  
                        <option value="Intermediate" {{ old('skill_level', $course->skill_level) == 'Intermediate' ? 'selected' : '' }}>Intermediate</option>  
                        <option value="Senior" {{ old('skill_level', $course->skill_level) == 'Senior' ? 'selected' : '' }}>Senior</option>  
                        <option value="All Level" {{ old('skill_level', $course->skill_level) == 'All Level' ? 'selected' : '' }}>All Level</option>  
                    </select>
                </div>
            
                <div class="col-md-12">
                    <label for="photoLink" class="form-label">Cover Photo</label>
                    <input type="file" name="photo_link" class="form-control" id="photoLink">
                </div>
            
                <div class="col-12">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" class="form-control tinymce-editor">{{ old('description', $course->description) }}</textarea>
                </div>
            
                <div class="text-center"> 
                    <button type="submit" class="btn btn-success">Update Course</button>
                </div>
            </form>
            
        </div>
          </div>
        </div>

      </div>
    </div>
  </section>
@endsection