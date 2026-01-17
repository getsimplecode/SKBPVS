@extends('Layouts.mainlayout')

@section('content')
<nav class="navbar rounded bg-white border mb-3">
    <div class="container-fluid">
        <h4 class="mb-0 text-success"><strong>Kabataan Statistics</strong></h4>

        <form class="d-flex" method="GET" action="#">
            <select class="form-select me-2" name="stat_category" style="width: 250px;">
                <option selected disabled>Select Statistic</option>
                <option value="early_pregnancy">Early Pregnancy Cases</option>
                <option value="activity_participation">Activity Participation</option>
                <option value="malnutrition">Malnutrition Cases</option>
                <option value="registered_voters">Registered SK Voters</option>
                <option value="kabataan_per_purok">Kabataan per Purok</option>
                <option value="age_group_distribution">Age Group Distribution</option>
                <option value="educational_status">Educational Status</option>
                <option value="employment_status">Employment Status</option>
                <option value="gender_ratio">Gender Ratio</option>
                <option value="incomplete_documents">Incomplete Documents</option>
            </select>
            <button class="btn btn-success" type="submit">Filter</button>
        </form>
    </div>
</nav>


@endsection