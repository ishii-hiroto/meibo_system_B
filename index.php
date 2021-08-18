<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>社員情報検索</title>
    </head>
    <body>
        <table>
            <tr>
                <td>社員名簿システム</td>
                <td>| <a href="./index.php">トップ画面</a>
                    | <a href="./entry01.php">新規社員登録へ</a> |
                </td>
            </tr>
        </table>
        <hr>

        <form method="GET" action="./index.php" name='searchform'>
        <table>
            <tr>
                <td>名前：</td>
                <td>
                    <input type="text" name="name" size="20" maxlength="30" placeholder="山田太郎" value="">
                </td>
            </tr>
            <tr>
                <td>性別：</td>
                <td>
                    <select name="gender">
                        <option value="" selected>すべて</option>
                        <option value="1">男性</option>
                        <option value="2">女性</option>
                    </select>
                </td>
                <td>部署：</td>
                <td>
                    <select name="section">
                        <option value="" selected>すべて</option>
                        <option value="1">第一事業部</option>
                        <option value="2">第二事業部</option>
                        <option value="3">営業</option>
                        <option value="4">総務</option>
                        <option value="5">人事</option>
                    </select>
                </td>
                <td>役職：</td>
                <td>
                    <select name="grade">
                        <option value="" selected>すべて</option>
                        <option value="1">事業部長</option>
                        <option value="2">部長</option>
                        <option value="3">チームリーダー</option>
                        <option value="4">リーダー</option>
                        <option value="5">メンバー</option>
                    </select>
                </td>
                <tr>
                    <td><input type="submit" value="検索"></td>
                    <td><input type="reset" value="リセットする"></td>
                </tr>
        </table>
        <hr>
        <table border="1" style="border-collapse:collapse;">
            <tr>
                <th>社員ID</th>
                <th>名前</th>
                <th>部署</th>
                <th>役職</th>
            </tr>
        <?php
            $DB_DSN = "mysql:host=localhost; dbname=hishii; charset=utf8";
            $DB_USER = "webaccess";
            $DB_PW = "toMeu4rH";
            $pdo = new PDO($DB_DSN, $DB_USER, $DB_PW);

            $query_str = "SELECT * FROM member
                          LEFT JOIN section1_master ON section1_master.ID = member.section_ID
                          LEFT JOIN grade_master ON grade_master.ID = member.grade_ID
                          WHERE 1";   // 実行するSQL文を作成して変数に保持

            $where_str = "";
            $cond_name = "";
            $cond_gender = "";
            $cond_section = "";
            $cond_grade = "";

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


            $query_str = $query_str .= $where_str; //あとで修正、平子さんからＦＢ

            echo $query_str;                                   // 実行するSQL文を画面に表示するだけ（デバッグプリント
            $sql = $pdo->prepare($query_str);                  // PDOオブジェクトにSQLを渡す
            $sql->execute();                                   // SQLを実行する
            $result = $sql->fetchAll();                        // 実行結果を取得して$resultに代入する
            echo "検索件数：" . count($result);

            foreach ($result as $x) {
                echo "<tr><td style='text-align: right'>" . $x['member_ID'] . "</td>";
                echo "<td>" . $x['name'] . "</td>";
                echo "<td>" . $x['section_name'] . "</td>";
                echo "<td >" . $x['grade_name'] . "</td></tr>";
            }
        ?>
        </table>
        <pre>
            <?php
                var_dump($result);
            ?>
        </pre>
    </body>
</html>
