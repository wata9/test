<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="app.css">
    <title>部品編集</title>
</head>
<body>
    <style>
        body {
            background-color: #333;
            color: #fff;
        }
        .container {
            text-align: center;
            max-width: 400px;
        }
        h1 {
            font-weight: bold;
            margin-top: 100px;
            margin-bottom: 50px;
            letter-spacing: 10px;
        }
        .text {
            width: 100%;
            padding: 0;
            margin: 10px 0 10px 0;
            height: 40px;
        }
        .stock {
            justify-content: space-between;
        }
        .text1 {
            width: 180px;
        }
        .btn {
            margin: 15px 0 10px 0;
        }
        a {
            color: #6c757d;
            text-decoration: none;
        }
        a:hover{
            color: #fff;
        }
        .stock {
            display: flex;
        }
    </style>
    <div class="container">
        <h1>部品編集</h1>
        <div class="edit">
            <form action="{{ route('edit',['id' => $part->id]) }}" method="POST">
                @csrf
                <input type="text" placeholder="品番" value="{{ $part->number }}" class="text" name="number" onfocus="this.select();"><br>
                <input type="text" placeholder="名称" value="{{ $part->name }}" class="text" name="name" onfocus="this.select();"><br>
                <input type="text" value=" 現在庫 : {{ $part->quantity }}" class="text" name="quantity" disabled><br>
                <div class="stock">
                    <input type="number" placeholder="入庫" class="text1" name='plus'>
                    <input type="number" placeholder="出庫" class="text1" name='minus'>
                </div>
                <br>
                <button class="btn btn-outline-success">編集</button><br>
            </form>
            <a href="{{ route('home') }}"><button class="btn btn-outline-secondary">キャンセル</button></a>
        </div>
    </div>
    <script>
        
    </script>
</body>
</html>