@extends('layout')

@section('content')
    <div class="instructor-form-container">
        <h1 class="form-title">Добавить новый курс</h1>

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

        <form action="{{ route('admin.courses.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label class="form-label">Название курса *</label>
                <input type="text" name="name" class="form-input" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label class="form-label">Описание *</label>
                <textarea name="description" class="form-textarea" required>{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label class="form-label">Количество часов *</label>
                <input type="number" name="quantity" class="form-input" value="{{ old('quantity', 0) }}" required>
            </div>

            <div class="form-group">
                <label class="form-label">Инструктор *</label>
                <select name="instructor_id" class="form-input" required>
                    <option value="">Выберите инструктора</option>
                    @foreach($instructors as $instructor)
                        <option value="{{ $instructor->id }}" {{ old('instructor_id') == $instructor->id ? 'selected' : '' }}>
                            {{ $instructor->fio }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label class="form-label">Цена (руб.) *</label>
                <input type="text" name="price" class="form-input" value="{{ old('price') }}" required>
            </div>

            <div class="form-group">
                <label class="form-label">Фото курса *</label>
                <input type="file" name="photo" class="form-input-file" accept="image/*" required>
            </div>

            <button type="submit" class="btn-submit">Добавить курс</button>
        </form>
    </div>
@endsection
