<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="test.php" method="POST">
        <input type="number" name="number">
        <input type="submit" name="submit">
    </form>
    <?php

        if (isset($_POST['submit'])) {
            $num = $_POST['number'];
            echo '<br>';
            echo 'Square of given number '.$num.' is '.$num*$num;
        }

    ?>
</body>
</html>