<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajax result</title>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</head>
<body>
<!-- результ из БД появится на другой странице-->
<!-- на этой странице только надпись "Товары добавлены"-->
<h2>Заказ товара</h2>
<form action="#" method="post">
    <table>
        <tr>
            <th>Выберите товар</th>
            <th>Укажите количество</th>
        </tr>
        <tr>
            <td>
                <select name="product" class="product" size="1">
                    <option value="футболка">Футболка</option>
                    <option value="шорты">Шорты</option>
                    <option value="пальто">Пальто</option>
                    <option value="юбка">Юбка</option>
                </select>
            </td>
            <td>
                <input type="text" name="quantity" class="quantity" placeholder="1">
            </td>
        </tr>
        <tr>
            <td>
            </td>
            <td>
                <input type="submit" class="my_button">
            </td>
        </tr>
    </table>
</form>
<table class="choice"></table>
<script src="js/ajax.js"></script>
<a href="php/order_list.php">Посмотреть заказы</a>
</body>
</html>