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
                      <li class="breadcrumb-item active">Categories</li>
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
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <h5 class="card-title mb-0">Category</h5>
                    <p class="mb-0">View all added category here.</p>
                </div>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategory">
                    <i class="bi bi-plus-lg"></i> Add Category
                </button>
            </div>
            <!-- Table with stripped rows -->
            <table class="table datatable table-hover">
              <thead>
                <tr>
                 <th>S/N</th>
                  <th>Name</th>
                  <th>Featured</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ( $categories as $index => $category )
                <tr>
                 <td> {{ $index + 1 }} </td>
                  <td>{{ $category->name }}</td>
                  <td>
                    <div class="form-check form-switch">
                      <input 
                        class="form-check-input toggle-featured" 
                        type="checkbox" 
                        role="switch"
                        data-id="{{ $category->id }}" 
                        {{ $category->is_featured ? 'checked' : '' }}
                      >
                    </div>
                  </td>
                  <td>{{ $category->created_at->format('Y-m-d') }}</td>
                  <td>
                    {{-- <button class="btn btn-sm bg-warning"><i class="bi bi-pencil-square text-white"></i></button> --}}
                    <button type="button" class="btn btn-sm bg-warning edit-category-btn"
                        data-id="{{ $category->id }}"
                        data-name="{{ $category->name }}"
                        data-bs-toggle="modal"
                        data-bs-target="#editCategory">
                        <i class="bi bi-pencil-square text-white"></i>
                    </button>
                    <form action="{{ route('delete.category') }}" method="POST" style="display:inline-block;" >
                      @csrf
                      <input type="hidden" name="category_id" value="{{ $category->id }}">
                      <button class="btn btn-sm bg-danger" type="submit">
                          <i class="bi bi-trash text-white"></i>
                      </button>
                  </form>                
                </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>

    {{-- Add Category Modal --}}
  <div class="modal fade" id="addCategory" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title card-title">Add category</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form action="{{ route('store.category') }}" method="POST" >
            @csrf
          <div class="modal-body mb-4">
                  <div class="col-12">
                    <label for="inputNanme4" class="form-label">Category Name</label>
                    <input type="text" name="name" class="form-control" id="categoryName">
                  </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Save category</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          </div>
        </form>
        </div>
      </div>
    </div>

    {{-- Edit Category Modal --}}
<div class="modal fade" id="editCategory" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title card-title">Edit Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="editCategoryForm" method="POST" action="{{ route('update.category') }}">
        @csrf
        <input type="hidden" name="category_id" id="editCategoryId">
        <div class="modal-body mb-4">
          <div class="col-12">
            <label for="editCategoryName" class="form-label">Category Name</label>
            <input type="text" name="name" class="form-control" id="editCategoryName">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Update </button>
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>

  </section>
@endsection