@extends('layout')

@section('main_content')
<h3>Создать новую вставку</h3><br>
    <form method="post" actione="{{ route('paste.new') }}">
        @csrf
        <div>
        <input type="text" name="title" id="title" placeholder="Введите название" value="" class="form-control" style="width: 620px;"><br>
</div>
        <div>
        <textarea name="code" id="code" placeholder="Введите текст" value="" class="form-control" style="width: 720px; height: 320px;"></textarea><br>
</div>
        <div>
        <button type="submit" name="sendme" value="1" class="btn btn-primary">Создать новую вставку</button>
</div>
</form>
@endsection