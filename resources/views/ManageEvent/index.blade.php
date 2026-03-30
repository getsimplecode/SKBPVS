@extends('Layouts.mainlayout')
@section('content')
@include('ManageEvent.addevent')

<div class="container-fluid py-4 px-4" style="background:#f8fafb;min-height:100vh;">

    {{-- PAGE HEADER --}}
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 mb-4">
        <div class="d-flex align-items-center gap-3">
            <div class="rounded-3 d-flex align-items-center justify-content-center flex-shrink-0"
                 style="width:46px;height:46px;background:#00331a;box-shadow:0 4px 12px rgba(0,51,26,0.25);">
                <i class="fas fa-calendar-check text-white" style="font-size:1rem;"></i>
            </div>
            <div>
                <h5 class="fw-bold mb-0 text-uppercase"
                    style="font-family:'Rajdhani',sans-serif;color:#0f2d1a;letter-spacing:0.5px;">
                    Manage Event Records
                </h5>
                <small class="text-secondary">Schedule and track SK Barangay Balintarak events</small>
            </div>
        </div>

        {{-- Action Buttons --}}
        <div class="d-flex gap-2">
            <a href="{{ route('manageevent.history') }}"
               class="btn btn-sm btn-outline-secondary d-flex align-items-center gap-2">
                <i class="fas fa-history"></i>
                <span class="d-none d-sm-inline">History</span>
            </a>
            <a data-bs-toggle="modal" data-bs-target="#addEventModal"
               class="btn btn-sm fw-bold text-white d-flex align-items-center gap-2"
               style="background:#00331a;border-color:#00331a;">
                <i class="fas fa-plus"></i>
                <span class="d-none d-sm-inline">New Event</span>
            </a>
        </div>
    </div>

    {{-- STATS STRIP --}}
    <div class="card border-0 shadow-sm rounded-3 mb-4">
        <div class="card-body py-2 px-4 d-flex align-items-center gap-4 flex-wrap">
            <div class="d-flex align-items-center gap-2">
                <div class="rounded-2 d-flex align-items-center justify-content-center"
                     style="width:30px;height:30px;background:#e8f5ee;">
                    <i class="fas fa-calendar-alt" style="color:#00331a;font-size:0.78rem;"></i>
                </div>
                <div>
                    <div class="fw-bold" style="font-size:1rem;color:#00331a;font-family:'Rajdhani',sans-serif;">
                        {{ $events->count() }}
                    </div>
                    <div class="text-secondary" style="font-size:0.68rem;text-transform:uppercase;letter-spacing:0.5px;">
                        Active Events
                    </div>
                </div>
            </div>
            <div style="width:1px;height:30px;background:#d4e6da;"></div>
            <small class="text-secondary" style="font-size:0.78rem;">
                <i class="fas fa-info-circle me-1" style="color:#00a651;"></i>
                Click <strong>View Details</strong> on any event card to see full information
            </small>
        </div>
    </div>

    {{-- EVENTS GRID --}}
    @if($events->isEmpty())
        {{-- Empty State --}}
        <div class="card border-0 shadow-sm rounded-3">
            <div class="card-body text-center py-5">
                <div class="rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                     style="width:70px;height:70px;background:#e8f5ee;">
                    <i class="fas fa-calendar-times" style="font-size:1.8rem;color:#d4e6da;"></i>
                </div>
                <h6 class="fw-bold mb-1" style="color:#0f2d1a;">No Events Available</h6>
                <p class="text-secondary small mb-3">Start by adding a new event for your barangay youth.</p>
                <a data-bs-toggle="modal" data-bs-target="#addEventModal"
                   class="btn btn-sm fw-bold text-white"
                   style="background:#00331a;border-color:#00331a;">
                    <i class="fas fa-plus me-1"></i> Create First Event
                </a>
            </div>
        </div>
    @else
    <div class="row g-3">
        @foreach ($events as $event)
        <div class="col-md-6 col-lg-4 col-xl-3">
            <div class="card h-100 border-0 shadow-sm rounded-3 overflow-hidden"
                 style="border-left:4px solid #00331a!important;transition:transform 0.2s,box-shadow 0.2s;"
                 onmouseover="this.style.transform='translateY(-3px)';this.style.boxShadow='0 8px 24px rgba(0,51,26,0.13)'"
                 onmouseout="this.style.transform='';this.style.boxShadow=''">

                {{-- Card Top Accent --}}
                <div style="height:4px;background:linear-gradient(90deg,#00331a,#00a651);"></div>

                <div class="card-body d-flex flex-column p-3">

                    {{-- Event Title --}}
                    <div class="d-flex align-items-start justify-content-between mb-3 gap-2">
                        <div class="rounded-2 d-flex align-items-center justify-content-center flex-shrink-0"
                             style="width:36px;height:36px;background:#e8f5ee;">
                            <i class="fas fa-calendar-day" style="color:#00331a;font-size:0.85rem;"></i>
                        </div>
                        <h6 class="fw-bold mb-0 flex-grow-1"
                            style="font-family:'Rajdhani',sans-serif;color:#0f2d1a;letter-spacing:0.3px;
                                   line-height:1.4;font-size:0.95rem;text-transform:uppercase;">
                            {{ $event->title }}
                        </h6>
                    </div>

                    <hr class="my-2" style="border-color:#e8f5ee;opacity:1;">

                    {{-- Event Details --}}
                    <div class="d-flex flex-column gap-2 mb-3">
                        <div class="d-flex align-items-center gap-2">
                            <span class="d-flex align-items-center justify-content-center rounded-1 flex-shrink-0"
                                  style="width:22px;height:22px;background:#f2faf5;">
                                <i class="fas fa-calendar fa-sm" style="color:#006633;font-size:0.65rem;"></i>
                            </span>
                            <div style="font-size:0.78rem;">
                                <span class="text-secondary">Date: </span>
                                <span class="fw-semibold" style="color:#0f2d1a;">
                                    {{ \Carbon\Carbon::parse($event->date)->format('d M Y') }}
                                </span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <span class="d-flex align-items-center justify-content-center rounded-1 flex-shrink-0"
                                  style="width:22px;height:22px;background:#f2faf5;">
                                <i class="fas fa-clock fa-sm" style="color:#006633;font-size:0.65rem;"></i>
                            </span>
                            <div style="font-size:0.78rem;">
                                <span class="text-secondary">Time: </span>
                                <span class="fw-semibold" style="color:#0f2d1a;">
                                    {{ \Carbon\Carbon::parse($event->time)->format('h:i A') }}
                                </span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <span class="d-flex align-items-center justify-content-center rounded-1 flex-shrink-0"
                                  style="width:22px;height:22px;background:#f2faf5;">
                                <i class="fas fa-map-marker-alt fa-sm" style="color:#006633;font-size:0.65rem;"></i>
                            </span>
                            <div class="text-truncate" style="font-size:0.78rem;">
                                <span class="text-secondary">Venue: </span>
                                <span class="fw-semibold" style="color:#0f2d1a;" title="{{ $event->location }}">
                                    {{ $event->location }}
                                </span>
                            </div>
                        </div>
                    </div>

                    {{-- Card Footer Actions --}}
                    <div class="mt-auto pt-2 d-flex justify-content-between align-items-center"
                         style="border-top:1px solid #e8f5ee;">
                        <button data-bs-toggle="modal"
                                data-bs-target="#eventDetailsModal-{{ $event->id }}"
                                class="btn btn-sm fw-bold p-0 d-flex align-items-center gap-1"
                                style="color:#00331a;font-size:0.75rem;text-transform:uppercase;letter-spacing:0.5px;background:none;border:none;">
                            View Details
                            <i class="fas fa-chevron-right" style="font-size:0.6rem;"></i>
                        </button>
                        <button data-bs-toggle="modal"
                                data-bs-target="#deleteEventModal-{{ $event->id }}"
                                class="btn btn-sm d-flex align-items-center justify-content-center"
                                style="width:28px;height:28px;background:#fff0f0;border:1px solid #ffc8c8;
                                       color:#dc3545;border-radius:6px;padding:0;"
                                title="Delete Event">
                            <i class="fas fa-trash-alt" style="font-size:0.72rem;"></i>
                        </button>
                    </div>

                </div>
            </div>
        </div>

        @include('ManageEvent.deleteevent')
        @include('ManageEvent.moredetails')
        @endforeach
    </div>
    @endif

</div>

<script>
    setTimeout(function() {
        var alert = document.getElementById('alert-message');
        if (alert) {
            alert.style.transition = "opacity 0.5s ease-out";
            alert.style.opacity = "0";
            setTimeout(() => alert.remove(), 500);
        }
    }, 3000);

    document.addEventListener("DOMContentLoaded", function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function(el) { return new bootstrap.Tooltip(el); });
    });
</script>

@endsection