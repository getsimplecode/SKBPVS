@extends('Layouts.mainlayout')
@section('content')
@include('KabataanInformation.addnewkabataan')

<div class="sk-page-wrap">

    {{-- PAGE HEADER --}}
    <div class="sk-page-header">
        <div class="sk-page-icon"><i class="fas fa-users"></i></div>
        <div>
            <h4>Kabataan Registration</h4>
            <p>Manage and register youth members of Barangay Balintarak</p>
        </div>
    </div>

    {{-- TOOLBAR --}}
    <div class="sk-toolbar">
        <a class="sk-btn-add" data-bs-toggle="modal" data-bs-target="#addKabataanModal">
            <i class="fas fa-plus"></i> New Kabataan
        </a>
        <form action="{{ route('kabataaninformation.index') }}" class="sk-search-form" role="search">
            <input name="search" type="search"
                   placeholder="🔍  Search name or purok..."
                   value="{{ request('search') }}" />
            <button class="sk-btn-search" type="submit">
                <i class="fas fa-search me-1"></i> Search
            </button>
        </form>
    </div>

    {{-- TABLE CARD --}}
    <div class="sk-card">
        <div class="sk-card-header">
            <div class="sk-card-header-label">
                <i class="fas fa-list" style="color:var(--forest-3);"></i>
                Youth Records
            </div>
            <span class="sk-count-badge">
                {{ $kabataans->total() }} {{ $kabataans->total() === 1 ? 'Record' : 'Records' }}
            </span>
        </div>

        <div class="table-responsive">
            <table class="sk-table" id="customtabled">
                <thead>
                    <tr>
                        <th class="text-center" style="width:80px;">K-ID</th>
                        <th>Firstname</th>
                        <th>Middlename</th>
                        <th>Lastname</th>
                        <th>Purok</th>
                        <th class="text-center" style="width:160px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kabataans as $kabataan)
                        <tr>
                            <td class="text-center">
                                <span class="sk-id">#{{ $kabataan->id }}</span>
                            </td>
                            <td><strong style="color:var(--text-main);">{{ $kabataan->firstname }}</strong></td>
                            <td style="color:var(--text-muted);">{{ $kabataan->middlename ?? '—' }}</td>
                            <td>{{ $kabataan->lastname }}</td>
                            <td>
                                <span class="sk-purok">
                                    <i class="fas fa-map-marker-alt"></i>
                                    {{ $kabataan->purok }}
                                </span>
                            </td>
                            <td class="text-center">
                                <a data-bs-toggle="modal"
                                   data-bs-target="#updateKabataanModal-{{ $kabataan->id }}"
                                   class="sk-btn-edit me-1">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#" data-bs-toggle="modal"
                                   data-bs-target="#deleteKabataanModal-{{ $kabataan->id }}"
                                   class="sk-btn-delete">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        @include('KabataanInformation.updatekabataan')
                        @include('KabataanInformation.deletekabataan')
                    @empty
                        <tr>
                            <td colspan="6">
                                <div class="sk-empty">
                                    <i class="fas fa-users-slash"></i>
                                    <p>No kabataan records found.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($kabataans->hasPages())
        <div class="sk-pagination-wrap">
            {{ $kabataans->links('pagination::bootstrap-5') }}
        </div>
        @endif

    </div>{{-- end sk-card --}}

</div>{{-- end sk-page-wrap --}}

@endsection