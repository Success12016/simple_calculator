<?php
    $cookie_name1 = "num";
    $cookie_value1 = "";
    $cookie_name2 = "op";
    $cookie_value2 = "";
    $cookie_name3 = "result";
    $cookie_value3 = "";

    if (isset($_POST['num'])) {
        if ($_POST['num'] == 'c') {
            $num = "";
        } else {
            $num = $_POST['num'];
        }
    } else {
        $num = "";
    }

    if (isset($_POST['op'])) {
        $cookie_value1 = $_POST['input'];
        setcookie($cookie_name1, $cookie_value1, time() + (86400 * 30), "/");

        $cookie_value2 = $_POST['op'];
        setcookie($cookie_name2, $cookie_value2, time() + (86400 * 30), "");

        if (isset($_COOKIE['result'])) {
            $result = $_COOKIE['result'] + $cookie_value1;
        } else {
            $result = $cookie_value1;
        }

        setcookie($cookie_name3, $result, time() + (86400 * 30), "/");
        $num = "";
    }

    if (isset($_POST['equal'])) {
        $num = $_POST['input'];
        switch ($_COOKIE['op']) {
            case "+":
                $result = $_COOKIE['result'] + $num;
                break;
            case "-":
                $result = $_COOKIE['result'] - $num;
                break;
            case "*":
                $result = $_COOKIE['result'] * $num;
                break;
            case "/":
                $result = $_COOKIE['result'] / $num;
                break;
        }
        $num = $result;
        setcookie($cookie_name1, "", time() - (86400 * 30), "/");
        setcookie($cookie_name2, "", time() - (86400 * 30), "/");
        setcookie($cookie_name3, "", time() - (86400 * 30), "/");
    }

    if (isset($_COOKIE['result']) && empty($_COOKIE['op']) && is_numeric($num)) {
        $result = $num;
        setcookie($cookie_name1, $result, time() + (86400 * 30), "/");
        setcookie($cookie_name2, "", time() - (86400 * 30), "/");
        setcookie($cookie_name3, "", time() - (86400 * 30), "/");
        $num = $result;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="calc">
        <form action="" method="post">
            <br>
            <input type="text" class="maininput" name="input" value="<?php echo @$num ?>"> <br> <br>
            <input type="submit" class="numbtn" name="num"value="7">
            <input type="submit" class="numbtn" name="num"value="8">
            <input type="submit" class="numbtn" name="num"value="9">
            <input type="submit" class="calbtn" name="op"value="+"> <br><br>
            <input type="submit" class="numbtn" name="num"value="4">
            <input type="submit" class="numbtn" name="num"value="5">
            <input type="submit" class="numbtn" name="num"value="6">
            <input type="submit" class="calbtn" name="op"value="-"><br><br>
            <input type="submit" class="numbtn" name="num"value="1">
            <input type="submit" class="numbtn" name="num"value="2">
            <input type="submit" class="numbtn" name="num"value="3">
            <input type="submit" class="calbtn" name="op"value="*"><br><br>
            <input type="submit" class="c" name="num"value="c">
            <input type="submit" class="numbtn" name="num"value="0">
            <input type="submit" class="equal" name="equal"value="=">
            <input type="submit" class="calbtn" name="op"value="/">
        </form>
    </div>
</body>
</html>