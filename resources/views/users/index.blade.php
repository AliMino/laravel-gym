@extends('layouts.base')
@section('content')

    @if(auth()->user())
    <h3>
        Filters
    </h3>
    <span>
        @if(auth()->user()->can('manage cities'))
            <section style="display:inline">
                <label>
                    filter by city
                </label>
                <select id="city-filter" onchange="console.log(document.getElementById('city-filter').value);">
                        <option>0</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                            
                </select>
            </section>
        @endif

        @if(auth()->user()->can('manage gyms'))
            <section style="display:inline">
                <label>
                    filter by gym
                </label>
                
                
                <select id="gym-filter" onchange="console.log(document.getElementById('gym-filter').value);">
                    <option>
                    </option>
                </select>
            </section>
        @endif
    </span>

    {{-- result --}}
    {{-- @if(auth()->user() || !auth()->user()->hasAnyPermission('manage cities|manage city managers')) --}}

    @endif
    <canvas id="myChart0"></canvas>
    <canvas id="myChart1"></canvas>
    <canvas id="myChart2"></canvas>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <script>
        const chart = document.getElementById("myChart0");
        let lineChart = new Chart(chart, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Revenue per month in the last year',
                    data: [7, 1, 3, 5, 2, 3, 8, 7, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        chart.style.width = "800px";
        chart.style.height = "800px";
    </script>

    <script>
        const chart1 = document.getElementById("myChart1");
        let lineChart1 = new Chart(chart1, {
            type: 'pie',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Revenue per month in the last year',
                    data: [7, 1, 3, 5, 2, 3, 8, 7, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        chart.style.width = "800px";
        chart.style.height = "800px";
    </script>

    <script>
        const chart2 = document.getElementById("myChart2");
        let lineChart2 = new Chart(chart2, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Revenue per month in the last year',
                    data: [7, 1, 3, 5, 2, 3, 8, 7, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        chart.style.width = "800px";
        chart.style.height = "800px";
    </script>

    
@endsection