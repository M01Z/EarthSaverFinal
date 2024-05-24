<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Blinker&display=swap">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <style>
        /* Custom CSS for table */
        table {
            width: 100%;
            border-collapse: collapse;
            border: 2px solid #ddd; /* Outline color */
        }

        th, td {
            border: 1px solid #ddd; /* Cell borders */
            padding: 4px;
            text-align: left;
            color: #000000; font-family: 'Blinker', sans-serif;
        }

        th {
            background-color: #f2f2f2; /* Header background color */
        }
        /* Pagination styles */
        .pagination {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
            font-family: 'Blinker', sans-serif;
        }

        .pagination ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .pagination li {
            display: inline;
            margin: 0 5px;
        }

        .pagination a {
            color: black;
            padding: 8px 16px;
            text-decoration: none;
            border: 1px solid #ddd;
            background-color: #f2f2f2;
            transition: background-color 0.3s;
        }

        .pagination a.active {
            background-color: #4CAF50;
            color: white;
            border: 1px solid #4CAF50;
        }

        .pagination a:hover:not(.active) {
            background-color: #ddd;
        }

        canvas {
            display: block;
            margin: auto;
            max-width: 800px;
            margin-top: 20px;
        }
    </style>

    <head>
        <meta charset=utf-8>
        <title>Flights</title>
    </head>

    <section>
        <div class="w3-bar w3-black">
            <div class="w3-bar-item w3-center">
                <img src="{{ asset('images/earth.png') }}" style="height: 40px; width: auto;">
                <span style="font-family: 'Blinker', sans-serif; color: white;">CECSS</span>
            </div>
            <div class="w3-bar-item w3-center">
                <a href="{{ url('userSelectCategory') }}" class="w3-bar-item w3-button  w3-hover-green" style="color: #ACDF87; font-family: 'Blinker', sans-serif;">Home</a>
            </div>
            <div class="w3-bar-item w3-center">
                <a href="{{ url('navigateAbout') }}" class="w3-bar-item w3-button  w3-hover-green" style="color: #ACDF87; font-family: 'Blinker', sans-serif;">About</a>
            </div>
        </div>
        <div class="w3-container">
            <h1 style="color: #000000; font-family: 'Blinker', sans-serif;">View Flights</h1>
            <form method="get" action="{{ url('userFlight/1')}}" style="max-width: 500px;">
                @csrf
                @method('GET')  
                <div style="display: flex; gap: 10px;">
                    <div style="flex: 1;">
                        <label style="display: block; color: #000000; font-family: 'Blinker', sans-serif;"><b>Departure</b></label>
                        <input style="display: block; color: #000000; font-family: 'Blinker', sans-serif; width: 100%;" 
                        type="text" class="w3-input w3-border" name="departure" value="{{old('departure')}}">
                    </div>
                    <div style="flex: 1;">
                        <label style="display: block; color: #000000; font-family: 'Blinker', sans-serif;"><b>Destination</b></label>
                        <input style="display: block; color: #000000; font-family: 'Blinker', sans-serif; width: 100%;" 
                        type="text" class="w3-input w3-border" name="destination" value="{{old('destination')}}">
                    </div>
                </div>
                <br>
                <div>
                    <button type="submit" class="w3-button"  style="background-color: #ACDF87; color: #000000; font-family: 'Blinker', sans-serif; width: 50%;">Search</button>
                </div> 
                @error('error')
                    <div class="error" style="color: red;">{{ $message }}</div>
                @enderror
                <br><br>
            </form>
            <table>
                <thead>
                    <tr>
                        <th>Rank</th>
                        <th>Departure</th>
                        <th>Destination</th>
                        <th>Vendor</th>
                        <th>Carbon Emission (g per unit)</th>
                        <th>Discount CE Member (%)</th>
                        <th>Discount DonateEarthSaver (%)</th>
                        <th>Discount UseEarthSave (%)</th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($flights))
                    @foreach($flights as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $product->departure }}</td>
                        <td>{{ $product->destination }}</td>
                        <td><b><a href="{{ url('userViewVendors/'. $product->vendor) }}" class="w3-bar-item w3-button  w3-hover-green">{{ $product->vendor }}</a></b></td>
                        <td>{{ $product->carbon_emission }}</td>
                        <td>{{ $product->discount1 }}</td>
                        <td>{{ $product->discount2 }}</td>
                        <td>{{ $product->discount3 }}</td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="7">Nothing to display</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    <section>

    <div class="w3-container">
        <div class="pagination">
            <span>
                Showing {{ $flights->firstItem() }} - {{ $flights->lastItem() }} of {{ $flights->total() }} results
            </span>
            <ul>
            @if ($flights->previousPageUrl())
                <li><a href="{{ $flights->previousPageUrl() }}">Previous</a></li>
            @endif

            @if ($flights->nextPageUrl())
            <li><a href="{{ $flights->nextPageUrl() }}">Next</a></li>
            @endif
            </ul>
        </div>
    </div>

    <canvas id="myChart" width="800" height="400"></canvas>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [
                        @foreach($flights as $product)
                            "Rank {{ $loop->iteration }} - {{ $product->vendor }}",
                        @endforeach
                    ],
                    datasets: [{
                        label: 'Carbon Emission',
                        data: [
                            @foreach($flights as $product)
                                {{ $product->carbon_emission }},
                            @endforeach
                        ],
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
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
        });
    </script>
</html>