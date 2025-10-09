<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Подтверждение Email - UFOLuV</title>
    <style>
        .verification-container {
    max-width: 500px;
            margin: 50px auto;
            padding: 40px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
            text-align: center;
        }
        .verification-icon {
    font-size: 64px;
            color: #667eea;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div class="bodySignIn">
    <div class="verification-container">
        <div class="verification-icon">📧</div>
        <h1 class="signInAccount">Подтвердите ваш Email</h1>

@if (session('success'))
    <div style="color: green; margin-bottom: 20px; padding: 15px; background: #d4edda; border-radius: 5px;">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div style="color: red; margin-bottom: 20px; padding: 15px; background: #f8d7da; border-radius: 5px;">
        {{ session('error') }}
    </div>
@endif

<p>Спасибо за регистрацию! Прежде чем начать, пожалуйста, подтвердите ваш email адрес, перейдя по ссылке, которую мы отправили на:</p>

<p style="font-size: 18px; font-weight: bold; color: #667eea; margin: 20px 0;">
    {{ Auth::user()->email }}
</p>

<p>Если вы не получили письмо, мы с радостью отправим его повторно.</p>

<form method="POST" action="{{ route('verification.send') }}">
    @csrf
    <button type="submit" class="signInButton" style="width: 100%; margin-top: 20px;">
        Отправить ссылку подтверждения повторно
    </button>
</form>

<form method="POST" action="{{ route('logout') }}" style="margin-top: 20px;">
    @csrf
    <button type="submit" style="width: 100%; background: #6c757d; color: white; border: none; padding: 12px; border-radius: 5px; cursor: pointer;">
        Выйти из аккаунта
    </button>
</form>
</div>
</div>
</body>
</html>
