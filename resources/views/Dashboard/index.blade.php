@extends('Layouts.mainlayout')
@section('content')

<link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@600;700&family=DM+Sans:wght@400;500;700&display=swap" rel="stylesheet">

<div class="sk-wrap">

    {{-- ── HERO ──────────────────────────────────────────────── --}}
    <div class="sk-hero">
        <div class="sk-hero-logo-wrap">
            <img src="{{ asset('sklogo.png') }}"
                 onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';"
                 alt="SK Logo" class="sk-hero-logo">
            <div class="sk-hero-logo-placeholder" style="display:none;">🏛️</div>
        </div>
        <div class="sk-hero-info">
            <h2>Sangguniang Kabataan</h2>
            <p>Barangay Balintawak &nbsp;·&nbsp; Youth Affairs Management System</p>
        </div>
        <div class="sk-hero-right">
            <div class="sk-year-pill">📅 {{ $currentYear }}</div>
            <div class="sk-live-dot"><span></span> System Active</div>
        </div>
    </div>

    <div class="row g-3">

        {{-- ── YOUTH OVERVIEW ─────────────────────────────────── --}}
        <div class="col-12">
            <div class="sk-sec-head">
                <span>Youth Overview</span>
                <div class="line"></div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="sk-card green-card">
                <div class="sk-card-inner">
                    <div>
                        <div class="sk-card-label">Total Kabataan</div>
                        <div class="sk-card-number" data-count="{{ $stats->totalkabataan }}">0</div>
                    </div>
                    <div class="sk-card-icon-wrap"><i class="fas fa-users"></i></div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="sk-card green-card">
                <div class="sk-card-inner">
                    <div>
                        <div class="sk-card-label">Registered Voter</div>
                        <div class="sk-card-number" data-count="{{ $stats->registerVoter }}">0</div>
                    </div>
                    <div class="sk-card-icon-wrap"><i class="fas fa-id-card"></i></div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="sk-card red-card">
                <div class="sk-card-inner">
                    <div>
                        <div class="sk-card-label">Early Parenthood</div>
                        <div class="sk-card-number" data-count="{{ $stats->earlypregnancy }}">0</div>
                    </div>
                    <div class="sk-card-icon-wrap"><i class="fas fa-baby-carriage"></i></div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="sk-card amber-card">
                <div class="sk-card-inner">
                    <div>
                        <div class="sk-card-label">Upcoming Events</div>
                        <div class="sk-card-number" data-count="{{ $upcomingevent }}">0</div>
                    </div>
                    <div class="sk-card-icon-wrap"><i class="fas fa-calendar-alt"></i></div>
                </div>
            </div>
        </div>

        {{-- ── YOUTH CLASSIFICATION ────────────────────────────── --}}
        <div class="col-12 mt-2">
            <div class="sk-sec-head">
                <span>Youth Classification</span>
                <div class="line"></div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="sk-card green-card">
                <div class="sk-card-inner">
                    <div>
                        <div class="sk-card-label">Unemployed Youth</div>
                        <div class="sk-card-number" data-count="{{ $stats->unemployed }}">0</div>
                    </div>
                    <div class="sk-card-icon-wrap"><i class="fas fa-book-reader"></i></div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="sk-card green-card">
                <div class="sk-card-inner">
                    <div>
                        <div class="sk-card-label">Employed Youth</div>
                        <div class="sk-card-number" data-count="{{ $stats->employed }}">0</div>
                    </div>
                    <div class="sk-card-icon-wrap"><i class="fas fa-briefcase"></i></div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="sk-card red-card">
                <div class="sk-card-inner">
                    <div>
                        <div class="sk-card-label">PWD Kabataan</div>
                        <div class="sk-card-number" data-count="{{ $stats->pwdkabataan }}">0</div>
                    </div>
                    <div class="sk-card-icon-wrap"><i class="fas fa-wheelchair"></i></div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="sk-card amber-card">
                <div class="sk-card-inner">
                    <div>
                        <div class="sk-card-label">System User</div>
                        <div class="sk-card-number" data-count="1">0</div>
                    </div>
                    <div class="sk-card-icon-wrap"><i class="fas fa-graduation-cap"></i></div>
                </div>
            </div>
        </div>

        {{-- ── ANALYTICS ───────────────────────────────────────── --}}
        <div class="col-12 mt-2">
            <div class="sk-sec-head">
                <span>Analytics</span>
                <div class="line"></div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="sk-chart-card">
                <div class="sk-chart-top">
                    <div>
                        <h5>Youth Classification Trend</h5>
                        <p>Yearly growth of Employed, Unemployed, Early Pregnancy &amp; PWD youth</p>
                    </div>
                    <div class="sk-chart-badge">{{ \Carbon\Carbon::now()->format('Y') }}</div>
                </div>
                <div class="sk-chart-body">
                    <div id="lineChart"></div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="sk-chart-card">
                <div class="sk-chart-top">
                    <div>
                        <h5>Kabataan per Purok</h5>
                        <p>Distribution across Purok 1–7</p>
                    </div>
                    <div class="sk-chart-badge">{{ \Carbon\Carbon::now()->format('Y') }}</div>
                </div>
                <div class="sk-chart-body">
                    <div id="pieChart"></div>
                </div>
            </div>
        </div>

    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", () => {


    document.querySelectorAll('[data-count]').forEach(el => {
        const target = parseInt(el.dataset.count) || 0;
        if (target === 0) { el.textContent = '0'; return; }
        let start = 0;
        const step = Math.ceil(target / 40);
        const timer = setInterval(() => {
            start += step;
            if (start >= target) { el.textContent = target; clearInterval(timer); }
            else el.textContent = start;
        }, 30);
    });

    /* ── Light chart palette ─────────────────────────────────── */
    const chartDefaults = {
        theme: { mode: 'light' },
        chart: { background: 'transparent', fontFamily: 'DM Sans, sans-serif' },
        grid: { borderColor: '#e8ede9', strokeDashArray: 4 },
    };

    /* ── Line / Area Chart ──────────────────────────────────── */
    const trend = {
        years:   @json($years),
        Unemployed: @json($unemployedData),
        Employed: @json($employedData),
        EP:     @json($epData),
        PWD:    @json($pwdData),
    };

    new ApexCharts(document.querySelector("#lineChart"), {
        ...chartDefaults,
        series: [
            { name: 'Unemployed',       data: trend.Unemployed },
            { name: 'Employed', data: trend.Employed },
            { name: 'EP',           data: trend.EP     },
            { name: 'PWD',           data: trend.PWD     },
        ],
        chart: { ...chartDefaults.chart, height: 300, type: 'area', toolbar: { show: false }, zoom: { enabled: false } },
        colors: ['#00331a', '#00a651', '#dc3545', '#e67e00'],
        stroke: { curve: 'smooth', width: 2.5 },
        fill: {
            type: 'gradient',
            gradient: { shadeIntensity: 1, opacityFrom: 0.18, opacityTo: 0.01, stops: [0, 95] }
        },
        markers: { size: 4, hover: { size: 6 } },
        xaxis: {
            categories: trend.years,
            labels: { style: { colors: '#6b7a6e', fontSize: '12px' } },
            axisBorder: { show: false }, axisTicks: { show: false }
        },
        yaxis: {
            min: 0,
            labels: { style: { colors: '#6b7a6e', fontSize: '12px' } }
        },
        legend: { position: 'top', horizontalAlign: 'right', labels: { colors: '#4b5563' } },
        tooltip: { theme: 'light', shared: true, intersect: false, y: { formatter: v => v + ' Kabataan' } },
    }).render();

    const kabataanPerPurok = @json($kabataanPerPurok);
    const purokData = kabataanPerPurok;
    const labels = Object.keys(purokData); 
    const counts = Object.values(purokData);

    new ApexCharts(document.querySelector("#pieChart"), {
        ...chartDefaults,
        series: counts,
        chart: { ...chartDefaults.chart, height: 300, type: 'donut' },
        labels: labels,
        colors: ['#00331a','#006633','#00a651','#4ade80','#e67e00','#dc3545','#6b7a6e'],
        legend: { position: 'bottom', fontSize: '11px', labels: { colors: '#4b5563' } },
        plotOptions: {
            pie: {
                donut: {
                    size: '65%',
                    labels: {
                        show: true,
                        total: {
                            show: true, label: 'Total',
                            fontSize: '13px', fontWeight: 700,
                            color: '#00331a',
                            formatter: w => w.globals.seriesTotals.reduce((a,b) => a+b, 0)
                        }
                    }
                }
            }
        },
        stroke: { width: 2, colors: ['#f8fafb'] },
        tooltip: { theme: 'light', y: { formatter: v => v + ' Kabataan' } },
        dataLabels: { enabled: false },
    }).render();

});
</script>

@endsection