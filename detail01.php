<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <!-- ↓bootsstrapのStarter template -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <!-- <title>社員情報検索</title> -->
        <title>社員情報詳細</title>
        <!---これが最新版です08/27-->
    </head>
    <body>
        <table align="center">
            <tr>
                <td>
                    <span style="font-weight: bold; font-family: Noto Sans JP, sans-serif; font-size: 35pt">
                        社員名簿システム</span>
                </td>
            </tr>
        </table>
        <table align="right">
            <tr>
                <td>
                    <span style="font-family: Noto Sans JP, sans-serif; font-size: 17pt">
                        | <a  href="./index.php">トップ画面</a>
                        | <a href="./entry01.php">新規社員登録へ</a> |
                    </span>
                </td>
            </tr>
        </table><br>
        <hr>
        <?php
            $DB_DSN = "mysql:host=localhost; dbname=hishii; charset=utf8";
            $DB_USER = "webaccess";
            $DB_PW = "toMeu4rH";
            $pdo = new PDO($DB_DSN, $DB_USER, $DB_PW);

            $ID = $_GET['id'];

            $query_str = "SELECT * FROM member LEFT JOIN section1_master ON section1_master.ID = member.section_ID
                          LEFT JOIN grade_master ON grade_master.ID = member.grade_ID WHERE member.member_ID =" . $ID;   // 実行するSQL文を作成して変数に保持

            $sql = $pdo->prepare($query_str);     // PDOオブジェクトにSQLを渡す
            $sql->execute();                      // SQLを実行する test5
            $result = $sql->fetch();
        ?>
        <!--table border="1" style="border-collapse:collapse;"-->
        <table class='table table-striped table-info' style='width:700px' align='center'>
            <?php
            require './include/former.php';
                echo "<tr><th style='text-align:center'>社員ID</th><td>" . $result['member_ID'] . "</td></tr>";
                echo "<tr><th style='text-align:center'>名前</th><td>" . $result['name'] . "</td></tr>";
                echo "<tr><th style='text-align:center'>出身地</th><td>" . $pref_array[$result['pref']] . "</td></tr>";
                echo "<tr><th style='text-align:center'>性別</th><td>" . $gender_array[$result['seibetu']] . "</td></tr>";
                echo "<tr><th style='text-align:center'>年齢</th><td>" . $result['age'] . "</td></tr>";
                echo "<tr><th style='text-align:center'>所属部署</th><td>" . $result['section_name'] . "</td></tr>";
                echo "<tr><th style='text-align:center'>役職</th><td>" . $result['grade_name'] . "</td></tr>";
            ?>
        </table>
        <table align="center">
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
