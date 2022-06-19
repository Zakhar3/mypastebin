@extends('layout')

@section('main_content')
<h3>Создать новую вставку</h3><br>
    <form method="post" actione="/newpaste/check">
        @csrf
        <sub style="margin-right: 125px;">Выбор синтаксиса</sub>
        <sub style="margin-right: 160px;">Тип доступа</sub>
        <sub>Срок доступа</sub><br>
        <select name="syntax" class="form-control" style="width: 220px; display: inline; margin-right: 5px;">
        <option>Пункт 1</option>
        <option>Пункт 2</option>
    </select>
        <select name="type" class="form-control" style="width: 220px; display: inline; margin-right: 5px;">
        <option>Пункт 1</option>
        <option>Пункт 2</option>
    </select>
        <select name="time" class="form-control" style="width: 220px; display: inline; margin-right: 5px;">
        <option>Пункт 1</option>
        <option>Пункт 2</option>
    </select>
        <br><br>
        <input type="text" name="title" placeholder="Введите название" class="form-control" style="width: 620px;"><br>

        <textarea name="text" placeholder="Введите текст" class="form-control" style="width: 720px;"></textarea><br>
        <button type="submit" class="btn btn-primary">Создать новую вставку</button>
</form>
@endsection