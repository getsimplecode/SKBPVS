

<div class="modal fade" id="addKabataanModal" tabindex="-1" aria-labelledby="addKabataanModalLabel"  data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form action="{{route('kabataaninformation.store')}}" method="POST">
                @csrf
                @method('POST')
                <div class="modal-header text-white" style="background-color:#002411 ">
                    <h5 class="modal-title" id="addKabataanModalLabel">Add Kabataan Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <!-- Personal Information -->
                    <h6 class="fw-bold mb-3 text-success border-bottom pb-1">Personal Information</h6>
                    <div class="row g-3">
                        <div class="col-md-3">
                            <label for="firstname" class="form-label">First Name</label>
                            <input type="text" class="form-control" name="firstname" required>
                        </div>
                        <div class="col-md-3">
                            <label for="middlename" class="form-label">Middle Name</label>
                            <input type="text" class="form-control" name="middlename" required>
                        </div>
                        <div class="col-md-3">
                            <label for="lastname" class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="lastname" required>
                        </div>
                        <div class="col-md-3">
                            <label for="suffix" class="form-label">Suffix</label>
                            <input type="text" class="form-control" name="suffix">
                        </div>

                        <div class="col-md-3">
                            <label for="birthdate" class="form-label">Birthdate</label>
                            <input type="date" class="form-control" name="birthdate" required>
                        </div>
                        <div class="col-md-3">
                            <label for="gender" class="form-label">Gender</label>
                            <select name="gender" class="form-select" required>
                                <option value="">-- Select --</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="purok" class="form-label">Purok</label>
                            <input type="text" class="form-control" name="purok" required>
                        </div>
                        <div class="col-md-3">
                            <label for="religion" class="form-label">Religion</label>
                            <input type="text" class="form-control" name="religion" required>
                        </div>
                    </div>

                    <!-- Family Background -->
                    <h6 class="fw-bold mt-4 mb-3 text-success border-bottom pb-1">Family Background</h6>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="motherfullname" class="form-label">Mother's Full Name</label>
                            <input type="text" class="form-control" name="motherfullname" required>
                        </div>
                        <div class="col-md-6">
                            <label for="fatherfullname" class="form-label">Father's Full Name</label>
                            <input type="text" class="form-control" name="fatherfullname" required>
                        </div>
                    </div>

                    <!-- Additional Details -->
                    <h6 class="fw-bold mt-4 mb-3 text-success border-bottom pb-1">Additional Information</h6>
                    <div class="row g-3">
                        <div class="col-md-3">
                            <label for="mstatus" class="form-label">Marital Status</label>
                            <select name="mstatus" class="form-select">
                                <option value="">-- Select --</option>
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Separated">Separated</option>
                                <option value="Widowed">Widowed</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="earlypregnancy" class="form-label">Early Pregnancy</label>
                            <select name="earlypregnancy" class="form-select">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="ismalnourished" class="form-label">Is Malnourished</label>
                            <select name="ismalnourished" class="form-select">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="isvoters" class="form-label">Is Voters</label>
                            <select name="isvoters" class="form-select">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Save Details
                    </button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
