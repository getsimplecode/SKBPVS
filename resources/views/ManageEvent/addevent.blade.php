<div class="modal fade" id="addEventModal" tabindex="-1"
     aria-labelledby="addEventModalLabel"
     data-bs-backdrop="static" aria-hidden="true">

    <div class="modal-dialog modal-md modal-dialog-centered">
        <form action="{{ route('manageevent.store') }}" method="POST"
              class="modal-content border-0 rounded-3 overflow-hidden shadow-lg">
            @csrf

            <!-- HEADER -->
            <div class="modal-header border-0 text-white" style="background:#00331a;">
                <div class="d-flex align-items-center gap-2">
                    <div class="bg-white bg-opacity-25 rounded-2 d-flex align-items-center justify-content-center"
                         style="width:34px;height:34px;">
                        <i class="fas fa-calendar-plus text-white" style="font-size:0.85rem;"></i>
                    </div>
                    <div>
                        <h5 class="modal-title fw-bold mb-0"
                            style="font-family:'Rajdhani',sans-serif;letter-spacing:0.5px;"
                            id="addEventModalLabel">
                            ADD NEW EVENT
                        </h5>
                        <small class="text-white-50" style="font-size:0.7rem;">Fill in the event details below</small>
                    </div>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <!-- BODY -->
            <div class="modal-body bg-light p-4">
                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-body p-3">
                        <div class="row g-3">

                            <div class="col-12">
                                <label class="form-label small fw-semibold text-secondary">
                                    Event Title <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="title"
                                       class="form-control form-control-sm"
                                       placeholder="Enter event title" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label small fw-semibold text-secondary">
                                    Date <span class="text-danger">*</span>
                                </label>
                                <input type="date" name="date"
                                       class="form-control form-control-sm" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label small fw-semibold text-secondary">
                                    Time <span class="text-danger">*</span>
                                </label>
                                <input type="time" name="time"
                                       class="form-control form-control-sm" required>
                            </div>

                            <div class="col-12">
                                <label class="form-label small fw-semibold text-secondary">
                                    Location / Venue <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="location"
                                       class="form-control form-control-sm"
                                       placeholder="Enter venue or location" required>
                            </div>

                            <div class="col-12">
                                <label class="form-label small fw-semibold text-secondary">
                                    In-Charge
                                </label>
                                <select name="incharge" class="form-select form-select-sm">
                                    <option value="SK CHAIRMAN Niño Reo Garcia">SK CHAIRMAN — Niño Reo Garcia</option>
                                    <option value="SK KAGAWAD Jeah Evardone">SK KAGAWAD — Jeah Evardone</option>
                                    <option value="SK KAGAWAD Lhord Berly Polestico">SK KAGAWAD — Lhord Berly Polestico</option>
                                    <option value="SK KAGAWAD Treshia Autentico">SK KAGAWAD — Treshia Autentico</option>
                                    <option value="SK KAGAWAD Kimberly Keith Autida">SK KAGAWAD — Kimberly Keith Autida</option>
                                    <option value="SK KAGAWAD John Lorenz Evardone">SK KAGAWAD — John Lorenz Evardone</option>
                                    <option value="SK KAGAWAD James Marvin Auza">SK KAGAWAD — James Marvin Auza</option>
                                    <option value="SK KAGAWAD Walter Caturza">SK KAGAWAD — Walter Caturza</option>
                                    <option value="SK SECRETARY Pinky Soria">SK SECRETARY — Pinky Soria</option>
                                    <option value="SK TREASURER Paul John Mejorada">SK TREASURER — Paul John Mejorada</option>
                                </select>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- FOOTER -->
            <div class="modal-footer border-top py-3" style="background:#f2faf5;">
                <button type="button" class="btn btn-sm btn-outline-secondary px-4"
                        data-bs-dismiss="modal">
                    <i class="fas fa-times me-1"></i> Cancel
                </button>
                <button type="submit" class="btn btn-sm fw-bold text-white px-4"
                        style="background:#00331a;border-color:#00331a;">
                    <i class="fas fa-save me-1"></i> Save Event
                </button>
            </div>

        </form>
    </div>
</div>