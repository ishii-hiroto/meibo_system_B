<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>新規社員情報登録ダミー画面</title>
    </head>
    <body>
        <?php
            $DB_DSN = "mysql:host=localhost; dbname=hishii; charset=utf8";
            $DB_USER = "webaccess";
            $DB_PW = "toMeu4rH";
            $pdo = new PDO($DB_DSN, $DB_USER, $DB_PW);

            $ID = $_POST["delete"];     //detail.phpのvalue値をidに渡す
            $query_str = "DELETE FROM member WHERE member.member_ID =" . $ID;   // 実行するSQL文を作成して変数に保持

            $sql = $pdo->prepare($query_str);     // PDOオブジェクトにSQLを渡す
            if ($sql->execute()) {// SQLを実行する
                header('Location:index.php');
            }
            $result = $sql->fetch();
        ?>
    </body>
</html>
