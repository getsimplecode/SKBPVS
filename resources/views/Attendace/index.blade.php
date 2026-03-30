@extends('Layouts.mainlayout')
@section('content')

<div class="att-wrap">

    {{-- ── BANNER ────────────────────────────────────────────── --}}
    <div class="att-banner">
        <div class="att-banner-inner">
            <div>
                <div class="att-banner-title">
                    <i class="fas fa-qrcode me-2" style="opacity:0.55;"></i>
                    Track Attendance
                </div>
                <div class="att-banner-sub">QR-powered youth attendance system — Barangay Balintawak</div>
            </div>
            <div class="att-live">
                <span class="att-live-dot"></span>
                Scanner Ready
            </div>
        </div>
    </div>

    {{-- ── CONTENT ───────────────────────────────────────────── --}}
    <div class="att-content">
        <div class="att-grid">

            {{-- ── LEFT: ACTIVE KABATAAN TABLE ─────────────────── --}}
            <div class="att-panel">
                <div class="att-panel-head">
                    <div class="att-panel-title">Active Kabataan List</div>
                    <span class="att-count-pill">{{ $attendances->count() }} In Queue</span>
                </div>

                <div class="att-table-scroll">
                    <table class="att-table" id="customtabled">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Full Name</th>
                                <th>Purok</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($attendances as $attendance)
                                <tr>
                                    <td><span class="att-id">#{{ $attendance->id }}</span></td>
                                    <td style="font-weight:500;white-space:nowrap;">
                                        {{ $attendance->kabataan->firstname }}
                                        {{ $attendance->kabataan->middlename }}
                                        {{ $attendance->kabataan->lastname }}
                                    </td>
                                    <td>
                                        <span class="att-purok">
                                            <i class="fas fa-map-marker-alt" style="font-size:0.65rem;"></i>
                                            {{ $attendance->kabataan->purok }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <a class="att-del" title="Remove">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-5">
                                        <i class="fas fa-qrcode d-block mb-2"
                                           style="font-size:2.5rem;color:#d4e6da;"></i>
                                        <span class="text-secondary small">
                                            No kabataan scanned yet.<br>
                                            <span style="color:var(--muted);font-size:0.75rem;">
                                                Scan a QR code to add attendance.
                                            </span>
                                        </span>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="att-table-footer">
                    <div style="font-size:0.78rem;color:var(--muted);">
                        <i class="fas fa-info-circle me-1"></i>
                        Review list before saving
                    </div>
                    <form method="POST" action="{{ route('attendance.storeattended') }}">
                        @csrf
                        @method('POST')
                        <button type="submit" class="att-btn att-btn-confirm">
                            <i class="fas fa-users"></i> Save Attendance
                        </button>
                    </form>
                </div>
            </div>

            {{-- ── RIGHT: QR SCANNER ────────────────────────────── --}}
            <div class="att-panel" style="overflow:visible;">

                <div class="att-panel-head">
                    <div class="att-panel-title">QR Code Scanner</div>
                    <span style="font-size:0.7rem;font-weight:600;color:var(--green);
                                 background:#e6fff3;border:1px solid #b3f0d3;
                                 border-radius:20px;padding:2px 10px;">
                        <i class="fas fa-camera me-1" style="font-size:0.6rem;"></i>Live
                    </span>
                </div>

                {{-- Scanner viewport --}}
                <div class="att-scanner-box">
                    <div class="att-scan-line"></div>
                    <div class="att-scanner-corners">
                        <div class="att-corner tl"></div>
                        <div class="att-corner tr"></div>
                        <div class="att-corner bl"></div>
                        <div class="att-corner br"></div>
                    </div>
                    <div id="reader"></div>
                    <p id="result" hidden></p>
                </div>

                {{-- Event Info Fields --}}
                <div class="att-info-block">

                    <div class="att-info-row">
                        <label class="att-info-label">
                            <i class="fas fa-user me-1" style="color:var(--green);"></i>
                            Scanned Name
                        </label>
                        <input id="scannedName" class="att-info-input" type="text"
                               value="" placeholder="Waiting for QR scan..." readonly>
                    </div>

                    <div class="att-info-row">
                        <label class="att-info-label">
                            <i class="fas fa-calendar-check me-1" style="color:var(--green);"></i>
                            Event Title
                        </label>
                        @if ($events)
                            <input class="att-info-input" type="text"
                                   value="{{ $events->title }}" readonly>
                        @else
                            <input class="att-info-input" type="text"
                                   value="No Event for Today"
                                   style="color:#dc3545;border-color:#ffc8c8;" readonly>
                        @endif
                    </div>

                    <div class="att-info-row">
                        <label class="att-info-label">
                            <i class="fas fa-user-shield me-1" style="color:var(--green);"></i>
                            In-Charge
                        </label>
                        @if ($events)
                            <input class="att-info-input" type="text"
                                   value="{{ $events->incharge }}" readonly>
                        @else
                            <input class="att-info-input" type="text"
                                   value="No Event for Today"
                                   style="color:#dc3545;border-color:#ffc8c8;" readonly>
                        @endif
                    </div>

                </div>

                {{-- Action Buttons --}}
                <div class="att-actions">
                    <a href="{{ route('attendance.attendedrecords') }}" class="att-btn att-btn-records">
                        <i class="fas fa-list"></i> Records
                    </a>

                    <form action="{{ route('attendance.store') }}" method="POST" style="display:contents;">
                        @csrf
                        <input type="hidden" name="kabataan_id" id="hidden_kabataan_id">
                        @if ($events)
                            <input type="hidden" name="event_id" value="{{ $events->id }}">
                        @endif
                        <button type="submit" class="att-btn att-btn-confirm">
                            <i class="fas fa-check"></i> Confirm
                        </button>
                    </form>

                    <form action="{{ route('attendance.clear') }}" method="POST" style="display:contents;"
                          onsubmit="return confirm('Clear all attendance records?')">
                        @csrf
                        <button type="submit" class="att-btn att-btn-clear">
                            <i class="fas fa-trash"></i> Clear
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

{{-- Beep Sound --}}
<audio id="beep-sound" src="{{ asset('beep.mp3') }}"></audio>

<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<script>
    function onScanSuccess(decodedText, decodedResult) {
        const lines = decodedText.split("\n");
        let id = "", name = "";

        const beep = document.getElementById("beep-sound");
        beep.currentTime = 0;
        beep.play();

        lines.forEach(line => {
            if (line.startsWith("ID:"))   id   = line.replace("ID:", "").trim();
            if (line.startsWith("Name:")) name = line.replace("Name:", "").trim();
        });

        if (id && name) {
            const nameInput = document.getElementById("scannedName");
            nameInput.value = name;
            nameInput.style.borderColor = '#00a651';
            nameInput.style.background  = '#e6fff3';
            // flash effect
            nameInput.classList.add('scan-success');
            setTimeout(() => {
                nameInput.classList.remove('scan-success');
                nameInput.style.borderColor = '';
                nameInput.style.background  = '';
            }, 2000);

            document.getElementById("hidden_kabataan_id").value = id;
        }
    }

    const html5QrCode = new Html5Qrcode("reader");
    html5QrCode.start(
        { facingMode: "environment" },
        { fps: 10, qrbox: { width: 220, height: 220 } },
        onScanSuccess
    ).catch(err => console.error("Camera error:", err));
</script>

<script>
    setTimeout(function() {
        var alert = document.getElementById('alert-message');
        if (alert) {
            alert.style.transition = "opacity 0.5s ease-out";
            alert.style.opacity = "0";
            setTimeout(() => alert.remove(), 500);
        }
    }, 3000);

    document.addEventListener("DOMContentLoaded", function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function(el) { return new bootstrap.Tooltip(el); });
    });
</script>

@endsection