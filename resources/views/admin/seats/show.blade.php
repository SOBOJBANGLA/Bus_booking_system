@extends('layouts.admin')

@section('content')
<div class="container">
    <h3>Bus Seat Map - {{ $bus->bus_name }}</h3>
    <div style="width: 300px; margin: auto;">
        <div class="seat-grid" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 10px;">
            @foreach ($bus->seats as $seat)
                <div style="
                    background-color:
                        {{ $seat->status == 'empty' ? '#7bed9f' :
                           ($seat->status == 'reserved' ? '#ffa502' : '#ff4757') }};
                    padding: 10px;
                    border-radius: 8px;
                    text-align: center;
                    color: white;
                    font-weight: bold;">
                    {{ $seat->seat_number }}
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
