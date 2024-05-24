<!DOCTYPE html>
<html>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Blinker&display=swap">

    <head>
        <meta charset=utf-8>
        <title>Vendor Profile</title>
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
    <h1 style="color: #000000; font-family: 'Blinker', sans-serif;">Update Your Profile</h1>
    <div>
        <p style="color: #000000; font-family: 'Blinker', sans-serif;"><strong>User Name:</strong> 
            @if (isset($userData[0]))
            {{$userData[0]->name}}
            @endif
        </p>
    </div>
    <div>
        <p style="color: #000000; font-family: 'Blinker', sans-serif;"><strong>User Email:</strong> 
            @if (isset($userData[0]))
            {{$userData[0]->email}}
            @endif
        </p>
    </div>
    <div>
        <p style="color: #000000; font-family: 'Blinker', sans-serif;"><strong>Approval Status:</strong> 
            @if (isset($userData[0]->approval_status))
                @if($userData[0]->approval_status == 0)
                <span style="color: orange;">Pending</span>
                @else
                <span style="color: green;">Approved</span>
                @endif
            @endif
        </p>
    </div>
</div>
<div class="w3-container">
<form method="post" action="{{ url('vendorProfile/' . session('userId')) }}" style="max-width: 500px;">
    @csrf
    @method('PUT')
    <div style="margin-bottom: 5px;">
        <label style="display: block; color: #000000; font-family: 'Blinker', sans-serif;"><strong>Address:</strong></label>
        <input style="display: block; color: #000000; font-family: 'Blinker', sans-serif; width: 100%;" 
        type="text" class="w3-input w3-border" 
        name="address" 
        value="{{ isset($vendorData[0]->address) ? $vendorData[0]->address : '' }}">
    </div>
    <div style="margin-bottom: 5px;">
        <label style="display: block; color: #000000; font-family: 'Blinker', sans-serif;"><strong>Website:</strong></label>
        <input type="text" class="w3-input w3-border" name="website" value="{{ isset($vendorData[0]->website) ? $vendorData[0]->website : '' }}" style="display: block; color: #000000; font-family: 'Blinker', sans-serif; width: 100%;">
    </div>
    <div style="margin-bottom: 5px;">
        <label style="display: block; color: #000000; font-family: 'Blinker', sans-serif;"><strong>Carbon Strategy:</strong></label>
        <textarea class="w3-input w3-border" name="carbonStrategy" style="color: #000000; font-family: 'Blinker', sans-serif; width: 100%; height: 150px;">
  {{ isset($vendorData[0]->carbonStrategy) ? $vendorData[0]->carbonStrategy : '' }}
</textarea>
    </div>
    <div style="margin-bottom: 20px;">
    <label style="display: block; color: #000000; font-family: 'Blinker', sans-serif;"><strong>Industry:</strong></label>
    <div style="display: flex; align-items: center;">
        <select class="w3-select w3-border" name="industry" style="flex: 1;">
            @if ($industryData)
                @foreach ($industryData as $item)
                <option style="display: block; color: #000000; font-family: 'Blinker', sans-serif;" value="{{ $item->id }}" @if (isset($vendorData[0]->industryId) && $item->id == $vendorData[0]->industryId) selected @endif>{{ $item->name }}</option>
                @endforeach
            @else
                <option value="" disabled>No industries available</option>
            @endif
        </select>
        <a href="{{ url('newIndustryType') }}" class="w3-button w3-black" style="display: block; color: #000000; font-family: 'Blinker', sans-serif; margin-left: 10px;">Create New</a>
    </div>
</div>
<div>
    <button type="submit" class="w3-button" style="background-color: #ACDF87; color: #000000; font-family: 'Blinker', sans-serif; width: 50%;">Save</button>
</div>
</form>

</div>
@error('error')
<div class="error" style="color: red;">{{ $message }}</div>
@enderror
</div>
    </body>



</html>