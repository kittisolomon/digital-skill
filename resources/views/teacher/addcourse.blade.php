@extends('instructor.index')
@section('content')

<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center mt-4">
            <div>
                {{-- <h3 class="mb-0">Dashboard</h3> --}}
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('instructor.courses') }}">Course Management</a></li>
                        <li class="breadcrumb-item active">Courses</li>
                        <li class="breadcrumb-item active">Add Course</li>
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
             <h5 class="card-title">Add a new Course</h5>
            
             <form action="{{ route('store.course') }}" method="POST" class="row g-3" enctype="multipart/form-data">
              @csrf
              <div class="col-md-6">
                  <label for="courseName" class="form-label">Course Name</label>
                  <input type="text" name="title" class="form-control" id="courseName" value="{{ old('title') }}">
              </div>
          
              <div class="col-md-6">
                  <label for="categorySelect" class="form-label">Category</label>
                  <select name="category_id" class="form-control" id="categorySelect">
                      <option value="">Select a category...</option>
                      @foreach($categories as $category)
                          <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                              {{ $category->name }}
                          </option>
                      @endforeach
                  </select>
              </div>
          
              <div class="col-md-4">
                  <label for="price" class="form-label">Price</label>
                  <input type="number" step="0.01" name="price" class="form-control" id="price" value="{{ old('price') }}">
              </div>
          
              <div class="col-md-4">
                  <label for="status" class="form-label">Status</label>
                  <select name="status" class="form-control" id="status">
                      <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                      <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                  </select>
              </div>
          
              <div class="col-md-4">
                  <label for="isPaid" class="form-label">Course Type</label>
                  <select id="isPaid" name="is_paid" class="form-control">
                    <option value="" disable>Select Course Type...</option>
                      <option value="0" {{ old('is_paid') == '0' ? 'selected' : '' }}>Free</option>  
                      <option value="1" {{ old('is_paid') == '1' ? 'selected' : '' }}>Paid</option>  
                  </select>
              </div>
              <div class="col-md-12">
                <label for="skillLevel" class="form-label">Skill Level</label>
                <select id="skillLevel" name="skill_level" class="form-control">
                  <option value="" disable>Select Skill Level...</option>
                    <option value="Beginner" {{ old('skill_level') == 'Beginner' ? 'selected' : '' }}>Beginner</option>  
                    <option value="Intermediate" {{ old('skill_level') == 'Intermediate' ? 'selected' : '' }}>Intermediate</option>  
                    <option value="Senior" {{ old('skill_level') == 'Senior' ? 'selected' : '' }}>Senior</option>  
                    <option value="All Level" {{ old('skill_level') == 'All Level' ? 'selected' : '' }}>All Level</option>  
                  </select>
            </div>
              <div class="col-md-12">
                  <label for="photoLink" class="form-label">Cover Photo</label>
                  <input type="file" name="photo_link" class="form-control" id="photoLink">
              </div>
          
              <div class="col-12">
                  <label for="description" class="form-label">Description</label>
                  <textarea name="description" class="form-control tinymce-editor">{{ old('description') }}</textarea>
              </div>
          
              <div class="text-center"> 
                  <button type="submit" class="btn btn-success">Add Course</button>
              </div>
          </form>
          
        </div>
          </div>
        </div>

      </div>
    </div>

    {{-- Add Course Modal --}}
    {{-- <div class="modal fade" id="addCourse" tabindex="-1">
      <div class="modal-dialog  modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Vertically Centered</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <h5 class="card-title">Add a new Course</h5>
                <!-- Multi Columns Form -->
                <form class="row g-3">
                  <div class="col-md-12">
                    <label for="inputName5" class="form-label">Course Name</label>
                    <input type="text" name="title" class="form-control" id="courseName">
                  </div>
                  <div class="col-md-4">
                    <label for="inputEmail5" class="form-label">Price</label>
                    <input type="price" class="form-control" id="price">
                  </div>
                  <div class="col-md-4">
                    <label for="inputPassword5" class="form-label">Duration</label>
                    <input type="duration" class="form-control" id="duration">
                  </div>
                  <div class="col-md-4">
                    <label for="inputPassword5" class="form-label">Course Type</label>
                    <select id="isPaid" name="is_paid" class="form-control">
                      <option value="0">Free</option>  
                      <option value="1">Paid</option>  
                    </select>
                  </div>
                  <div class="col-md-12">
                    <label for="inputCity" class="form-label">Cover Photo</label>
                    <input type="file" name="photo_link" class="form-control" id="phontoLink">
                  </div>
                  <div class="col-12">
                    <label for="inputCity" class="form-label">Description</label>
                    <textarea class="form-control"> </textarea>
                  </div>
                  <div class="text-center">
                   
                  </div>
                </form>
                <!-- End Multi Columns Form -->
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Submit</button>
                    <button type="reset" class="btn btn-danger">Close</button>
          </div>
        </div>
      </div>
    </div> --}}
  </section>
@endsection