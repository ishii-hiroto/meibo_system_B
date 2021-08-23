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
            <hr>
            <?php
            $DB_DSN = "mysql:host=localhost; dbname=hishii; charset=utf8";
            $DB_USER = "webaccess";
            $DB_PW = "toMeu4rH";
            $pdo = new PDO($DB_DSN, $DB_USER, $DB_PW);

            $id = $_GET[ ' member_ID '];

            $query_str = "SELECT * FROM member WHERE member.member_ID = $id";   // 実行するSQL文を作成して変数に保持
            $sql = $pdo->prepare($query_str);     // PDOオブジェクトにSQLを渡す
            $sql->execute();                      // SQLを実行する test4
            $result = $sql->fetch();
            echo $result[ ' member_ID '];
            ?>

        <table>
            <tr>
            <th>社員ID</th>
            <td>59</td>
            </tr>

            <tr>
            <th>名前</th>
            <td>影山杏</td>
            </tr>

            <tr>
            <th>出身地</th>
            <td>宮城県</td>
            </tr>

            <tr>
            <th>性別</th>
            <td>男性</td>
            </tr>

            <tr>
            <th>年齢</th>
            <td>22</td>
            </tr>

            <tr>
            <th>所属部署</th>
            <td>第一事業部</td>
            </tr>

            <tr>
            <th>役職</th>
        　　<td>リーダー</td>
            </tr>

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
