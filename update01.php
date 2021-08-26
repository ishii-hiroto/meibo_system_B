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
                <td>
                    <a href="./index.php">トップ画面</a>
                    <a href="./entry01.php">新規社員登録</a> |
                </td>
            </tr>
        </table>
        <form method="POST" action="update02.php" name='updateform'></form>
        <table border="1" style="border-collapse:collapse;">
            <?php
                $DB_DSN = "mysql:host=localhost; dbname=hishii; charset=utf8";
                $DB_USER = "webaccess";
                $DB_PW = "toMeu4rH";
                $pdo = new PDO($DB_DSN, $DB_USER, $DB_PW);

                $ID = $_GET['member_ID'];

                $query_str = "SELECT * FROM member WHERE member.member_ID = $ID";   // 実行するSQL文を作成して変数に保持

                $sql = $pdo->prepare($query_str);     // PDOオブジェクトにSQLを渡す
                $sql->execute();                      // SQLを実行する test5
                $result = $sql->fetch();

                require './include/former.php';
                    echo "<tr><th>社員ID</th><td>" . $result['member_ID'] . "</td></tr>";
                    echo "<tr><th>名前</th><td><input type='text' value=" . $result['name'] . "></td></tr>";
                    echo "<tr><th>出身地</th><td>" . $pref_array[$result['pref']] . "</td></tr>";
                    echo "<tr><th>性別</th><td>" . $gender_array[$result['seibetu']] . "</td></tr>";
                    echo "<tr><th>年齢</th><td><input type='number' max='99' min='1' value=" . $result['age'] . "></td></tr>";
                    echo "<tr><th>所属部署</th><td>" . $section_array[$result['section_ID']] . "</td></tr>";
                    echo "<tr><th>役職</th><td>" . $grade_array[$result['grade_ID']] . "</td></tr>";
            ?>
        </table>
        <table>
                <tr>
                    <td><input type="button" onclick="check();" value="登録"></td>
                    <td><input type="reset" value="リセット"></td>
                </tr>
        </table>
    </body>
</html>
