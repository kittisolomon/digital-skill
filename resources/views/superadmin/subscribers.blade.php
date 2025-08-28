@extends('admin.index')
@section('content')

<div class="card">
  <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mt-4">
          <div>
              <nav>
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="">Contacts</a></li>
                      <li class="breadcrumb-item active">Subscribers</li>
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
                    <h5 class="card-title mb-0">Subscribers</h5>
                    <p class="mb-0">View all added Subscribers here.</p>
                </div>
                <!-- <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategory">
                    <i class="bi bi-plus-lg"></i>Send Newsletter
                </button> -->
            </div>
            <!-- Table with stripped rows -->
            <table class="table  table-hover">
              <thead>
                <tr>
                 <th>S/N</th>
                  <th>Email</th>
                  <th>Status</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($subscribers as $index => $subscriber)
                <tr>
                 <td> {{ $index + 1 }} </td>
                  <td>{{ $subscriber->email }}</td>
                  <td>
                    @if($subscriber->status == 'is_active')
                    <span class="badge bg-success">Active</span>
                    @else
                    <span class="badge bg-danger">Inactive</span>
                    @endif
                  </td>
                  <td>{{ $subscriber->created_at->format('Y-m-d') }}</td>
                  <td>
                    {{-- <button class="btn btn-sm bg-warning"><i class="bi bi-pencil-square text-white"></i></button> --}}
                    <form action="{{ route('admin.subscriber.destroy', $subscriber) }}" method="POST" style="display:inline;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-sm bg-danger">
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
  </section>
@endsection