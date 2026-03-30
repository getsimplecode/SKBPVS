@extends('Layouts.mainlayout')
@section('content')

<div class="container-fluid py-4 px-4" style="background:#f8fafb;min-height:100vh;">

    {{-- PAGE HEADER --}}
    <div class="d-flex align-items-center gap-3 mb-4">
        <div class="rounded-3 d-flex align-items-center justify-content-center flex-shrink-0"
             style="width:46px;height:46px;background:#00331a;box-shadow:0 4px 12px rgba(0,51,26,0.25);">
            <i class="fas fa-list text-white" style="font-size:1rem;"></i>
        </div>
        <div>
            <h5 class="fw-bold mb-0 text-uppercase"
                style="font-family:'Rajdhani',sans-serif;color:#0f2d1a;letter-spacing:0.5px;">
                Master List of Kabataan
            </h5>
            <small class="text-secondary">Complete youth records of Barangay Balintawak</small>
        </div>
    </div>

    {{-- TOOLBAR --}}
    <div class="card border-0 shadow-sm rounded-3 mb-3">
        <div class="card-body py-2 px-3 d-flex align-items-center justify-content-between flex-wrap gap-2">
            <div class="d-flex align-items-center gap-2">
                <i class="fas fa-filter" style="color:#00331a;font-size:0.85rem;"></i>
                <span class="small fw-semibold text-secondary">Filter &amp; Search Records</span>
            </div>
            <form class="d-flex align-items-center gap-2" action="{{ route('kabataaninformation.list') }}">
                <input class="form-control form-control-sm"
                       style="width:220px;"
                       name="search"
                       type="search"
                       placeholder="🔍  Search name, purok..."
                       value="{{ request('search') }}">
                <button class="btn btn-sm fw-bold text-white"
                        style="background:#00331a;border-color:#00331a;"
                        type="submit">
                    <i class="fas fa-search me-1"></i> Search
                </button>
                @if(request('search'))
                <a href="{{ route('kabataaninformation.list') }}"
                   class="btn btn-sm btn-outline-secondary">
                    <i class="fas fa-times me-1"></i> Clear
                </a>
                @endif
            </form>
        </div>
    </div>

    {{-- TABLE CARD --}}
    <div class="card border-0 shadow-sm rounded-3 overflow-hidden">

        {{-- Card Header --}}
        <div class="card-header border-0 d-flex align-items-center justify-content-between py-2 px-3"
             style="background:#f2faf5;">
            <span class="small fw-bold text-uppercase" style="color:#6b8a74;letter-spacing:1.5px;">
                <i class="fas fa-table me-1" style="color:#00331a;"></i> Youth Records
            </span>
            <span class="badge fw-bold" style="background:#e8f5ee;color:#00331a;border:1px solid #d4e6da;font-size:0.72rem;">
                {{ $kabataans->total() }} {{ $kabataans->total() === 1 ? 'Record' : 'Records' }}
            </span>
        </div>

        {{-- Table --}}
        <div class="table-responsive">
            <table id="customtabled" class="table table-hover align-middle mb-0" style="font-size:0.83rem;">

                <thead style="background:#00331a;">
                    <tr>
                        <th class="text-white fw-bold text-center border-0 px-3 py-3"
                            style="font-family:'Rajdhani',sans-serif;font-size:0.75rem;letter-spacing:1.2px;white-space:nowrap;">
                            K-ID
                        </th>
                        <th class="text-white fw-bold border-0 px-3 py-3"
                            style="font-family:'Rajdhani',sans-serif;font-size:0.75rem;letter-spacing:1.2px;">
                            FULL NAME
                        </th>
                        <th class="text-white fw-bold border-0 px-3 py-3"
                            style="font-family:'Rajdhani',sans-serif;font-size:0.75rem;letter-spacing:1.2px;">
                            GENDER
                        </th>
                        <th class="text-white fw-bold text-center border-0 px-3 py-3"
                            style="font-family:'Rajdhani',sans-serif;font-size:0.75rem;letter-spacing:1.2px;">
                            AGE
                        </th>
                        <th class="text-white fw-bold border-0 px-3 py-3"
                            style="font-family:'Rajdhani',sans-serif;font-size:0.75rem;letter-spacing:1.2px;">
                            BIRTHDATE
                        </th>
                        <th class="text-white fw-bold text-center border-0 px-3 py-3"
                            style="font-family:'Rajdhani',sans-serif;font-size:0.75rem;letter-spacing:1.2px;">
                            PUROK
                        </th>
                        <th class="text-white fw-bold border-0 px-3 py-3"
                            style="font-family:'Rajdhani',sans-serif;font-size:0.75rem;letter-spacing:1.2px;">
                            CONTACT
                        </th>
                        <th class="text-white fw-bold border-0 px-3 py-3"
                            style="font-family:'Rajdhani',sans-serif;font-size:0.75rem;letter-spacing:1.2px;">
                            MARITAL
                        </th>
                        <th class="text-white fw-bold border-0 px-3 py-3"
                            data-bs-toggle="tooltip" title="Work Status"
                            style="font-family:'Rajdhani',sans-serif;font-size:0.75rem;letter-spacing:1.2px;cursor:help;">
                            W.S
                        </th>
                        <th class="text-white fw-bold border-0 px-3 py-3"
                            data-bs-toggle="tooltip" title="Youth Age Group"
                            style="font-family:'Rajdhani',sans-serif;font-size:0.75rem;letter-spacing:1.2px;cursor:help;">
                            Y.G
                        </th>
                        <th class="text-white fw-bold text-center border-0 px-3 py-3"
                            data-bs-toggle="tooltip" title="Registered Voter"
                            style="font-family:'Rajdhani',sans-serif;font-size:0.75rem;letter-spacing:1.2px;cursor:help;">
                            R.V
                        </th>
                        <th class="text-white fw-bold text-center border-0 px-3 py-3"
                            data-bs-toggle="tooltip" title="Person with Disability"
                            style="font-family:'Rajdhani',sans-serif;font-size:0.75rem;letter-spacing:1.2px;cursor:help;">
                            PWD
                        </th>
                        <th class="text-white fw-bold text-center border-0 px-3 py-3"
                            data-bs-toggle="tooltip" title="Early Pregnancy"
                            style="font-family:'Rajdhani',sans-serif;font-size:0.75rem;letter-spacing:1.2px;cursor:help;">
                            E.P
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($kabataans as $kabataan)
                        <tr style="border-bottom:1px solid #e8f5ee;">
                            {{-- ID --}}
                            <td class="text-center px-3">
                                <span class="badge fw-bold"
                                      style="background:#e8f5ee;color:#00331a;border:1px solid #d4e6da;font-size:0.75rem;">
                                    #{{ $kabataan->id }}
                                </span>
                            </td>

                            {{-- Full Name --}}
                            <td class="px-3 fw-semibold" style="color:#0f2d1a;white-space:nowrap;">
                                {{ $kabataan->fullname }}
                            </td>

                            {{-- Gender --}}
                            <td class="px-3">
                                @if($kabataan->gender === 'Male')
                                    <span class="badge fw-semibold"
                                          style="background:#e8f0ff;color:#3b5bdb;border:1px solid #c5d0fa;font-size:0.75rem;">
                                        <i class="fas fa-mars me-1"></i> Male
                                    </span>
                                @else
                                    <span class="badge fw-semibold"
                                          style="background:#fff0f6;color:#c2255c;border:1px solid #fcc2d7;font-size:0.75rem;">
                                        <i class="fas fa-venus me-1"></i> Female
                                    </span>
                                @endif
                            </td>

                            {{-- Age --}}
                            <td class="text-center px-3 fw-semibold" style="color:#0f2d1a;">
                                {{ $kabataan->age }}
                            </td>

                            {{-- Birthdate --}}
                            <td class="px-3 text-secondary" style="white-space:nowrap;font-size:0.8rem;">
                                <i class="fas fa-calendar-alt me-1" style="color:#00a651;font-size:0.7rem;"></i>
                                {{ \Carbon\Carbon::parse($kabataan->birthdate)->format('M d, Y') }}
                            </td>

                            {{-- Purok --}}
                            <td class="text-center px-3">
                                <span class="badge fw-bold"
                                      style="background:#e8f5ee;color:#006633;border:1px solid #d4e6da;font-size:0.75rem;">
                                    <i class="fas fa-map-marker-alt me-1"></i>{{ $kabataan->purok }}
                                </span>
                            </td>

                            {{-- Contact --}}
                            <td class="px-3 text-secondary" style="font-size:0.8rem;white-space:nowrap;">
                                {{ $kabataan->contact ?? '—' }}
                            </td>

                            {{-- Marital Status --}}
                            <td class="px-3 text-secondary" style="font-size:0.8rem;">
                                {{ $kabataan->mstatus ?? '—' }}
                            </td>

                            {{-- Work Status (truncated) --}}
                            <td class="px-3 text-secondary"
                                style="max-width:130px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;font-size:0.8rem;"
                                data-bs-toggle="tooltip" title="{{ $kabataan->work_status }}">
                                {{ $kabataan->work_status }}
                            </td>

                            {{-- Youth Group --}}
                            <td class="px-3 text-secondary" style="font-size:0.8rem;white-space:nowrap;">
                                {{ $kabataan->youth_group ?? '—' }}
                            </td>

                            {{-- Registered Voter --}}
                            <td class="text-center px-3">
                                @if($kabataan->isvoters)
                                    <span class="badge fw-semibold"
                                          style="background:#e8f5ee;color:#00331a;border:1px solid #d4e6da;font-size:0.72rem;">
                                        <i class="fas fa-check me-1"></i>Yes
                                    </span>
                                @else
                                    <span class="badge fw-semibold"
                                          style="background:#f8f9fa;color:#6c757d;border:1px solid #dee2e6;font-size:0.72rem;">
                                        No
                                    </span>
                                @endif
                            </td>

                            {{-- PWD --}}
                            <td class="text-center px-3">
                                @if($kabataan->ispwd)
                                    <span class="badge fw-semibold"
                                          style="background:#fff8ee;color:#e67e00;border:1px solid #ffd99a;font-size:0.72rem;">
                                        <i class="fas fa-check me-1"></i>Yes
                                    </span>
                                @else
                                    <span class="badge fw-semibold"
                                          style="background:#f8f9fa;color:#6c757d;border:1px solid #dee2e6;font-size:0.72rem;">
                                        No
                                    </span>
                                @endif
                            </td>

                            {{-- Early Pregnancy --}}
                            <td class="text-center px-3">
                                @if($kabataan->earlypregnancy)
                                    <span class="badge fw-semibold"
                                          style="background:#fff0f0;color:#dc3545;border:1px solid #ffc8c8;font-size:0.72rem;">
                                        <i class="fas fa-check me-1"></i>Yes
                                    </span>
                                @else
                                    <span class="badge fw-semibold"
                                          style="background:#f8f9fa;color:#6c757d;border:1px solid #dee2e6;font-size:0.72rem;">
                                        No
                                    </span>
                                @endif
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="13" class="text-center py-5">
                                <i class="fas fa-users-slash d-block mb-2" style="font-size:2.5rem;color:#d4e6da;"></i>
                                <span class="text-secondary small">
                                    No records found
                                    @if(request('search'))
                                        for "<strong style="color:#00331a;">{{ request('search') }}</strong>"
                                    @endif
                                </span>
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>

        {{-- Pagination --}}
        @if($kabataans->hasPages())
        <div class="card-footer border-top py-3 px-3" style="background:#f2faf5;border-color:#d4e6da!important;">
            {{ $kabataans->appends(request()->query())->links('pagination::bootstrap-5') }}
        </div>
        @endif

    </div>{{-- end card --}}

</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function(el) { return new bootstrap.Tooltip(el); });
    });
</script>

@endsection