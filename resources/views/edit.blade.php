<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New TV Series</title>
</head>
<body>
    <h1>Update TV Series</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('update', $series -> id) }}" method="POST">

        @method('POST')
        @csrf

        <label for="title">Titolo</label><br>
        <input type="text" name="title" value="{{ $series -> title }}"><br>
        <label for="author">Autore</label><br>
        <input type="text" name="author"value="{{ $series -> author }}"><br>
        <label for="release_date">Data di rilascio</label><br>
        <input type="date" name="release_date" value="{{ $series -> release_date }}"><br>
        <label for="rating">Rating</label>
        <input type="number" name="rating" min="1" max="5" value="{{ $series -> rating }}">
        <input type="submit" value="Submit">
    </form>
</body>
</html>