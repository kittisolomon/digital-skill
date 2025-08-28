@extends('admin.index')
@section('content')
<div class="card">
  <div class="card-body">
      <div class="d-flex justify-content-between align-items-center mt-4">
          <div>
              <nav>
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="">Payments</a></li>
                      <li class="breadcrumb-item active">Course Purchased</li>
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
                    <h5 class="card-title mb-0">Payments</h5>
                    <p class="mb-0">View all purchased course here.</p>
                </div>
                {{-- <a href="" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i> Add Course
                </a> --}}
            </div>
            <!-- Table with stripped rows -->
            <table id="payments" class="table table-striped nowrap dt-responsive" style="width:100%">
              <thead>
                <tr>
                    <th class="text-center align-middle">S/N</th>
                  {{-- <th class="text-center align-middle">
                    Cover
                  </th> --}}
                  <th class="text-center align-middle">Transaction ID</th>
                  <th class="text-center align-middle">Amount</th>
                  <th class="text-center align-middle">Fee</th>
                  <th class="text-center align-middle">Total</th>
                  <th class="text-center align-middle">Settlement Amount</th>
                  <th class="text-center align-middle">Currency</th>
                  <th class="text-center align-middle"> Instructor </th>
                  <th class="text-center align-middle"> Course</th>
                  <th class="text-center align-middle"> Student </th>
                  <th class="text-center align-middle"> Student Email </th>
                  <th class="text-center align-middle"> Status</th>
                  <th class="text-center align-middle"> Date</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($purchaseHistories as $index => $history)
                <tr>
                 <td class="text-center align-middle"> {{ $index + 1 }} </td>
                  <td class="text-center align-middle"><a href="" class="text-primary">{{ $history->reference }}</a></td>
                  <td class="text-center align-middle">₦ {{ number_format($history->transAmount, 2) }}</td>
                  <td class="text-center align-middle">₦ {{ number_format($history->transFee, 2) }}</td>
                  <td class="text-center align-middle">₦ {{ number_format($history->transTotal, 2) }}</td>
                  <td class="text-center align-middle">₦ {{ number_format($history->settlementAmount, 2) }}</td>
                  <td class="text-center align-middle">{{ $history->currencyCode }}</td>
                  <td class="text-center align-middle">{{ $history->instructor->name }}</td>
                  <td class="text-center align-middle"><a href="" class="text-primary">{{ $history->course->title }} </a></td>
                  <td class="text-center align-middle">{{ $history->student->name }}</td>
                  <td class="text-center align-middle">{{ $history->customerEmail }}</td>
                  <td class="text-center align-middle">
                    @if($history->status == 0)
                    <span class="badge bg-success">Approved</span>
                    @else
                    <span class="badge bg-danger">Failed</span>
                    @endif
                  </td>
                  <td class="text-center align-middle">{{ $history->created_at->format('jS F Y h:i A') }}</td>
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