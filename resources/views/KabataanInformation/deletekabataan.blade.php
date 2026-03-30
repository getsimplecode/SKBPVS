<div class="modal fade" id="deleteKabataanModal-{{ $kabataan->id }}"
     tabindex="-1"
     aria-labelledby="deleteKabataanLabel-{{ $kabataan->id }}"
     aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 rounded-3 overflow-hidden shadow-lg">

            <!-- HEADER -->
            <div class="modal-header border-0 text-white" style="background:#dc3545;">
                <div class="d-flex align-items-center gap-2">
                    <div class="bg-white bg-opacity-25 rounded-2 p-2 d-flex align-items-center justify-content-center"
                         style="width:34px;height:34px;">
                        <i class="fas fa-trash text-white" style="font-size:0.85rem;"></i>
                    </div>
                    <h5 class="modal-title fw-bold mb-0"
                        style="font-family:'Rajdhani',sans-serif;letter-spacing:0.5px;"
                        id="deleteKabataanLabel-{{ $kabataan->id }}">
                        CONFIRM DELETE
                    </h5>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <!-- BODY -->
            <div class="modal-body bg-light px-4 py-4">
                <div class="d-flex align-items-start gap-3">
                    <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0"
                         style="width:46px;height:46px;background:#fff0f0;border:2px solid #ffc8c8;">
                        <i class="fas fa-exclamation-triangle" style="color:#dc3545;font-size:1.1rem;"></i>
                    </div>
                    <div>
                        <p class="fw-bold mb-1" style="color:#0f2d1a;">Are you sure you want to delete this record?</p>
                        <p class="mb-1 small text-secondary">
                            You are about to permanently remove:
                        </p>
                        <div class="d-inline-flex align-items-center gap-2 px-3 py-2 rounded-2 border small fw-semibold"
                             style="background:#fff0f0;border-color:#ffc8c8!important;color:#dc3545;">
                            <i class="fas fa-user"></i>
                            {{ $kabataan->firstname }} {{ $kabataan->middlename }} {{ $kabataan->lastname }}
                            &nbsp;·&nbsp; <span class="text-secondary">ID #{{ $kabataan->id }}</span>
                        </div>
                        <p class="mt-2 mb-0 small text-danger">
                            <i class="fas fa-exclamation-circle me-1"></i>
                            This action <strong>cannot be undone.</strong>
                        </p>
                    </div>
                </div>
            </div>

            <!-- FOOTER -->
            <div class="modal-footer border-top py-3" style="background:#f2faf5;">
                <form action="{{ route('kabataaninformation.destroy', ['id' => $kabataan->id]) }}"
                      method="POST" class="d-flex gap-2">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-sm btn-outline-secondary px-4"
                            data-bs-dismiss="modal">
                        <i class="fas fa-times me-1"></i> Cancel
                    </button>
                    <button type="submit" class="btn btn-sm btn-danger px-4 fw-bold">
                        <i class="fas fa-trash me-1"></i> Yes, Delete
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>