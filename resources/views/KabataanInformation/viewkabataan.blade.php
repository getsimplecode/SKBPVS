<!-- View Modal -->
<div class="modal fade" id="viewKabataanModal-{{ $kabataan->id }}" tabindex="-1" aria-labelledby="viewKabataanModalLabel-{{ $kabataan->id }}" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header text-white" style="background-color:#203a27;">
                <h5 class="modal-title" id="viewKabataanModalLabel-{{ $kabataan->id }}">
                    <i class="fas fa-user-circle me-2"></i> Kabataan Full Information
                </h5>
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-md-3">
                        <strong>First Name:</strong>
                        <p>{{ $kabataan->firstname }}</p>
                    </div>
                    <div class="col-md-3">
                        <strong>Middle Name:</strong>
                        <p>{{ $kabataan->middlename }}</p>
                    </div>
                    <div class="col-md-3">
                        <strong>Last Name:</strong>
                        <p>{{ $kabataan->lastname }}</p>
                    </div>
                    <div class="col-md-3">
                        <strong>Suffix:</strong>
                        <p>{{ $kabataan->suffix }}</p>
                    </div>
                    <div class="col-md-3">
                        <strong>Birthdate:</strong>
                        <p>{{ $kabataan->birthdate }}</p>
                    </div>
                    <div class="col-md-3">
                        <strong>Gender:</strong>
                        <p>{{ $kabataan->gender }}</p>
                    </div>
                    <div class="col-md-3">
                        <strong>Purok:</strong>
                        <p>{{ $kabataan->purok }}</p>
                    </div>
                    <div class="col-md-3">
                        <strong>Religion:</strong>
                        <p>{{ $kabataan->religion }}</p>
                    </div>
                    <div class="col-md-6">
                        <strong>Mother’s Full Name:</strong>
                        <p>{{ $kabataan->motherfullname }}</p>
                    </div>
                    <div class="col-md-6">
                        <strong>Father’s Full Name:</strong>
                        <p>{{ $kabataan->fatherfullname }}</p>
                    </div>
                    <div class="col-md-3">
                        <strong>Marital Status:</strong>
                        <p>{{ $kabataan->mstatus }}</p>
                    </div>
                    <div class="col-md-3">
                        <strong>Early Pregnancy:</strong>
                        <p>{{ $kabataan->earlypregnancy ? 'Yes' : 'No' }}</p>
                    </div>
                    <div class="col-md-3">
                        <strong>Malnourished:</strong>
                        <p>{{ $kabataan->ismalnourished ? 'Yes' : 'No' }}</p>
                    </div>
                    <div class="col-md-3">
                        <strong>Registered Voter:</strong>
                        <p>{{ $kabataan->isvoters ? 'Yes' : 'No' }}</p>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times"></i> Close
                </button>
            </div>
        </div>
    </div>
</div>
