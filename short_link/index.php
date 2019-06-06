<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Input_link</title>
</head>
<body>
<form name="form_link" method="POST" action="link_handle.php">
    <input type="url" name="link" placeholder="введите ссылку">
    <input type="submit" value="Получить короткую ссылку">
</form>
<div id="message_success"></div>
<script src="js/validating.js"></script>
</body>
</html>
