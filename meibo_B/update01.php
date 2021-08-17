<!DOCTYPE html>
<html>
    <head>
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
                <td><input type="number" ID="ID01"  required></td>
            </tr>

            <tr>
            <th>名前</th>
                <td><input type="text" name="name01" size="20" maxlength="30" placeholder="山田太郎" /></td>
            </tr>
            <tr>
            <th>出身地</th>
                <td>
                    <select name="pref">
                        <option value="" selected>都道府県</option>
                        <option value='1'>北海道</option>
                        <option value='2'>青森県</option>
                        <option value='3'>岩手県</option>
                        <option value='4'>宮城県</option>
                        <option value='5'>秋田県</option>
                        <option value='6'>山形県</option>
                        <option value='7'>福島県</option>
                        <option value='8'>茨城県</option>
                        <option value='9'>栃木県</option>
                        <option value='10'>群馬県</option>
                        <option value='11'>埼玉県</option>
                        <option value='12'>千葉県</option>
                        <option value='13'>東京都</option>
                        <option value='14'>神奈川県</option>
                        <option value='15'>新潟県</option>
                        <option value='16'>富山県</option>
                        <option value='17'>石川県</option>
                        <option value='18'>福井県</option>
                        <option value='19'>山梨県</option>
                        <option value='20'>長野県</option>
                        <option value='21'>岐阜県</option>
                        <option value='22'>静岡県</option>
                        <option value='23'>愛知県</option>
                        <option value='24'>三重県</option>
                        <option value='25'>滋賀県</option>
                        <option value='26'>京都府</option>
                        <option value='27'>大阪府</option>
                        <option value='28'>兵庫県</option>
                        <option value='29'>奈良県</option>
                        <option value='30'>和歌山県</option>
                        <option value='31'>鳥取県</option>
                        <option value='32'>島根県</option>
                        <option value='33'>岡山県</option>
                        <option value='34'>広島県</option>
                        <option value='35'>山口県</option>
                        <option value='36'>徳島県</option>
                        <option value='37'>香川県</option>
                        <option value='38'>愛媛県</option>
                        <option value='39'>高知県</option>
                        <option value='40'>福岡県</option>
                        <option value='41'>佐賀県</option>
                        <option value='42'>長崎県</option>
                        <option value='43'>熊本県</option>
                        <option value='44'>大分県</option>
                        <option value='45'>宮崎県</option>
                        <option value='46'>鹿児島県</option>
                        <option value='47'>沖縄県</option>
                    </select>
                </td>
            </tr>
            <tr>
            <th>性別</th>
                <td>
                    <input type="radio" name="gender01" value="1" checked="checked" />男性
                    <input type="radio" name="gender01" value="2" />女性
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
                <td>
                    <input type="submit" value="登録"
                    onclick="return confirm('登録を行います。よろしいでしょうか？');">
                    <input type="reset" value="リセット">
                </td>
            </tr>
        </table>
    </body>
</html>
