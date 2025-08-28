@extends('admin.index')
@section('content')
<div class="card">
  <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mt-4">
          <div>
              {{-- <h3 class="mb-0">Dashboard</h3> --}}
              <nav>
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="#">Monetization</a></li>
                      <li class="breadcrumb-item active">Discounts</li>
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
                    <h5 class="card-title mb-0">Discounts</h5>
                    <p class="mb-0">View all added Discounts here.</p>
                </div>
               
            </div>
            <!-- Table with stripped rows -->
            <table  id="discounts" class="table table-striped nowrap dt-responsive" style="width:100%">
              <thead>
                <tr>
                 <th class="text-center align-middle">S/N</th>
                  <th class="text-center align-middle">Course Name</th>
                  <th class="text-center align-middle">Original Price</th>
                  <th class="text-center align-middle">Discounted Price</th>
                  <th class="text-center align-middle">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($courses as $index => $course )
                <tr>
                 <td class="text-center align-middle"> {{ $index + 1 }} </td>
                  <td class="text-center align-middle">{{ $course->title }}</td>
                  <td class="text-center align-middle">₦ {{ number_format($course->price, 2) }}</td>
                  <td class="text-center align-middle">
                    @if ($course->prices->is_discounted)
                    {{-- <del class="text-muted">${{ $course->prices->original }}</del> --}}
                    <span class="text-success">₦ {{ $course->prices->discounted }}</span>
                    @else
                        N/A
                    @endif
                  </td>
                  {{-- <td>{{ $category->created_at->format('Y-m-d') }}</td> --}}
                  <td class="text-center align-middle">
                    <button class="btn btn-sm bg-warning discount-btn"
                            data-bs-toggle="modal" 
                            data-bs-target="#discountModal"
                            data-course-id="{{ $course->id }}"
                            data-course-title="{{ $course->title }}"
                            title="Apply Discount">
                        <i class="bi bi-tag text-white"></i>
                    </button>
                    @if($course->discount)
                    <form action="{{ route('admin.discounts.delete', ['discount' => $course->discount]) }}" method="POST" class="d-inline">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm">
                          <i class="bi bi-x-circle"></i> 
                      </button>
                  </form>
                  @else
                  <button type="button" class="btn btn-danger btn-sm disabled-btn" >
                    <i class="bi bi-x-circle"></i>
                </button>
                  @endif
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
    <div class="modal fade" id="discountModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Discount for <span class="text-primary" id="modal-course-title"></span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.discounts.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="course_id" id="modal-course-id">
                    <div class="modal-body">
                        <div class="col-12">
                            <label class="form-label">Discount Type</label>
                            <select class="form-control" name="type">
                                <option value="percentage">Percentage</option>
                                <option value="fixed">Fixed Amount</option>
                            </select>
                        </div>
                        <div class="col-12 mt-2">
                            <label class="form-label">Discount Amount</label>
                            <input type="number" name="amount" class="form-control">
                        </div>
                        {{-- <div class="col-12">
                            <label class="form-label">Status</label>
                            <select class="form-control" name="status">
                                <option value="active">Active</option>
                                <option value="expired">Inactive</option>
                            </select>
                        </div> --}}
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Save Discount</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
  </section>
  
@endsection