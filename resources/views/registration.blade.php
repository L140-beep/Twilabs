<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
</head>
<body>
    <form method="POST" action='/registration'>
        @csrf
        <label>Username </label>
        <input name='username' type='text' placeholder="*some interesting nickname*" value={{old('username')}}>
        <label>Login</label>
        <input name='login' type="text" placeholder="example@example.com" value={{old('login')}}>
        <label>Password</label>
        <input name='password' type="password" placeholder="password..">
        
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if(isset($registration_error))
            <div class="alert alert-danger">
                {{$registration_error}}
            </div>
        @endif
        <button type='submit'>Log in</button>
    </form>
</body>
</html>