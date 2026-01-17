<!-- Delete QR Code Modal -->
<div class="modal fade" id="downloadqrcode-{{ $qrcode->id }}" tabindex="-1" aria-labelledby="downloadqrcodeLabel-{{ $qrcode->id }}" aria-hidden="true">
    <div class="modal-dialog">
      <form method="POST" action="{{ route('manageqrcode.destroy', $qrcode->id) }}">
        @csrf
        @method('DELETE')
  
        <div class="modal-content">
          <div class="modal-header bg-warning text-white">
            <h5 class="modal-title" id="downloadqrcodeLabel-{{ $qrcode->id }}">
              <strong>Download QR Code</strong>
            </h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
  
          <div class="modal-body text-center">
            <p><strong>ID:</strong> {{ $qrcode->kabataan_id }}</p>
            <p><strong>Fullname:</strong> {{ $qrcode->kabataan->firstname }} {{ $qrcode->kabataan->middlename }} {{ $qrcode->kabataan->lastname }}</p>
            <img src="data:image/png;base64,{{ $qrcode->image }}" alt="QR Code" width="100">
          </div>
  
          <div class="modal-footer">
            <button type="submit" class="btn btn-warning text-white">Download</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  