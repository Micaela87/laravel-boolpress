<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
    <script type="text/javascript" src="{{ asset('js/app.js') }}" defer></script>
    <title>Posts</title>
    <script type='text/javascript'>
        window.Laravel = <?php echo json_encode([
           'csrfToken' => csrf_token(),
       ]); ?>
    </script>
</head>
<body>
    <div id="app">
        <router-view></router-view>
    </div>
</body>
</html>