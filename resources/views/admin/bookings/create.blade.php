@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3>New Booking</h3>
        </div>

        <form action="{{ route('admin.bookings.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="schedule_id">Schedule</label>
                <select name="schedule_id" id="schedule_id" class="form-select" required>
                    <option value="">-- Select Schedule --</option>
                    @foreach ($schedules as $schedule)
                        <option value="{{ $schedule->id }}"> {{ $schedule->bus->bus_name }} - {{ $schedule->date }} 
                            ({{ $schedule->departure_time }} - {{ $schedule->arrival_time }})</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="user_name">User Name</label>
                <input type="text" name="user_name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="user_phone">User Phone</label>
                <input type="text" name="user_phone" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Select Seat</label>
                <div id="seat-container" style="width: 300px;"></div>
              
                <input type="hidden" name="seat_number" id="seat_number" required>
            </div>

            <button type="submit" class="btn btn-primary">Book Seat</button>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.getElementById('schedule_id').addEventListener('change', function () {
    const scheduleId = this.value;
    const seatContainer = document.getElementById('seat-container');
    seatContainer.innerHTML = 'Loading seats...';

    fetch(`/admin/get-seats/${scheduleId}`)
        .then(res => res.json())
        .then(data => {
            if (data.error) {
                seatContainer.innerHTML = 'No seats available.';
                return;
            }

            seatContainer.innerHTML = '';
            const grid = document.createElement('div');
            grid.style.display = 'grid';
            grid.style.gridTemplateColumns = 'repeat(5, 1fr)';
            grid.style.gap = '10px';

            data.forEach((seat, index) => {
                const label = document.createElement('label');
                label.style.backgroundColor = seat.status === 'empty' ? '#2ed573' : (seat.status === 'reserved' ? '#ffa502' : '#ff4757');
                label.style.padding = '10px';
                label.style.borderRadius = '8px';
                label.style.color = 'white';
                label.style.textAlign = 'center';
                label.style.cursor = seat.status === 'empty' ? 'pointer' : 'not-allowed';
                label.style.opacity = seat.status === 'empty' ? '1' : '0.5';
                label.style.display = 'flex';
                label.style.alignItems = 'center';
                label.style.justifyContent = 'center';
                label.style.minWidth = '40px';
                label.classList.add('seat-label');
                label.textContent = seat.seat_number;

                if (seat.status === 'empty') {
                    label.addEventListener('click', () => {
                        document.querySelectorAll('.seat-label.selected').forEach(l => l.classList.remove('selected'));
                        label.classList.add('selected');
                        document.getElementById('seat_number').value = seat.seat_number;
                    });
                }

                grid.appendChild(label);

                // Optional: Add aisle space after every 4 seats
                if ((index + 1) % 4 === 0) {
                    const spacer = document.createElement('div');
                    spacer.style.gridColumn = 'span 5';
                    spacer.innerHTML = '&nbsp;';
                    grid.appendChild(spacer);
                }
            });

            seatContainer.appendChild(grid);
        })
        .catch(err => {
            seatContainer.innerHTML = 'Failed to load seats';
            console.error(err);
        });
});
</script>
@endsection
