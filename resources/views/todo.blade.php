<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todolist</title>
    <link rel='stylesheet' href="{{asset ('/assets/css/todo.css')}}">
</head>
<body>
    <ul class='ul'>
        <li>Todo</li>
        @if (isset ($runningItems))
        @foreach ($runningItems as $runningItem)
            <li class='todo'>{{htmlspecialchars ($runningItem->title) ."　　" .htmlspecialchars ($runningItem->content)}}</li>
            <li>
                <form method='POST' action="/todo/update">
                    {{csrf_field ()}}
                    <input type='hidden' value="{{$runningItem->id}}" name='id'>
                    <input type='hidden' value="{{$runningItem->flg}}" name='flg'>
                    <input type='submit' value='終了' class='todo_button'>
                </form>
            </li>
        @endforeach
        @endif
    </ul>

    <ul class='ul'>
        <li>Done</li>
        @if (isset($doneItems))
        @foreach ($doneItems as $doneItem)
            <li class='todo'>{{htmlspecialchars ($doneItem->title) ."　　" .htmlspecialchars ($doneItem->content)}}</li>
            <li>
                <form method='POST' action="todo/delete">
                    {{csrf_field ()}}
                    <input type='hidden' value="{{$doneItem->id}}" name='id'>
                    <input type='hidden' value="{{$doneItem->flg}}" name='flg'>
                    <input type='submit' value='削除' class='todo_button'>
                </form>
            </li>
        @endforeach
        @endif
    </ul>
		
    <form method="POST" class='form' action="/todo" action="todo/create">
        {{csrf_field ()}}
        <input type="text" placeholder="タイトル" name="title" class='title'>
        <textarea placeholder="内容" name='content' class='content'></textarea>
        <input type="submit" value="追加" class='todo_button'>
    </form>
</body>
</html>
