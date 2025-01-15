@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Welcome, {{ Auth::user()->name }} </h1>
        <p>Manage everything in the Assetra.</p>

        <div class="row">
            <!-- Card 1: Total Assets -->
            <div class="col-md-4">
                <div class="card text-white bg-primary shadow">
                    <div class="card-body d-flex align-items-center">
                        <i class="fas fa-boxes fa-3x me-3"></i>
                        <div>
                            <h3 class="mb-0">{{ $totalAssets }}</h3>
                            <p class="mb-0">Total Assets</p>
                        </div>
                    </div>
                    <div class="card-footer text-white d-flex justify-content-between align-items-center">
                        <a href="#" class="text-white text-decoration-none">View Details</a>
                        <i class="fas fa-arrow-circle-right"></i>
                    </div>
                </div>
            </div>

            <!-- Card 2: Categories -->
            <div class="col-md-4">
                <div class="card text-white bg-success shadow">
                    <div class="card-body d-flex align-items-center">
                        <i class="fas fa-tags fa-3x me-3"></i>
                        <div>
                            <h3 class="mb-0">{{ $totalCategories }}</h3>
                            <p class="mb-0">Categories</p>
                        </div>
                    </div>
                    <div class="card-footer text-white d-flex justify-content-between align-items-center">
                        <a href="#" class="text-white text-decoration-none">View Details</a>
                        <i class="fas fa-arrow-circle-right"></i>
                    </div>
                </div>
            </div>

            <!-- Card 3: Issues Reported -->
            <div class="col-md-4">
                <div class="card text-white bg-warning shadow">
                    <div class="card-body d-flex align-items-center">
                        <i class="fas fa-server fa-3x me-3"></i>
                        <div>
                            <h3 class="mb-0">3</h3>
                            {{-- <h3 class="mb-0">{{ $issuesReported }}</h3> --}}
                            <p class="mb-0">Total Software</p>
                        </div>
                    </div>
                    <div class="card-footer text-white d-flex justify-content-between align-items-center">
                        <a href="#" class="text-white text-decoration-none">View Details</a>
                        <i class="fas fa-arrow-circle-right"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Row for Pie and Bar Chart -->
        <div class="row mt-4">
            <!-- Pie Chart -->
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header">
                        <h5>Total Assets and Categories</h5>
                    </div>
                    <div class="card-body">
                        <!-- Adjust width and height for smaller size -->
                        <canvas id="pieChart" width="300" height="300"></canvas>
                    </div>
                </div>
            </div>


            <!-- Bar Chart -->
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header">
                        <h5>Total Assets per Category</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="barChart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.js"></script>

    <script>
        // Pie chart data (Total Assets vs Total Categories)
        const pieLabels = @json($pieLabels);
        const pieData = @json($pieData);

        const ctxPie = document.getElementById('pieChart').getContext('2d');
        const pieChart = new Chart(ctxPie, {
            type: 'pie',
            data: {
                labels: pieLabels,
                datasets: [{
                    data: pieData,
                    backgroundColor: ['rgba(54, 162, 235, 0.2)', 'rgba(255, 159, 64, 0.2)'],
                    borderColor: ['rgba(54, 162, 235, 1)', 'rgba(255, 159, 64, 1)'],
                    borderWidth: 1
                }]
            }
        });

        // Bar chart data (Total Assets per Category)
        const barLabels = @json($barLabels); // Now this contains category names
        const barData = @json($barData);

        const ctxBar = document.getElementById('barChart').getContext('2d');
        const barChart = new Chart(ctxBar, {
            type: 'bar',
            data: {
                labels: barLabels,
                datasets: [{
                    label: 'Total Assets',
                    data: barData,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
