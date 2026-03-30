<div class="modal fade" id="addKabataanModal" tabindex="-1"
     aria-labelledby="addKabataanModalLabel"
     data-bs-backdrop="static" aria-hidden="true">

    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content border-0 rounded-3 overflow-hidden shadow-lg">

            <form action="{{ route('kabataaninformation.store') }}" method="POST" id="addKabataanForm" novalidate>
                @csrf

                <!-- HEADER -->
                <div class="modal-header text-white border-0" style="background:#00331a;">
                    <div class="d-flex align-items-center gap-2">
                        <div class="bg-white bg-opacity-25 rounded-2 p-2 d-flex align-items-center justify-content-center"
                             style="width:34px;height:34px;">
                            <i class="fas fa-user-plus text-white" style="font-size:0.85rem;"></i>
                        </div>
                        <div>
                            <h5 class="modal-title fw-bold mb-0" style="font-family:'Rajdhani',sans-serif;letter-spacing:0.5px;">
                                ADD KABATAAN INFORMATION
                            </h5>
                            <small class="text-white-50" style="font-size:0.7rem;">Fill in all required fields marked with *</small>
                        </div>
                    </div>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>

                <!-- BODY -->
                <div class="modal-body bg-light p-4">

                    <!-- Validation Summary Alert -->
                    <div id="validationAlert" class="alert alert-danger d-none mb-3 py-2 px-3" role="alert"
                         style="font-size:0.82rem; border-radius:8px;">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        <strong>Please fill in all required fields</strong> before saving.
                    </div>

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
                                    <label class="form-label small fw-semibold text-secondary">First Name <span class="text-danger">*</span></label>
                                    <input type="text" name="firstname" id="firstname" class="form-control form-control-sm"
                                           placeholder="First name" required>
                                    <div class="invalid-feedback" style="font-size:0.75rem;">First name is required.</div>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label small fw-semibold text-secondary">Middle Name</label>
                                    <input type="text" name="middlename" class="form-control form-control-sm"
                                           placeholder="Middle name">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label small fw-semibold text-secondary">Last Name <span class="text-danger">*</span></label>
                                    <input type="text" name="lastname" id="lastname" class="form-control form-control-sm"
                                           placeholder="Last name" required>
                                    <div class="invalid-feedback" style="font-size:0.75rem;">Last name is required.</div>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label small fw-semibold text-secondary">Suffix</label>
                                    <input type="text" name="suffix" class="form-control form-control-sm"
                                           placeholder="Jr., Sr., III...">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label small fw-semibold text-secondary">Birthdate <span class="text-danger">*</span></label>
                                    <input type="date" name="birthdate" id="birthdate" class="form-control form-control-sm" required>
                                    <div class="invalid-feedback" style="font-size:0.75rem;">Birthdate is required.</div>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label small fw-semibold text-secondary">Gender <span class="text-danger">*</span></label>
                                    <select name="gender" id="gender" class="form-select form-select-sm" required>
                                        <option value="">— Select —</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                    <div class="invalid-feedback" style="font-size:0.75rem;">Please select a gender.</div>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label small fw-semibold text-secondary">Purok</label>
                                    <select id="purok" name="purok" class="form-select form-select-sm" required>
                                        <option value="">— Select —</option>
                                        @foreach(range(1,7) as $p)
                                            <option value="{{ $p }}">Purok {{ $p }}</option>
                                        @endforeach
                                    </select>
                                    <div class="invalid-feedback" style="font-size:0.75rem;">Please select a purok.</div>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label small fw-semibold text-secondary">Youth Age Group</label>
                                    <select name="youth_group" class="form-select form-select-sm">
                                        <option value="">— Select —</option>
                                        <option value="Child Youth">Child Youth</option>
                                        <option value="Core Youth">Core Youth</option>
                                        <option value="Young Adult">Young Adult</option>
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
                                    <label class="form-label small fw-semibold text-secondary">Work Status <span class="text-danger">*</span></label>
                                    <select name="work_status" id="work_status" class="form-select form-select-sm" required>
                                        <option value="">— Select Work Status —</option>
                                        <option value="Employed">Employed</option>
                                        <option value="Unemployed">Unemployed</option>
                                        <option value="Self-Employed">Self-Employed</option>
                                        <option value="Currently Looking for a job">Currently Looking for a Job</option>
                                        <option value="Not Interested Looking for a job">Not Interested in Looking for a Job</option>
                                    </select>
                                    <div class="invalid-feedback" style="font-size:0.75rem;">Please select a work status.</div>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label small fw-semibold text-secondary">Education Background <span class="text-danger">*</span></label>
                                    <select name="education_background" id="education_background" class="form-select form-select-sm" required>
                                        <option value="">— Select Education —</option>
                                        <option value="Elementary Level">Elementary Level</option>
                                        <option value="Elementary Grad">Elementary Graduate</option>
                                        <option value="High School Level">High School Level</option>
                                        <option value="Highschool Grad">High School Graduate</option>
                                        <option value="Vocational Grad">Vocational Graduate</option>
                                        <option value="College Level">College Level</option>
                                        <option value="College Graduate">College Graduate</option>
                                        <option value="Masters Level">Master's Level</option>
                                        <option value="Masters Grad">Master's Graduate</option>
                                        <option value="Doctorate Level">Doctorate Level</option>
                                        <option value="Doctorate Graduate">Doctorate Graduate</option>
                                    </select>
                                    <div class="invalid-feedback" style="font-size:0.75rem;">Please select an education background.</div>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label small fw-semibold text-secondary">Contact Number</label>
                                    <input type="text" name="contact" class="form-control form-control-sm"
                                           placeholder="09XX XXX XXXX">
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
                                        <option value="Single">Single</option>
                                        <option value="Married">Married</option>
                                        <option value="Live in">Live In</option>
                                        <option value="Separated">Separated</option>
                                        <option value="Widowed">Widowed</option>
                                        <option value="Annulled">Annulled</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label small fw-semibold text-secondary">Early Pregnancy</label>
                                    <select name="earlypregnancy" class="form-select form-select-sm">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label small fw-semibold text-secondary">Registered Voter</label>
                                    <select name="isvoters" class="form-select form-select-sm">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label small fw-semibold text-secondary">PWD</label>
                                    <select name="ispwd" class="form-select form-select-sm">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>{{-- end modal-body --}}

                <!-- FOOTER -->
                <div class="modal-footer border-top py-3" style="background:#f2faf5;">
                    <button type="button" class="btn btn-sm btn-outline-secondary px-4"
                            data-bs-dismiss="modal">
                        <i class="fas fa-times me-1"></i> Cancel
                    </button>
                    <button type="submit" id="saveKabataanBtn" class="btn btn-sm text-white px-4 fw-bold"
                            style="background:#00331a; border-color:#00331a;">
                        <i class="fas fa-save me-1"></i> Save Record
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
(function () {
    // Required field IDs and their friendly labels
    const requiredFields = [
        { id: 'firstname',            label: 'First Name' },
        { id: 'lastname',             label: 'Last Name' },
        { id: 'birthdate',            label: 'Birthdate' },
        { id: 'gender',               label: 'Gender' },
        { id: 'work_status',          label: 'Work Status' },
        { id: 'education_background', label: 'Education Background' },
        { id: 'purok',                label: 'Purok'}
    ];

    const form  = document.getElementById('addKabataanForm');
    const alert = document.getElementById('validationAlert');

    // Clear errors + alert when modal is closed/reset
    document.getElementById('addKabataanModal').addEventListener('hidden.bs.modal', function () {
        form.reset();
        alert.classList.add('d-none');
        requiredFields.forEach(({ id }) => {
            const el = document.getElementById(id);
            if (el) {
                el.classList.remove('is-invalid', 'is-valid');
            }
        });
    });

    // Live feedback: remove error once user fills the field
    requiredFields.forEach(({ id }) => {
        const el = document.getElementById(id);
        if (!el) return;
        el.addEventListener('input', () => validateField(el));
        el.addEventListener('change', () => validateField(el));
    });

    function validateField(el) {
        if (el.value.trim() !== '') {
            el.classList.remove('is-invalid');
            el.classList.add('is-valid');
        } else {
            el.classList.remove('is-valid');
            el.classList.add('is-invalid');
        }
    }

    // On submit
    form.addEventListener('submit', function (e) {
        let isValid = true;

        requiredFields.forEach(({ id }) => {
            const el = document.getElementById(id);
            if (!el) return;
            if (el.value.trim() === '') {
                el.classList.add('is-invalid');
                el.classList.remove('is-valid');
                isValid = false;
            } else {
                el.classList.remove('is-invalid');
                el.classList.add('is-valid');
            }
        });

        if (!isValid) {
            e.preventDefault();
            e.stopPropagation();

            // Show summary alert
            alert.classList.remove('d-none');

            // Scroll to first invalid field
            const firstInvalid = form.querySelector('.is-invalid');
            if (firstInvalid) {
                firstInvalid.scrollIntoView({ behavior: 'smooth', block: 'center' });
                firstInvalid.focus();
            }
        } else {
            alert.classList.add('d-none');
        }
    });
})();
</script>