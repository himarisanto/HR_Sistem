@extends('layouts.master')

@section('content')
<div class="pagetitle">
    <h1>Dashboard</h1>
    <!-- Breadcrumb -->
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-8">
            <div class="row">

                <!-- Employee Search -->
                <div class="col-12">
                    <form method="GET" action="{{ route('dashboard') }}">
                        <div class="input-group mb-3">
                            <input type="text" name="search" class="form-control" placeholder="Search by ID Number or Full Name" value="{{ request('search') }}">
                            <button class="btn btn-primary" type="submit">Search</button>
                        </div>
                    </form>
                </div>

                <!-- Card 1: Employees -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card">
                        <div class="card-body">
                            <h5 class="card-title">Employees</h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-person"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $employeeCount }}</h6>
                                    <span class="text-success small pt-1 fw-bold">Total Employees</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Card 1 -->

                <!-- Card 2: Recent Activities -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card">
                        <div class="card-body">
                            <h5 class="card-title">Recent Activities</h5>
                            <ul class="list-group">
                                @foreach($recentActivities as $activity)
                                    <li class="list-group-item">
                                        {{ $activity->full_name }} - {{ $activity->updated_at->diffForHumans() }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div><!-- End Card 2 -->

                <!-- Additional cards for attendance, performance, department summary, birthdays, etc. -->

            </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">
            <!-- Add more cards or widgets here -->
            <!-- Attendance Summary -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Attendance Summary</h5>
                    <ul class="list-group">
                        @foreach($attendanceSummary as $attendance)
                            <li class="list-group-item">
                                {{ ucfirst($attendance->status) }}: {{ $attendance->total }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Top Performers -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Top Performers</h5>
                    <ul class="list-group">
                        @foreach($topPerformers as $performer)
                            <li class="list-group-item">
                                {{ $performer->employee->full_name }} - {{ $performer->rating }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Department Summary -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Department Summary</h5>
                    <ul class="list-group">
                        @foreach($departmentSummary as $department)
                            <li class="list-group-item">
                                {{ $department->department }}: {{ $department->total }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Upcoming Birthdays -->
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Upcoming Birthdays</h5>
                    <ul class="list-group">
                        @foreach($upcomingBirthdays as $birthday)
                            <li class="list-group-item">
                                {{ $birthday->full_name }} - {{ $birthday->birth_date->format('M d') }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div><!-- End Right side columns -->
    </div>
</section>
@endsection
