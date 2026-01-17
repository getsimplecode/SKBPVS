<!-- Wide Modal -->
<div class="modal fade" id="wideModal" tabindex="-1" aria-labelledby="wideModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <div class="modal-body">
                <div class="mt-3 d-flex justify-content-between flex-wrap gap-2 align-items-center">
                    
                    <!-- Print Button -->
                    <button onclick="printReport()" class="btn btn-sm bg-danger text-white shadow px-4 py-2">
                        <i class="fas fa-print"></i> Print Now
                    </button>

                    <!-- Filter Form -->
                    <form method="GET" action="{{ route('report.index') }}" class="d-flex align-items-center gap-2">
                        <div class="input-group shadow-sm rounded">
                            <label class="input-group-text bg-success text-white fw-bold" for="filterDropdown">
                                Filter By: 
                            </label>
                            <select name="showdata" id="filterDropdown"
                                    class="form-select border-success fw-semibold"
                                    onchange="this.form.submit()">
                                <option value="all" {{ request('showdata') == 'all' ? 'selected' : '' }}>
                                    🔄 Show All
                                </option>
                                <option value="ismalnourished" {{ request('showdata') == 'ismalnourished' ? 'selected' : '' }}>
                                    Malnourished
                                </option>
                                <option value="earlypregnancy" {{ request('showdata') == 'earlypregnancy' ? 'selected' : '' }}>
                                    Early Parenthood
                                </option>
                                <option value="registered_voters" {{ request('showdata') == 'registered_voters' ? 'selected' : '' }}>
                                    Registered Voters
                                </option>
                            </select>
                        </div>
                    </form>
                </div>

                <!-- Printable Area -->
                <div id="print-area" class="mt-4">
                    <div class="text-center mb-4">
                        <h2 class="fw-bold mb-1">Sangguniang Kabataan</h2>
                        <h3 class="fw-semibold mb-1">Barangay Balintawak, Talibon, Bohol</h3>
                        <p class="mb-0">Kabataan Records Report</p>
                        <p class="mb-0">Date Generated: {{ \Carbon\Carbon::now('Asia/Manila')->toFormattedDateString() }}</p>
                        <hr>
                    </div>

                    <!-- Data Table -->
                    <table class="table table-bordered">
                        <thead class="table-dark text-center">
                            <tr>
                                <th>Fullname</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>Purok</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kabataan as $data)
                                <tr>
                                    <td>{{ $data->firstname }} {{ $data->middlename }} {{ $data->lastname }}</td>
                                    <td>{{ $data->age }}</td>
                                    <td class="{{ $data->gender == 'Male' ? 'text-primary' : '' }}"
                                        style="{{ $data->gender != 'Male' ? 'color:rgb(255,0,149)' : '' }}">
                                        {{ $data->gender }}
                                    </td>
                                    <td>{{ $data->purok }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Print Script -->
                <script>
                    function printReport() {
                        const originalContent = document.body.innerHTML;
                        const printContent = document.getElementById('print-area').innerHTML;
                        document.body.innerHTML = printContent;
                        window.print();
                        document.body.innerHTML = originalContent;
                        location.reload();
                    }
                </script>
            </div>
        </div>
    </div>
</div>
