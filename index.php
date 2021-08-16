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
                    <input type="serch" name="name" size="20" maxlength="30" placeholder="山田太郎" />
                </td>
            </tr>
            <tr>
                <td>性別：</td>
                <td>
                    <select name="gender">
                        <option value="0" selected="selected">すべて</option>
                        <option value="1">男性</option>
                        <option value="2">女性</option>
                    </select>
                </td>
                <td>部署：</td>
                <td>
                    <select name="section">
                        <option value="0" selected="selected">すべて</option>
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
                        <option value="0" selected="selected">すべて</option>
                        <option value="1">事業部長</option>
                        <option value="2">部長</option>
                        <option value="3">チームリーダー</option>
                        <option value="4">リーダー</option>
                        <option value="5">メンバー</option>
                    </select>
                </td>
                <tr>
                    <td><input type="serch" value="検索"></td>
                    <td><input type="reset" value="リセットする"></td>
                </tr>
        </table>
        <hr>
        <?php
            $DB_DSN = "mysql:host=localhost; dbname=hishi; charset=utf8";
            $DB_USER = "webaccess";
            $DB_PW = "toMeu4rH";
            $pdo = new PDO($DB_DSN, $DB_USER, $DB_PW);


            $query_str = "SELECT * FROM member WHERE LIKE % $_GET['name'] %";   //0のときどうする？for文

            echo $query_str;                                   // 実行するSQL文を画面に表示するだけ（デバッグプリント
            $sql = $pdo->prepare($query_str);                  // PDOオブジェクトにSQLを渡す
            $sql->execute();                                   // SQLを実行する
            $result = $sql->fetchAll();                        // 実行結果を取得して$resultに代入する


    </body>
</html>
