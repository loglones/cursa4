<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Регистрация</title>
</head>
<body>
<div class="body">
    <div class="registration-container">
        <h2 class="regH2">Регистрация</h2>
        <form>
            <div class="form-group">
                <label for="username">Имя пользователя</label>
                <input class="nameReg" type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="email">Электронная почта</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Пароль</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label class="confirmPassword" for="confirm-password">Подтверждение пароля</label>
                <input class="nameReg" type="password" id="confirm-password" name="confirm-password" required>
            </div>
            <button class="regConf" type="submit">Зарегистрироваться</button>
        </form>
        <p class="ansAccount">Уже есть аккаунт? <a class="signInP" href="{{ route('signIn') }}">Войти</a></p>
    </div>
</div>
</body>
</html>
