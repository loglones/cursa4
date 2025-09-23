@extends('layout')

@section('content')
    <main>
        <div class="contChooseYourInstructor">
            <a class="hrefToInstructor" href="{{ route('instructorsInfo') }}">
                <div class="cardInstructor">
                    <div class="contImgInstructor"><img class="imgInstructor" src="{{ asset('img/instructors/semenovPhoto.jpg') }}" alt="Семенов Дмитрий"></div>
                    <p class="cardTxtInstructor">Семенов Дмитрий</p>
                </div>
            </a>
            <a class="hrefToInstructor" href="{{ route('instructorsInfo') }}">
                <div class="cardInstructor">
                    <div class="contImgInstructor"><img class="imgInstructor" src="{{ asset('img/instructors/melkovPhoto.jpg') }}" alt="Мелков Данил"></div>
                    <p class="cardTxtInstructor">Мелков Данил</p>
                </div>
            </a>
            <a class="hrefToInstructor" href="{{ route('instructorsInfo') }}">
                <div class="cardInstructor">
                    <div class="contImgInstructor"><img class="imgInstructor" src="{{ asset('img/instructors/oshepkovPhoto.jpg') }}" alt="Ощепков Ярослав"></div>
                    <p class="cardTxtInstructor">Ощепков Ярослав</p>
                </div>
            </a>
            <a class="hrefToInstructor" href="{{ route('instructorsInfo') }}">
                <div class="cardInstructor">
                    <div class="contImgInstructor"><img class="imgInstructor" src="{{ asset('img/instructors/meierPhoto.jpg') }}" alt="Мэйер Александ"></div>
                    <p class="cardTxtInstructor">Мэйер Александ</p>
                </div>
            </a>
        </div>
    </main>
    <button class="new_button">+ Фильтры</button>
@endsection
