@extends('layouts.mainlayout')

@section('content')
<div class="container-fluid py-3 px-4">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-0">📊 Kabataan Reports</h4>
            <small class="text-muted">Ages 15–30 · {{ now('Asia/Manila')->format('F d, Y') }}</small>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('reports.csv', request()->query()) }}" class="btn btn-success btn-sm">
                <i class="fas fa-file-csv me-1"></i> Export CSV
            </a>
            <a href="{{ route('reports.pdf', request()->query()) }}" class="btn btn-danger btn-sm" target="_blank">
                <i class="fas fa-file-pdf me-1"></i> Export PDF
            </a>
        </div>
    </div>

    {{-- Summary Cards --}}
    <div class="row g-3 mb-4">
        @php
            $cards = [
                ['label' => 'Total',           'value' => $summary->total,         'icon' => 'fas fa-users',          'color' => 'primary'],
                ['label' => 'Male',            'value' => $summary->male,           'icon' => 'fas fa-mars',           'color' => 'info'],
                ['label' => 'Female',          'value' => $summary->female,         'icon' => 'fas fa-venus',          'color' => 'pink'],
                ['label' => 'Voters',          'value' => $summary->voters,         'icon' => 'fas fa-vote-yea',       'color' => 'success'],
                ['label' => 'PWD',             'value' => $summary->pwd,            'icon' => 'fas fa-wheelchair',     'color' => 'warning'],
                ['label' => 'Employed',        'value' => $summary->employed,       'icon' => 'fas fa-briefcase',      'color' => 'teal'],
                ['label' => 'Unemployed',      'value' => $summary->unemployed,     'icon' => 'fas fa-user-times',     'color' => 'secondary'],
                ['label' => 'Early Pregnancy', 'value' => $summary->earlypregnancy, 'icon' => 'fas fa-baby',           'color' => 'danger'],
            ];
        @endphp

        @foreach ($cards as $card)
        <div class="col-6 col-md-3 col-xl">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body d-flex align-items-center gap-3 py-3">
                    <div class="rounded-circle bg-{{ $card['color'] }} bg-opacity-10 p-2 d-flex align-items-center justify-content-center" style="width:42px;height:42px">
                        <i class="{{ $card['icon'] }} text-{{ $card['color'] }}"></i>
                    </div>
                    <div>
                        <div class="fw-bold fs-5 lh-1">{{ number_format($card['value']) }}</div>
                        <small class="text-muted">{{ $card['label'] }}</small>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Filters --}}
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-white fw-semibold border-bottom py-3">
            <i class="fas fa-filter me-1 text-muted"></i> Filter Records
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('report.index') }}">
                <div class="row g-3">
                    <div class="col-md-2">
                        <label class="form-label small fw-semibold">Gender</label>
                        <select name="gender" class="form-select form-select-sm">
                            <option value="">All</option>
                            <option value="Male"   @selected(($filters['gender'] ?? '') === 'Male')>Male</option>
                            <option value="Female" @selected(($filters['gender'] ?? '') === 'Female')>Female</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label small fw-semibold">Purok</label>
                        <select name="purok" class="form-select form-select-sm">
                            <option value="">All</option>
                            @foreach ($puroks as $purok)
                                <option value="{{ $purok }}" @selected(($filters['purok'] ?? '') === $purok)>{{ $purok }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label small fw-semibold">Age Range</label>
                        <div class="input-group input-group-sm">
                            <input type="number" name="age_from" class="form-control" placeholder="From" min="15" max="30" value="{{ $filters['age_from'] ?? '' }}">
                            <input type="number" name="age_to"   class="form-control" placeholder="To"   min="15" max="30" value="{{ $filters['age_to'] ?? '' }}">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label small fw-semibold">Voter Status</label>
                        <select name="isvoters" class="form-select form-select-sm">
                            <option value="">All</option>
                            <option value="1" @selected(($filters['isvoters'] ?? '') === '1')>Registered</option>
                            <option value="0" @selected(($filters['isvoters'] ?? '') === '0')>Not Registered</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label small fw-semibold">Employment</label>
                        <select name="education_background" class="form-select form-select-sm">
                            <option value="">All</option>
                            <option value="Employed"   @selected(($filters['education_background'] ?? '') === 'Employed')>Employed</option>
                            <option value="Unemployed" @selected(($filters['education_background'] ?? '') === 'Unemployed')>Unemployed</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label small fw-semibold">PWD</label>
                        <select name="ispwd" class="form-select form-select-sm">
                            <option value="">All</option>
                            <option value="1" @selected(($filters['ispwd'] ?? '') === '1')>Yes</option>
                            <option value="0" @selected(($filters['ispwd'] ?? '') === '0')>No</option>
                        </select>
                    </div>
                </div>
                <div class="d-flex gap-2 mt-3">
                    <button type="submit" class="btn btn-primary btn-sm px-4">
                        <i class="fas fa-search me-1"></i> Apply Filters
                    </button>
                    <a href="{{ route('report.index') }}" class="btn btn-outline-secondary btn-sm">
                        <i class="fas fa-times me-1"></i> Reset
                    </a>
                </div>
            </form>
        </div>
    </div>

    {{-- Table --}}
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
            <span class="fw-semibold"><i class="fas fa-table me-1 text-muted"></i> Results</span>
            <small class="text-muted">{{ number_format($kabataan->total()) }} record(s) found</small>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">#</th>
                        <th>Full Name</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Purok</th>
                        <th>Voter</th>
                        <th>PWD</th>
                        <th>Employment</th>
                        <th>Early Preg.</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kabataan as $i => $data)
                    <tr>
                        <td class="ps-4 text-muted small">{{ $kabataan->firstItem() + $i }}</td>
                        <td class="fw-semibold">{{ $data->lastname }}, {{ $data->firstname }} {{ $data->middlename }}</td>
                        <td>{{ $data->age }}</td>
                        <td>
                            @if ($data->gender === 'Male')
                                <span class="badge bg-info bg-opacity-10 text-info">♂ Male</span>
                            @else
                                <span class="badge" style="background:rgba(255,0,149,.1);color:rgb(255,0,149)">♀ Female</span>
                            @endif
                        </td>
                        <td>{{ $data->purok }}</td>
                        <td>
                            @if ($data->isvoters)
                                <span class="badge bg-success bg-opacity-10 text-success">✓ Yes</span>
                            @else
                                <span class="badge bg-secondary bg-opacity-10 text-secondary">No</span>
                            @endif
                        </td>
                        <td>
                            @if ($data->ispwd)
                                <span class="badge bg-warning bg-opacity-10 text-warning">✓ Yes</span>
                            @else
                                <span class="badge bg-secondary bg-opacity-10 text-secondary">No</span>
                            @endif
                        </td>
                        <td><span class="small">{{ $data->education_background }}</span></td>
                        <td>
                            @if ($data->earlypregnancy)
                                <span class="badge bg-danger bg-opacity-10 text-danger">✓ Yes</span>
                            @else
                                <span class="badge bg-secondary bg-opacity-10 text-secondary">No</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center py-5 text-muted">
                            <i class="fas fa-inbox fa-2x mb-2 d-block"></i>
                            No records found for the selected filters.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($kabataan->hasPages())
        <div class="card-footer bg-white d-flex justify-content-between align-items-center">
            <small class="text-muted">
                Showing {{ $kabataan->firstItem() }}–{{ $kabataan->lastItem() }} of {{ number_format($kabataan->total()) }}
            </small>
            {{ $kabataan->links() }}
        </div>
        @endif
    </div>
</div>
@endsection