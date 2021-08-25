<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>社員情報詳細</title>
    </head>
    <body>
                <a href="./index.php">トップ画面</a>
                <a href="./entry01.php">新規社員登録へ</a>
        <?php
            $DB_DSN = "mysql:host=localhost; dbname=hishii; charset=utf8";
            $DB_USER = "webaccess";
            $DB_PW = "toMeu4rH";
            $pdo = new PDO($DB_DSN, $DB_USER, $DB_PW);

            $ID = $_GET['id'];

            $query_str = "SELECT * FROM member WHERE member.member_ID = $ID";   // 実行するSQL文を作成して変数に保持

            $sql = $pdo->prepare($query_str);     // PDOオブジェクトにSQLを渡す
            $sql->execute();                      // SQLを実行する test5
            $result = $sql->fetch();
        ?>
        <table border="1" style="border-collapse:collapse;">
            <?php
            require './include/former.php';
                echo "<tr><th>社員ID</th><td>" . $result['member_ID'] . "</td></tr>";
                echo "<tr><th>名前</th><td>" . $result['name'] . "</td></tr>";
                echo "<tr><th>出身地</th><td>" . $pref_array[$result['pref']] . "</td></tr>";
                echo "<tr><th>性別</th><td>" . $gender_array[$result['seibetu']] . "</td></tr>";
                echo "<tr><th>年齢</th><td>" . $result['age'] . "</td></tr>";
                echo "<tr><th>所属部署</th><td>" . $section_array[$result['section_ID']] . "</td></tr>";
                echo "<tr><th>役職</th><td>" . $grade_array[$result['grade_ID']] . "</td></tr>";
            ?>
        </table>

        <form method="post" action="update01.php">
            <input type="submit" name="member_ID" value='編集'>
        </form>

        <form method='post' action='delete.php' onsubmit="return check()" style="text-align:right">
            <input type="submit" name="delete" value="削除">
            <input type="hidden" name="delete" value="<?php echo $result['member_ID']; ?>" />
        </form>

        <script type="text/javascript">
            const del = document.getElementById('del');
            function check(){
                if (window.confirm('削除を行います。よろしいですか？')) {
                    return true;
                }else{
                    return false;
                }
            };
        </script>
    </body>
</html>
