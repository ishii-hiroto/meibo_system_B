<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>社員情報詳細</title>

        <script type="text/javascript">
        function check(){
            var name01_flag=0;
            var pref_flag=0;
            var age01_flag=0;
            var age01_value = document.mainform.age01.value;

            //入力判定
            if(document.mainform.name01.value==""){
                name01_flag=1;
            }else if(document.mainform.pref.value=="0"){
                pref_flag=1;
            }else if(document.mainform.age01.value==""){
                age01_flag=1;
            }

            //エラー文表示
            if(name01_flag==1){
                window.alert('名前は必須です');
                return false;
            }else if(pref_flag==1){
                window.alert('都道府県は必須です');
                return false;
            }else if(age01_flag==1 || age01_value < 1 || age01_value > 100){
                window.alert('年齢は必須です');
                return false;
            }else if(window.confirm('登録を行います。よろしいですか？')){
                location.href="../system/detail01.php";//「OK」の場合はindex.phpに移動
            }else{
                windows.alert('キャンセルされました');//警告ダイアログ
                return false;//送信を中止
            }
        }
        </script>
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
            <form method="POST" action="./index.php" name='mainform'><!--どこで受け取るのか-->

            <table>
                <tr>
                    <th>社員ID</th>
                    <td><input type="number"ID="ID"/></td>
                </tr>

                <tr>
                    <th>名前</th>
                    <td><input type="text"  name="name01"  size="20" maxlength="30" placeholder="山田太郎" />
                    </td>

                </tr>
                <tr>
                    <th>出身地</th>
                    <td>
                    <select name="pref">
                        <?php
                            include('./include/former.php');
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
                    <input type="radio" name="gender01" value="1" checked="checked" />男性
                    <input type="radio" name="gender01" value="2" />女性
                    </td>
                </tr>
                <tr>
                    <th>年齢</th>
                    <td><input type="number" name="age01" max="99" min="1" > 歳</td>
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
                    <input type="button" onclick="check();" value="登録">
                    <input type="reset" value="リセット">
                    </td>
                </tr>
        </table>
    </body>
</html>