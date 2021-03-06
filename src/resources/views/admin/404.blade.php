

<!DOCTYPE html>
<html>
<head>
    <title>Стариница не найдена</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            color: #B0BEC5;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 72px;
            margin-bottom: 40px;
        }

        .title-sub {
            font-size: 32px;
            margin-bottom: 40px;
            text-decoration: none;
            font-weight: bold;
            color: black;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="content">
            <div class="title">Ой, станица недоступна</div>
            <p><a class="title-sub" href="{{ URL ('/') }}">Go back to home page.</a></p>
        </div>
    </div>

</body>
</html>