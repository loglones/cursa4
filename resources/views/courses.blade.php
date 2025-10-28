@extends('layout')

@section('content')
    @if($courses->count() > 0)
        @foreach($courses as $course)
            <div class="contImageAndDescriptionMultirotor">
                <img class="multirotorImg" src="{{ $course->photo_url }}" alt="{{ $course->name }}">
                <div class="imageOverlay">
                    <div class="imageOverlayCont">
                        <div class="imageTitle"><p class="imageTxtTitle">{{ $course->name }}</p></div>
                        <p class="imageDescription">{{ $course->description }}</p>
                        <div class="infoAndRecordingAboutCoursesMultirotor">
                            <p class="infoAboutCoursesMultirotor">
                                Количество часов курса: {{ $course->quantity }}ч<br><br>
                                Инструктор: {{ $course->instructor->fio }}<br><br>
                                Цена курса: {{ $course->price }}Р<br><br>
                            </p>
                            <button class="new_button">Записаться</button>
                        </div>
                    </div>
                </div>
                @auth
                    @if(auth()->user()->isAdmin())
                        <div class="admin-course-actions">
                            <a href="{{ route('admin.courses.destroy', $course->id) }}"
                               class="btn-delete-course"
                               onclick="return confirm('Вы уверены, что хотите удалить этот курс?')">
                                Удалить курс
                            </a>
                        </div>
                    @endif
                @endauth
            </div>
        @endforeach
    @else
        <div class="no-courses-message">
            <h2>Курсы пока не добавлены</h2>
            <p>Скоро здесь появятся новые курсы</p>
        </div>
    @endif

    @auth
        @if(auth()->user()->isAdmin())
            <div class="admin-add-course">
                <a href="{{ route('admin.courses.create') }}" class="btn-add-instructor">
                    + Добавить курс
                </a>
            </div>
        @endif
    @endauth
@endsection
