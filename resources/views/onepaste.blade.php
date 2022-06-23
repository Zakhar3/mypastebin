@extends('layout')

@section('main_content')
    <h3>{{ $data->title }}</h3>
    <div class="alert alert-info">
        <p>{{ $data->code }}</p>
        <p><small>{{ $data->created_at }}</small></p>
</div>
@endsection