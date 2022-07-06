@extends('layout')

@section('main_content')
    <h3>Вход</h3><br>
    <form method="POST" actione="{{ route('user.login') }}">
        @csrf
    <div>
        <input type="text" id="name" name="name" value="" placeholder="Введите логин" class="form-control" style="width: 320px;"><br>
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
</div>
    <div>
        <input type="password" id="password" name="password" value="" placeholder="Введите пароль" class="form-control" style="width: 320px;"><br>
        @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
</div>
    <div>
        <button type="submit" name="sendme" value="1" class="btn btn-lg btn-primary">Войти</button>
</div>
</form>
@endsection