<div class="modal fade" id="eventDetailsModal-{{ $event->id }}" tabindex="-1" aria-labelledby="eventDetailsLabel-{{ $event->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content shadow border-0">

            <!-- Header -->
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="eventDetailsLabel-{{ $event->id }}">
                    <i class="fas fa-calendar-day me-2"></i> Event Details
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Body -->
            <div class="modal-body px-4 py-3">
                <div class="row gy-3">
                    <div class="col-md-6">
                        <label class="form-label text-muted"><i class="fas fa-heading me-2"></i>Title</label>
                        <div class="fw-bold fs-5">{{ $event->title }}</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label text-muted"><i class="fas fa-map-marker-alt me-2"></i>Location</label>
                        <div class="fw-bold fs-5">{{ $event->location }}</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label text-muted"><i class="fas fa-calendar-alt me-2"></i>Date</label>
                        <div class="fw-bold fs-6">
                            {{ \Carbon\Carbon::parse($event->date)->format('F d, Y') }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label text-muted"><i class="fas fa-clock me-2"></i>Time</label>
                        <div class="fw-bold fs-6">
                            {{ \Carbon\Carbon::parse($event->time)->format('g:i A') }}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label class="form-label text-muted"><i class="fas fa-user-tie me-2"></i>In-Charge</label>
                        <div class="fw-bold fs-6">{{ $event->incharge }}</div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="modal-footer bg-light border-top-0">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times-circle me-1"></i> Close
                </button>
            </div>

        </div>
    </div>
</div>