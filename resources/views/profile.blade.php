@extends('layout')

@section('content')
    <div class="contForProfile">
        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif
            @if(session('error'))
                <div class="alert-error">
                    {{ session('error') }}
                </div>
            @endif
        <div class="firstRowProfile">
            <div class="blockWithPhotoAndInfo">
                <div class="contForProfileImg"><img class="myProfileImg" src="{{$user->photo ? asset('storage/img/' . $user->photo) : asset('img/myImgProfile.jpg') }}" alt="Фото профиля"></div>
                <div class="fullName"><p class="txtFullName">{{ $user->fio ?? 'Не указано' }}</p></div>
                <div class="postProfile"><p class="txtPostProfile">Курсант</p></div>
                <div class="addressProfile"><p class="txtAddressProfile">{{ $user->address ?? 'Адрес не указан' }}</p></div>
                <div class="statusOnlineProfile">
                    <form action="{{ route('profile.updatePhoto') }}" method="POST" enctype="multipart/form-data" id="photoForm">
                        @csrf
                        <input type="file" name="photo" id="photoInput" style="display: none;" accept="image/*" onchange="document.getElementById('photoForm').submit()">
                        <button type="button" onclick="document.getElementById('photoInput').click()" style="background: #2B6CC4; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;">
                            Изменить фото
                        </button>
                    </form>
                </div>
            </div>
            <div class="blockForEditInfo">
                <div id="viewMode">
                    <div class="contRowInfo">
                        <div class="contTxtRowInfo">
                            <div class="nameRow"><p class="txtNameRow">Full name</p></div>
                            <div class="infoRow"><p class="txtInfoRow">{{ $user->fio ?? 'Не указано' }}</p></div>
                        </div>
                        <div class="lightRowForDivision"></div>
                    </div>
                    <div class="contRowInfo">
                        <div class="contTxtRowInfo">
                            <div class="nameRow"><p class="txtNameRow">Email</p></div>
                            <div class="infoRow"><p class="txtInfoRow">{{ $user->email ?? 'Не указано' }}</p></div>
                        </div>
                        <div class="lightRowForDivision"></div>
                    </div>
                    <div class="contRowInfo">
                        <div class="contTxtRowInfo">
                            <div class="nameRow"><p class="txtNameRow">Phone</p></div>
                            <div class="infoRow"><p class="txtInfoRow">{{ $user->number_phone ?? 'Не указано' }}</p></div>
                        </div>
                        <div class="lightRowForDivision"></div>
                    </div>
                    <div class="contRowInfo">
                        <div class="contTxtRowInfo">
                            <div class="nameRow"><p class="txtNameRow">Address</p></div>
                            <div class="infoRow"><p class="txtInfoRow">{{ $user->address ?? 'Не указано' }}</p></div>
                        </div>
                        <div class="lightRowForDivision"></div>
                    </div>


                    <button type="button" onclick="enableEditMode()" style="background: #2B6CC4; color: white; border: none; padding: 12px 24px; border-radius: 5px; cursor: pointer; margin-top: 20px; font-family: inherit; font-size: 1rem;">
                        Редактировать
                    </button>
                </div>


                <form method="POST" action="{{ route('profile.update') }}" id="editMode" style="display: none;">
                    @csrf
                    @method('PUT')

                    <div class="contRowInfo">
                        <div class="contTxtRowInfo">
                            <div class="nameRow"><p class="txtNameRow">Full name</p></div>
                            <div class="infoRow">
                                <input type="text" name="fio" value="{{ old('fio', $user->fio) }}"
                                       style="border: 1px solid #ccc; padding: 8px; border-radius: 4px; width: 100%; font-family: inherit; font-size: 1rem;"
                                       placeholder="Введите ФИО">
                            </div>
                        </div>
                        <div class="lightRowForDivision"></div>
                    </div>

                    <div class="contRowInfo">
                        <div class="contTxtRowInfo">
                            <div class="nameRow"><p class="txtNameRow">Email</p></div>
                            <div class="infoRow">
                                <input type="email" name="email" value="{{ old('email', $user->email) }}"
                                       style="border: 1px solid #ccc; padding: 8px; border-radius: 4px; width: 100%; font-family: inherit; font-size: 1rem;"
                                       placeholder="Введите email">
                            </div>
                        </div>
                        <div class="lightRowForDivision"></div>
                    </div>

                    <div class="contRowInfo">
                        <div class="contTxtRowInfo">
                            <div class="nameRow"><p class="txtNameRow">Phone</p></div>
                            <div class="infoRow">
                                <input type="text" name="number_phone" value="{{ old('number_phone', $user->number_phone) }}"
                                       style="border: 1px solid #ccc; padding: 8px; border-radius: 4px; width: 100%; font-family: inherit; font-size: 1rem;"
                                       placeholder="Введите номер телефона">
                            </div>
                        </div>
                        <div class="lightRowForDivision"></div>
                    </div>

                    <div class="contRowInfo">
                        <div class="contTxtRowInfo">
                            <div class="nameRow"><p class="txtNameRow">Address</p></div>
                            <div class="infoRow">
                                <input type="text" name="address" value="{{ old('address', $user->address) }}"
                                       style="border: 1px solid #ccc; padding: 8px; border-radius: 4px; width: 100%; font-family: inherit; font-size: 1rem;"
                                       placeholder="Введите адрес">
                            </div>
                        </div>
                        <div class="lightRowForDivision"></div>
                    </div>

                    @if($errors->any())
                        <div style="color: red; margin: 15px 0; padding: 10px; background: #f8d7da; border-radius: 5px;">
                            <ul style="margin: 0; padding-left: 20px;">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div style="display: flex; gap: 10px; margin-top: 20px;">
                        <input type="submit" value="Сохранить изменения" style="background: #28a745; color: white; border: none; padding: 12px 24px; border-radius: 5px; cursor: pointer; font-family: inherit; font-size: 1rem;">
                        <button type="button" onclick="disableEditMode()" style="background: #6c757d; color: white; border: none; padding: 12px 24px; border-radius: 5px; cursor: pointer; font-family: inherit; font-size: 1rem;">
                            Отмена
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="secondRowProfile">
            <div class="blockWithUrlOnSocial">
                <a class="urlForSocial" href="">
                    <div class="contForUrl">
                        <div class="contForUrlImg "><img class="UrlImg" src="{{ asset('img/www.svg') }}" alt="world wide web"></div>
                        <div class="nameUrlSocial"><p class="txtNameUrlSocial">Website</p></div>
                    </div>
                    <div class="lightGrayLine"></div>
                </a>
                <a class="urlForSocial" href="">
                    <div class="contForUrl">
                        <div class="contForUrlImg"><img class="UrlImg" src="{{ asset('img/github.svg') }}" alt="github"></div>
                        <div class="nameUrlSocial"><p class="txtNameUrlSocial">GitHub</p></div>
                    </div>
                    <div class="lightGrayLine"></div>
                </a>
                <a class="urlForSocial" href="">
                    <div class="contForUrl">
                        <div class="contForUrlImg"><img class="UrlImg" src="{{ asset('img/twitter.png') }}" alt="twitter"></div>
                        <div class="nameUrlSocial"><p class="txtNameUrlSocial">Twitter</p></div>
                    </div>
                    <div class="lightGrayLine"></div>
                </a>
                <a class="urlForSocial" href="">
                    <div class="contForUrl">
                        <div class="contForUrlImg"><img class="UrlImg" src="{{ asset('img/instagram.png') }}" alt="instagram"></div>
                        <div class="nameUrlSocial"><p class="txtNameUrlSocial">Instagram</p></div>
                    </div>
                    <div class="lightGrayLine"></div>
                </a>
                <a class="urlForSocial" href="">
                    <div class="contForUrl">
                        <div class="contForUrlImg"><img class="UrlImg" src="{{ asset('img/facebook.png') }}" alt="facebook"></div>
                        <div class="nameUrlSocial"><p class="txtNameUrlSocial">Facebook</p></div>
                    </div>
                </a>
            </div>
            <div class="contForAssigmentsBlocks">
                <div class="blockAssignmentTheory">
                    <div class="contForGradeStudent">
                        <div class="contForTitleBlock">
                            <p class="titleName"><i>Оценка</i></p>
                            <p class="titleTypeAssignment">Текущий балл</p>
                        </div>
                        <div class="profile-grade-container">
                            <p class="profile-grade-score">
                                {{ $user->current_grade }}
                            </p>
                            <p class="profile-grade-stars">
                                @if(is_numeric($user->current_grade))
                                    @for($i = 1; $i <= 5; $i++)
                                        <span class="{{ $i <= $user->current_grade ? 'profile-grade-star-filled' : 'profile-grade-star-empty' }}">
                        ★
                    </span>
                                    @endfor
                                @else
                                    <span class="profile-grade-star-empty">☆☆☆☆☆</span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                <div class="blockAssignmentPractical">
                    <div class="contForTitleBlock">
                        <p class="titleName"><i>Assignment</i></p>
                        <p class="titleTypeAssignment">Practical Course Status</p>
                    </div>
                    <div class="contForDivisionAssignment">
                        <p class="nameDivisionAssignment">Практика управления</p>
                        <div class="fullBar"><div class="percentBar practicaUpravleniya"></div></div>
                    </div>
                    <div class="contForDivisionAssignment">
                        <p class="nameDivisionAssignment">Практика ремонта и обслуживания</p>
                        <div class="fullBar"><div class="percentBar practicaRemonta"></div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

        function enableEditMode() {
            document.getElementById('viewMode').style.display = 'none';
            document.getElementById('editMode').style.display = 'block';
        }

        function disableEditMode() {
            document.getElementById('viewMode').style.display = 'block';
            document.getElementById('editMode').style.display = 'none';
        }

        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                const messages = document.querySelectorAll('[style*="background: #d4edda"], [style*="background: #f8d7da"]');
                messages.forEach(function(message) {
                    message.style.display = 'none';
                });
            }, 5000);

            @if($errors->any())
            enableEditMode();
            @endif
        });
    </script>
@endsection
