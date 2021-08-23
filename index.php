<!DOCTYPE html>
<html>
    <head>test2
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>社員情報詳細</title>
    </head>
    <body>
            <tr>
                <td>社員名簿システム</td>
                <td>| <a href="./index.php">トップ画面</a>
                    | <a href="./entry01.php">新規社員登録へ</a> |
                </td>
            </tr>
            <hr>
        <table>
            <tr>
            <th>社員ID</th>
                <td>
                </td>
            </tr>
            <tr>
            <th>名前</th>
                <td>
                </td>
            </tr>
            <tr>
            <th>出身地</th>
                <td>
                </td>
            </tr>
            <tr>
            <th>性別</th>
                <td>
                </td>
            </tr>
            <tr>
            <th>年齢</th>
                <td>
                </td>
            </tr>
            <tr>
            <th>所属部署</th>
                <td>
                </td>
            </tr>
            <tr>
            <th>役職</th>
                <td>
                </td>
            </tr>
            <tr>
            <td>
                <input type="button" onclick="location.href='./update01.php'" value="編集">
                <input type="reset" value="削除"
                onclick="return confirm('削除ボタンがクリックされました。本当に入力内容を削除してもよろしいですか？');">
            </td>
            </tr>
<<<<<<< HEAD
=======
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

<<<<<<< HEAD
            foreach ($result as $x) {
                echo "<tr><td style='text-align: right'>" . $x['member_ID'] . "</td>";
                echo "<td>" .
                        "<a href='datail01.php'>" .
                            $x['name'] .
                        "</a>" .
                    "</td>";
                echo "<td>" . $x['section_name'] . "</td>";
                echo "<td >" . $x['grade_name'] . "</td></tr>";
=======

            $CNT = count($result);

            if($CNT == 0){
                echo "<tr><td colspan='5'>検索結果なし</td></tr>";
            }else{

                foreach ($result as $x) {
                    echo "<tr><td style='text-align: right'>" . $x['member_ID'] . "</td>";
<<<<<<< HEAD
                    echo "<td><a href='datail01.php?member_ID=".
                                $x['member_ID']"'>".
                                $x['name']."</a>" ."</td>";
=======
                    echo "<td><a href='datail01.php?id=" .
                        $x['member_ID'] . "'>" .
                        $x['name'] . "</a></td>";
>>>>>>> 00dbd68e8cd48a1e2ed71ca2589f3bc0ed8b4121
                    echo "<td>" . $x['section_name'] . "</td>";
                    echo "<td >" . $x['grade_name'] . "</td></tr>";
                }
>>>>>>> 00dbd68e8cd48a1e2ed71ca2589f3bc0ed8b4121
            }
        ?>
        </table>
    </body>
</html>
