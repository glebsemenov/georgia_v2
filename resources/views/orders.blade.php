<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Заказы</title>
    <link href="css/orders/styles.css" rel="stylesheet">
</head>
<body>
<table>
    <tr>
        <th>ID</th>
        <th>Почта</th>
        <th>Заезд</th>
        <th>Выезд</th>
        <th>Взрослые</th>
        <th>Дети</th>
        <th>Комментарий</th>
        <th>ID отеля</th>
        <th>Тип комнаты</th>
    </tr>
    @foreach($orders as $order)
        <tr>
            <td></td>
        </tr>
    @endforeach
</table>
</body>
</html>