<!-- Update Modal -->
<div class="modal fade" id="updateKabataanModal-{{$kabataan->id}}" tabindex="-1" aria-labelledby="updateKabataanModalLabel" data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form method="POST" action="{{route('kabataaninformation.update',['id' => $kabataan])}}">
                @csrf
                @method('PUT')
                <div class="modal-header text-white" style="background-color: #203a27">
                    <h5 class="modal-title" id="updateKabataanModalLabel">Update Kabataan Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <!-- Personal Information -->
                    <h6 class="fw-bold mb-3 text-success border-bottom pb-1">Personal Information</h6>
                    <div class="row g-3">
                        <div class="col-md-3">
                            <label class="form-label">First Name</label>
                            <input type="text" class="form-control" name="firstname" value="{{ $kabataan->firstname ?? '' }}" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Middle Name</label>
                            <input type="text" class="form-control" name="middlename" value="{{ $kabataan->middlename ?? '' }}">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="lastname" value="{{ $kabataan->lastname ?? '' }}" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Suffix</label>
                            <input type="text" class="form-control" name="suffix" value="{{ $kabataan->suffix ?? '' }}">
                        </div>

                        <div class="col-md-3">
                            <label class="form-label">Birthdate</label>
                            <input type="date" class="form-control" name="birthdate" value="{{ $kabataan->birthdate ?? '' }}" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Gender</label>
                            <select name="gender" class="form-select" required>
                                <option value="">-- Select --</option>
                                <option value="Male" {{ ($kabataan->gender ?? '') === 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ ($kabataan->gender ?? '') === 'Female' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Purok</label>
                            <input type="text" class="form-control" name="purok" value="{{ $kabataan->purok ?? '' }}" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Religion</label>
                            <input type="text" class="form-control" name="religion" value="{{ $kabataan->religion ?? '' }}">
                        </div>
                    </div>

                    <!-- Family Background -->
                    <h6 class="fw-bold mt-4 mb-3 text-success border-bottom pb-1">Family Background</h6>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Mother's Full Name</label>
                            <input type="text" class="form-control" name="motherfullname" value="{{ $kabataan->motherfullname ?? '' }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Father's Full Name</label>
                            <input type="text" class="form-control" name="fatherfullname" value="{{ $kabataan->fatherfullname ?? '' }}" required>
                        </div>
                    </div>

                    <!-- Additional Details -->
                    <h6 class="fw-bold mt-4 mb-3 text-success border-bottom pb-1">Additional Information</h6>
                    <div class="row g-3">
                        <div class="col-md-3">
                            <label class="form-label">Marital Status</label>
                            <select name="mstatus" class="form-select">
                                <option value="">-- Select --</option>
                                <option value="Single" {{ ($kabataan->mstatus ?? '') === 'Single' ? 'selected' : '' }}>Single</option>
                                <option value="Married" {{ ($kabataan->mstatus ?? '') === 'Married' ? 'selected' : '' }}>Married</option>
                                <option value="Separated" {{ ($kabataan->mstatus ?? '') === 'Separated' ? 'selected' : '' }}>Separated</option>
                                <option value="Widowed" {{ ($kabataan->mstatus ?? '') === 'Widowed' ? 'selected' : '' }}>Widowed</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Early Pregnancy</label>
                            <select name="earlypregnancy" class="form-select">
                                <option value="0" {{ ($kabataan->earlypregnancy ?? 0) == 0 ? 'selected' : '' }}>No</option>
                                <option value="1" {{ ($kabataan->earlypregnancy ?? 0) == 1 ? 'selected' : '' }}>Yes</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Is Malnourished</label>
                            <select name="ismalnourished" class="form-select">
                                <option value="0" {{ ($kabataan->ismalnourished ?? 0) == 0 ? 'selected' : '' }}>No</option>
                                <option value="1" {{ ($kabataan->ismalnourished ?? 0) == 1 ? 'selected' : '' }}>Yes</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Is Voter</label>
                            <select name="isvoters" class="form-select">
                                <option value="0" {{ ($kabataan->isvoters ?? 0) == 0 ? 'selected' : '' }}>No</option>
                                <option value="1" {{ ($kabataan->isvoters ?? 0) == 1 ? 'selected' : '' }}>Yes</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update Information
                    </button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
