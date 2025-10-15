@extends('layout')

@section('content')
    <div class="contReviewsAllInformation">
        <div class="contReviewsMainImg"><img class="imgMainReviews" src="{{ asset('img/resque.png') }}" alt="Дрон в горах"></div>
        <div class="contOverlay">
            <p class="reviewsTitle">Текущие отзывы курсантов</p>
            <div class="contGroupReviews">
                @forelse($reviews as $review)
                    <div class="contReview">
                        <div class="contReviewPeopleImg">
                            <img class="profileReviewImg"
                                 src="{{ $review->user->photo ? asset('storage/img/' . $review->user->photo) : asset('img/myImgProfile.jpg') }}"
                                 alt="Фото профиля">
                        </div>
                        <div class="lighhtLineBetweenPhotoAndTxt"></div>
                        <div class="contTxtReview">
                            <p class="nameReview">
                                {{ $review->user->fio ?? 'Аноним' }}
                                <span style="color: #FFD45E; margin-left: 15px;">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $review->rating)
                                            ★
                                        @else
                                            ☆
                                        @endif
                                    @endfor
                                    ({{ $review->rating }}/5)
                                </span>
                            </p>
                            <p class="txtReview">{{ $review->text_review }}</p>
                            <p class="txtReview" style="font-size: 1rem; color: #ccc; margin-top: 10px;">
                                {{ $review->created_at->format('d.m.Y H:i') }}
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="contReview">
                        <div class="contTxtReview" style="text-align: center; width: 100%;">
                            <p class="txtReview" style="color: #ccc;">Пока нет отзывов. Будьте первым!</p>
                        </div>
                    </div>
                @endforelse
            </div>

            @if($reviews->hasPages())
                <div style="display: flex; justify-content: center; margin-top: 30px;">
                    <div style="background: rgba(255,255,255,0.8); padding: 15px; border-radius: 10px;">
                        {{ $reviews->links('pagination::simple-tailwind') }}
                    </div>
                </div>
            @endif

            @auth
                <div class="formGetReview">
                    <form class="getReview" action="{{ route('reviews.store') }}" method="POST">
                        @csrf

                        @if(session('success'))
                            <div style="color: green; margin-bottom: 15px; padding: 10px; background: #d4edda; border-radius: 5px;">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if($errors->any())
                            <div style="color: red; margin-bottom: 15px; padding: 10px; background: #f8d7da; border-radius: 5px;">
                                @foreach($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                            </div>
                        @endif

                        <div class="contFormInput">
                            <label class="labelForm">* Оцените курс (от 1 до 5 звезд)</label>
                            <div style="display: flex; gap: 10px; margin: 10px 0;">
                                @for($i = 1; $i <= 5; $i++)
                                    <label style="cursor: pointer;">
                                        <input type="radio" name="rating" value="{{ $i }}"
                                               {{ old('rating') == $i ? 'checked' : '' }} style="display: none;">
                                        <span class="star" data-value="{{ $i }}" style="font-size: 2rem; color: #ccc;">
                                            ★
                                        </span>
                                    </label>
                                @endfor
                            </div>
                        </div>

                        <div class="contFormInput">
                            <label class="labelForm" for="text_review">* Ваш отзыв</label>
                            <textarea class="txtFormReview" name="text_review" placeholder="Поделитесь вашим опытом..." required>{{ old('text_review') }}</textarea>
                        </div>

                        <div class="contSubmitFormReview">
                            <input class="submitFormReview" type="submit" value="Опубликовать отзыв">
                        </div>
                    </form>
                </div>
            @else
                <div style="text-align: center; margin-top: 30px; color: white;">
                    <p>Чтобы оставить отзыв, <a href="{{ route('signIn') }}" style="color: #FFD45E;">войдите в аккаунт</a></p>
                </div>
            @endauth
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const stars = document.querySelectorAll('.star');
            let selectedRating = 0;

            stars.forEach(star => {
                star.addEventListener('click', function() {
                    selectedRating = this.getAttribute('data-value');

                    stars.forEach(s => {
                        const starValue = s.getAttribute('data-value');
                        s.style.color = starValue <= selectedRating ? '#FFD45E' : '#ccc';
                    });

                    document.querySelectorAll('input[name="rating"]').forEach(input => {
                        input.checked = input.value === selectedRating;
                    });
                });

                star.addEventListener('mouseover', function() {
                    const hoverValue = this.getAttribute('data-value');
                    stars.forEach(s => {
                        const starValue = s.getAttribute('data-value');
                        s.style.color = starValue <= hoverValue ? '#FFD45E' : '#ccc';
                    });
                });

                star.addEventListener('mouseout', function() {
                    stars.forEach(s => {
                        const starValue = s.getAttribute('data-value');
                        s.style.color = starValue <= selectedRating ? '#FFD45E' : '#ccc';
                    });
                });
            });


            const checkedInput = document.querySelector('input[name="rating"]:checked');
            if (checkedInput) {
                selectedRating = checkedInput.value;
                stars.forEach(s => {
                    const starValue = s.getAttribute('data-value');
                    s.style.color = starValue <= selectedRating ? '#FFD45E' : '#ccc';
                });
            }
        });
    </script>
@endsection
