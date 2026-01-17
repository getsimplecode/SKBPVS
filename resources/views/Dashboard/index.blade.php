@extends('Layouts.mainlayout')
@section('content')

<div class="container-fluid">
    <div class="row g-3">
        <!-- Total Kabataan -->
        <div class="col-md-3">
            <div class="p-4 bg-white border border-success text-white rounded shadow">
                <h4 class="text-start" style="color: rgb(10, 39, 10)">
                    <strong>Total Kabataan</strong>
                </h4>
                <div class="d-flex align-items-center justify-content-between mt-3">
                    <i class="fas fa-children fa-2x" style="color: rgb(67, 67, 67);"></i>
                    <h5 class="mb-0 text-success"><strong>{{$totalkabataan}}</strong></h5>
                </div>
            </div>
        </div>

        <!-- Registered Voters -->
        <div class="col-md-3">
            <div class="p-4 bg-white border border-success text-white rounded shadow">
                <h4 class="text-start" style="color: rgb(10, 39, 10)">
                    <strong>Registered Voters</strong>
                </h4>
                <div class="d-flex align-items-center justify-content-between mt-3">
                    <i class="fas fa-id-card fa-2x" style="color: rgb(67, 67, 67);"></i>
                    <h5 class="mb-0 text-success"><strong>{{$registervoters}}</strong></h5>
                </div>
            </div>
        </div>

        <!-- Early Parenthood -->
        <div class="col-md-3">
            <div class="p-4 bg-white border border-success text-white rounded shadow">
                <h4 class="text-start" style="color: rgb(10, 39, 10)">
                    <strong>Early Parenthood</strong>
                </h4>
                <div class="d-flex align-items-center justify-content-between mt-3">
                    <i class="fas fa-baby-carriage fa-2x" style="color: rgb(67, 67, 67);"></i>
                    <h5 class="mb-0 text-success"><strong>{{$earlypregnancy}}</strong></h5>
                </div>
            </div>
        </div>

        <!-- Upcoming Events -->
        <div class="col-md-3">
            <div class="p-4 bg-white border border-success text-white rounded shadow">
                <h4 class="text-start" style="color: rgb(10, 39, 10)">
                    <strong>Upcoming Events</strong>
                </h4>
                <div class="d-flex align-items-center justify-content-between mt-3">
                    <i class="fas fa-calendar-alt fa-2x" style="color: rgb(67, 67, 67);"></i>
                    <h5 class="mb-0 text-success"><strong>{{$upcomingevent}}</strong></h5>
                </div>
            </div>
        </div>

                <!-- Early Parenthood -->
        <div class="col-md-3">
            <div class="p-4 bg-white border border-success text-white rounded shadow">
                <h4 class="text-start" style="color: rgb(10, 39, 10)">
                    <strong>Early Parenthood</strong>
                </h4>
                <div class="d-flex align-items-center justify-content-between mt-3">
                    <i class="fas fa-baby-carriage fa-2x" style="color: rgb(67, 67, 67);"></i>
                    <h5 class="mb-0 text-success"><strong>{{$earlypregnancy}}</strong></h5>
                </div>
            </div>
        </div>
                <!-- Early Parenthood -->
        <div class="col-md-3">
            <div class="p-4 bg-white border border-success text-white rounded shadow">
                <h4 class="text-start" style="color: rgb(10, 39, 10)">
                    <strong>Early Parenthood</strong>
                </h4>
                <div class="d-flex align-items-center justify-content-between mt-3">
                    <i class="fas fa-baby-carriage fa-2x" style="color: rgb(67, 67, 67);"></i>
                    <h5 class="mb-0 text-success"><strong>{{$earlypregnancy}}</strong></h5>
                </div>
            </div>
        </div>
                <!-- Early Parenthood -->
        <div class="col-md-3">
            <div class="p-4 bg-white border border-success text-white rounded shadow">
                <h4 class="text-start" style="color: rgb(10, 39, 10)">
                    <strong>Early Parenthood</strong>
                </h4>
                <div class="d-flex align-items-center justify-content-between mt-3">
                    <i class="fas fa-baby-carriage fa-2x" style="color: rgb(67, 67, 67);"></i>
                    <h5 class="mb-0 text-success"><strong>{{$earlypregnancy}}</strong></h5>
                </div>
            </div>
        </div>
                <!-- Early Parenthood -->
        <div class="col-md-3">
            <div class="p-4 bg-white border border-success text-white rounded shadow">
                <h4 class="text-start" style="color: rgb(10, 39, 10)">
                    <strong>Early Parenthood</strong>
                </h4>
                <div class="d-flex align-items-center justify-content-between mt-3">
                    <i class="fas fa-baby-carriage fa-2x" style="color: rgb(67, 67, 67);"></i>
                    <h5 class="mb-0 text-success"><strong>{{$earlypregnancy}}</strong></h5>
                </div>
            </div>
        </div>

        <!-- Bar Chart -->
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-title text-success">{{$currentYear}}</h5>
                    <canvas id="barChart" style="max-height: 400px;"></canvas>
                </div>
            </div>
        </div>

        
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {

    const allmonths = @json($monthlyAttendance);
        new Chart(document.querySelector('#barChart'), {
            type: 'bar',
            data: {
                labels: [
                    'January', 'February', 'March', 'April', 'May', 'June',
                    'July', 'August', 'September', 'October', 'November', 'December'
                ],
                datasets: [{
                    label: 'Total Kabataan Attended',
                    data: allmonths,
                    backgroundColor: 'rgba(40, 167, 69, 0.2)', // light green
                    borderColor: 'rgba(40, 167, 69, 1)',       // dark green
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'List of Kabataan'
                        }
                    }
                }
            }
        });
    });
</script>

@endsection
