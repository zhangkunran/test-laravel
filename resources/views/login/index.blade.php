<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<h2>Login</h2>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{route('login')}}" method="POST">
    @csrf
    <div>
        <label for="mobile">手机号:</label>
        <input type="mobile" id="mobile" name="mobile" value="13688888888" required>
    </div>
    <div>
        <label for="password">密码:</label>
        <input type="password" id="password" name="password" value="123456" required>
    </div>
    <button type="submit">Login</button>
</form>
</body>
