<!DOCTYPE html>
<html>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Blinker&display=swap">

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

        /* Styling for buttons */
        button {
            background-color: #ACDF87; /* Button background color */
            color: #000000; /* Button text color */
            border: none;
            width: 100px;
            padding: 8px 16px;
            cursor: pointer;
            border-radius: 4px;
        }

        button:hover {
            background-color: #8AC281; /* Button hover color */
        }
        
    </style>
    <head>
        <meta charset=utf-8>
        <title>View Products Vendor</title>
    </head>
    <body>
        <div class="w3-bar w3-black">
            <div class="w3-bar-item w3-center">
                <img src="{{ asset('images/earth.png') }}" style="height: 40px; width: auto;">
                <span style="font-family: 'Blinker', sans-serif; color: white;">CECSS</span>
            </div>
            <div class="w3-bar-item w3-center">
                <a href="{{ url('navigateVendorHome') }}" class="w3-bar-item w3-button w3-hover-green" style="color: #ACDF87; font-family: 'Blinker', sans-serif;">Home</a>
                <a href="{{ url('navigateAbout') }}" class="w3-bar-item w3-button  w3-hover-green" style="color: #ACDF87; font-family: 'Blinker', sans-serif;">About</a>
                <a href="{{ url('logout') }}" class="w3-bar-item w3-button w3-hover-green" style="color: #ACDF87; font-family: 'Blinker', sans-serif;">Log Out</a>
            </div>
        </div>

        <div class="w3-container">
            <h1 style="color: #000000; font-family: 'Blinker', sans-serif;">View Products</h1>
            <form method="get" action="{{ url('product/'. session('userId'))}}" style="max-width: 500px;">
            @csrf
            @method('GET')
                <div>
                    <label style="display: block; color: #000000; font-family: 'Blinker', sans-serif;"><b>Product Category:</b></label>
                        <select class="w3-select w3-border" name="productCategory">
                            @if ($productCategory)
                            <ul class="w3-ul w3-card">
                                @foreach ($productCategory as $item)
                                <option value="{{ $item->id }}" style="display: block; color: #000000; font-family: 'Blinker', sans-serif;">{{$item->name}}</option>
                                @endforeach
                            </ul>
                            @else
                            <p>None</p>
                            @endif
                        </select>
                </div>
                <div>
                <label style="display: block; color: #000000; font-family: 'Blinker', sans-serif;"><b>Or</b></label>
                <label style="display: block; color: #000000; font-family: 'Blinker', sans-serif;"><b>Search by Name</b></label>
                <input style="display: block; color: #000000; font-family: 'Blinker', sans-serif; width: 100%;" 
                type="text"  class="w3-input w3-border"  name="name" value = "{{old('name')}}">
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
        </div>


        <div class="w3-container">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Carbon Emission</th>
                        <th>Discount CE Member (%)</th>
                        <th>Discount DonateEarthSaver (%)</th>
                        <th>Discount UseEarthSave (%)</th>
                        <th>Actions</th> <!-- Added header for actions -->
                    </tr>
                </thead>
                <tbody>
                    @if (isset($products))
                    @foreach($products as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->carbon_emission }}</td>
                        <td>{{ $product->discount1 }}</td>
                        <td>{{ $product->discount2 }}</td>
                        <td>{{ $product->discount3 }}</td>
                        <td>
                            <form method="GET" action="{{ url('updateProductVendor/' . $product->id) }}" style="display: inline;">
                                @csrf
                                <button type="submit">Update</button>
                            </form>
                            <form method="POST" action="{{ route('product.destroy', ['product' => $product->id]) }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button style="background-color: #ff4747" type="submit" onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                            </form>
                        </td>
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


    <div>
    </body>
</html>