<!DOCTYPE html>
<html>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Blinker&display=swap">

    <head>
        <meta charset=utf-8>
        <title>Sign Up</title>
    </head>

    <body>
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

        <div class="w3-container" style="max-width: 400px; margin: 0 auto;">
            <form action="signUp" method="post">
            @csrf
                <h1 style="color: #000000; font-family: 'Blinker', sans-serif;">Sign Up</h1>
                <div>
                    <label style="color: #000000; font-family: 'Blinker', sans-serif;"><b>User Name</b></label>
                    <input type="text" style="color: #000000; font-family: 'Blinker', sans-serif;" class="w3-input w3-border" name="uname" value = "{{old('uname')}}">
                </div>
                <div>
                    <label style="color: #000000; font-family: 'Blinker', sans-serif;"><b>Email</b></label>
                    <input type="text" style="color: #000000; font-family: 'Blinker', sans-serif;" class="w3-input w3-border" name="uemail" value = "{{old('uemail')}}">
                </div>
                <div>
                <label style="color: #000000; font-family: 'Blinker', sans-serif;"><b>Password</b></label>
                <input type="password" class="w3-input w3-border" name="upsw" value = "{{old('upsw')}}">
                </div>
                <br>
                <h6 style="color: #000000; font-family: 'Blinker', sans-serif; display: inline;"><b>Account Type: </b></h6>
                <input type = "radio" name = "type" value = "Vendor"><b style="color: #000000; font-family: 'Blinker', sans-serif;">Vendor</b>
                <input type = "radio" name = "type" value = "User"><b style="color: #000000; font-family: 'Blinker', sans-serif;">User</b><br>
                <br>
                @error('Error')
                    <div class="error" style="color: red;">{{ $message }}</div>
                @enderror
                <div class="w3-center">
                <button type="submit" class="w3-green w3-bar w3-button w3-small" style="width:25%; color: #000000; font-family: 'Blinker', sans-serif;">Sign Up</button>
                </div>
                <br>
                <br>
                <div>
                    <h6 style="color: #000000; font-family: 'Blinker', sans-serif; display: inline;">Already have an account?</h4>
                    <a href="{{ url('/') }}" style="color: #000000; font-family: 'Blinker', sans-serif; display: inline;"> Login Instead </a>
                </div>
            </form>
        </div>

    </body>
</html>