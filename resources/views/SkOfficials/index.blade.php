@extends('Layouts.mainlayout')
@section('content')

<div class="container-fluid py-4 px-4" style="background:#f4f7f5;min-height:100vh;">
    {{-- ── BANNER ────────────────────────────────────────────── --}}
    <div class="rounded-3 mb-4 p-4 position-relative overflow-hidden text-white"
         style="background:linear-gradient(118deg,#00331a,#004d28,#006633);">
        <span class="sk-watermark">SK OFFICIALS</span>
        <div class="d-flex align-items-center justify-content-between flex-wrap gap-3 position-relative">
            <div class="d-flex align-items-center gap-3">
                <div class="rounded-3 d-flex align-items-center justify-content-center flex-shrink-0"
                     style="width:52px;height:52px;background:rgba(255,255,255,0.12);border:1px solid rgba(255,255,255,0.2);">
                    <i class="fas fa-id-badge fs-5"></i>
                </div>
                <div>
                    <h4 class="fw-bold mb-0 text-white text-uppercase"
                        style="font-family:'Rajdhani',sans-serif;letter-spacing:1px;">
                        SK Officials
                    </h4>
                    <small class="text-white-50">
                        Manage Sangguniang Kabataan officials — Barangay Balintawak
                    </small>
                </div>
            </div>
            <div class="d-flex gap-2">
                <button onclick="window.print()"
                        class="btn btn-sm fw-bold d-flex align-items-center gap-2"
                        style="background:rgba(255,255,255,0.12);border:1px solid rgba(255,255,255,0.22);color:#fff;">
                    <i class="fas fa-print"></i> Print
                </button>
                <button class="btn btn-sm fw-bold bg-white d-flex align-items-center gap-2"
                        style="color:#00331a;"
                        data-bs-toggle="modal" data-bs-target="#addOfficialModal">
                    <i class="fas fa-plus"></i> New Official
                </button>
            </div>
        </div>
    </div>

    {{-- ── STAT CARDS ──────────────────────────────────────────── --}}
    <div class="row g-3 mb-4">
        @php
            $stats = [
                ['label'=>'Total Officials', 'val'=>$officials->count(),                              'color'=>'#00331a','bg'=>'#e8f5ee','icon'=>'fa-users'],
                ['label'=>'Active',          'val'=>$officials->where('status','active')->count(),     'color'=>'#00a651','bg'=>'#e6fff3','icon'=>'fa-user-check'],
                ['label'=>'Elected',         'val'=>$officials->where('selection_type','elected')->count(),'color'=>'#e67e00','bg'=>'#fff8ee','icon'=>'fa-vote-yea'],
                ['label'=>'Appointed',       'val'=>$officials->where('selection_type','appointed')->count(),'color'=>'#dc3545','bg'=>'#fff0f0','icon'=>'fa-hand-point-up'],
            ];
        @endphp
        @foreach($stats as $s)
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm rounded-3 h-100"
                 style="border-top:3px solid {{ $s['color'] }}!important;">
                <div class="card-body d-flex align-items-center gap-3 py-3">
                    <div class="rounded-2 d-flex align-items-center justify-content-center flex-shrink-0"
                         style="width:42px;height:42px;background:{{ $s['bg'] }};">
                        <i class="fas {{ $s['icon'] }}" style="color:{{ $s['color'] }};"></i>
                    </div>
                    <div>
                        <div class="fw-bold"
                             style="font-family:'Rajdhani',sans-serif;font-size:1.8rem;color:{{ $s['color'] }};line-height:1;">
                            {{ $s['val'] }}
                        </div>
                        <div class="text-uppercase text-secondary"
                             style="font-size:0.65rem;font-weight:700;letter-spacing:1px;">
                            {{ $s['label'] }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- ── TABLE CARD ───────────────────────────────────────────── --}}
    <div class="card border-0 shadow-sm rounded-3 overflow-hidden">

        {{-- Header --}}
        <div class="card-header bg-white border-0 d-flex align-items-center justify-content-between flex-wrap gap-2 py-2 px-3">
            <span class="fw-bold text-uppercase small d-flex align-items-center gap-2"
                  style="color:#7a9485;letter-spacing:2px;">
                <span class="rounded-1 d-inline-block"
                      style="width:10px;height:10px;background:#00331a;"></span>
                Official Records
            </span>
            <form method="GET" action="{{ route('SkOfficial.index') }}"
                  class="d-flex align-items-center gap-2">
                <div class="position-relative">
                    <i class="fas fa-search position-absolute text-secondary"
                       style="left:10px;top:50%;transform:translateY(-50%);font-size:0.72rem;pointer-events:none;"></i>
                    <input class="form-control form-control-sm sk-search"
                           style="padding-left:30px;min-width:200px;"
                           type="search" name="search"
                           placeholder="Search name, position..."
                           value="{{ request('search') }}">
                </div>
                @if(request('search'))
                    <a href="{{ route('SkOfficial.index') }}" class="btn btn-sm btn-outline-secondary">
                        <i class="fas fa-times me-1"></i>Clear
                    </a>
                @endif
            </form>
            <span class="badge fw-bold"
                  style="background:#e8f5ee;color:#00331a;border:1px solid #d4e6da;font-size:0.72rem;">
                {{ $officials->count() }} Records
            </span>
        </div>

        {{-- Table --}}
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0" style="font-size:0.855rem;" id="customtabled">
                <thead style="background:#00331a;">
                    <tr>
                        @foreach(['ID','OFFICIAL','POSITION','SELECTION','TERM START','STATUS','ACTIONS'] as $h)
                        <th class="text-white border-0 px-3 py-3 fw-bold {{ $h === 'ACTIONS' ? 'text-center' : '' }}"
                            style="font-family:'Rajdhani',sans-serif;font-size:0.68rem;letter-spacing:1.8px;white-space:nowrap;">
                            {{ $h }}
                        </th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @forelse($officials as $official)

                    {{-- Include modals outside <tr> --}}
                    @include('SkOfficials.modal.updateofficial')

                    <tr style="border-bottom:1px solid #e8f5ee;">
                        <td class="px-3">
                            <span class="badge fw-bold"
                                  style="background:#e8f5ee;color:#00331a;border:1px solid #d4e6da;">
                                #{{ $official->id }}
                            </span>
                        </td>
                        <td class="px-3">
                            <div class="fw-bold" style="color:#0f2d1a;white-space:nowrap;">
                                {{ $official->kabataan->firstname }}
                                {{ $official->kabataan->middlename ? substr($official->kabataan->middlename,0,1).'.' : '' }}
                                {{ $official->kabataan->lastname }}
                            </div>
                            <small class="text-secondary">
                                <i class="fas fa-map-marker-alt me-1"
                                   style="color:#00a651;font-size:0.6rem;"></i>
                                Purok {{ $official->kabataan->purok ?? '—' }}
                            </small>
                        </td>
                        <td class="px-3">
                            <span class="badge fw-semibold pos-{{ $official->position }}"
                                  style="font-size:0.75rem;">
                                {{ ucfirst($official->position) }}
                            </span>
                        </td>
                        <td class="px-3">
                            @if($official->selection_type === 'elected')
                                <span class="small fw-semibold" style="color:#00a651;">
                                    <i class="fas fa-vote-yea me-1"></i>Elected
                                </span>
                            @else
                                <span class="small fw-semibold" style="color:#e67e00;">
                                    <i class="fas fa-hand-point-up me-1"></i>Appointed
                                </span>
                            @endif
                        </td>
                        <td class="px-3 text-secondary" style="white-space:nowrap;font-size:0.82rem;">
                            <i class="fas fa-calendar-alt me-1" style="color:#00a651;font-size:0.7rem;"></i>
                            {{ \Carbon\Carbon::parse($official->term_start)->format('M d, Y') }}
                        </td>
                        <td class="px-3">
                            <span class="badge fw-semibold status-{{ $official->status }}"
                                  style="font-size:0.72rem;">
                                {{ ucwords(str_replace('_',' ',$official->status)) }}
                            </span>
                        </td>
                        <td class="px-3 text-center">
                            <div class="d-flex justify-content-center gap-2">
                                <button class="btn btn-sm rounded-2 action-edit
                                               d-flex align-items-center justify-content-center"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editOfficialModal-{{ $official->id }}"
                                        title="Edit">
                                    <i class="fas fa-pen" style="font-size:0.7rem;"></i>
                                </button>
                                {{-- 
                                <button class="btn btn-sm rounded-2 action-del
                                               d-flex align-items-center justify-content-center"
                                        data-bs-toggle="modal"
                                        data-bs-target="#deleteOfficialModal-{{ $official->id }}"
                                        title="Delete">
                                    <i class="fas fa-trash" style="font-size:0.7rem;"></i>
                                </button>
                                --}}
                            </div>
                        </td>
                    </tr>

                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-5">
                            <i class="fas fa-id-badge d-block mb-2"
                               style="font-size:2.5rem;color:#d4e6da;"></i>
                            <span class="text-secondary small">
                                @if(request('search'))
                                    No results for "<strong>{{ request('search') }}</strong>"
                                @else
                                    No officials yet. Click <strong>New Official</strong> to get started.
                                @endif
                            </span>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Footer --}}
        <div class="card-footer d-flex align-items-center justify-content-between flex-wrap gap-2 py-2 px-3"
             style="background:#f2faf5;border-top:1px solid #d4e6da;">
            <small class="d-flex align-items-center gap-1" style="color:#7a9485;">
                <i class="fas fa-info-circle" style="color:#00a651;"></i>
                Soft-deleted records are recoverable from the database.
            </small>
            @if(method_exists($officials,'hasPages') && $officials->hasPages())
                {{ $officials->appends(request()->query())->links('pagination::bootstrap-5') }}
            @endif
        </div>

    </div>{{-- end card --}}
</div>

{{-- MODALS --}}
@include('SkOfficials.modal.addofficial')

<script>
    document.querySelector('.sk-search')?.addEventListener('input', function() {
        const q = this.value.toLowerCase();
        document.querySelectorAll('#customtabled tbody tr').forEach(row => {
            row.style.display = row.textContent.toLowerCase().includes(q) ? '' : 'none';
        });
    });
    setTimeout(() => {
        const al = document.getElementById('alert-message');
        if (al) { al.style.transition='opacity 0.5s'; al.style.opacity='0'; setTimeout(()=>al.remove(),500); }
    }, 3000);
    document.addEventListener('DOMContentLoaded', () => {
        document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(el => new bootstrap.Tooltip(el));
    });
</script>

@endsection