<!DOCTYPE html>
<html>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Blinker&display=swap">

    <head>
        <meta charset=utf-8>
        <title>Vendor Details</title>
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

        <div class="w3-container" style="max-width: 500px;">
            <h1 style="color: #000000; font-family: 'Blinker', sans-serif;">Vendor Details</h1>
            <div style="margin-bottom: 5px;">
                <label style="display: block; color: #000000; font-family: 'Blinker', sans-serif;"><strong>Name:</strong></label>
                <input style="display: block; color: #000000; font-family: 'Blinker', sans-serif; width: 100%;" 
                type="text" class="w3-input w3-border" 
                value="{{ isset($euser->name) ? $euser->name : '' }}" disabled>
            </div>
            <div style="margin-bottom: 5px;">
                <label style="display: block; color: #000000; font-family: 'Blinker', sans-serif;"><strong>Address:</strong></label>
                <input style="display: block; color: #000000; font-family: 'Blinker', sans-serif; width: 100%;" 
                type="text" class="w3-input w3-border" 
                name="address" 
                value="{{ isset($vendor->address) ? $vendor->address : '' }}" disabled>
            </div>
            <div style="margin-bottom: 5px;">
                <label style="display: block; color: #000000; font-family: 'Blinker', sans-serif;"><strong>Website:</strong></label>
                <input type="text" class="w3-input w3-border" name="website" value="{{ isset($vendor->website) ? $vendor->website : '' }}" style="display: block; color: #000000; font-family: 'Blinker', sans-serif; width: 100%;" disabled>
            </div>
            <div style="margin-bottom: 5px;">
                <label style="display: block; color: #000000; font-family: 'Blinker', sans-serif;"><strong>Carbon Strategy:</strong></label>
                <textarea class="w3-input w3-border" name="carbonStrategy" style="color: #000000; font-family: 'Blinker', sans-serif; width: 100%; height: 150px;" disabled>{{ isset($vendor->carbonStrategy) ? $vendor->carbonStrategy : '' }}</textarea>
            </div>
    </section>



</html>