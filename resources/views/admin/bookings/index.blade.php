@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="page-inner">
        <div class="page-header d-flex justify-content-between align-items-center mb-3">
            <h3 class="fw-bold mb-0">All Bookings</h3>
            <a href="{{ route('admin.bookings.create') }}" class="btn btn-success">+ Add Booking</a>
        </div>
        
        
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
                @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table
                id="basic-datatables"
                class="display table table-striped table-hover"
              >
      <thead>
          <tr>
              <th>#</th>
              <th>User Name</th>
              <th>Phone</th>
              <th>Seat No.</th>
              <th>Bus</th>
              <th>Schedule</th>
              <th>Payment Status</th>
              <th>Action</th>
          </tr>
      </thead>
      <tbody>
          @forelse($bookings as $booking)
              <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $booking->user_name }}</td>
                  <td>{{ $booking->user_phone }}</td>
                  <td>{{ $booking->seat_number }}</td>
                  <td>{{ $booking->schedule->bus->bus_name ?? 'N/A' }}</td>
                  <td>
                      {{ $booking->schedule->date ?? 'N/A' }} <br>
                      {{ $booking->schedule->departure_time ?? '' }} - {{ $booking->schedule->arrival_time ?? '' }}
                  </td>
                  <td>
                      @if($booking->payment_status === 'confirmed')
                          <span class="badge bg-success">Confirmed</span>
                      @else
                          <span class="badge bg-secondary">Pending</span>
                      @endif
                  </td>
                  <td>
                      @if($booking->payment_status !== 'confirmed')
                          <form action="{{ route('bookings.confirm', $booking->id) }}" method="POST">
                              @csrf
                              <button class="btn btn-sm btn-primary" onclick="return confirm('Confirm payment?')">
                                  Confirm Payment
                              </button>
                          </form>
                      @else
                          <span class="text-success">✔</span>
                      @endif
                  </td>
              </tr>
          @empty
              <tr>
                  <td colspan="8">No bookings found.</td>
              </tr>
          @endforelse
      </tbody>
  </table>
              </div>
            </div>
          </div>
        </div>

       
      </div>
    </div>
  </div>

    
@endsection