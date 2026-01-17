<!-- Delete QR Code Modal -->
<div class="modal fade" id="deleteQrCodeModal-{{ $qrcode->id }}" tabindex="-1" aria-labelledby="deleteQrCodeModalLabel-{{ $qrcode->id }}" aria-hidden="true">
    <div class="modal-dialog">
      <form method="POST" action="{{ route('manageqrcode.destroy', $qrcode->id) }}">
        @csrf
        @method('DELETE')
  
        <div class="modal-content">
          <div class="modal-header bg-danger text-white">
            <h5 class="modal-title" id="deleteQrCodeModalLabel-{{ $qrcode->id }}">
              Delete QR Code
            </h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
  
          <div class="modal-body text-center">
            <p>Are you sure you want to delete this QR code?</p>
            <p><strong>ID:</strong> {{ $qrcode->kabataan_id }}</p>
            <img src="data:image/png;base64,{{ $qrcode->image }}" alt="QR Code" width="100">
          </div>
  
          <div class="modal-footer">
            <button type="submit" class="btn btn-danger">Yes, Delete</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  