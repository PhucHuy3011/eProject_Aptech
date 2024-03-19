<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{asset('css')}}/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Register</title>
</head>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#birthday" ).datepicker({
        dateFormat: 'dd/mm/yy'
    });
  } );
  </script>
<body>
    <div class="wrapper">
        <form method="POST" action="{{ route('registers') }}">
            @if(Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
            @if(Session::has('fail'))
            <div class="alert alert-danger">{{Session::get('fail')}}</div>
            @endif
            @csrf
            <h1>Register</h1>
            <div class="input-box">
                <input placeholder="Name" name="name" id="name" :value="old('name')" required autofocus autocomplete="name">
                <i class='bx bxs-user'></i>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div class="input-box">
                <input type="date" placeholder="DD/MM/YYYY" name="birthday" id="birthday" required>
                <i class='bx bx-face'></i>
            </div>
            <div class="input-box">
                <input type="text" placeholder="Address" name="address" required>
                <i class='bx bx-current-location' ></i>
            </div>
            <div class="input-box">
                <input type="email" placeholder="Email" name="email" id="email" :value="old('email')" required autocomplete="username">
                <i class='bx bx-envelope' ></i>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <div class="input-box">
                <input type="text" placeholder="Phone" name="phone" required>
                <i class='bx bx-phone' ></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" name="password" id="password" required autocomplete="new-password">
                <i class='bx bx-lock-alt' ></i>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <div class="input-box">
                <input type="password" id="password_confirmation" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
                <i class='bx bx-lock-alt' ></i>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
            <div class="remember-forgot">
                <label>
                    <input type="checkbox"> I agree to the terms & conditions
                </label>
            </div>
            <button class="btn">{{ __('Register') }}</button>

            <div class="register-link">
            <a style="color: black;" href="{{ route('login') }}">
                <span><b>{{ __('Already registered?') }}</b></span>
            </a>
            </div>
            <input type="hidden" name="role" value="0">
        </form>
    </div>
</body>
</html>