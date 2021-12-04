<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="app.css">
    <script src="https://code.jquery.com/jquery-1.11.0.min.js" integrity="sha256-spTpc4lvj4dOkKjrGokIrHkJgNA0xMS98Pw9N7ir9oI=" crossorigin="anonymous"></script>
    <title>部品管理一覧</title>
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
        #time {
            text-align: right;
        }
        /* a {
            color: #000;
        } */
        .btn {
            border-radius: 3px;
            background-color: transparent;
            border-color: transparent;
            height: auto;
            padding: 2px 12px 2px 12px;
            
        }
        .btn-outline-primary {
            margin-bottom: 5px;
        }
        .register {
            text-align: right;
        }
        h1 {
            font-size: 30px;
            font-weight: bold;
            margin: 20px;
            letter-spacing: 6px;
        }
        .table th {
            color: #fff;
        }
        .table td {
            width: auto;
            color: #fff;
        }
        .search {
            margin-bottom: 5px;
            text-align: right;
        }
        .searchbutton {
            padding: 2px 12px;
            border-radius: 3px;
            background-color: transparent;
            border-color: transparent;
        }
        .area {
            display: flex;
            position: relative;
            width: 100%;
        }
        .copy_button {
            background-color: transparent;
            border-color: transparent;
            color: #fff;
            position: absolute;
            right: 0;
            top: 0;
        }
        img {
            width: 20px;
            opacity: 0;
        }
        img:hover {
            filter: invert(88%) sepia(61%) saturate(0%) hue-rotate(229deg) brightness(107%) contrast(101%);
            opacity: 1;
        }
        .td-left{
            text-align: left;
        }
        .td-center{
            text-align: center;
        }
    </style>
    <div class="container">
        <h1>部品一覧</h1>
        <p id="time">ここに日時を表示します</p>
        <div class="register">
            <a href="/register" class="btn btn-outline-primary">登録</a>
        </div>
        <form action="{{ route('search') }}" class="search" method="GET">
            @csrf
            <input type="serarch" placeholder="キーワード入力" name="keyword" value="{{ $keyword }}" id="keyword" onfocus="this.select();">
            <input type="serarch" placeholder="在庫数" name="quantity" value="{{ $quantity }}" onfocus="this.select();">
            <input type="submit" value="検索" class="searchbutton btn-outline-warning">
        </form>
        @if($parts->count())
        <div class="list">
            <table class="table table-bordered">
                <tr>
                    <th>品番</th>
                    <th>名称</th>
                    <th class="td-center">在庫</th>
                    <th class="">編集</th>
                    <th class="">削除</th>
                </tr>
                <?php
                    $i = 1; 
                ?>
                @foreach($parts as $part)
                    <tr>
                        <td class="td-left">
                            <div class="area">
                                <p id="copyTarget<?php echo $i; ?>">{{ $part->number }}</p>
                                <button id="copy_number<?php echo $i; ?>" value="クリップボードへコピーする" onclick="onClickCopy3('copy_number'+<?php echo $i; ?>)" class="copy_button"><img src="{{ asset('img/check-list.png') }}" alt="コピー"></button>
                            </div>
                        </td>
                        <td class="td-left">
                            <div class="area">
                                <p id="copyTarget<?php echo $i; ?>">{{ $part->name }}</p>
                                <button id="copy_name<?php echo $i; ?>" value="クリップボードへコピーする" onclick="onClickCopy3('copy_name'+<?php echo $i; ?>)" class="copy_button"><img src="{{ asset('img/check-list.png') }}" alt="コピー"></button>
                            </div>
                        </td>
                        <td class="td-center">{{ $part->quantity }}</td>
                        <td class="td-center">
                            <a href="{{url('edit',[$part->id])}}" class="btn btn-outline-success list-2">編集</a>
                        </td>
                        <td class="td-center">
                            <form action="{{ route('delete',$part->id) }}" method="post" >
                                @csrf
                                <input type="submit" value="削除" class="btn btn-outline-danger list-2" onclick='return confirm("削除しますか？")'>
                            </form>
                        </td>
                    </tr>
                    <?php $i++; ?>
                @endforeach
            </table>
            @else
            <p>見つかりませんでした</p>
        </div>
        @endif
    </div>
    <script>
        const now = new Date();
        const year = now.getFullYear();
        const month = now.getMonth();
        const date = now.getDate();
        const hour = now.getHours();
        const min = now.getMinutes();

        let time = year + '/' + (month + 1) + '/' + date + ' ' + hour + ':' + min;
        document.getElementById('time').textContent = time;

        function onClickCopy(id){
            // let pTag = document.getElementById(copyTarget);
            // let range = document.createRange();
            // range.selectNodeContents(pTag);
            // let selection = window.getSelection();
            // selection.removeAllRanges();
            // selection.addRange(range);
            // document.execCommand('copy');
            // selection.removeAllRanges();
            let copyId = 'copy_number'+id;
            let copydata = document.getElementById(copyId);
            let parent = copydata.parentNode;
            let children = parent.children;
            let copyTargetid = children[0].getAttribute("id");
            console.log(copyTargetid);
            let copyTarget = document.getElementById(copyTargetid);
            let keyWord = document.getElementById('keyword');
            keyWord.value = copyTarget.innerHTML;
        }
        function onClickCopy2(id){
            let copyId = 'copy_name'+id;
            let copydata = document.getElementById(copyId);
            let parent = copydata.parentNode;
            let children = parent.children;
            let copyTargetid = children[0].getAttribute("id");
            console.log(copyTargetid);
            let copyTarget = document.getElementById(copyTargetid);
            let keyWord = document.getElementById('keyword');
            keyWord.value = copyTarget.innerHTML;
        }
        function onClickCopy3(id){
            // idを取得
            let copydata = document.getElementById(id);
            // 取得したidの親クラス
            let parent = copydata.parentNode;
            // 選択した親クラスの子クラス全体を選択
            let children = parent.children;
            // children[0]:選択した子クラスの1つ目の要素を選択 [1]だと2つ目
            // innerHTML:選択した要素の中の要素を取得
            name = children[0].innerHTML
            // navigator.clipboard:コピー、及び貼り付け機能を実装することができる
            // writeText:クリップボードにコピーされた文字列を書き込むことができる
            navigator.clipboard.writeText(name)
        }
    </script>
</body>
</html>