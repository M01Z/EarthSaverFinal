<!DOCTYPE html>
<html>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Blinker&display=swap">
    <style>
        label{
            display: block; color: #000000; font-family: 'Blinker', sans-serif;
        }
        input{
            style=display: block; color: #000000; font-family: 'Blinker', sans-serif; width: 100%;
        }
        option{
            style=display: block; color: #000000; font-family: 'Blinker', sans-serif;
        }
    </style>
    <head>
        <meta charset=utf-8>
        <title>Update Product</title>
    </head>
    <body>
        <div class="w3-bar w3-black">
            <div class="w3-bar-item w3-center">
                <img src="{{ asset('images/earth.png') }}" style="height: 40px; width: auto;">
                <span style="font-family: 'Blinker', sans-serif; color: white;">CECSS</span>
            </div>
            <div class="w3-bar-item w3-center">
                <a href="{{ url('navigateVendorHome') }}" class="w3-bar-item w3-button w3-hover-green" style=" color: #ACDF87; font-family: 'Blinker', sans-serif;">Home</a>
                <a href="{{ url('navigateVendorHome') }}" class="w3-bar-item w3-button  w3-hover-green" style=" color: #ACDF87; font-family: 'Blinker', sans-serif;">About</a>
                <a href="{{ url('logout') }}" class="w3-bar-item w3-button w3-hover-green" style=" color: #ACDF87; font-family: 'Blinker', sans-serif;">Log Out</a>
            </div>
        </div>
        <div class="w3-container">
            <h1 style="color: #000000; font-family: 'Blinker', sans-serif;">Update Product</h1>
            <form method="post" action="{{ url('product/' . $product[0]->id)}}" style="max-width: 500px;">
        @csrf
        @method('PUT')
        <div>
            <label><b>Product Name</b></label>
            @if (isset($product[0]))
                @if(isset($product[0]->name))
                    <input type="text"  style="display: block; color: #000000; font-family: 'Blinker', sans-serif; width: 100%;" class="w3-input w3-border"  name="name" value="{{$product[0]->name}}">
                @else
                    <input type="text"  style="display: block; color: #000000; font-family: 'Blinker', sans-serif; width: 100%;" class="w3-input w3-border"  name="name">
                @endif
            @endif
        </div>
        <div>
            <label><b>Carbon Emission</b></label>
            @if (isset($product[0]))
                @if(isset($product[0]->carbon_emission))
                    <input type="text"  style="display: block; color: #000000; font-family: 'Blinker', sans-serif; width: 100%;" class="w3-input w3-border"  name="ce" value="{{$product[0]->carbon_emission}}">
                @else
                    <input type="text"  style="display: block; color: #000000; font-family: 'Blinker', sans-serif; width: 100%;" class="w3-input w3-border"  name="ce">
                @endif
            @endif
        </div>
        <div>
            <label><b>Discount (CE Member)</b></label>
            @if (isset($product[0]))
                @if(isset($product[0]->discount1))
                    <input type="text"  style="display: block; color: #000000; font-family: 'Blinker', sans-serif; width: 100%;" class="w3-input w3-border"  name="discount1" value="{{$product[0]->discount1}}">
                @else
                    <input type="text"  style="display: block; color: #000000; font-family: 'Blinker', sans-serif; width: 100%;" class="w3-input w3-border"  name="discount1">
                @endif
            @endif
        </div>
        <div>
            <label><b>Discount (Donate Earth Saver)</b></label>
            @if (isset($product[0]))
                @if(isset($product[0]->discount2))
                    <input type="text"  style="display: block; color: #000000; font-family: 'Blinker', sans-serif; width: 100%;" class="w3-input w3-border"  name="discount2" value="{{$product[0]->discount2}}">
                @else
                    <input type="text"  style="display: block; color: #000000; font-family: 'Blinker', sans-serif; width: 100%;" class="w3-input w3-border"  name="discount2">
                @endif
            @endif
        </div>
        <div>
            <label><b>Discount (Use Earth Saver)</b></label>
            @if (isset($product[0]))
                @if(isset($product[0]->discount3))
                    <input type="text"  style="display: block; color: #000000; font-family: 'Blinker', sans-serif; width: 100%;" class="w3-input w3-border"  name="discount3" value="{{$product[0]->discount3}}">
                @else
                    <input type="text"  style="display: block; color: #000000; font-family: 'Blinker', sans-serif; width: 100%;" class="w3-input w3-border"  name="discount3">
                @endif
            @endif
        </div>
        <div>
            <label><b>Product Category:</b></label>
                <select class="w3-select w3-border" name="productCategory">
                    @if (isset($productCategory))
                    <ul class="w3-ul w3-card">
                        @foreach ($productCategory as $item)
                        <option value="{{ $item->id }}">{{$item->name}}</option>
                        @endforeach
                    </ul>
                    @else
                    <p>None</p>
                    @endif
                </select>
        </div>
        <br>
        <div>
            <button type="submit" class="w3-button" style="background-color: #ACDF87; color: #000000; font-family: 'Blinker', sans-serif; width: 50%;">Save</button>
        </div> 
        </form>
        @error('error')
            <div class="error" style="color: red;">{{ $message }}</div>
        @enderror
        </div>
    </body>



</html>