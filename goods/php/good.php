<?php
$get = $_GET;
$id = $get['id'];
var_dump($id);

$goods = [
    [
        'id' => 1,
        'title' => 'Piano',
        'price' => 2341,
        'img' => 'piano.jpg'
    ],
    [
        'id' => 2,
        'title' => 'Guitar',
        'price' => 567,
        'img' => 'guitar.jpg'
    ],
    [
        'id' => 3,
        'title' => 'Drum',
        'price' => 2564,
        'img' => 'drum.jpg'
    ]
];

$auth = 'true'; //false
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<section>
    <?php foreach ($goods as $good): ?>
        <?php if ($id == $good['id']): ?>
            <h3><?php echo $good['title']; ?></h3>
            <img src="../img/goods/<?php echo $good['img']; ?>">
            <p><?php echo $good['price'];?></p>
            <a href="good.php?id=<?php echo $good['id'] ; ?>">Подробнее</a>
        <?php endif; ?>
    <?php endforeach; ?>
</section>

<?php if($auth == 'true'): ?>
    <h3>Ваш комментарий к этому товару</h3>
    <textarea cols="50" rows="5"></textarea>
    <input type="button" value="Отправить">
<?php else: ?>
    <p><?php echo 'Оставлять комментарии к товару могут только зарегистрированные пользователи';?></p>
<?php endif; ?>
</body>
</html>