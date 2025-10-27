<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>UFOLuV</title>
</head>
<body>


<header class="firstHead">
    <div class="wrapper headMenu">
        <div class="button droneTipes"><a class="navMenuHead" href="{{ route('droneTypes') }}">Виды дронов</a></div>
        <div class="button courses"><a class="navMenuHead" href="{{ route('courses') }}">Курсы</a></div>
        <div class="button instrutors"><a class="navMenuHead" href="{{ route('instructors') }}">Инструкторы</a></div>
        <div class="button reviews"><a class="navMenuHead" href="{{ route('reviews') }}">Отзывы</a></div>
        <div class="profile">
            @auth
                @if(auth()->user()->isAdmin())
                    <a class="admin-users-link" href="{{ route('admin.users.index') }}">
                        Пользователи
                    </a>
                @endif
            @endauth
            @auth
                @if(auth()->user()->isAdmin() || auth()->user()->isUser())
                    <div class="contForProfileAndExit">

                        <a class="navMenuHead" href="{{ route('profile') }}">
                            <img class="iconHeader" src="{{ asset('img/profile1w_1.png') }}" alt="Кнопка профиля">
                        </a>
                        <a class="navMenuHead logout-btn" href="{{ route('logout.get') }}">Выход</a>
                    </div>
                @endif
            @else
                <div style="display: flex; gap: 15px;">
                    <a class="navMenuHead" href="{{ route('signIn') }}" style="text-decoration: none; color: white;">Вход</a>
                    <a class="navMenuHead" href="{{ route('signUp') }}" style="text-decoration: none; color: white;">Регистрация</a>
                </div>
            @endauth
        </div>
        <div class="mainMenu"><a class="navMenuHead" href="{{ route('home') }}"><img class="iconHeader" src="{{ asset('img/logo2b_1.png') }}" alt="Кнопка главной страницы"></a></div>
    </div>
</header>


@yield('content')


<div class="footer">
    <div class="contFooter">
        <div class="navMenuFooter">
            <div class="droneTipes"><a class="footerMenu navMenuHead" href="{{ route('droneTypes') }}">Виды дронов</a></div>
            <div class="courses"><a class="footerMenu navMenuHead" href="{{ route('courses') }}">Курсы</a></div>
            <div class="instrutors"><a class="footerMenu navMenuHead" href="{{ route('instructors') }}">Инструкторы</a></div>
            <div class="reviews"><a class="footerMenu navMenuHead" href="{{ route('reviews') }}">Отзывы</a></div>
        </div>
        <div class="socialSites">
            <div class="logoAndCompany">
                <img src="{{ asset('img/logo2b big.png') }}" alt="Лого компании">
                <p class="infoAndName">UFOLuV <br> The best <br> course</p>
            </div>
            <div class="meAtSocialClub">
                <p class="meSocialTxt">Мы в соц.сетях: </p>
                <div class="imgSocial"><img class="imgVkTg" src="{{ asset('img/vk.png') }}" alt="Вк"></div>
                <div class="imgSocial"><img class="imgVkTg" src="{{ asset('img/tg.png') }}" alt="Тг"></div>
            </div>
        </div>
        <div class="contForm">
            <div class="contTxtForm">
                <p class="txtForm">Если вас что то заинтересовало,но вы сомневаетесь,можете проконсультироваться с нашим главным специалистом</p>
            </div>
            <form action="" class="formHelp">
                <div class="contFormInput">
                    <label class="labelForm" for="fio">*Ваше Ф.И.О</label>
                    <input class="fontForm fio" type="text" placeholder="Введите ваше Ф.И.О" >
                </div>
                <div class="contFormInput">
                    <label class="labelForm" for="email">*Ваша почта</label>
                    <input class="fontForm email" type="email" placeholder="Введите вашу почту">
                </div>
                <div class="contFormInput">
                    <label class="labelForm" for="phone">*Ваш номер телефона</label>
                    <input class="fontForm phone" type="phone" placeholder="Введите ваш номер телефона">
                </div>
                <div class="contFormSubmit">
                    <input class="formSubmit" type="submit" placeholder="Отправить">
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
