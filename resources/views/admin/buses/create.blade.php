@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header d-flex justify-content-between align-items-center mb-3">
            <h3 class="fw-bold mb-0">New Create Bus</h3>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
            </div>
        @endif

        <form action="{{ route('admin.buses.store') }}" method="POST">
            @csrf

            <h5>Bus Info</h5>
            <div class="mb-3">
                <label>Select Existing Bus Name</label>
                <select name="existing_bus_id" class="form-select">
                    <option value="">-- Or enter below --</option>
                    @foreach($buses as $bus)
                        <option value="{{ $bus->id }}">{{ $bus->bus_name }} - {{ $bus->bus_number }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label>Or Enter New Bus Name</label>
                <input type="text" name="bus_name" class="form-control" placeholder="New Bus Name" value="{{ old('bus_name') }}">
            </div>
            <div class="mb-3">
                <label>Bus Number</label>
                <input type="text" name="bus_number" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Driver Phone</label>
                <input type="text" name="driver_phone" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Bus Category</label>
                <select name="bus_category_id" class="form-select" required>
                    <option value="">-- Select Category --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <h5>Destination</h5>
            <div class="mb-3">
                <label>Select Existing Destination</label>
                <select name="destination_id" class="form-select">
                    <option value="">-- Or enter below --</option>
                    @foreach($destinations as $dest)
                        <option value="{{ $dest->id }}">{{ $dest->from }} → {{ $dest->to }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label>New From</label>
                <input type="text" name="from" class="form-control" placeholder="New From">
            </div>
            <div class="mb-3">
                <label>New To</label>
                <input type="text" name="to" class="form-control" placeholder="New To">
            </div>

            
            <h5>Schedule (One-way)</h5>
            <div class="mb-3">
                <label>Date</label>
                <input type="date" name="date" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Departure Time</label>
                <input type="time" name="departure_time" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Arrival Time</label>
                <input type="time" name="arrival_time" class="form-control" required>
            </div>

            <h5>Schedule (Return Trip)</h5>
            <div class="mb-3">
                <label>Departure Time</label>
                <input type="time" name="return_departure_time" class="form-control" placeholder="Return Departure Time" required>
            </div>
            <div class="mb-3">
                <label>Arrival Time</label>
                <input type="time" name="return_arrival_time" class="form-control" placeholder="Return Arrival Time" required>
            </div>

            <h5>Ticket Price</h5>
            <div class="mb-3">
                <label>Price (tk)</label>
                <input type="number" name="price" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Vat percentage</label>
                <input type="number" class="form-control" name="vat_percentage" placeholder="VAT (%)" step="0.01" required>
            </div>

            <button class="btn btn-primary">Save Bus</button>
            <a href="{{ route('admin.buses') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
