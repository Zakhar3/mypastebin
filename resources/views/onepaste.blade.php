@extends('layout')

@section('main_content')
    <h3>{{ $data->title }}</h3>
    <b>Автор: {{ $data->author }}</b>
    <p><small>{{ $data->created_at }}</small></p>
    <div>
        <pre>
        <code class="language-{{ $data->syntax }} form-control" style="height: auto;">{{ $data->code }}</code>
</pre>
</div>
@endsection