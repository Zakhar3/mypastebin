<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" 
        content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>My-Avesome-Pastebin.tld</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet"
      href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.1/styles/vs.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.5.1/highlight.min.js"></script>
<script>hljs.initHighlightingOnLoad();</script>
</head>
<body>
    <div class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <h5 class="fs-4">My Avesome Pastebin </h5>
      </a>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="/allpaste" class="nav-link px-20 link-secondary">Общедоступные вставки</a></li>
            <li><a href="/mypaste" class="nav-link px-20 link-dark">Мои вставки</a></li>
            <li><a href="/" class="nav-link px-20 link-dark">Создать новую вставку</a></li>
        </ul>

        <div class="col-md-3 text-end">
            <a href="/login" class="btn btn-outline-primary me-2">Вход</a>
            <a href="/registration" class="btn btn-primary">Регистрация</a>
        </div>
        </header>
    </div>

    

    <div class="container">
      <div class="d-flex flex-column float-right align-items-stretch flex-shrink-0 bg-white">
    <div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-white" style="width: 320px;">
    <b class="list-group-item list-group-item-secondary align-items-center flex-shrink-0 p-3 link-dark text-decoration-none border-bottom">
      <span class="fs-5 fw-semibold">Последние общедоступные вставки</span>
</b>
    <div class="list-group list-group-flush border-bottom scrollarea">
    @foreach($datall as $elall)
      <a href="{{ route('paste.one', $elall->id) }}" class="list-group-item list-group-item-action list-group-item-light">
        <div class="d-flex w-100 align-items-center justify-content-between">
          <strong class="mb-1">{{ $elall->title }}</strong>
        </div>
      </a>@endforeach
</div>
</div>
@if(Auth::check())
<div class="d-flex flex-column float-right align-items-stretch flex-shrink-0 bg-white" style="width: 320px;">
    <b class="list-group-item list-group-item-secondary align-items-center flex-shrink-0 p-3 link-dark text-decoration-none border-bottom">
      <span class="fs-5 fw-semibold">Последние мои вставки</span>
</b>
    <div class="list-group list-group-flush border-bottom scrollarea">
    @foreach($mydat as $myel)
      <a href="{{ route('paste.one', $myel->id) }}" class="list-group-item list-group-item-action list-group-item-light">
        <div class="d-flex w-100 align-items-center justify-content-between">
          <strong class="mb-1">{{ $myel->title }}</strong>
        </div>
      </a>@endforeach
</div>
</div>@endif
</div>

          @yield('main_content')

    </div>

        <div class="container overflow-hidden">
    <footer class="py-3 my-4">
        <p class="text-center text-muted"> 2022 </p>
    </footer>
    </div>

</body>
</html>