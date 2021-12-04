<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="app.css">
    <title>部品登録画面</title>
</head>
<body>
    <style>
        body {
            background-color: #333;
            color: #fff;
        }
        .container {
            text-align: center;
        }
        h1 {
            margin-top: 100px;
            margin-bottom: 50px;
            font-weight: bold;
            letter-spacing: 10px;
        }
        input {
            margin: 10px;
            width: 400px;
            height: 50px;
        }
        .btn {
            margin: 15px 0 10px 0;
        }
    </style>
    <div class="container">
        <h1>部品登録</h1>
        <form action="{{ route('store') }}" method="POST">
            @csrf
            <input type="text" placeholder="品番" name="number"><br>
            <input type="text" placeholder="名前" name="name"><br>
            <input type="text" placeholder="在庫" name="quantity"><br>
            <button class="btn btn-outline-primary">登録</button><br>
        </form>
        <a href="{{ route('home') }}"><button class="btn btn-outline-secondary">キャンセル</button></a>
    </div>
</body>
</html>