@extends('layout')

@section('content')
    <div class="instructor-form-container">
        <h2 class="form-title">Добавить инструктора</h2>

        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert-error">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.instructors.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label class="form-label">ФИО инструктора:</label>
                <input type="text" name="fio" value="{{ old('fio') }}" required class="form-input">
            </div>

            <div class="form-group">
                <label class="form-label">Аватар (для списка):</label>
                <input type="file" name="photo" accept="image/*" required class="form-input-file">
            </div>


            <div class="form-group">
                <label class="form-label">Опыт работы:</label>
                <textarea name="experience" required class="form-textarea">{{ old('experience') }}</textarea>
            </div>

            <div class="form-group">
                <label class="form-label">Навыки и качества:</label>
                <textarea name="skills" required class="form-textarea">{{ old('skills') }}</textarea>
            </div>

            <div class="form-group">
                <label class="form-label">Типы дронов (каждый с новой строки):</label>
                <textarea name="drone_types" required class="form-textarea">{{ old('drone_types') }}</textarea>
            </div>

            <div class="form-group">
                <label class="form-label">Достижения:</label>
                <textarea name="achievements" required class="form-textarea">{{ old('achievements') }}</textarea>
            </div>

            <button type="submit" class="btn-submit">Добавить инструктора</button>
        </form>
    </div>
@endsection
