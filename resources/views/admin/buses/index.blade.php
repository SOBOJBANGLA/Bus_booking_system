@extends('layouts.admin')

@section('content')
<style>
  .table-responsive {
    overflow-x: auto;
  }

  table {
    width: 100% !important;
    table-layout: auto;
  }

  thead th {
    white-space: normal;
    word-break: break-word;
    overflow-wrap: break-word;
    font-size: 12px;
    font-weight: 500;
    text-align: center;
    vertical-align: middle;
    text-transform: lowercase; /* Force lowercase text */
  }

  td {
    white-space: normal;
    word-break: break-word;
    vertical-align: middle;
  }

  .btn-icon-only {
    padding: 0.375rem;
    width: 30px;
    height: 30px;
    display: inline-flex;
    justify-content: center;
    align-items: center;
  }

  .btn-icon-only i {
    font-size: 14px;
  }
</style>

<div class="container">
  <div class="page-inner">
    <div class="page-header d-flex justify-content-between align-items-center mb-3">
      <h3 class="fw-bold mb-0">All Bus</h3>
      <a href="{{ route('admin.buses.create') }}" class="btn btn-success">+ Add Bus Entry</a>
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
              <table id="basic-datatables" class="display table table-striped table-hover w-100">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Bus Name</th>
                    <th>Bus Number</th>
                    <th>Phone</th>
                    <th>Category</th>
                    <th>Destination</th>
                    <th>Schedule</th>
                    <th>Base Ticket Price</th>
                    <th>VAT (%)</th>
                    <th>Total Price</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Bus Name</th>
                    <th>Bus Number</th>
                    <th>Phone</th>
                    <th>Category</th>
                    <th>Destination</th>
                    <th>Schedule</th>
                    <th>Base Ticket Price</th>
                    <th>VAT (%)</th>
                    <th>Total Price</th>
                    <th>Actions</th>
                  </tr>
                </tfoot>
                <tbody>
                  @foreach($buses as $bus)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $bus->bus_name }}</td>
                      <td>{{ $bus->bus_number }}</td>
                      <td>{{ $bus->driver_phone }}</td>
                      <td>{{ $bus->category->name ?? 'N/A' }}</td>
                      <td>{{ $bus->destination->from ?? '' }} - {{ $bus->destination->to ?? '' }}</td>
                      <td>
                        @forelse($bus->schedules as $schedule)
                          <strong>{{ $schedule->date }}</strong><br>
                          {{ $schedule->departure_time }} → {{ $schedule->arrival_time }}<br><hr>
                        @empty
                          <span class="text-muted">No schedule</span>
                        @endforelse
                      </td>
                      {{-- <td>
                        {{ $bus->ticketPrice ? number_format($bus->ticketPrice->price, 2) . ' tk' : 'N/A' }}
                      </td> --}}
                      @php
                                $ticket = $bus->ticketPrice;
                            @endphp

                            <td>
                                {{ $ticket ? number_format($ticket->price, 2) : '-' }}
                            </td>
                            <td>
                                {{ $ticket ? $ticket->vat_percentage . '%' : '-' }}
                            </td>
                            <td>
                                {{ $ticket ? number_format($ticket->total_price, 2) : '-' }}
                            </td>
                      <td>
                        {{-- <a href="{{ route('admin.buses.seats', $bus->id) }}" class="btn btn-primary">View Seats</a> --}}

                        <a href="{{ route('admin.buses.edit', $bus->id) }}" class="btn btn-primary btn-sm btn-icon-only" title="Edit">
                          <i class="fa fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.buses.destroy', $bus->id) }}" method="POST" style="display:inline-block;">
                          @csrf @method('DELETE')
                          <button class="btn btn-danger btn-sm btn-icon-only" onclick="return confirm('Are you sure?')" title="Delete">
                            <i class="fa fa-trash"></i>
                          </button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- DataTable Init -->
<script>
  $(document).ready(function () {
    $('#basic-datatables').DataTable({
      responsive: true,
      autoWidth: false,
      scrollX: false
    });

    // Convert all <thead> <th> text to lowercase
    $('#basic-datatables thead th').each(function () {
      $(this).text($(this).text().toLowerCase());
    });
  });
</script>

@endsection
