@extends('layouts.master')

@section('content')

<section class="section dashboard">
    <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
            <div class="row">

                <!-- Total Employees Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people"></i> <!-- Icon for Total Employees -->
                                </div>
                                <div class="ps-3">
                                    <h5 class="card-title">Total Employees</h5>
                                    <h6>{{ $totalEmployees }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Records Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card revenue-card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-folder"></i> <!-- Icon for Total Records -->
                                </div>
                                <div class="ps-3">
                                    <h5 class="card-title">Total Records</h5>
                                    <h6>{{ $totalRecords }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Upcoming Birthdays -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Upcoming Birthdays</h5>
                            <div class="activity">
                                @foreach($upcomingBirthdays as $birthday)
                                <div class="activity-item d-flex">
                                    <div class="activite-label">{{ $birthday->birth_date->format('M d') }}</div>
                                    <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                                    <div class="activity-content">
                                        {{ $birthday->full_name }}
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Sales -->
                <div class="col-12">
                    <div class="card recent-sales overflow-auto">
                        <div class="card-body">
                            <h5 class="card-title">Recent Employee Data</h5>
                            <table class="table table-borderless datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">No KTP</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Jabatan</th>
                                        <th scope="col">Masa Kerja</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($employees as $index => $employee)
                                    <tr>
                                        <th scope="row"><a href="#">{{ $employee->id_number }}</a></th>
                                        <td>{{ $employee->full_name }}</td>
                                        <td>{{ $employee->position }}</td>
                                        <td>{{ $employee->work_time }}</td>
                                        <td><span class="badge bg-success">Active</span></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Right side columns -->
        <div class="col-lg-4">
<!-- 
             Recent Activity -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Recent Activity</h5>
                    <div class="activity">
                        @foreach($recentActivity as $activity)
                        <div class="activity-item d-flex">
                            <div class="activite-label">{{ $activity->offense_date }}</div>
                            <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                            <div class="activity-content">
                                {{ $activity->offense_type }}
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div> 

            <!-- Budget Report -->
             <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Budget Report</h5>
                    <div id="budgetChart" style="min-height: 400px;" class="echart"></div>
                    <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            var budgetChart = echarts.init(document.querySelector("#budgetChart")).setOption({
                                legend: {
                                    data: ['Allocated Budget', 'Actual Spending']
                                },
                                radar: {
                                    indicator: [{
                                            name: 'Sales',
                                            max: 6500
                                        },
                                        {
                                            name: 'Administration',
                                            max: 16000
                                        },
                                        {
                                            name: 'IT',
                                            max: 30000
                                        },
                                        {
                                            name: 'Customer Support',
                                            max: 38000
                                        },
                                        {
                                            name: 'Development',
                                            max: 52000
                                        },
                                        {
                                            name: 'Marketing',
                                            max: 25000
                                        }
                                    ]
                                },
                                series: [{
                                    name: 'Budget vs spending',
                                    type: 'radar',
                                    data: [{
                                            value: [4200, 3000, 20000, 35000, 50000, 18000],
                                            name: 'Allocated Budget'
                                        },
                                        {
                                            value: [5000, 14000, 28000, 26000, 42000, 21000],
                                            name: 'Actual Spending'
                                        }
                                    ]
                                }]
                            });
                        });
                    </script>
                </div>
            </div> 

        </div>

    </div>
</section>

@endsection