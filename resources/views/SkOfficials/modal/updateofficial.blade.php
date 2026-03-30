<div class="modal fade" id="editOfficialModal-{{ $official->id }}"
     tabindex="-1" data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content border-0 rounded-3 overflow-hidden shadow-lg">
            <form method="POST" action="{{ route('SkOfficial.update',['id' => $official->id]) }}">
                @csrf @method('PUT')

                {{-- HEADER --}}
                <div class="modal-header border-0" style="background:#004d28;">
                    <div class="d-flex align-items-center gap-2">
                        <div class="bg-white bg-opacity-25 rounded-2 d-flex align-items-center justify-content-center"
                             style="width:34px;height:34px;">
                            <i class="fas fa-pen text-white" style="font-size:0.8rem;"></i>
                        </div>
                        <div>
                            <h5 class="modal-title fw-bold mb-0 text-white"
                                style="font-family:'Rajdhani',sans-serif;letter-spacing:0.5px;">
                                EDIT OFFICIAL
                            </h5>
                            <small class="text-white-50" style="font-size:0.68rem;">
                                Editing record #{{ $official->id }} —
                                {{ $official->kabataan->firstname }} {{ $official->kabataan->lastname }}
                            </small>
                        </div>
                    </div>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>

                {{-- BODY --}}
                <div class="modal-body bg-light p-4">
                    <div class="card border-0 shadow-sm rounded-3">
                        <div class="card-header border-0 py-2 px-3 d-flex align-items-center gap-2"
                             style="background:#e8f5ee;">
                            <span class="badge text-white" style="background:#00331a;">
                                <i class="fas fa-id-badge me-1"></i> 01
                            </span>
                            <span class="fw-bold text-uppercase small" style="color:#00331a;letter-spacing:1px;">
                                Official Details
                            </span>
                        </div>
                        <div class="card-body p-3">
                            <div class="row g-3">

                                {{-- Kabataan --}}
                                <div class="col-md-12">
                                    <label class="form-label small fw-semibold text-secondary">
                                        Kabataan Member <span class="text-danger">*</span>
                                    </label>
                                    <select name="kabataan_id" class="form-select form-select-sm" required>
                                        <option value="">— Select Kabataan —</option>
                                        @foreach($kabataans ?? [] as $k)
                                            <option value="{{ $k->id }}"
                                                {{ $official->kabataan_id == $k->id ? 'selected' : '' }}>
                                                {{ $k->firstname }}
                                                {{ $k->middlename ? $k->middlename.' ' : '' }}
                                                {{ $k->lastname }} — Purok {{ $k->purok }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- Position --}}
                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold text-secondary">
                                        Position <span class="text-danger">*</span>
                                    </label>
                                    <select name="position" class="form-select form-select-sm" required>
                                        <option value="">— Select Position —</option>
                                        <option value="chairman"  {{ $official->position == 'chairman'  ? 'selected' : '' }}>👑  SK Chairman</option>
                                        <option value="secretary" {{ $official->position == 'secretary' ? 'selected' : '' }}>📋  SK Secretary</option>
                                        <option value="treasurer" {{ $official->position == 'treasurer' ? 'selected' : '' }}>💰  SK Treasurer</option>
                                        <option value="kagawad"   {{ $official->position == 'kagawad'   ? 'selected' : '' }}>🏛️  SK Kagawad</option>
                                    </select>
                                </div>

                                {{-- Selection Type --}}
                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold text-secondary">
                                        Selection Type
                                    </label>
                                    <select name="selection_type" class="form-select form-select-sm">
                                        <option value="elected"   {{ $official->selection_type == 'elected'   ? 'selected' : '' }}>🗳️  Elected</option>
                                        <option value="appointed" {{ $official->selection_type == 'appointed' ? 'selected' : '' }}>✋  Appointed</option>
                                    </select>
                                </div>

                                {{-- Term Start --}}
                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold text-secondary">
                                        Term Start <span class="text-danger">*</span>
                                    </label>
                                    <input type="date" name="term_start"
                                           class="form-control form-control-sm"
                                           value="{{ $official->term_start }}" required>
                                </div>

                                {{-- Status --}}
                                <div class="col-md-6">
                                    <label class="form-label small fw-semibold text-secondary">Status</label>
                                    <select name="status" class="form-select form-select-sm">
                                        <option value="active"         {{ $official->status == 'active'         ? 'selected' : '' }}>✅  Active</option>
                                        <option value="resigned"       {{ $official->status == 'resigned'       ? 'selected' : '' }}>🚪  Resigned</option>
                                        <option value="terminated"     {{ $official->status == 'terminated'     ? 'selected' : '' }}>❌  Terminated</option>
                                        <option value="inactive"       {{ $official->status == 'inactive'       ? 'selected' : '' }}>⏸️  Inactive</option>
                                        <option value="completed_term" {{ $official->status == 'completed_term' ? 'selected' : '' }}>🎓  Completed Term</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                {{-- FOOTER --}}
                <div class="modal-footer border-top py-3" style="background:#f2faf5;">
                    <button type="button" class="btn btn-sm btn-outline-secondary px-4"
                            data-bs-dismiss="modal">
                        <i class="fas fa-times me-1"></i> Cancel
                    </button>
                    <button type="submit" class="btn btn-sm fw-bold text-white px-4"
                            style="background:#004d28;border-color:#004d28;">
                        <i class="fas fa-save me-1"></i> Update Record
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>