@extends('Layouts.mainlayout')
@section('content')

<link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@600;700&family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">

<style>
/* ═══════════════════════════════════════════════════════════
   ATTENDANCE RECORDS — PREMIUM UI
   Editorial split layout | Forest green | Crisp white
═══════════════════════════════════════════════════════════ */
:root {
    --forest     : #00331a;
    --forest-2   : #004d28;
    --forest-3   : #006633;
    --forest-lite: #e8f5ee;
    --forest-pale: #f2faf5;
    --green      : #00a651;
    --white      : #ffffff;
    --gray-bg    : #f4f7f5;
    --text        : #0f2d1a;
    --muted      : #7a9485;
    --border     : #daeade;
    --red        : #dc3545;
    --shadow     : 0 2px 12px rgba(0,51,26,0.08);
    --shadow-lg  : 0 8px 32px rgba(0,51,26,0.13);
}

.ar-wrap {
    background: var(--gray-bg);
    min-height: 100vh;
    padding: 0;
    font-family: 'DM Sans', sans-serif;
}

/* ── TOP BANNER ───────────────────────────────────────────── */
.ar-banner {
    background: linear-gradient(110deg, var(--forest) 0%, var(--forest-2) 55%, var(--forest-3) 100%);
    padding: 22px 32px 70px;
    position: relative;
    overflow: hidden;
}
.ar-banner::before {
    content: 'ATTENDANCE';
    position: absolute;
    right: -20px; top: -10px;
    font-family: 'Rajdhani', sans-serif;
    font-size: 6.5rem;
    font-weight: 700;
    color: rgba(255,255,255,0.04);
    letter-spacing: 4px;
    white-space: nowrap;
    pointer-events: none;
    line-height: 1;
}
.ar-banner::after {
    content: '';
    position: absolute;
    bottom: -2px; left: 0; right: 0;
    height: 36px;
    background: var(--gray-bg);
    border-radius: 28px 28px 0 0;
}
.ar-banner-inner {
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 14px;
    position: relative;
    z-index: 1;
}
.ar-banner-left { display: flex; align-items: center; gap: 14px; }
.ar-back-btn {
    display: inline-flex; align-items: center; gap: 6px;
    background: rgba(255,255,255,0.12);
    border: 1px solid rgba(255,255,255,0.20);
    color: rgba(255,255,255,0.85);
    border-radius: 8px;
    padding: 7px 14px;
    font-size: 0.82rem;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.2s;
    backdrop-filter: blur(4px);
}
.ar-back-btn:hover {
    background: rgba(255,255,255,0.22);
    color: #fff;
    transform: translateX(-2px);
}
.ar-banner-title {
    font-family: 'Rajdhani', sans-serif;
    font-size: 1.55rem;
    font-weight: 700;
    color: #fff;
    letter-spacing: 1px;
    text-transform: uppercase;
    margin: 0;
    line-height: 1.1;
}
.ar-banner-sub {
    color: rgba(255,255,255,0.50);
    font-size: 0.75rem;
    margin: 2px 0 0;
    letter-spacing: 0.3px;
}
/* Event filter in banner */
.ar-filter select {
    background: rgba(255,255,255,0.12) !important;
    border: 1px solid rgba(255,255,255,0.25) !important;
    color: #fff !important;
    border-radius: 10px !important;
    padding: 8px 16px !important;
    font-size: 0.84rem !important;
    min-width: 210px;
    backdrop-filter: blur(4px);
    cursor: pointer;
    outline: none;
    font-family: 'DM Sans', sans-serif;
}
.ar-filter select option { background: var(--forest-2); color: #fff; }

/* ── CONTENT AREA ─────────────────────────────────────────── */
.ar-content {
    padding: 0 28px 28px;
    margin-top: -44px;
    position: relative;
    z-index: 2;
}

/* ── STAT STRIP ───────────────────────────────────────────── */
.ar-stat-strip {
    display: flex;
    gap: 14px;
    margin-bottom: 20px;
    flex-wrap: wrap;
}
.ar-stat {
    background: var(--white);
    border-radius: 14px;
    padding: 16px 22px;
    display: flex;
    align-items: center;
    gap: 14px;
    box-shadow: var(--shadow);
    border: 1px solid var(--border);
    flex: 1;
    min-width: 160px;
    animation: slideUp 0.4s ease both;
}
.ar-stat:nth-child(1) { animation-delay: 0.05s; }
.ar-stat:nth-child(2) { animation-delay: 0.10s; }
.ar-stat:nth-child(3) { animation-delay: 0.15s; }
@keyframes slideUp {
    from { opacity:0; transform: translateY(14px); }
    to   { opacity:1; transform: translateY(0); }
}
.ar-stat-icon {
    width: 42px; height: 42px;
    border-radius: 11px;
    display: flex; align-items: center; justify-content: center;
    font-size: 1rem;
    flex-shrink: 0;
}
.ar-stat-icon.green  { background: var(--forest-lite); color: var(--forest); }
.ar-stat-icon.mint   { background: #e6fff3; color: var(--green); }
.ar-stat-icon.amber  { background: #fff8ee; color: #e67e00; }
.ar-stat-val {
    font-family: 'Rajdhani', sans-serif;
    font-size: 1.9rem;
    font-weight: 700;
    color: var(--text);
    line-height: 1;
}
.ar-stat-label {
    font-size: 0.68rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    color: var(--muted);
    margin-top: 2px;
}

/* ── MAIN GRID ────────────────────────────────────────────── */
.ar-grid { display: grid; grid-template-columns: 1fr 380px; gap: 18px; }
@media (max-width: 991px) { .ar-grid { grid-template-columns: 1fr; } }

/* ── TABLE PANEL ──────────────────────────────────────────── */
.ar-panel {
    background: var(--white);
    border-radius: 18px;
    box-shadow: var(--shadow);
    border: 1px solid var(--border);
    overflow: hidden;
    animation: slideUp 0.45s ease 0.2s both;
}
.ar-panel-head {
    padding: 14px 20px;
    border-bottom: 1px solid var(--border);
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: var(--white);
}
.ar-panel-title {
    font-family: 'Rajdhani', sans-serif;
    font-size: 0.82rem;
    font-weight: 700;
    letter-spacing: 2px;
    text-transform: uppercase;
    color: var(--muted);
    display: flex;
    align-items: center;
    gap: 8px;
}
.ar-panel-title::before {
    content: '';
    display: inline-block;
    width: 10px; height: 10px;
    border-radius: 3px;
    background: var(--forest);
}
.ar-count-pill {
    background: var(--forest-lite);
    color: var(--forest);
    font-family: 'Rajdhani', sans-serif;
    font-size: 0.75rem;
    font-weight: 700;
    padding: 3px 12px;
    border-radius: 20px;
    border: 1px solid var(--border);
}

/* Table */
.ar-table { width: 100%; border-collapse: collapse; font-size: 0.845rem; }
.ar-table thead { background: var(--forest); }
.ar-table thead th {
    color: rgba(255,255,255,0.75);
    font-family: 'Rajdhani', sans-serif;
    font-size: 0.68rem;
    font-weight: 700;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    padding: 11px 16px;
    border: none;
    white-space: nowrap;
}
.ar-table thead th:first-child { color: #fff; }
.ar-table tbody tr {
    border-bottom: 1px solid var(--border);
    transition: background 0.15s;
}
.ar-table tbody tr:last-child { border-bottom: none; }
.ar-table tbody tr:hover { background: var(--forest-pale); }
.ar-table tbody td {
    padding: 11px 16px;
    vertical-align: middle;
    color: var(--text);
}

/* ID chip */
.ar-id {
    background: var(--forest-lite);
    color: var(--forest);
    font-family: 'Rajdhani', sans-serif;
    font-weight: 700;
    font-size: 0.78rem;
    padding: 2px 10px;
    border-radius: 20px;
    border: 1px solid var(--border);
    display: inline-block;
}
/* Status chip */
.ar-status {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    background: #e6fff3;
    color: #00834a;
    border: 1px solid #b3f0d3;
    border-radius: 20px;
    padding: 3px 10px;
    font-size: 0.75rem;
    font-weight: 700;
}
.ar-status i { font-size: 0.62rem; }
/* Delete btn */
.ar-del {
    width: 28px; height: 28px;
    border-radius: 7px;
    background: #fff0f0;
    border: 1px solid #ffc8c8;
    color: var(--red);
    display: inline-flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.18s;
    font-size: 0.7rem;
}
.ar-del:hover { background: var(--red); color: #fff; border-color: var(--red); transform: scale(1.08); }

/* ── STATS PANEL ──────────────────────────────────────────── */
.ar-stats-panel {
    background: var(--white);
    border-radius: 18px;
    box-shadow: var(--shadow);
    border: 1px solid var(--border);
    overflow: hidden;
    display: flex;
    flex-direction: column;
    animation: slideUp 0.45s ease 0.3s both;
}
.ar-stats-head {
    background: var(--forest);
    padding: 14px 20px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 8px;
    flex-wrap: wrap;
}
.ar-stats-head-title {
    font-family: 'Rajdhani', sans-serif;
    font-size: 0.82rem;
    font-weight: 700;
    letter-spacing: 2px;
    text-transform: uppercase;
    color: rgba(255,255,255,0.70);
    display: flex;
    align-items: center;
    gap: 7px;
}
.ar-stats-head-title i { color: rgba(255,255,255,0.50); }
.ar-event-pill {
    background: rgba(255,255,255,0.12);
    color: rgba(255,255,255,0.80);
    border: 1px solid rgba(255,255,255,0.18);
    border-radius: 20px;
    font-size: 0.68rem;
    font-weight: 600;
    padding: 3px 12px;
    max-width: 160px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
.ar-stats-body { padding: 18px; flex: 1; }

/* Big numbers */
.ar-big-nums {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
    margin-bottom: 16px;
}
.ar-num-box {
    border-radius: 13px;
    padding: 16px 12px;
    text-align: center;
    border: 1px solid var(--border);
}
.ar-num-box.primary { background: var(--forest-lite); }
.ar-num-box.secondary { background: var(--forest-pale); }
.ar-num-val {
    font-family: 'Rajdhani', sans-serif;
    font-size: 2.2rem;
    font-weight: 700;
    line-height: 1;
    color: var(--forest);
}
.ar-num-box.secondary .ar-num-val { color: var(--forest-3); }
.ar-num-label {
    font-size: 0.65rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    color: var(--muted);
    margin-top: 4px;
}

/* Rate bar */
.ar-rate-wrap { margin-bottom: 16px; }
.ar-rate-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 6px;
}
.ar-rate-label {
    font-size: 0.68rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    color: var(--muted);
}
.ar-rate-pct {
    font-family: 'Rajdhani', sans-serif;
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--forest);
}
.ar-rate-track {
    height: 9px;
    background: var(--forest-lite);
    border-radius: 20px;
    overflow: hidden;
}
.ar-rate-fill {
    height: 100%;
    border-radius: 20px;
    background: linear-gradient(90deg, var(--forest), var(--green));
    transition: width 1s cubic-bezier(.22,.68,0,1.2);
}

/* Divider */
.ar-divider {
    height: 1px;
    background: var(--border);
    margin: 14px 0;
}
</style>

<div class="ar-wrap">

    {{-- ── BANNER ───────────────────────────────────────────── --}}
    <div class="ar-banner">
        <div class="ar-banner-inner">
            <div class="ar-banner-left">
                <a href="{{ route('attendance.index') }}" class="ar-back-btn" id="backbuttonrecords">
                    <i class="fas fa-arrow-left"></i>
                    <span>Back</span>
                </a>
                <div>
                    <div class="ar-banner-title">
                        <i class="fas fa-clipboard-check me-2" style="opacity:0.6;font-size:1.1rem;"></i>
                        Attendance Records
                    </div>
                    <div class="ar-banner-sub">Attended youth records per event — Barangay Balintarak</div>
                </div>
            </div>
            <div class="ar-filter">
                <form method="GET" action="{{ route('attendance.attendedrecords') }}">
                    <select name="filter" onchange="this.form.submit()">
                        <option selected disabled>🗂  Filter by Event</option>
                        <option value="all" {{ request('filter')=='all' ? 'selected':'' }}>Show All Records</option>
                        @foreach ($events as $event)
                            <option value="{{ $event->title }}"
                                {{ request('filter') == $event->title ? 'selected':'' }}>
                                {{ $event->title }}
                            </option>
                        @endforeach
                    </select>
                </form>
            </div>
        </div>
    </div>

    {{-- ── CONTENT ──────────────────────────────────────────── --}}
    <div class="ar-content">

        {{-- STAT STRIP --}}
        @php
            $rate = $totalkabataan > 0
                ? round(($totalkabataan_perevent / $totalkabataan) * 100)
                : 0;
        @endphp
        <div class="ar-stat-strip">
            <div class="ar-stat">
                <div class="ar-stat-icon green"><i class="fas fa-users"></i></div>
                <div>
                    <div class="ar-stat-val">{{ $totalkabataan }}</div>
                    <div class="ar-stat-label">Total Kabataan</div>
                </div>
            </div>
            <div class="ar-stat">
                <div class="ar-stat-icon mint"><i class="fas fa-user-check"></i></div>
                <div>
                    <div class="ar-stat-val">{{ $totalkabataan_perevent }}</div>
                    <div class="ar-stat-label">Total Attended</div>
                </div>
            </div>
            <div class="ar-stat">
                <div class="ar-stat-icon amber"><i class="fas fa-percent"></i></div>
                <div>
                    <div class="ar-stat-val">{{ $rate }}%</div>
                    <div class="ar-stat-label">Attendance Rate</div>
                </div>
            </div>
        </div>

        {{-- MAIN GRID --}}
        <div class="ar-grid">

            {{-- TABLE PANEL --}}
            <div class="ar-panel">
                <div class="ar-panel-head">
                    <div class="ar-panel-title">List of Attended Records</div>
                    <span class="ar-count-pill">{{ $attended->count() }} Records</span>
                </div>
                <div style="max-height:500px;overflow-y:auto;">
                    <table class="ar-table" id="customtabled">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Attended Event</th>
                                <th>Full Name</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($attended as $attends)
                                <tr>
                                    <td><span class="ar-id">#{{ $attends->id }}</span></td>
                                    <td>
                                        <span class="d-inline-block text-truncate fw-semibold"
                                              style="max-width:150px;font-size:0.82rem;color:#0f2d1a;"
                                              title="{{ $attends->event->title }}">
                                            {{ $attends->event->title }}
                                        </span>
                                    </td>
                                    <td style="white-space:nowrap;font-weight:500;">
                                        {{ $attends->kabataan->firstname }}
                                        {{ $attends->kabataan->middlename }}
                                        {{ $attends->kabataan->lastname }}
                                    </td>
                                    <td>
                                        <span class="ar-status">
                                            <i class="fas fa-check"></i>
                                            {{ $attends->status }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <form action="{{ route('attendance.destroyattended',['id'=>$attends]) }}"
                                              method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="ar-del"
                                                    onclick="return confirm('Remove this attendance record?')"
                                                    title="Remove">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-5">
                                        <i class="fas fa-clipboard fa-2x d-block mb-2"
                                           style="color:#d4e6da;"></i>
                                        <span class="text-secondary small">No attendance records found.</span>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- STATS PANEL --}}
            <div class="ar-stats-panel">
                <div class="ar-stats-head">
                    <div class="ar-stats-head-title">
                        <i class="fas fa-chart-pie"></i>
                        Statistics
                    </div>
                    <span class="ar-event-pill">
                        {{ isset($title) ? $title : 'No Event Selected' }}
                    </span>
                </div>
                <div class="ar-stats-body">
                    <div class="ar-big-nums">
                        <div class="ar-num-box primary">
                            <div class="ar-num-val">{{ $totalkabataan }}</div>
                            <div class="ar-num-label">Total Kabataan</div>
                        </div>
                        <div class="ar-num-box secondary">
                            <div class="ar-num-val">{{ $totalkabataan_perevent }}</div>
                            <div class="ar-num-label">Attended</div>
                        </div>
                    </div>

                    <div class="ar-rate-wrap">
                        <div class="ar-rate-header">
                            <span class="ar-rate-label">Attendance Rate</span>
                            <span class="ar-rate-pct">{{ $rate }}%</span>
                        </div>
                        <div class="ar-rate-track">
                            <div class="ar-rate-fill" style="width:{{ $rate }}%;"></div>
                        </div>
                    </div>

                    <div class="ar-divider"></div>

                    <div style="font-family:'Rajdhani',sans-serif;font-size:0.68rem;font-weight:700;
                                letter-spacing:1.8px;text-transform:uppercase;color:#7a9485;margin-bottom:10px;">
                        Attendance by Purok
                    </div>
                    <div id="piechart"></div>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    setTimeout(function() {
        var alert = document.getElementById('alert-message');
        if (alert) {
            alert.style.transition = "opacity 0.9s ease-out";
            alert.style.opacity = "0";
            setTimeout(() => alert.remove(), 500);
        }
    }, 3000);

    document.addEventListener("DOMContentLoaded", function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function(el) { return new bootstrap.Tooltip(el); });
    });
</script>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const purokdata = {{ json_encode($puroksdata) }};

    new ApexCharts(document.querySelector("#piechart"), {
        series: purokdata,
        chart: {
            height: 260,
            type: 'donut',
            toolbar: { show: false },
            background: 'transparent',
            fontFamily: 'DM Sans, sans-serif',
        },
        labels: ['Purok 1','Purok 2','Purok 3','Purok 4','Purok 5','Purok 6','Purok 7'],
        colors: ['#00331a','#005c30','#00a651','#4ade80','#e67e00','#dc3545','#9aada0'],
        legend: {
            position: 'bottom',
            fontSize: '11px',
            labels: { colors: '#7a9485' },
            markers: { width: 9, height: 9, radius: 3 },
            itemMargin: { horizontal: 6 }
        },
        plotOptions: {
            pie: {
                donut: {
                    size: '62%',
                    labels: {
                        show: true,
                        total: {
                            show: true,
                            label: 'Total',
                            fontSize: '12px',
                            fontWeight: 700,
                            color: '#00331a',
                            formatter: w => w.globals.seriesTotals.reduce((a,b)=>a+b,0)
                        }
                    }
                }
            }
        },
        dataLabels: { enabled: false },
        stroke: { width: 3, colors: ['#ffffff'] },
        tooltip: {
            theme: 'light',
            y: { formatter: val => val + ' Attended' }
        }
    }).render();
});
</script>

@endsection