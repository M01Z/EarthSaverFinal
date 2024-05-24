<!DOCTYPE html>
<html>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Blinker&display=swap">

    <section>
        <div class="w3-bar w3-black">
        <div class="w3-bar-item w3-center">
            <img src="{{ asset('images/earth.png') }}" style="height: 40px; width: auto;">
            <span style="font-family: 'Blinker', sans-serif; color: white;">CECSS</span>
        </div>
        <div class="w3-bar-item w3-center">
            <a href="{{ url('navigateAbout') }}" class="w3-bar-item w3-button  w3-hover-green" style="color: #ACDF87; font-family: 'Blinker', sans-serif;">About</a>
            <a href="{{ url('navigateCarbonSearch') }}" 
                class="w3-bar-item w3-button w3-hover-green" 
                style="color: #ACDF87; font-family: 'Blinker', sans-serif;">Carbon Search</a>
        </div>
        </div>
    </section>
<div class="w3-container">
    <form action="signIn" method="post" style="max-width: 400px; margin: 0 auto;">
        <div class="container">
            @csrf
            <h1 style="color: #000000; font-family: 'Blinker', sans-serif;">Welcome Back,</h1>
            <h6 style="color: #000000; font-family: 'Blinker', sans-serif;">Log in to access your account!</h6>
            <div style="margin-bottom: 10px;">
                <label><b style="color: #000000; font-family: 'Blinker', sans-serif;">Email</b></label>
                <input type="text" class="w3-input w3-border" name="uemail" style="width: 100%; padding: 10px; color: #000000; font-family: 'Blinker', sans-serif;">
            </div>
            <div style="margin-bottom: 20px;">
                <label style="color: #000000; font-family: 'Blinker', sans-serif;"><b>Password</b></label>
                <input type="password" class="w3-input w3-border" name="upsw" style="width: 100%; padding: 10px;">
            </div>
            <div class="w3-center">
                <button type="submit" class="w3-button w3-green" style="width: 50%; padding: 10px; color: #000000; font-family: 'Blinker', sans-serif;">Sign In</button>
            </div>
        </div>
    </form>

    <div style="text-align: center; margin-top: 20px;">
        <span style="font-size: 14px; display: inline;">Don't have an account?</span>
        <a href="{{ url('navigateSignup') }}" style="font-size: 14px; display: inline; color: #007bff;">Create one!</a>
    </div>

    @error('error')
    <div class="error" style="color: red; text-align: center; margin-top: 20px;">{{ $message }}</div>
    @enderror
</div>
    </body>
</html>