<?php
    $loginCheck =false;
    $id = $_POST["userID"];
    $pass = $_POST["pass"];
    $users = ["id" => "username"];
    $handle = fopen("./csv/users.csv", "r");
    while ($line = rtrim(fgets($handle)) ) {
        $lineItems = explode(",", $line);
        if($lineItems[0] == $id && $lineItems[1] == $pass){
            $loginCheck = true;
            break;
        }
    }
?>

<!DOCTYPE html>
<html lang="ja" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>auth sample</title>
        <link rel="stylesheet" href="./css/bootstrap.css">
    </head>
    <body>
        <header class="jumbotron">
            <h1>auth check</h1>
        </header>
        <div class="container">
            <?php if($loginCheck): ?>
                <h1>login OK!!</h1>
            <?php else : ?>
                <h1>login failure</h1>
            <?php endif; ?>
            <a href="index.html">return to html</a>
        </div>
    </body>
</html>
