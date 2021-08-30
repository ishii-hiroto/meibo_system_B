<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <!-- ↓bootsstrapのStarter template -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <title>社員情報検索</title>
        <title>社員情報詳細</title>
        <!---これが最新版です08/27-->
    </head>
    <body>
        <table>
            <tr>
                <big>社員名簿システム
                | <a href="./index.php">トップ画面</a>
                | <a href="./entry01.php">新規社員登録へ</a> |
            </tr>
        </table>
        <hr>
        <?php
            $DB_DSN = "mysql:host=localhost; dbname=hishii; charset=utf8";
            $DB_USER = "webaccess";
            $DB_PW = "toMeu4rH";
            $pdo = new PDO($DB_DSN, $DB_USER, $DB_PW);

            $ID = $_GET['id'];

            $query_str = "SELECT * FROM member WHERE member.member_ID =" . $ID;   // 実行するSQL文を作成して変数に保持

            $sql = $pdo->prepare($query_str);     // PDOオブジェクトにSQLを渡す
            $sql->execute();                      // SQLを実行する test5
            $result = $sql->fetch();
        ?>
        <!--table border="1" style="border-collapse:collapse;"-->
        <table class='table table-striped table-info'>
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
        <table>
            <form method="post" action="update01.php?member_ID=<?php echo $ID;?>">
                <tr>
                    <td><input type="submit" name="member_ID"class="btn btn-secondary"Secondary value='編集'></td>
            </form>

            <form method='post' action='delete.php' onsubmit="return check()" style="text-align:right">
                    <td><input type="submit" name="delete"class="btn btn-secondary"Secondary value="削除">
                        <input type="hidden" name="delete" value="<?php echo $result['member_ID']; ?>" /></td>
                </tr>
            </form>
        </table>

        <script type="text/javascript">
            //const del = document.getElementById('del');
            function check(){
                if (window.confirm('削除を行います。よろしいですか？')) {
                    return true;
                }else{
                    return false;
                }
            };
        </script>
        <!-- ↓bootsstrapのStarter template -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    </body>
</html>
