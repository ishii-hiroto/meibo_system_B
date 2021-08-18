<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>新規社員情報登録</title>
    </head>
    <body>
        <table>
            <tr>
                <td>社員名簿システム</td>
                <td>| <a href="./index.php">トップ画面</a>
                    | <a href="./entry01.php">新規社員登録</a> |
                </td>
            </tr>
        </table>
        <hr>
        <form method="POST" action="./index.php" name='mainform'><!--どこで受け取るのか-->
        <table>
            <tr>
                <th>名前</th>
                <td>
                    <input type="text" name="name01" size="20" maxlength="30" placeholder="山田太郎" />
                </td>
            </tr>
            <tr>
                <th>出身地</th>
                <td>
                    <select name="pref">
                        <?php
                            include './include/former.php';
                            foreach ($pref_array as $pref){
                            echo "<option value=''>". $pref ."</option>";
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th>性別</th>
                <td>
                    <?php
                        include './include/gender.php';
                        foreach ($gender_array as $gender){
                        echo "<input type='radio' name='gender01' value='' checked='checked'/>".$gender;
                        }
                    ?>
                </td>
            </tr>
            <tr>
                <th>年齢</th>
                <td><input type="number" name="age01" max="99" min="1" required> 歳</td>
            </tr>
            <tr>
                <th>所属部署</th>
                <td>
                    <input type="radio" name="section01" value="1" checked="checked" />第一事業部
                    <input type="radio" name="section01" value="2" />第二事業部
                    <input type="radio" name="section01" value="3" />営業
                    <input type="radio" name="section01" value="4" />総務
                    <input type="radio" name="section01" value="5" />人事
                </td>
            </tr>
            <tr>
                <th>役職</th>
                <td>
                    <input type="radio" name="grade01" value="1" checked="checked" />事業部長
                    <input type="radio" name="grade01" value="2" />部長
                    <input type="radio" name="grade01" value="3" />チームリーダー
                    <input type="radio" name="grade01" value="4" />リーダー
                    <input type="radio" name="grade01" value="5" />メンバー
                </td>
            </tr>
            <tr>
                <td><input type="submit" value="登録"></td>
                <td><input type="reset" value="リセット"></td>
            </tr>
        </table>
    </body>
</html>
