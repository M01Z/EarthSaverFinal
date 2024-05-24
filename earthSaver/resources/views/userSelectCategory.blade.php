<!DOCTYPE html>
<html>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Blinker&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <head>
        <meta charset=utf-8>
        <title>Select Category</title>
    </head>

    <section>
        <div class="w3-bar w3-black">
            <div class="w3-bar-item w3-center">
                <img src="{{ asset('images/earth.png') }}" style="height: 40px; width: auto;">
                <span style="font-family: 'Blinker', sans-serif; color: white;">CECSS</span>
            </div>
            <div class="w3-bar-item w3-center">
                <a href="{{ url('navigateHome') }}" class="w3-bar-item w3-button  w3-hover-green" style="color: #ACDF87; font-family: 'Blinker', sans-serif;">Home</a>
            </div>
            <div class="w3-bar-item w3-center">
                <a href="{{ url('navigateAbout') }}" class="w3-bar-item w3-button  w3-hover-green" style="color: #ACDF87; font-family: 'Blinker', sans-serif;">About</a>
            </div>
        </div>
        <div class="w3-container"> 
            <h1 style="color: #000000; font-family: 'Blinker', sans-serif;">Select Category</h1>
            <div style="margin-bottom: 10px;">
                <a href="{{url('userProduct')}}" style="display: inline-block; vertical-align: top; text-decoration: none;">
                    <div class="w3-card" style="width: 150px; height: 150px; text-align: center; background-color: #ACDF87; display: flex; justify-content: center; align-items: center;">
                        <div class="card-body">
                            <i class="fas fa-box" style="font-size: 24px;"></i>
                            <br>
                            <span style="font-family: 'Blinker', sans-serif; color: black;">Products</span>
                        </div>
                    </div>
                </a>
                <a href="{{url('userFlight')}}" style="display: inline-block; vertical-align: top; text-decoration: none;">
                    <div class="w3-card" style="width: 150px; height: 150px; text-align: center; background-color: #ACDF87; display: flex; justify-content: center; align-items: center;">
                        <div class="card-body">
                            <i class="fas fa-plane" style="font-size: 24px;"></i>
                            <br>
                            <span style="font-family: 'Blinker', sans-serif; color: black;">Flights</span>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </section>

</html>