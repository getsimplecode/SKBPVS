@extends('Layouts.mainlayout')
@section('content')
    @include('ManageEvent.addevent')

    <div class="container-fluid">
        <nav class="navbar rounded bg-white border shadow-sm mb-2">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <a class="navbar-brand fw-bold fs-4">History events records</a>
            </div>
        </nav>
        <table class="table table-hover table-responsive">
            <thead>
                <th>Title</th>
                <th>Date</th>
                <th>time</th>
                <th class="text-center">Attended Total</th>
            </thead>
            <tbody>
                @foreach ($events as $event)
                <tr>
                    <td>{{$event->title}}</td>
                    <td>{{$event->date}}</td>
                    <td>{{ \Carbon\Carbon::createFromFormat('H:i:s', $event->time)->format('g:i A') }}</td>
                    @if($event->kabataan_attended_count >= 10)
                    <td class="text-success text-center">{{$event->kabataan_attended_count}}</td>
                    @else
                    <td class="text-danger text-center">{{$event->kabataan_attended_count}}</td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
