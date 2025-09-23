@extends('layout')

@section('content')
    <div class="contReviewsAllInformation">
        <div class="contReviewsMainImg"><img class="imgMainReviews" src="{{ asset('img/resque.png') }}" alt="Дрон в горах"></div>
        <div class="contOverlay">
            <p class="reviewsTitle">Текущие отзывы курсантов</p>
            <div class="contGroupReviews">

            </div>
            <div class="formGetReview">
                <form class="getReview" action="">
                    <div class="contFormInput">
                        <label class="labelForm" for="fioReview">*Ваша фамилия и имя</label>
                        <input class="fioReview" type="text" placeholder="Введите имя и фамилию">
                    </div>
                    <input class="txtFormReview" type="text" placeholder="Введите текст">
                    <div class="contSubmitFormReview"><input class="submitFormReview" type="submit" placeholder="Отправить"></div>
                </form>
            </div>
        </div>
    </div>
@endsection
