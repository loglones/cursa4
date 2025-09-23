@extends('layout')

@section('content')
    <div class="contImageAndDescriptionMultirotor">
        <img class="multirotorImg" src="{{ asset('img/courses/multirotorBW2N.png') }}" alt="Мультироторный дрон">
        <div class="imageOverlay">
            <div class="imageOverlayCont">
                <div class="imageTitle"><p class="imageTxtTitle">Мультироторные дроны</p></div>
                <p class="imageDescription">
                    Курс посвящен теории БПЛА, организации работ в воздушном пространстве, пилотированию и обслуживанию дронов мультироторного типов. Аэрофотосъемке и обработке полученных данных.
                </p>
                <div class="infoAndRecordingAboutCoursesMultirotor">
                    <p class="infoAboutCoursesMultirotor">Количество часов курса: 56ч<br><br>Инструктор: Семенов Дмитрий<br><br>Цена курса: 70000Р<br><br></p>
                    <button class="new_button">Записаться</button>
                </div>
            </div>
        </div>
    </div>
    <div class="contImageAndDescriptionOnerotor">
        <img class="onerotorImg" src="{{ asset('img/courses/onerotorBW2N.png') }}" alt="Однороторный дрон">
        <div class="imageOverlay">
            <div class="imageOverlayCont">
                <div class="imageTitle"><p class="imageTxtTitle">Однороторные дроны</p></div>
                <p class="imageDescription">
                    Курс посвящен теории БПЛА, а так же беспилотным вертолетам.За курс вы научитесь обслуживать,ремонтировать, а так же использовать данный тип дронов в военных целях.
                </p>
                <div class="infoAndRecordingAboutCoursesOnerotor">
                    <p class="infoAboutCoursesOnerotor">Количество часов курса: 70ч<br><br>Инструктор: Мелков Данил<br><br>Цена курса: 80000Р<br><br></p>
                    <button class="new_button">Записаться</button>
                </div>
            </div>
        </div>
    </div>
    <div class="contImageAndDescriptionFixedWing">
        <img class="fixedWingImg" src="{{ asset('img/courses/FixedWingBWN.png') }}" alt="Дрон с неподвижным крылом">
        <div class="imageOverlay">
            <div class="imageOverlayCont">
                <div class="imageTitle"><p class="imageTxtTitle">Дроны с неподвижным крылом</p></div>
                <p class="imageDescription">
                    Курс посвящен теории БПЛА, а так же дронам с неподвижным крылом.За курс вы научитесь обслуживать,ремонтировать, а так же использовать данный тип дронов в военных целях.
                </p>
                <div class="infoAndRecordingAboutCoursesFixedWing">
                    <p class="infoAboutCoursesFixedWing">Количество часов курса: 68ч<br><br>Инструктор: Ощепков Ярослав<br><br>Цена курса: 75000Р<br><br></p>
                    <button class="new_button">Записаться</button>
                </div>
            </div>
        </div>
    </div>
    <div class="contImageAndDescriptionGibrid">
        <img class="gibridImg" src="{{ asset('img/courses/gibrid_droneBWN.png') }}" alt="Гибридный дрон">
        <div class="imageOverlay">
            <div class="imageOverlayCont">
                <div class="imageTitle"><p class="imageTxtTitle">Мультироторные дроны</p></div>
                <p class="imageDescription">
                    Курс посвящен теории БПЛА, организации работ в воздушном пространстве, пилотированию и обслуживанию дронов мультироторного типов. Аэрофотосъемке и обработке полученных данных.
                </p>
                <div class="infoAndRecordingAboutCoursesGibrid">
                    <p class="infoAboutCoursesGibrid">Количество часов курса: 80ч<br><br>Инструктор: Мэйер Александр<br><br>Цена курса: 85000Р<br><br></p>
                    <button class="new_button">Записаться</button>
                </div>
            </div>
        </div>
    </div>
@endsection
