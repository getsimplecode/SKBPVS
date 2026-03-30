@extends('Layouts.mainlayout')
@section('content')
@include('ManageQrcode.addqrcode')

    <div class="container-fluid">
        <nav class="navbar bg-white shadow rounded mb-1">
            <div class="container-fluid">
                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#generateQRModal"><i
                        class="fas fa-plus"></i> New QR code</button>
                <form class="d-flex" role="search" action="{{route('manageqrcode.index')}}">
                    <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search" />
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </nav>

        <!-- Table -->
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="card-title">QR Code List</h5>

                <div class="table-responsive">
                    <table id="customtabled" class="table table-bordered table-hover align-middle text-center">
                        <thead class="table-success">
                            <tr>
                                <th>ID</th>
                                <th>FULLNAME</th>
                                <th>IMAGE</th>
                                <th>STATUS</th>
                                <th style="width: 150px;">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($qrcodes as $qrcode)
                            @include('ManageQrcode.deleteqrcode')
                            @include('ManageQrcode.downloadqr')
                                <tr>
                                    <td>{{ $qrcode->id }}</td>
                                    <td>{{ $qrcode->kabataan->firstname }} {{ $qrcode->kabataan->middlename }} {{ $qrcode->kabataan->lastname }}</td>
                                    <td>
                                        <img src="data:image/png;base64,{{ $qrcode->image }}" alt="qr" width="50" height="50" class="rounded">
                                    </td>
                                    <td>
                                        <span class="badge {{ $qrcode->status === 'NEW' ? 'bg-success' : 'bg-success' }}">
                                            {{ ucfirst($qrcode->status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <a data-bs-target="#downloadqrcode-{{ $qrcode->id }}" data-bs-toggle="modal" class="btn btn-sm btn-warning"><i class="fas fa-download"></i> save</a>
                                        <a data-bs-toggle="modal" data-bs-target="#deleteQrCodeModal-{{ $qrcode->id }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                              
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">No QR codes found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                      
                    </table>
                    {{$qrcodes->links('pagination::bootstrap-5')}}
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
