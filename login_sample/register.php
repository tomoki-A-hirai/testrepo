<?php
$userID = $_POST["userID"];
$pass1 = $_POST["pass1"];
$pass2 = $_POST["pass2"];
$registerCheck = false;
$duplication = false;
$doubleCheck = false;

if ($pass1 === $pass2) {
    $doubleCheck = true;
    $handleR = fopen("./csv/users.csv", "r");
    while ($line = rtrim(fgets($handleR)) ) {
        $lineItems = explode(",", $line);
        if($lineItems[0] == $userID && $lineItems[1] == $pass1){
            $duplication = true;
            break;
        }
    }
    if(!$duplication){
        $handleA = fopen("./csv/users.csv", "a");
        fwrite($handleA, "$userID,$pass1\r\n");
        $registerCheck = true;
        fclose($handleA);
    }
    fclose($handleR);
}

?>

<!DOCTYPE html>
<html lang="ja" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>register user</title>
        <link rel="stylesheet" href="./css/bootstrap.css">
    </head>
    <body>
        <header class="jumbotron">
            <h1>register new users</h1>
        </header>
        <div class="container">
            <?php if($registerCheck): ?>
                <h1>registered the following items</h1>
                <div class="row">
                    <table class="table col-md-2">
                        <tr>
                            <td>id : </td>
                            <td><?php echo $userID; ?></td>
                        </tr>
                        <tr>
                            <td>pass : </td>
                            <td><?php
                                    $showPass =substr($pass1, "0","2");
                                    for ($i=0; $i < strlen($pass1)-2; $i++) {
                                        $showPass .= "*";
                                    }
                                    echo $showPass;
                                    ?>
                                </td>
                        </tr>
                    </table>
                </div>
            <?php elseif(!$doubleCheck): ?>
                <h1>Double check error<br>Please enter your password again</h1>
                <h2><a href="signup.html">return to signup page</a></h2>
            <?php elseif($duplication): ?>
                <h1>Already registered<br>Please enter your userID and password again</h1>
                <h2><a href="signup.html">return to signup page</a></h2>
            <?php endif; ?>
        </div>
        <div class="container">
            <a href="index.html"> return to index</a>
        </div>
    </body>
</html>
