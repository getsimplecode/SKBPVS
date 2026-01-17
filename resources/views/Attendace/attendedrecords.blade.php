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
        <a href="{{ route('attendance.index') }}" id="backbuttonrecords" class="btn btn-sm mb-1 text-success"><i
                class="fas fa-arrow-left"></i> Back</a>

        <div class="row">
            <div class="col-7 shadow" style="background-color: rgb(193, 255, 209)">
                <div class="d-flex justify-content-between align-items-center p-2">
                    <a class="navbar-brand fw-bold fs-4"><strong>List of Attended Records</strong></a>
                    <div class="d-flex text-end">
                        <form method="GET" action="{{ route('attendance.attendedrecords') }}">
                            <select name="filter" class="form-select shadow" onchange="this.form.submit()">
                                <option selected disabled>Filter | Event</option>
                                <option value="all">Show All Records</option>
                                @foreach ($events as $event)
                                    <option value="{{ $event->title }}">{{ $event->title }}</option>
                                @endforeach
                            </select>
                        </form>

                    </div>
                </div>

                <div style="max-height: 530px; overflow-y: auto;" class="table-responsive">
                    <table id="customtabled" class="table table-hover mb-0">
                        <thead class="table-success">
                            <tr>
                                <th>ID</th>
                                <th>Attended Event</th>
                                <th>Fullname</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($attended as $attends)
                                <tr>
                                    <td>{{ $attends->id }}</td>
                                    <td>{{ $attends->event->title }}</td>
                                    <td>{{ $attends->kabataan->firstname }} {{ $attends->kabataan->middlename }} {{ $attends->kabataan->lastname }}</td>
                                    <td class="text-success"><i class="fas fa-check"></i> {{ $attends->status }}</td>
                                    <td class="text-center">
                                        <form action="{{route('attendance.destroyattended',['id' => $attends])}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-sm btn-danger text-white"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted p-3">No records found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                <div class="row"></div>
            </div>
            <div class="col-5">
                <div class="shadow rounded" style="height: 600px; background-color:rgb(233, 246, 229)">
                    <div class="col-12 shadow text-secondary p-3 rounded" style="background-color: rgb(174, 247, 180)">
                        <label for="titlestatistics"><strong>Attendance Statistics</strong> || {{isset($title) ? $title : 'No Selected Event'}} </label>
                    </div>
                    <div class="col-12 p-1 text-danger shadow bg-light"><strong>Total Kabataan: {{$totalkabataan}}</strong></div>
                    <div class="col-12 p-1 text-danger shadow bg-light"><strong>Total Attended: {{($totalkabataan_perevent)}}</strong></div>
                    <div class="col-12 mt-5">
                        <div id="piechart"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <script>
        // Auto-hide success alert after 3 seconds
        setTimeout(function() {
            var alert = document.getElementById('alert-message');
            if (alert) {
                alert.style.transition = "opacity 0.9s ease-out";
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
<script>
   document.addEventListener("DOMContentLoaded", () => {
    const purokdata = {{ json_encode($puroksdata) }}; 

    new ApexCharts(document.querySelector("#piechart"), {
        series: purokdata,
        chart: {
            height: 350,
            type: 'pie',
            toolbar: { show: false }
        },
        labels: ['Purok 1', 'Purok 2', 'Purok 3', 'Purok 4', 'Purok 5', 'Purok 6', 'Purok 7'],
        colors: ['#a7ebb1', '#6d7bfc', '#faee96', '#ff878b', '#f3ff87', '#87f1ff', '#f7c1e0'],
        legend: {
            position: 'bottom',
            horizontalAlign: 'center',
            fontSize: '14px',
            markers: {
                width: 12,
                height: 15
            }
        },
        dataLabels: {
            enabled: true,
            formatter: function (val) {
                return val.toFixed(2) + '%';
            }
        },
        tooltip: {
            y: {
                formatter: function (val) {
                    return val.toFixed(2) + '% Attended';
                }
            }
        }
    }).render();
});

    </script>
    
  
@endsection
