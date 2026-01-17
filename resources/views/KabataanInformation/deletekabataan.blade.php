<!-- Delete Modal -->
<div class="modal fade" id="deleteKabataanModal-{{ $kabataan->id }}" tabindex="-1" aria-labelledby="deleteKabataanLabel-{{ $kabataan->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content border-danger">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="deleteKabataanLabel-{{ $kabataan->id }}">
                    <i class="fas fa-exclamation-triangle me-2"></i> Confirm Delete
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <p><i class="fas fa-info-circle text-danger me-2"></i> Are you sure you want to delete <strong>{{ $kabataan->firstname }} {{ $kabataan->lastname }}</strong>?</p>
            </div>

            <div class="modal-footer">
                <form action="{{ route('kabataaninformation.destroy',['id' => $kabataan])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times me-1"></i> Cancel
                    </button>
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash me-1"></i> Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
