<?php
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
]
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/goods_style.css">
    <title>goods</title>
</head>
<body>

<section>
    <?php foreach ($goods as $good): ?>
        <h3><?php echo $good['title']; ?></h3>
        <img src="img/goods/<?php echo $good['img']; ?>">
        <p><?php echo $good['price'];?></p>
    <a href="php/good.php?id=<?php echo $good['id'] ; ?>">Подробнее</a>
    <?php endforeach; ?>
</section>

</body>
</html>