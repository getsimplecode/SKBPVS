@extends('layouts.mainlayout')
@section('content')
    @include('Reports.printformat')

    <div class="container-fluid">
        <nav class="navbar shadow rounded bg-light px-4">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <a class="navbar-brand fw-bold fs-4">📊 Reports Records</a>
                <button data-bs-toggle="modal" data-bs-target="#wideModal"
                    class="btn btn-sm bg-secondary text-white shadow px-4 py-2">
                    <label for="filter" class="form-label fw-semibold mb-0"><i class="fas fa-print"></i> Print | Selection</label>
                </button>
            </div>
        </nav>

        <div class="mt-2">
            <table class="table">
                <thead>
                    <th>Fullname</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>purok</th>
                </thead>
                <tbody>
                    @foreach ($kabataan as $data)
                        <tr>
                            <td>{{ $data->firstname }} {{ $data->middlename }} {{ $data->lastname }}</td>
                            <td>{{ $data->age }}</td>
                            @if ($data->gender == 'Male')
                                <td class="text-primary">{{ $data->gender }}</td>
                            @else
                                <td style="color: rgb(255, 0, 149)">{{ $data->gender }}</td>
                            @endif
                            <td>{{ $data->purok }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
