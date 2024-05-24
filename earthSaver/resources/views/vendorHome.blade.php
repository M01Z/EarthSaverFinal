<!DOCTYPE html>
<html>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Blinker&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <head>
        <meta charset=utf-8>
        <title>Vendor Home</title>
    </head>
    <body>
    <div class="w3-bar w3-black">
        <div class="w3-bar-item w3-center">
            <img src="{{ asset('images/earth.png') }}" style="height: 40px; width: auto;">
            <span style="font-family: 'Blinker', sans-serif; color: white;">CECSS</span>
        </div>
        <div class="w3-bar-item w3-center">
            <a href="{{ url('vendorProfile/' . session('userId')) }}" 
                class="w3-bar-item w3-button w3-hover-green" 
                style="color: #ACDF87; font-family: 'Blinker', sans-serif;">Profile</a>
            <a href="{{ url('navigateAbout') }}" class="w3-bar-item w3-button  w3-hover-green" style="color: #ACDF87; font-family: 'Blinker', sans-serif;">About</a>
            <a href="{{ url('logout') }}" class="w3-bar-item w3-button w3-hover-green" style="color: #ACDF87; font-family: 'Blinker', sans-serif;">Log Out</a>
        </div>
    </div>
    <div class="w3-container">
    @if (isset($approval_status))
        @if($approval_status == 0)
            <div class="w3-panel w3-red">
                <p>You are not authorized to create/update products.</p>
            </div>
        @else
            @if (isset($vendorData->industryId))
                @if($vendorData->industryId == 1)
                    <div>
                        <h1 style="color: #000000; font-family: 'Blinker', sans-serif;">Flight details</h1>
                        <div style="margin-bottom: 10px;">
                            <a href="{{url('newFlight')}}" style="display: inline-block; vertical-align: top; text-decoration: none;">
                                <div class="w3-card" style="width: 150px; height: 150px; text-align: center; background-color: #ACDF87; display: flex; justify-content: center; align-items: center;">
                                    <div class="card-body">
                                        <i class="fas fa-plus-circle" style="font-size: 24px;"></i>
                                        <br>
                                        <span style="font-family: 'Blinker', sans-serif; color: black;">Create New Flight</span>
                                    </div>
                                </div>
                            </a>
                        <a href="{{url('viewFlightsVendor')}}" style="display: inline-block; vertical-align: top; text-decoration: none;">
                            <div class="w3-card" style="width: 150px; height: 150px; text-align: center; background-color: #ACDF87; display: flex; justify-content: center; align-items: center;">
                                <div class="card-body">
                                    <i class="fas fa-plane" style="font-size: 24px;"></i></i>
                                    <br>
                                    <span style="font-family: 'Blinker', sans-serif; color: black;">View Flights</span>
                                </div>
                            </div>
                        </a>
                    </div>
                @else
                <h1 style="color: #000000; font-family: 'Blinker', sans-serif;">Product Details</h1>
                <div style="margin-bottom: 10px;">
                    <a href="{{url('product')}}" style="display: inline-block; vertical-align: top; text-decoration: none;">
                        <div class="w3-card" style="width: 150px; height: 150px; text-align: center; background-color: #ACDF87; display: flex; justify-content: center; align-items: center;">
                            <div class="card-body">
                                <i class="fas fa-plus-circle" style="font-size: 24px;"></i>
                                <br>
                                <span style="font-family: 'Blinker', sans-serif; color: black;">Create New Product</span>
                            </div>
                        </div>
                    </a>
                    <a href="{{url('viewProductsVendor')}}" style="display: inline-block; vertical-align: top; text-decoration: none;">
                        <div class="w3-card" style="width: 150px; height: 150px; text-align: center; background-color: #ACDF87; display: flex; justify-content: center; align-items: center;">
                            <div class="card-body">
                                <i class="fas fa-box" style="font-size: 24px;"></i>
                                <br>
                                <span style="font-family: 'Blinker', sans-serif; color: black;">View Products</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @endif


            @else
                <h1 style="color: #000000; font-family: 'Blinker', sans-serif;">Please Update your profile.</h1>
            @endif       
        @endif
    @endif
    <br><br>
    @if(isset($message))
        <div class="w3-panel w3-green">
            <p>{{ $message }}</p>
        </div>
    @endif
</div>
</body>
</html>

<!-- -->