@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header d-flex justify-content-between align-items-center mb-3">
            <h3 class="fw-bold mb-0">Edit Bus</h3>
            
        </div>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif
    <form action="{{ route('admin.buses.update', $bus->id) }}" method="POST">
        @csrf
        @method('PUT')
    
        <div class="mb-3">
          <label>Bus Name</label>
          <input type="text" name="bus_name" class="form-control" value="{{ old('bus_name', $bus->bus_name) }}" required>
        </div>
    
        <div class="mb-3">
          <label>Bus Number</label>
          <input type="text" name="bus_number" class="form-control" value="{{ old('bus_number', $bus->bus_number) }}" required>
        </div>
    
        <div class="mb-3">
          <label>Driver Phone</label>
          <input type="text" name="driver_phone" class="form-control" value="{{ old('driver_phone', $bus->driver_phone) }}" required>
        </div>
    
        <div class="mb-3">
          <label>Category</label>
          <select name="bus_category_id" class="form-control" required>
            @foreach($categories as $cat)
              <option value="{{ $cat->id }}" {{ $cat->id == $bus->bus_category_id ? 'selected' : '' }}>
                {{ $cat->name }}
              </option>
            @endforeach
          </select>
        </div>
    
        <div class="mb-3">
          <label>Destination</label>
          <select name="destination_id" class="form-control" required>
            @foreach($destinations as $dest)
              <option value="{{ $dest->id }}" {{ $dest->id == $bus->destination_id ? 'selected' : '' }}>
                {{ $dest->from }} - {{ $dest->to }}
              </option>
            @endforeach
          </select>
        </div>
    
        <div class="mb-3">
          <label>Ticket Price</label>
          <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', $bus->ticketPrice->price ?? '') }}" required>
        </div>
    
        <button type="submit" class="btn btn-primary">Update Bus</button>
        <a href="{{ route('admin.buses') }}" class="btn btn-secondary">Cancel</a>
      </form>
   
    </div>
  </div>
@endsection
