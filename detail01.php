<!DOCTYPE html>
<html>
    <head>test2
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>社員情報詳細</title>
    </head>
    <body>
        <tr>
            <th>社員名簿システム</th>
            <td>
                <a href="./index.php">トップ画面</a>
                <a href="./entry01.php">新規社員登録へ</a>
            </td><hr>
        </tr>
        <?php
            $DB_DSN = "mysql:host=localhost; dbname=hishii; charset=utf8";
            $DB_USER = "webaccess";
            $DB_PW = "toMeu4rH";
            $pdo = new PDO($DB_DSN, $DB_USER, $DB_PW);

            if (isset($_GET['id'])){$id=$_GET['id'];}  //URLパラメータから値を取得する
            echo $id;

            $ID = $_GET['id'];

            $query_str = "SELECT * FROM member WHERE member.member_ID = $ID";   // 実行するSQL文を作成して変数に保持
            echo $query_str;

            $sql = $pdo->prepare($query_str);     // PDOオブジェクトにSQLを渡す
            $sql->execute();                      // SQLを実行する test5
            $result = $sql->fetchAll();
        ?>
        <pre>
            <?php
                var_dump($result);
            ?>
        </pre>
        <?php
            $where_str = "";
            $cond_name = "";
            $cond_gender = "";//性別
            $cond_section = "";//
            $cond_grade = "";//年齢

            if(isset($_GET['name']) && !empty($_GET['name'])){
                $where_str .= " AND name LIKE '%" . $_GET['name'] . "%'";
                $cond_name = $_GET['name'];
            }
            if(isset($_GET['gender']) && !empty($_GET['gender'])){
                $where_str .= " AND seibetu = '" . $_GET['gender'] . "'";
                $cond_gender = $_GET['gender'];
            }
            if(isset($_GET['section']) && !empty($_GET['section'])){
                $where_str .= " AND section_ID = '" . $_GET['section'] . "'";
                $cond_section = $_GET['section'];
            }
            if(isset($_GET['grade']) && !empty($_GET['grade'])){
                $where_str .= " AND grade_ID = '" . $_GET['grade'] . "'";
                $cond_grade = $_GET['grade'];
            }
        ?>
        <table border="1" style="border-collapse:collapse;">
            <tr>
                <th>社員ID</th>
                <td>a</td>
            </tr>
            <tr>
                <th>名前</th>
                <td>a</td>
            </tr>
            <tr>
                <th>出身</th>
                <td>a</td>
            </tr>
            <tr>
                <th>性別</th>
                <td>a</td>
            </tr>
            <tr>
                <th>年齢</th>
                <td>a</td>
            </tr>
            <tr>
                <th>所属部署</th>
                <td>a</td>
            </tr>
            <tr>
                <th>役職</th>
                <td>a</td>
            </tr>
        </table>
        <table>
            <?php
                foreach ($result as $x) {
                    if (!empty($_GET["member_ID"])){
                    echo "<tr><td style='text-align: right'>" . $x['member_ID'] . "</td>";
                    }
                    if (!empty($_GET["gender_name"])){
                    echo "<td>" . $x['gender_name'] . "</td>";
                    }
                    if (!empty($_GET["section_name"])){
                    echo "<td>" . $x['section_name'] . "</td>";
                    }
                    if (!empty($_GET["grade_name"])){
                    echo "<td>" . $x['grade_name'] . "</td></tr>";
                    }
                }
            ?>
            <tr>
                <td>
                    <input type="button" onclick="location.href='./update01.php'" value="編集">
                    <input type="reset" value="削除"
                    onclick="return confirm('削除ボタンがクリックされました。本当に入力内容を削除してもよろしいですか？');">
                </td>
            </tr>
        </table>
    </body>
</html>
