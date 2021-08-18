<!DOCTYPE html>
<html>
    <head>test
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
        </table>
    </body>
</html>
