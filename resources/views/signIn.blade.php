<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Вход в аккаунт</title>
</head>
<body>
<div class="bodySignIn">
    <div class="login-container">
        <h1 class="signInAccount">Вход в аккаунт</h1>
        <form>
            <div class="input-group">
                <label class="login" for="username">Логин</label>
                <input class="nameSignIN" type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label class="login" for="password">Пароль</label>
                <input class="nameSignIN" type="password" id="password" name="password" required>
            </div>
            <button class="signInButton" type="submit">Войти</button>
        </form>
        <p class="signup-link">Нет аккаунта? <a class="RegSignIn" href="{{ route('signUp') }}">Зарегистрироваться</a></p>
    </div>
</div>
</body>
</html>
