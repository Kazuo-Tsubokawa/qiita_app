<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/github-markdown-css@3.0.1/github-markdown.min.css">
</head>

<body>
    <button type="button" onclick="location.href='{{ route('articles.index') }}'">一覧へ戻る</button>
    @if ($article->user->permanent_id == $user->permanent_id)
        <button type="button" onclick="location.href='{{ route('articles.edit', $article->id) }}'">編集する</button>
        <button type="submit" form="delete-form" onclick="if(!confirm('本当に削除していいですか？')){return false};">削除する</button>
        <form action="{{ route('articles.destroy', $article->id) }}" method="post" id="delete-form">
            @csrf
            @method('DELETE')
        </form>
    @endif
    @if (!empty($errors))
        <div class="error">
            @foreach ($errors->all() as $error)
                {{ $error }}
            @endforeach
        </div>
    @endif
    <h1>{{ $article->title }}</h1>
    <div class="markdown-body">
        {{-- {!! Str::markdown($article->body, ['html_input' => 'escape']) !!} --}}
        {{ $article->html }}
    </div>
</body>

</html>
