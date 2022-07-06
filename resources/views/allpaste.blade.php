@extends('layout')

@section('main_content')
    <h3>Общедоступные вставки</h3>
    @error('name')
        <div class="alert alert-info">{{ $message }}</div>
        @enderror
    @foreach($data as $el)
    <div>
        <a href="{{ route('paste.one', $el->id) }}"><h5 style="display: inline;">{{ $el->title }}</h5></a>
        <small>{{ $el->created_at }}</small>
</div>
    @endforeach
@endsection