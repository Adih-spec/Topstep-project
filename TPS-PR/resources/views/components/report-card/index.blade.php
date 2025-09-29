@extends('components.layouts.app')
@section('pageTitle', 'Student Report Card')

@section('pageContent')
<div class="container report-card p-4 bg-white shadow-lg rounded">

    {{-- School Header --}}
    <div class="text-center border-bottom pb-3 mb-3">
        @if($config->logo_url)
            <img src="{{ asset($config->logo_url) }}" alt="School Logo" height="90" class="mb-2">
        @endif
        <h2 class="fw-bold text-primary">TOPSTEPS ACADEMY</h2>
        <p class="mb-0 fst-italic">Knowledge | Discipline | Excellence</p>
        @if($config->show_school_address)
            <small class="text-muted">123 Academy Road, City, Country</small>
        @endif
    </div>

    {{-- Student Info --}}
    <div class="row mb-4 border rounded p-3 bg-light">
        <div class="col-md-6">
            <p><strong>Name:</strong> {{ $student->name ?? 'John Doe' }}</p>
            <p><strong>Class:</strong> {{ $student->class ?? 'Primary 5' }}</p>
            <p><strong>Admission No:</strong> {{ $student->admission_no ?? 'A102' }}</p>
        </div>
        <div class="col-md-6">
            <p><strong>Term:</strong> Third Term</p>
            <p><strong>Session:</strong> 2024/2025</p>
            <p><strong>Attendance:</strong> 45/50 days</p>
        </div>
    </div>

    {{-- Academic Performance --}}
    <h5 class="mb-2 fw-bold text-decoration-underline">Academic Performance</h5>
    <div class="table-responsive">
        <table class="table table-bordered text-center align-middle table-striped">
            <thead class="table-primary">
                <tr>
                    <th>Subject</th>
                    <th>1st Term</th>
                    <th>2nd Term</th>
                    <th>3rd Term</th>
                    <th>Total</th>
                    <th>Average</th>
                    <th>Grade</th>
                    <th>Teacher</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subjects as $subject)
                    @php
                        $total = $subject['first'] + $subject['second'] + $subject['third'];
                        $average = round($total / 3, 2);
                        $grade = '';
                        foreach($config->grading_scale as $letter => $range) {
                            [$min, $max] = explode('-', $range);
                            if($average >= $min && $average <= $max) {
                                $grade = $letter; break;
                            }
                        }
                    @endphp
                    <tr>
                        <td class="fw-semibold">{{ $subject['name'] }}</td>
                        <td>{{ $subject['first'] }}</td>
                        <td>{{ $subject['second'] }}</td>
                        <td>{{ $subject['third'] }}</td>
                        <td>{{ $total }}</td>
                        <td>{{ $average }}</td>
                        <td class="fw-bold">{{ $grade }}</td>
                        <td>{{ $subject['teacher'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Domains --}}
    <div class="row mt-4 g-3">
        <div class="col-md-4">
            <h6 class="fw-bold">Cognitive Domain</h6>
            <ul class="list-unstyled">
                @foreach($config->cognitive_domain ?? [] as $item)
                    <li>✅ {{ $item }}: Excellent</li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-4">
            <h6 class="fw-bold">Affective Domain</h6>
            <ul class="list-unstyled">
                @foreach($config->affective_domain ?? [] as $item)
                    <li>🌟 {{ $item }}: Good</li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-4">
            <h6 class="fw-bold">Psychomotor Domain</h6>
            <ul class="list-unstyled">
                @foreach($config->psycomotor_domain ?? [] as $item)
                    <li>🎯 {{ $item }}: Very Good</li>
                @endforeach
            </ul>
        </div>
    </div>

    {{-- Comments --}}
    <div class="mt-4 p-3 border rounded bg-light">
        <p><strong>Teacher’s Comment:</strong> Very hardworking and attentive in class.</p>
        <p><strong>Head Teacher’s Comment:</strong> Excellent performance. Keep it up!</p>
    </div>

    {{-- Stamp & Signature --}}
    <div class="row mt-5">
        <div class="col-md-6 text-center">
            <p class="mb-0">______________________</p>
            <small class="fw-bold">Teacher’s Signature</small>
        </div>
        <div class="col-md-6 text-center">
            <p class="mb-0">______________________</p>
            <small class="fw-bold">Head Teacher’s Signature & Stamp</small>
        </div>
    </div>

    {{-- Chart Section --}}
    <div class="mt-5">
        <h6 class="fw-bold text-decoration-underline">Performance Chart</h6>
        <canvas id="performanceChart" height="120"></canvas>
    </div>

</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('performanceChart').getContext('2d');
new Chart(ctx, {
    type: 'bar',
    data: {
        labels: @json(array_column($subjects, 'name')),
        datasets: [{
            label: 'Third Term Scores',
            data: @json(array_column($subjects, 'third')),
            backgroundColor: 'rgba(54, 162, 235, 0.7)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1,
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { display: false }
        },
        scales: {
            y: {
                beginAtZero: true,
                max: 100
            }
        }
    }
});
</script>
@endsection
