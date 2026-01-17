
<!-- Modal -->
<div class="modal fade" id="generateQRModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="generateQRModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <form method="POST" action="{{ route('manageqrcode.store') }}">
        @csrf
        <div class="modal-content rounded shadow-lg">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="generateQRModalLabel"><i class="fas fa-user-plus"></i> Generate QR Code for Kabataan</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="mb-3">
                    <label for="kabataan_id" class="form-label fw-semibold">Select Kabataan</label>
                    <select class="form-select" id="kabataan_id" name="kabataan_id" required>
                        <option value="" selected disabled>-- Search or select Kabataan --</option>
                        @foreach ($kabataans as $kabataan)
                            <option value="{{$kabataan->id}}">{{$kabataan->firstname}} {{$kabataan->lastname}}</option>
                        @endforeach
                    </select>
                </div>
                
                <!-- Optional: Add preview or status -->
                <div class="alert alert-info small">
                    A QR code will be generated and assigned to the selected Kabataan.
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times"></i> Cancel
                </button>
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-check"></i> Generate
                </button>
            </div>
        </div>
    </form>
  </div>
</div>
