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
    <fieldset style="width: 40%;">
        <legend><h4>Запись на прием</h4></legend>
        <!-- такие директории  'php/handle_form.php', потому что пляшет от 'index.php'-->
        <form method="post" action="">
            <p><input type="text" name="patient" value="<?php echo $this->getName(); ?>"></p>
            <p id="message_error"></p>
            <p><input class="validate" type="text" name="date" placeholder="дд.мм.гггг"></p>
            <p><input class="validate" type="text" name="time" placeholder="чч:мм"></p>
            <p><input type="submit" value="Записаться"></p>
        </form>
    </fieldset>
    <script type="text/javascript" src="js/form.js"></script>
<?php
//$post = $_POST;
//echo $post['patient']. "<br>";
//echo $post['date']. "<br>";
//echo $post['time']. "<br>";

?>

</body>
</html>