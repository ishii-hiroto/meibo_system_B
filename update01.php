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

                <td>社簿システム</td>
                    <a href="./index.php">トップ画面</a>
                    <a href="./entry01.php">新規社員登録</a> |
                    <?php
                        $DB_DSN = "mysql:host=localhost; dbname=hishii; charset=utf8";
                        $DB_USER = "webaccess";
                        $DB_PW = "toMeu4rH";
                        $pdo = new PDO($DB_DSN, $DB_USER, $DB_PW);

                        $ID = $_GET['id'];

                        $query_str = "SELECT * FROM member WHERE member_ID = $ID";   // 実行するSQL文を作成して変数に保持

                        $sql = $pdo->prepare($query_str);     // PDOオブジェクトにSQLを渡す
                        $sql->execute();                      // SQLを実行する test5
                        $result = $sql->fetch();
                    ?>





            <table>
                <tr>
                    <th>社員ID</th>
                    <td><?php echo $result['member_ID'] ?></td>
                </tr>
                <tr>
                    <th>名前</th>
                    <td><input type="text" name="name" id="name" value="<?php echo $result['name'] ?>"></td>
                </tr>
                <tr>
                    <th>出身地</th>
                    <td><select name='pref'>

                            <?php
                                foreach ($pref_array as $key => $value){
                                    if($result['pref'] == $key ){
                                        echo "<option id='pref' selected='selected' value=". $key .">" . $value . "</option>";
                                    }else{
                                        echo "<option id='pref'                     value=". $key .">" . $value . "</option>";
                                    }
                                }
                            ?>
                        </select></td>
                </tr>
                <tr>
                    <th>性別</th>
                    <td>  <?php
                            foreach ($gender_array as $key => $value){
                                if($result['seibetu'] == $key ){
                                    echo "<label><input type='radio' name='seibetu' checked='checked' value=". $key .">" . $value . "</label>";
                                }else{
                                    echo "<label><input type='radio' name='seibetu' value=". $key .">" . $value . "</label>";
                                }
                            }
                       ?></td>
                </tr>
                <tr>
                    <th>年齢</th>
                    <td><input type="text" name="age" id="age" value="<?php echo $result['age'] ?>">歳</td>
                </tr>
                <tr>
                    <th>所属部署</th>
                    <td>    <?php
                            foreach ($section_ID_array as $key => $value){
                                if($result['section_ID'] == $key ){
                                    echo "<label><input type='radio' name='section_ID' checked='checked' value=". $key .">" . $value . "</label>";
                                }else{
                                    echo "<label><input type='radio' name='section_ID' value=". $key .">" . $value . "</label>";
                                }
                            }
                        ?></td>
                </tr>
                <tr>
                    <th>役職</th>
                    <td>    <?php
                            foreach ($grade_ID_array as $key => $value){
                                if($result['grade_ID'] == $key ){
                                    echo "<label><input type='radio' name='grade_ID' checked='checked' value=". $key .">" . $value . "</label>";
                                }else{
                                    echo "<label><input type='radio' name='grade_ID' value=". $key .">" . $value . "</label>";
                                }
                            }
                        ?></td>




                        <?php
                            var_dump($result);
                        ?>





                <tr>
                    <td><input type="button" onclick="check();" value="登録"></td>
                    <td><input type="reset" value="リセット"></td>
                </tr>
        </table>
    </body>
</html>
