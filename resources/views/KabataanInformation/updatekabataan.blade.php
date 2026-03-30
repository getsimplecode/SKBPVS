<div class="modal fade" id="updateKabataanModal-{{ $kabataan->id }}" tabindex="-1"
    aria-labelledby="updateKabataanModalLabel" data-bs-backdrop="static" aria-hidden="true">

    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content border-0 rounded-3 overflow-hidden shadow-lg">

            <form method="POST" action="{{ route('kabataaninformation.update', ['kabataan' => $kabataan->id]) }}">
                @csrf
                @method('PUT')

                <!-- HEADER -->
                <div class="modal-header text-white border-0" style="background:#004d28;">
                    <div class="d-flex align-items-center gap-2">
                        <div class="bg-white bg-opacity-25 rounded-2 p-2 d-flex align-items-center justify-content-center"
                            style="width:34px;height:34px;">
                            <i class="fas fa-user-edit text-white" style="font-size:0.85rem;"></i>
                        </div>
                        <div>
                            <h5 class="modal-title fw-bold mb-0"
                                style="font-family:'Rajdhani',sans-serif;letter-spacing:0.5px;">
                                UPDATE KABATAAN INFORMATION
                            </h5>
                            <small class="text-white-50" style="font-size:0.7rem;">
                                Editing record #{{ $kabataan->id }} — {{ $kabataan->firstname }}
                                {{ $kabataan->lastname }}
                            </small>
                        </div>
                    </div>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>

                <!-- BODY -->
                <div class="modal-body bg-light p-4">

                    <!-- PERSONAL INFORMATION -->
                    <div class="card border-0 shadow-sm rounded-3 mb-3">
                        <div class="card-header border-0 py-2 px-3 d-flex align-items-center gap-2"
                            style="background:#e8f5ee;">
                            <span class="badge text-white" style="background:#00331a;">
                                <i class="fas fa-user me-1"></i> 01
                            </span>
                            <span class="fw-bold text-uppercase small" style="color:#00331a;letter-spacing:1px;">
                                Personal Information
                            </span>
                        </div>
                        <div class="card-body p-3">
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <label class="form-label small fw-semibold text-secondary">First Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="firstname" class="form-control form-control-sm"
                                        value="{{ $kabataan->firstname }}" required>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label small fw-semibold text-secondary">Middle Name</label>
                                    <input type="text" name="middlename" class="form-control form-control-sm"
                                        value="{{ $kabataan->middlename }}">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label small fw-semibold text-secondary">Last Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="lastname" class="form-control form-control-sm"
                                        value="{{ $kabataan->lastname }}" required>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label small fw-semibold text-secondary">Suffix</label>
                                    <input type="text" name="suffix" class="form-control form-control-sm"
                                        value="{{ $kabataan->suffix }}" placeholder="Jr., Sr., III...">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label small fw-semibold text-secondary">Birthdate <span
                                            class="text-danger">*</span></label>
                                    <input type="date" name="birthdate" class="form-control form-control-sm"
                                        value="{{ $kabataan->birthdate }}" required>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label small fw-semibold text-secondary">Gender <span
                                            class="text-danger">*</span></label>
                                    <select name="gender" class="form-select form-select-sm" required>
                                        <option value="">— Select —</option>
                                        <option value="Male" {{ $kabataan->gender == 'Male' ? 'selected' : '' }}>
                                            Male</option>
                                        <option value="Female" {{ $kabataan->gender == 'Female' ? 'selected' : '' }}>
                                            Female</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label small fw-semibold text-secondary">Purok</label>
                                    <select name="purok" class="form-select form-select-sm">
                                        <option value="">— Select —</option>
                                        @for ($i = 1; $i <= 7; $i++)
                                            <option value="{{ $i }}"
                                                {{ $kabataan->purok == $i ? 'selected' : '' }}>
                                                Purok {{ $i }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label small fw-semibold text-secondary">Youth Age Group</label>
                                    <select name="youth_group" class="form-select form-select-sm">
                                        <option value="">— Select —</option>
                                        @foreach (['Child Youth', 'Core Youth', 'Young Adult'] as $group)
                                            <option value="{{ $group }}"
                                                {{ $kabataan->youth_group == $group ? 'selected' : '' }}>
                                                {{ $group }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- EDUCATION & WORK -->
                    <div class="card border-0 shadow-sm rounded-3 mb-3">
                        <div class="card-header border-0 py-2 px-3 d-flex align-items-center gap-2"
                            style="background:#e8f5ee;">
                            <span class="badge text-white" style="background:#00331a;">
                                <i class="fas fa-graduation-cap me-1"></i> 02
                            </span>
                            <span class="fw-bold text-uppercase small" style="color:#00331a;letter-spacing:1px;">
                                Education &amp; Work
                            </span>
                        </div>
                        <div class="card-body p-3">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label class="form-label small fw-semibold text-secondary">Work Status <span
                                            class="text-danger">*</span></label>
                                    <select name="work_status" class="form-select form-select-sm" required>
                                        <option value="">— Select Work Status —</option>
                                        @foreach (['Employed', 'Unemployed', 'Self-Employed', 'Currently Looking for a job', 'Not Interested Looking for a job'] as $status)
                                            <option value="{{ $status }}"
                                                {{ $kabataan->work_status == $status ? 'selected' : '' }}>
                                                {{ $status }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label small fw-semibold text-secondary">Education Background
                                        <span class="text-danger">*</span></label>
                                    <select name="education_background" class="form-select form-select-sm" required>
                                        <option value="">— Select Education —</option>
                                        @foreach (['Elementary Level', 'Elementary Grad', 'High School Level', 'Highschool Grad', 'Vocational Grad', 'College Level', 'College Graduate', 'Masters Level', 'Masters Grad', 'Doctorate Level', 'Doctorate Graduate'] as $edu)
                                            <option value="{{ $edu }}"
                                                {{ $kabataan->education_background == $edu ? 'selected' : '' }}>
                                                {{ $edu }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label small fw-semibold text-secondary">Contact Number</label>
                                    <input type="text" name="contact" class="form-control form-control-sm"
                                        value="{{ $kabataan->contact }}" placeholder="09XX XXX XXXX">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ADDITIONAL INFORMATION -->
                    <div class="card border-0 shadow-sm rounded-3 mb-0">
                        <div class="card-header border-0 py-2 px-3 d-flex align-items-center gap-2"
                            style="background:#e8f5ee;">
                            <span class="badge text-white" style="background:#00331a;">
                                <i class="fas fa-info-circle me-1"></i> 03
                            </span>
                            <span class="fw-bold text-uppercase small" style="color:#00331a;letter-spacing:1px;">
                                Additional Information
                            </span>
                        </div>
                        <div class="card-body p-3">
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <label class="form-label small fw-semibold text-secondary">Marital Status</label>
                                    <select name="mstatus" class="form-select form-select-sm">
                                        <option value="">— Select —</option>
                                        @foreach (['Single', 'Married', 'Live in', 'Separated', 'Widowed', 'Annulled'] as $ms)
                                            <option value="{{ $ms }}"
                                                {{ $kabataan->mstatus == $ms ? 'selected' : '' }}>
                                                {{ $ms }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label small fw-semibold text-secondary">Early Pregnancy</label>
                                    <select name="earlypregnancy" class="form-select form-select-sm">
                                        <option value="0" {{ $kabataan->earlypregnancy == 0 ? 'selected' : '' }}>
                                            No</option>
                                        <option value="1" {{ $kabataan->earlypregnancy == 1 ? 'selected' : '' }}>
                                            Yes</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label small fw-semibold text-secondary">Registered Voter</label>
                                    <select name="isvoters" class="form-select form-select-sm">
                                        <option value="0" {{ $kabataan->isvoters == 0 ? 'selected' : '' }}>No
                                        </option>
                                        <option value="1" {{ $kabataan->isvoters == 1 ? 'selected' : '' }}>Yes
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label small fw-semibold text-secondary">PWD</label>
                                    <select name="ispwd" class="form-select form-select-sm">
                                        <option value="0" {{ $kabataan->ispwd == 0 ? 'selected' : '' }}>No
                                        </option>
                                        <option value="1" {{ $kabataan->ispwd == 1 ? 'selected' : '' }}>Yes
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>{{-- end modal-body --}}

                <!-- FOOTER -->
                <div class="modal-footer border-top py-3" style="background:#f2faf5;">
                    <button type="button" class="btn btn-sm btn-outline-secondary px-4" data-bs-dismiss="modal">
                        <i class="fas fa-times me-1"></i> Cancel
                    </button>
                    <button type="submit" class="btn btn-sm text-white px-4 fw-bold"
                        style="background:#004d28; border-color:#004d28;">
                        <i class="fas fa-save me-1"></i> Update Record
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
