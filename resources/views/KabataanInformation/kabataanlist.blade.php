@extends('Layouts.mainlayout')

@section('content')
    <div class="container-fluid">

        <!-- Label -->
        <nav class="navbar rounded bg-white border mb-1">
            <div class="container-fluid">
                <a class="navbar-brand fw-bold fs-4">List of Kabataan</a>
                <form action="{{ route('kabataaninformation.list') }}" class="d-flex" role="search">
                    <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search" />
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </nav>

        <!-- Table -->
        <div class="card shadow-sm rounded">
            <div class="card-body">
                <div class="table-responsive mt-2">
                    <table id="customtabled" class="table table-bordered table-striped align-middle">
                        <thead class="table-success text-center">
                            <tr>
                                <th style="width: 10%;">K-ID</th>
                                <th style="width: 30%;">FULLNAME</th>
                                <th style="width: 10%;">PUROK</th>
                                <th style="width: 20%;">GENDER</th>
                                <th style="width: 10%;">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($kabataans as $kabataan)
                                <tr>
                                    <td class="text-center">{{ $kabataan->id }}</td>
                                    <td>{{ $kabataan->firstname }} {{ $kabataan->middlename }} {{ $kabataan->lastname }}
                                    </td>
                                    <td class="text-center">{{ $kabataan->purok }}</td>
                                    @if ($kabataan->gender == 'Male')
                                        <td class="text-primary text-center">{{ $kabataan->gender }}</td>
                                    @else
                                        <td class="text-center" style="color: rgb(255, 0, 149)">{{ $kabataan->gender }}</td>
                                    @endif
                                    <td class="text-center">
                                        <a data-bs-toggle="modal" data-bs-target="#viewKabataanModal-{{ $kabataan->id }}"
                                            class="btn btn-sm btn-info text-white">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>

                                @include('KabataanInformation.viewkabataan')
                            @endforeach

                        </tbody>

                    </table>
                    {{ $kabataans->links('pagination::bootstrap-5') }}
                    @if ($kabataans->isEmpty())
                        <div>
                            <h4 class="text-center text-bold text-secondary">No records found <strong
                                    class="text-success">{{ request('search') }}</strong></h4>
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </div>
@endsection
