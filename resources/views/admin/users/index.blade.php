@extends('layout')

@section('content')
    <div class="admin-users-container">
        <img class="admin-users-main-img" src="{{ asset('img/dronMain21.png') }}" alt="Дрон в горах">
        <div class="admin-users-overlay">
            <p class="admin-users-title">Управление пользователями</p>

            <div class="admin-users-list">
                @forelse($users as $user)
                    <div class="admin-user-card">
                        <div class="contReviewPeopleImg">
                            <img class="admin-user-photo"
                                 src="{{ $user->photo ? asset('storage/img/' . $user->photo) : asset('img/myImgProfile.jpg') }}"
                                 alt="Фото профиля">
                        </div>
                        <div class="lighhtLineBetweenPhotoAndTxt"></div>
                        <div class="admin-user-info">
                            <p class="admin-user-name">
                                {{ $user->fio }}
                                <span class="admin-user-role">
                                    Роль: {{ $user->role }}
                                </span>
                            </p>
                            <p class="admin-user-details">Email: {{ $user->email }}</p>
                            <p class="admin-user-details">Телефон: {{ $user->number_phone ?? 'Не указан' }}</p>

                            <form class="admin-grade-form" action="{{ route('admin.users.updateGrade', $user->id) }}" method="POST">
                                @csrf
                                <div class="admin-grade-container">
                                    <label class="admin-grade-label">Оценка:</label>
                                    <select name="grade" class="admin-grade-select">
                                        @for($i = 0; $i <= 5; $i++)
                                            <option value="{{ $i }}"
                                                {{ $user->grades->first()?->grade == $i ? 'selected' : '' }}>
                                                {{ $i }}
                                            </option>
                                        @endfor
                                    </select>
                                    <button type="submit" class="admin-grade-submit">
                                        Сохранить
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="admin-user-card">
                        <p class="admin-no-users">Пользователи не найдены</p>
                    </div>
                @endforelse
            </div>

            @if($users->hasPages())
                <div class="admin-users-pagination">
                    <div class="admin-pagination-wrapper">
                        {{ $users->links('pagination::simple-tailwind') }}
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
