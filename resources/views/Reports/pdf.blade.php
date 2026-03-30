<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 11px; color: #1a1a2e; }
        h2   { margin: 0 0 2px; font-size: 16px; }
        .sub { color: #666; font-size: 10px; margin-bottom: 16px; }
        table { width: 100%; border-collapse: collapse; }
        th { background: #1a1a2e; color: #fff; padding: 7px 10px; text-align: left; font-size: 10px; text-transform: uppercase; letter-spacing: .5px; }
        td { padding: 6px 10px; border-bottom: 1px solid #f0f0f0; }
        tr:nth-child(even) td { background: #f9f9f9; }
        .badge { padding: 2px 7px; border-radius: 10px; font-size: 9px; }
        .yes  { background: #d1fae5; color: #065f46; }
        .no   { background: #f3f4f6; color: #6b7280; }
        .male { background: #dbeafe; color: #1e40af; }
        .female { background: #fce7f3; color: #9d174d; }
        .footer { margin-top: 20px; color: #aaa; font-size: 9px; text-align: right; }
    </style>
</head>
<body>
    <h2>Kabataan Report</h2>
    <p class="sub">Generated: {{ now('Asia/Manila')->format('F d, Y h:i A') }} · Total records: {{ $kabataan->count() }}</p>

    <table>
        <thead>
            <tr>
                <th>#</th><th>Full Name</th><th>Age</th><th>Gender</th>
                <th>Purok</th><th>Voter</th><th>PWD</th><th>Employment</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kabataan as $i => $data)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $data->lastname }}, {{ $data->firstname }} {{ $data->middlename }}</td>
                <td>{{ $data->age }}</td>
                <td><span class="badge {{ $data->gender === 'Male' ? 'male' : 'female' }}">{{ $data->gender }}</span></td>
                <td>{{ $data->purok }}</td>
                <td><span class="badge {{ $data->isvoters ? 'yes' : 'no' }}">{{ $data->isvoters ? 'Yes' : 'No' }}</span></td>
                <td><span class="badge {{ $data->ispwd ? 'yes' : 'no' }}">{{ $data->ispwd ? 'Yes' : 'No' }}</span></td>
                <td>{{ $data->education_background }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <p class="footer">SK Kabataan Information System · Confidential</p>
</body>
</html>