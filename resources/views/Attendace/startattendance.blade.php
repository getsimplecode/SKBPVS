@extends('Layouts.mainlayout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- QR Scanner Section -->
            <div class="col-lg-8 mb-4">
                <div class="p-4 shadow rounded bg-light">
                    <h5><i class="fas fa-qrcode"></i> Event Name: {{$event->title}}</h5>
                    <div id="reader" class="bg-success rounded mt-3" style="width: 90%; height: 500px;"></div>
                </div>
            </div>

            <!-- Scan Results Section -->
            <div class="col-lg-4 mb-4">
                <div class="p-4 shadow rounded bg-white" style="height: 500px; overflow-y: auto;">
                    <div class="d-flex justify-content-between align-items-center mb-3 border-bottom pb-2">
                        <h5 class="mb-0 text-success"><i class="fas fa-users"></i><strong> Active Kabataan</strong></h5>
                        <span class="badge bg-danger" id="count-badge">0</span>
                    </div>

                    <table class="table table-bordered table-sm mb-0">
                        <thead class="table-success">
                            <tr>
                                <th style="width: 10%">#</th>
                                <th>Name</th>
                            </tr>
                        </thead>
                        <tbody id="scan-table-body">
                            <!-- JS will append scanned names here -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <audio id="beep-sound" src="{{ asset('beep.mp3') }}"></audio>
    </div>

    {{-- Include QR Scanner --}}
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <script>
        let count = 0;
        const scannedNames = new Set();

        const html5QrCode = new Html5Qrcode("reader");
        html5QrCode.start({
                facingMode: "environment"
            }, {
                fps: 10,
                qrbox: 250
            },
            qrCodeMessage => {
                // Parse only the "Name" line
                const lines = qrCodeMessage.split('\n');
                let name = "";

                lines.forEach(line => {
                    if (line.startsWith("Name:")) {
                        name = line.replace("Name:", "").trim();
                    }
                });

                // Avoid duplicates
                if (name && !scannedNames.has(name)) {
                    scannedNames.add(name);
                    count++;
                    const beep = document.getElementById("beep-sound");
                    beep.currentTime = 0;
                    beep.play();
                    const tableBody = document.getElementById("scan-table-body");
                    const row = document.createElement("tr");
                    row.innerHTML = `
                        <td>${count}</td>
                        <td>${name}</td>
                    `;
                    tableBody.appendChild(row);

                    document.getElementById("count-badge").textContent = count;
                }
            },
            errorMessage => {
                // Optional: handle scan errors here
            }
        ).catch(err => {
            console.error("Camera failed to start:", err);
        });
    </script>
@endsection
