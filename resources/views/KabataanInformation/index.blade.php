@extends('Layouts.mainlayout')
@section('content')
@include('KabataanInformation.addnewkabataan')

    <div class="container-fluid">
        @if (session('error') || session('success'))
            <div id="alert-message"
                class="alert alert-{{ session('success') ? 'success' : 'danger' }} alert-dismissible fade show position-fixed top-0 end-0 m-4 shadow"
                role="alert" style="z-index: 1055; min-width: 300px;">
                {{ session('error') ?? session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <!-- Navigation bar -->
        <nav class="navbar shadow rounded bg-white mb-1">
            <div class="container-fluid">
                <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addKabataanModal">
                    <i class="fas fa-plus"></i> Add Kabataan
                </a>
                <form action="{{route('kabataaninformation.index')}}" class="d-flex" role="search">
                    <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search" />
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </nav>

        <!-- Data Table -->
        <div class="card shadow rounded">
            <div class="card-body">
                <div class="table-responsive mt-2">
                    <table id="customtabled" class="table table-bordered table-striped align-middle">
                        <thead class="table-success text-center">
                            <tr>
                                <th>K-ID</th>
                                <th>FULLNAME</th>
                                <th>PUROK</th>
                                <th>GUARDIAN</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kabataans as $kabataan)
                                <tr>
                                    <td class="text-center">{{ $kabataan->id }}</td>
                                    <td>{{ $kabataan->fullname }}</td>
                                    <td>{{ $kabataan->purok }}</td>
                                    <td>{{ $kabataan->motherfullname }}</td>
                                    <td class="text-center">
                                        <a data-bs-toggle="modal" data-bs-target="#updateKabataanModal-{{ $kabataan->id }}"
                                            class="btn btn-sm btn-success me-1">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <a href="#" data-bs-toggle="modal"
                                            data-bs-target="#deleteKabataanModal-{{ $kabataan->id }}"
                                            class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i> Delete
                                        </a>
                                    </td>
                                </tr>

                                @include('KabataanInformation.updatekabataan')
                                @include('KabataanInformation.deletekabataan')
                            @endforeach
                        </tbody>
                    </table>
                    {{ $kabataans->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
    <script>
        // Auto-hide success alert after 3 seconds
        setTimeout(function() {
            var alert = document.getElementById('alert-message');
            if (alert) {
                alert.style.transition = "opacity 0.5s ease-out";
                alert.style.opacity = "0"; // Gradual fade-out
                setTimeout(() => alert.remove(), 500); // Remove after fade-out
            }
        }, 3000);

        // Enable Bootstrap tooltips
        document.addEventListener("DOMContentLoaded", function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        });
    </script>
@endsection
