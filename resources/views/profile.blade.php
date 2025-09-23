@extends('layout')

@section('content')
    <div class="contForProfile">
        <div class="firstRowProfile">
            <div class="blockWithPhotoAndInfo">
                <div class="contForProfileImg"><img class="myProfileImg" src="{{ asset('img/myImgProfile.jpg') }}" alt="Парень с усилком"></div>
                <div class="fullName"><p class="txtFullName">Осипов Дмитрий</p></div>
                <div class="postProfile"><p class="txtPostProfile">Курсант</p></div>
                <div class="addressProfile"><p class="txtAddressProfile">Россия, г.Томск</p></div>
                <div class="statusOnlineProfile">
                    <button >Изменить фото</button>
                </div>
            </div>
            <div class="blockForEditInfo">
                <div class="contRowInfo">
                    <div class="contTxtRowInfo">
                        <div class="nameRow"><p class="txtNameRow">Full name</p></div>
                        <div class="infoRow"><p class="txtInfoRow">Осипов Дмитрий Михайлович</p></div>
                    </div>
                    <div class="lightRowForDivision"></div>
                </div>
                <div class="contRowInfo">
                    <div class="contTxtRowInfo">
                        <div class="nameRow"><p class="txtNameRow">Email</p></div>
                        <div class="infoRow"><p class="txtInfoRow">Goose9098@gmail.com</p></div>
                    </div>
                    <div class="lightRowForDivision"></div>
                </div>
                <div class="contRowInfo">
                    <div class="contTxtRowInfo">
                        <div class="nameRow"><p class="txtNameRow">Phone</p></div>
                        <div class="infoRow"><p class="txtInfoRow">8 (962)786 54-58</p></div>
                    </div>
                    <div class="lightRowForDivision"></div>
                </div>
                <div class="contRowInfo">
                    <div class="contTxtRowInfo">
                        <div class="nameRow"><p class="txtNameRow">Mobile</p></div>
                        <div class="infoRow"><p class="txtInfoRow">8 (914)994 24-16</p></div>
                    </div>
                    <div class="lightRowForDivision"></div>
                </div>
                <div class="contRowInfo">
                    <div class="contTxtRowInfo">
                        <div class="nameRow"><p class="txtNameRow">Address</p></div>
                        <div class="infoRow"><p class="txtInfoRow">Russia, c.Tomsk, Ychebnaya s.8</p></div>
                    </div>
                    <div class="lightRowForDivision"></div>
                </div>
                <button >Изменить </button>
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
                    <p class="zagl">тут доолжно быть оценивание от 0 до 5</p>
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
@endsection
