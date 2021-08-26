<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>新規社員情報登録ダミー画面</title>
    </head>
    <body>
        <pre>
            <?php
                var_dump($_POST);
            ?>
        </pre>
        <?php
            $DB_DSN = "mysql:host=localhost; dbname=hishii; charset=utf8";
            $DB_USER = "webaccess";
            $DB_PW = "toMeu4rH";
            $pdo = new PDO($DB_DSN, $DB_USER, $DB_PW);

            $name = $_POST['name01'];
            $pref = $_POST['pref'];
            $gender = $_POST['gender01'];
            $age = $_POST['age01'];
            $section = $_POST['section01'];
            $grade = $_POST['grade01'];


            $query_str = "INSERT INTO member VALUES
                        (NULL, '" . $name . "', '"
                            . $pref . "', '"
                            . $gender . "', '"
                            . $age . "', '"
                            . $section . "', '"
                            . $grade . "')";
            $ID=$_GET['id'];
            echo $query_str;                                   // 実行するSQL文を画面に表示するだけ（デバッグプリント
            $sql = $pdo->prepare($query_str);   // PDOオブジェクトにSQLを渡す
            if ($sql->execute()) {
                header('Location:detail01.php?id=$ID');
            }
            $result = $sql->fetch(); //実行するときに表示
        ?>
    </body>
</html>
