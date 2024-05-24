<!DOCTYPE html>
<html>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Blinker&display=swap">

    <head>
        <meta charset=utf-8>
        <title>Carbon Search</title>
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
    </section>
    <section style="display: flex; justify-content: space-between; align-items: center; padding: 20px;">
        <div style="flex: 1;">
            <!-- Text and Button on the left side -->
            <h2>Curious about the carbon footprint of this product? </h2>
            <h2>Interested in discovering which vendor is the ultimate carbon saver? </h2> 
            <p>Click below to explore the product and uncover its carbon footprint</p>
            <form action="userSelectCategory" method="get" style="max-width: 400px; margin: 0 auto;">
                @csrf
                <button type="submit" class="w3-button w3-green">Carbon Search</button>
            </form>
            
        </div>
        <div style="flex: 1;">
            <!-- Image on the right side -->
            <img src="{{ asset('images/carbonFoot.png') }}" alt="Image" style="max-width: 100%; width: 500px; height: 500px;">
        </div>
    </section>
</html>