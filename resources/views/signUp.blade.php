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

        @if($errors->any())
            <div class="alert alert-danger" style="color: red; margin-bottom: 15px;">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('signUp') }}">
            @csrf
            <div class="form-group">
                <label for="fio">Фамилия Имя Отчество</label>
                <input class="nameReg" type="text" id="fio" name="fio" value="{{ old('fio') }}" required>
            </div>
            <div class="form-group">
                <label for="email">Электронная почта</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
            </div>
            <div class="form-group">
                <label for="password">Пароль</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label class="confirmPassword" for="password_confirmation">Подтверждение пароля</label>
                <input class="nameReg" type="password" id="password_confirmation" name="password_confirmation" required>
            </div>
            <button class="regConf" type="submit">Зарегистрироваться</button>
        </form>
        <p class="ansAccount">Уже есть аккаунт? <a class="signInP" href="{{ route('signIn') }}">Войти</a></p>
    </div>
</div>
</body>
</html>
