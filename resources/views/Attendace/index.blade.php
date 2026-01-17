@extends('Layouts.mainlayout')

@section('content')
    <div class="container-fluid">
        @if (session('error') || session('success'))
            <div id="alert-message"
                class="alert alert-{{ session('success') ? 'success' : 'danger' }} alert-dismissible fade show position-fixed top-0 end-0 m-4 shadow"
                role="alert" style="z-index: 1055; min-width: 300px;">
                {{ session('error') ?? session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row gx-2">
            <!-- Left Side: Table -->
            <div class="col-7 rounded" style="height: 610px; background-color:rgb(216, 230, 219)">
                <nav class="navbar bg-light rounded shadow mt-2">
                    <div class="container-fluid">
                        <a class="navbar-brand fw-bold fs-4">List of Active Kabataan</a>
                        <form class="d-flex" method="POST" action="{{ route('attendance.storeattended') }}">
                            @csrf
                            @method('post')
                            <button class="btn text-white" type="submit" style="background-color: rgb(0, 138, 92)">
                                <i class="fas fa-users"></i> Save Attendance
                            </button>
                        </form>
                    </div>
                </nav>

                <div class="col-12 mt-1 p-1 bg-white rounded" style="max-height: 560px;">
                    <div style="max-height: 530px; overflow-y: auto;">
                        <table id="customtabled" class="table table-bordered table-striped">
                            <thead class="table-success sticky-top" style="top: 0; z-index: 1;">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Fullname</th>
                                    <th scope="col">Purok</th>
                                    <th style="width: 120px" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($attendances as $attendance)
                                    <tr>
                                        <td>{{ $attendance->id }}</td>
                                        <td>{{ $attendance->kabataan->firstname }} {{ $attendance->kabataan->middlename }}
                                            {{ $attendance->kabataan->lastname }}</td>
                                        <td>{{ $attendance->kabataan->purok }}</td>
                                        <td class="text-center">
                                            <a class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="text-center">
                                        <td colspan="4">Attendance data is empty.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

            <!-- Right Side: QR Scanner -->
            <div class="col-5 rounded shadow" style="height: 610px; background-color:#a8d3bf">
                <div class="col-12 p-3 mt-2 rounded" style="height: 330px; background-color:rgb(209, 246, 199)">
                    <div id="reader" class="rounded" style="width: 100%; height: 100%;"></div>
                    <p id="result" hidden></p>
                </div>

                <div class="col-12 mt-2">
                    <label for="scannedname"><strong class="text-success"> Fullname</strong></label>
                    <input id="scannedName" class="form-control" type="text" value="" placeholder="Scanned Name..."
                        readonly>
                </div>

                <div class="col-12 mt-1">
                    <label for="eventtitle"><strong class="text-success">Event Title</strong></label>
                    @if ($events)
                        <input class="form-control" type="text" value="{{ $events->title }}" readonly>
                    @else
                        <input class="form-control" type="text" value="No Event for today" readonly>
                    @endif


                </div>
                <div class="col-12 mt-1">
                    <label for="incharge"><strong class="text-success">In - Charge</strong></label>
                    @if ($events)
                        <input class="form-control" type="text" value="{{ $events->incharge }}" readonly>
                    @else
                        <input class="form-control" type="text" value="No Event for today" readonly>
                    @endif
                </div>
                <div class="col-12 mt-2 p-2 text-center rounded" style="background-color: #ffffff">
                    <a href="{{ route('attendance.attendedrecords') }}" class="btn text-white shadow me-2"
                        style="background-color:rgb(2, 1, 49)">
                        <i class="fas fa-list"></i> Records
                    </a>
                    <form action="{{ route('attendance.store') }}" method="POST" class="d-inline">
                        @csrf
                        <input type="hidden" name="kabataan_id" id="hidden_kabataan_id">
                        @if ($events)
                            <input type="hidden" name="event_id" value="{{ $events->id }}">
                        @endif
                        <button type="submit" class="btn text-white shadow me-2" style="background-color:rgb(0, 49, 24)">
                            <i class="fas fa-check"></i> <strong>Confirm Kabataan</strong>
                        </button>
                    </form>

                    <form action="{{ route('attendance.clear') }}" method="POST" class="d-inline"
                        onsubmit="return confirm('Are you sure you want to clear all attendance?')">
                        @csrf
                        <button type="submit" class="btn text-white shadow" style="background-color:rgb(70, 1, 1)">
                            <i class="fas fa-trash"></i> <strong>Clear All</strong>
                        </button>
                    </form>
                </div>



            </div>
        </div>
    </div>

    <!-- Beep Sound -->
    <audio id="beep-sound" src="{{ asset('beep.mp3') }}"></audio>

    <!-- QR Code Scanner Script -->
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <script>
        function onScanSuccess(decodedText, decodedResult) {
            const lines = decodedText.split("\n");
            let id = "",
                name = "";

            const beep = document.getElementById("beep-sound");
            beep.currentTime = 0;
            beep.play();
            lines.forEach(line => {
                if (line.startsWith("ID:")) {
                    id = line.replace("ID:", "").trim();
                }
                if (line.startsWith("Name:")) {
                    name = line.replace("Name:", "").trim();
                }
            });

            if (id && name) {
                document.getElementById("scannedName").value = name;
                document.getElementById("hidden_kabataan_id").value = id;

            }
        }

        const html5QrCode = new Html5Qrcode("reader");
        html5QrCode.start({
                facingMode: "environment"
            }, {
                fps: 10,
                qrbox: {
                    width: 250,
                    height: 250
                }
            },
            onScanSuccess
        ).catch(err => {
            console.error("Camera error:", err);
        });
    </script>

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

    <style>
        #reader {
            width: 100%;
            height: 240px;
            border: 2px solid #333;
            overflow: hidden;
        }

        #result {
            font-weight: bold;
            padding: 5px;
        }
    </style>
@endsection
