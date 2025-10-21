@extends('layout')

@section('content')
    <main>
        <div class="contForInstructorsAndButton">


            <div class="contChooseYourInstructor" id="instructorsContainer">
                @forelse($instructors as $instructor)
                    <div class="instructor-card" onclick="showInstructorInfo({{ $instructor->id }})">
                        <div class="cardInstructor">
                            <div class="contImgInstructor">
                                <img class="imgInstructor" src="{{ asset('storage/' . $instructor->photo) }}" alt="{{ $instructor->fio }}">
                            </div>
                            <p class="cardTxtInstructor">{{ $instructor->fio }}</p>
                            @auth
                                @if(auth()->user()->isAdmin())
                                    <a href="{{ route('admin.instructors.destroy', $instructor->id) }}"
                                       class="btn-delete-instructor"
                                       onclick="return confirm('Вы уверены, что хотите удалить этого инструктора?')"
                                       title="Удалить инструктора">
                                        ×
                                    </a>
                                @endif
                            @endauth
                        </div>
                    </div>
                @empty
                    <div class="no-instructors">
                        <p>Инструкторы не найдены</p>
                    </div>

                @endforelse
            </div>
                @auth
                    @if(auth()->user()->isAdmin())
                        <div class="admin-add-instructor">
                            <a href="{{ route('admin.instructors.create') }}" class="btn-add-instructor">
                                + Добавить инструктора
                            </a>

                        </div>
                    @endif
                @endauth
            @if($instructors->hasPages())
                <div class="pagination-container">
                    <div class="pagination-wrapper">
                        {{ $instructors->links('pagination::simple-tailwind') }}
                    </div>
                </div>
            @endif

            @if(isset($selectedInstructor) && $selectedInstructor)
                <div id="instructorInfo" class="instructor-info">
                    <div class="contInstructorImgAbout marginTopInstructor">
                        <img class="instructorImgAbout" src="{{ asset('storage/' . $selectedInstructor->photo) }}" alt="{{ $selectedInstructor->fio }}">
                        <div class="imageOverlayInstructorAbout">
                            <div class="imageOverlayContInstructor">
                                <div class="imageTitleInstructor">
                                    <p class="imageTxtTitleInstructor">{{ $selectedInstructor->fio }}</p>
                                </div>
                                <div class="contAboutInstructor">
                                    <div class="firstRowAboutInstructor">
                                        <p class="txtAboutInstructor first">{{ $selectedInstructor->experience }}</p>
                                        <p class="txtAboutInstructor second">{{ $selectedInstructor->skills }}</p>
                                    </div>
                                    <div class="secondRowAboutInstructor">
                                        <p class="txtAboutInstructor third">{!! nl2br(e($selectedInstructor->drone_types)) !!}</p>
                                        <p class="txtAboutInstructor fourd">{{ $selectedInstructor->achievements }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="buttonSupportCall">
                            <div>
                                <button class="openOverlay">Задать вопрос</button>
                            </div>
                        </div>
                    </div>

                    <!-- Кнопка закрытия -->
                    <div class="close-instructor-info">
                        <a href="{{ route('instructors') }}" class="btn-close-info">× Закрыть</a>
                    </div>
                </div>
            @endif


            <div class="filter-container">
                <input type="text" id="instructorFilter" placeholder="Поиск по имени инструктора..." class="instructor-filter" onkeyup="filterInstructors()">
            </div>
        </div>
    </main>

    <script>
        function showInstructorInfo(instructorId) {
            window.location.href = "{{ route('instructors') }}?instructor_id=" + instructorId;
        }
        function filterInstructors() {
            const filter = document.getElementById('instructorFilter').value.toLowerCase();
            const instructors = document.querySelectorAll('.instructor-card-link');

            instructors.forEach(instructor => {
                const name = instructor.querySelector('.cardTxtInstructor').textContent.toLowerCase();
                if (name.includes(filter)) {
                    instructor.style.display = 'block';
                } else {
                    instructor.style.display = 'none';
                }
            });
        }


        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.btn-delete-instructor').forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    event.stopPropagation();

                    if (confirm('Вы уверены, что хотите удалить этого инструктора?')) {
                        window.location.href = this.href;
                    }
                });
            });
        });
    </script>
@endsection

