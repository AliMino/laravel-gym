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
    <canvas id="myChart" width="400" height="400"></canvas>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <script>
        const chart = document.getElementById("myChart");
        let lineChart = new Chart(chart, {
            type: 'line',
            data: {
    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
    datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3],
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
        })

    </script>
    
@endsection