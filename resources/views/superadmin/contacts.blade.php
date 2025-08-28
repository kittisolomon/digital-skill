@extends('admin.index')
@section('content')

<div class="card">
  <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mt-4">
          <div>
              <nav>
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                      <li class="breadcrumb-item active">Contact Messages</li>
                  </ol>
              </nav>
          </div>
          <a href="{{ url()->previous() }}" class="btn btn-outline-primary">
              <i class="bi bi-arrow-left"></i> Back
          </a>
      </div>
  </div>
</div>

<section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <h5 class="card-title mb-0">Contact Messages</h5>
                    <p class="mb-0">View all contact messages here.</p>
                </div>
            </div>
            <!-- Table with stripped rows -->
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>S/N</th>
                  <th>Name</th>
                  <th>Email</th>
        
                  <th>Message</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($contacts as $index => $contact)
                <tr>
                  <td>{{ $index + 1 }}</td>
                  <td>{{ $contact->name }}</td>
                  <td>{{ $contact->email }}</td>
               
                  <td>{{ Str::limit($contact->message, 40) }}</td>
                  <td>{{ $contact->created_at->format('Y-m-d') }}</td>
                  <td>
                    <button type="button" class="btn btn-sm bg-warning" data-bs-toggle="modal" data-bs-target="#viewModal{{ $contact->id }}">
                        <i class="bi bi-eye text-white"></i>
                    </button>
                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm bg-danger" onclick="return confirm('Are you sure you want to delete this message?')">
                            <i class="bi bi-trash text-white"></i>
                        </button>
                    </form>
                  </td>
                </tr>

                <!-- View Modal -->
                <div class="modal fade" id="viewModal{{ $contact->id }}" tabindex="-1" aria-labelledby="viewModalLabel{{ $contact->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header bg-warning">
                                <h5 class="modal-title text-white" id="viewModalLabel{{ $contact->id }}">Message Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Name:</label>
                                    <p class="form-control-static">{{ $contact->name }}</p>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Email:</label>
                                    <p class="form-control-static">{{ $contact->email }}</p>
                                </div>
                              
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Message:</label>
                                    <div class="p-3 bg-light rounded">
                                        {{ $contact->message }}
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Date Received:</label>
                                    <p class="form-control-static">{{ $contact->created_at->format('F d, Y h:i A') }}</p>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
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