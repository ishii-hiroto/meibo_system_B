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
                    | <a href="./entry01.php">新規社員登録</a> |
                    </td>
                </tr>
            </table>

            <hr>
            <form method="POST" action="update01.php" name='mainform'><!--どこで受け取るのか-->
            <input type="submit" name="member_ID" value="編集" >
            <input type="hidden" name="member_ID" value="<?php echo $result['member_ID']; ?>" />
            </form>
            
            </form>
            <table>
                <tr>
                    <th>社員ID</th>
                    <td><input type="text"ID="ID"/></td>
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
                    <td><input type="button" onclick="check();" value="登録"></td>
                    <td><input type="reset" value="リセット"></td>
                </tr>
        </table>
    </body>
</html>
