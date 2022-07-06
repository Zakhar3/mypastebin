@extends('layout')

@section('main_content')
<h3>Создать новую вставку</h3><br>
    <form method="post" actione="{{ route('paste.new') }}">
        @csrf
        <div>
        <label>Автор
        <input readonly type="text" name="author" id="author" value="{{ $author }}" class="form-control" style="width: 620px;">
        </label>
</div>
<div style="display: inline;">
<label>Выбор синтаксиса
<select name="syntax" id="syntax" class="form-control" style="width: 220px; margin-right: 5px;">
        <option value="nohighlight">Без подсветки</option>
        <option value="bash">Bash</option>
        <option value="c">C</option>
        <option value="csharp">C#</option>
        <option value="cpp">C++</option>
        <option value="css">CSS</option>
        <option value="diff">Diff</option>
        <option value="go">Go</option>
        <option value="html">HTML, XML</option>
        <option value="json">JSON</option>
        <option value="java">Java</option>
        <option value="javascript">JavaScript</option>
        <option value="kotlin">Kotlin</option>
        <option value="less">Less</option>
        <option value="lua">Lua</option>
        <option value="makefile">Makefile</option>
        <option value="markdown">Markdown</option>
        <option value="objectivec">Objective C</option>
        <option value="php">PHP</option>
        <option value="perl">Perl</option>
        <option value="plaintext">Plaintext</option>
        <option value="python">Python</option>
        <option value="python-repl">Python REPL</option>
        <option value="r">R</option>
        <option value="ruby">Ruby</option>
        <option value="rust">Rust</option>
        <option value="scss">SCSS</option>
        <option value="sql">SQL</option>
        <option value="swift">Swift</option>
        <option value="typescript">TypeScript</option>
        <option value="vbnet">Visual Basic .NET</option>
        <option value="yml">YAML</option>
    </select>
    </label>
</div>
<div style="display: inline;">
<label>Тип доступа
<select name="typed" id="typed" class="form-control" style="width: 220px; margin-right: 5px;">
        <option value="public">Общедоступная</option>
        <option {{ $onlyau }} value="onlylink">Только по ссылке</option>
        <option {{ $onlyau }} value="onlyauthor">Только автору</option>
    </select>
    </label>
</div>
<div style="display: inline;">
<label>Срок доступа
<select name="timer" id="timer" class="form-control" style="width: 220px; margin-right: 5px;">
        <option value="525600000">Без ограничения</option>
        <option value="10">10 мин</option>
        <option value="60">1 час</option>
        <option value="180">3 часа</option>
        <option value="1440">1 день</option>
        <option value="10080">1 неделя</option>
        <option value="43800">1 месяц</option>
    </select>
    </label>
</div>
        <div>
        <label>Название
        <input type="text" name="title" id="title" placeholder="Введите название" value="" class="form-control" style="width: 620px;">
        </label>
</div>
        <div>
        <label>Текст
        <textarea name="code" id="code" placeholder="Введите текст" value="" class="form-control" style="width: 720px; height: 320px;"></textarea>
        </label>
</div>
        <div>
        <button type="submit" name="sendme" value="1" class="btn btn-primary">Создать новую вставку</button>
</div>
</form>
@endsection