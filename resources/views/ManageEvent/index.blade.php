@extends('Layouts.mainlayout')
@section('content')
    @include('ManageEvent.addevent')

    <div class="container-fluid">
        @if (session('error') || session('success'))
            <div id="alert-message"
                class="alert alert-{{ session('success') ? 'success' : 'danger' }} alert-dismissible fade show position-fixed top-0 end-0 m-4 shadow"
                role="alert" style="z-index: 1055; min-width: 300px;">
                {{ session('error') ?? session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <!-- Top Navbar for Event Management -->
        <nav class="navbar rounded bg-white border shadow-sm mb-2">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <a class="navbar-brand fw-bold fs-4">Manage Event Records</a>

                <div class="d-flex gap-2">
                    <a data-bs-toggle="modal" data-bs-target="#addEventModal" class="btn btn-primary"><i
                            class="fas fa-plus"></i> New Event</a>
                    <a href="{{route('manageevent.history')}}" class="btn btn-secondary"><i class="fas fa-history"></i> History</a>
                </div>
            </div>
        </nav>


        <!-- Events Grid -->
        <div class="row g-4">
            @forelse ($events as $event)
                <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="card h-100 shadow-sm border-0 rounded">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-success fw-bold">{{ $event->title }}</h5>
                            <p class="card-text mb-2">
                                <i class="fas fa-calendar-alt me-2 text-muted"></i>
                                <strong>Date:</strong> {{ \Carbon\Carbon::parse($event->date)->format('F d, Y') }}
                            </p>
                            <p class="card-text mb-2">
                                <i class="fas fa-clock"></i>
                                <strong>Time: </strong>{{ \Carbon\Carbon::parse($event->time)->format('g:i A') }}
                            </p>
                            <p class="card-text mb-2">
                                <i class="fas fa-map-marker-alt me-2 text-muted"></i>
                                <strong>Location:</strong> {{ $event->location }}
                            </p>

                            <div class="mt-auto text-end">
                                <a data-bs-toggle="modal" data-bs-target="#eventDetailsModal-{{ $event->id }}" class="btn btn-outline-success btn-sm me-2">
                                    <i class="fas fa-info-circle me-1"></i>More Details
                                </a>
                                <a data-bs-toggle="modal" data-bs-target="#deleteEventModal-{{ $event->id }}" class="btn btn-outline-danger btn-sm">
                                    <i class="fas fa-trash-alt me-1"></i>Remove
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                @include('ManageEvent.deleteevent')
                @include('ManageEvent.moredetails')
            @empty
                <div class="col-12 text-center text-muted">
                    <h3>No events available.</h3>
                </div>
            @endforelse
        </div>

    </div>
    <script>
        // Auto-hide success alert after 3 seconds
        setTimeout(function() {
            var alert = document.getElementById('alert-message');
            if (alert) {
                alert.style.transition = "opacity 0.5s ease-out";
                alert.style.opacity = "0"; // Gradual fade-out
                setTimeout(() => alert.remove(), 500); // Remove after fade-out
            }
        }, 3000);

        // Enable Bootstrap tooltips
        document.addEventListener("DOMContentLoaded", function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        });
    </script>
@endsection
