<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible">
    <title>Welcome to Twilabs!</title>
</head>
<body>
    <form action=/send>
        @csrf
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

        <button>Log in</button>
    </form>
</body>
</html>