<!DOCTYPE html>
<html>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Blinker&display=swap">

    <head>
        <meta charset=utf-8>
        <title>Create New Flight</title>
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
        <h1 style="color: #000000; font-family: 'Blinker', sans-serif;">Create New Flight Route</h1>
        <form method="post" action="{{ url('flight')}}" style="max-width: 500px;">
        @csrf
        <div>
            <label style="display: block; color: #000000; font-family: 'Blinker', sans-serif;"><b>Departure</b></label>
            <input style="display: block; color: #000000; font-family: 'Blinker', sans-serif; width: 100%;" 
            type="text"  class="w3-input w3-border"  name="departure">
        </div>
        <div>
            <label style="display: block; color: #000000; font-family: 'Blinker', sans-serif;"><b>Destination</b></label>
            <input style="display: block; color: #000000; font-family: 'Blinker', sans-serif; width: 100%;" type="text" 
             class="w3-input w3-border"  name="destination">
        </div>
        <div>
            <label style="display: block; color: #000000; font-family: 'Blinker', sans-serif;"><b>Carbon Emission</b></label>
            <input style="display: block; color: #000000; font-family: 'Blinker', sans-serif; width: 100%;" type="text"  
            class="w3-input w3-border"  name="ce">
        </div>
        <div>
            <label style="display: block; color: #000000; font-family: 'Blinker', sans-serif;"><b>Discount (CE Member)</b></label>
            <input style="display: block; color: #000000; font-family: 'Blinker', sans-serif; width: 100%;" type="text"  
            class="w3-input w3-border"  name="discount1">
        </div>
        <div>
            <label style="display: block; color: #000000; font-family: 'Blinker', sans-serif;"><b>Discount (Donate Earth Saver)</b></label>
            <input style="display: block; color: #000000; font-family: 'Blinker', sans-serif; width: 100%;" type="text"  
            class="w3-input w3-border"  name="discount2">
        </div>
        <div>
            <label style="display: block; color: #000000; font-family: 'Blinker', sans-serif;"><b>Discount (Use Earth Saver)</b></label>
            <input style="display: block; color: #000000; font-family: 'Blinker', sans-serif; width: 100%;" type="text"  
            class="w3-input w3-border"  name="discount3">
        </div>
        <br>
        <div>
            <button type="submit" class="w3-button"  style="background-color: #ACDF87; color: #000000; font-family: 'Blinker', sans-serif; width: 50%;">Save</button>
        </div> 
        </form>
        @error('error')
            <div class="error" style="color: red;">{{ $message }}</div>
        @enderror
        </div>
    </body>




</html>