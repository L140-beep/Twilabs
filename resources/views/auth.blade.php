<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible">
    <title>Welcome to Twilabs!</title>
</head>
<body>
    <form method="POST" action='/auth'>
        @csrf
        <label>Login</label>
        <input name='login' type="text" placeholder="example@example.com" value={{old('login')}}>
        <label>Password</label>
        <input name='password' type="password" placeholder="password..">

        @if(isset($login_error))
            <div class="alert alert-danger">
                {{$login_error}}
            </div>
        @endif
        <button type='submit'>Log in</button>
    </form>

    <div> 
        <a href='/registration'>Don't have account yet?</a>
    </div>
</body>
</html>