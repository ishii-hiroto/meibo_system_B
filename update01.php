<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <!-- ↓bootsstrapのStarter template -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <title>社員情報詳細</title>

        <script type="text/javascript">
            //入力フォームに対してバリデーションチェック
            function check(){
                var name_flag=0;
                var pref_flag=0;
                var age_flag=0;
                var age_value = document.updateform.age.value;

                //入力判定
                if(document.updateform.name.value==""){
                    name_flag=1;
                }else if(document.updateform.pref.value==""){
                    pref_flag=1;
                }else if(document.updateform.age.value==""){
                    age_flag=1;
                }

                //エラー表示
                if(name_flag==1){
                    window.alert('名前は必須です');
                    return false;
                }else if(pref_flag==1){
                    window.alert('都道府県は必須です');
                    return false;
                }else if(age_flag==1 || age_value < 1 || age_value > 100){
                    window.alert('年齢は必須です/数値を入力してください/1-99の範囲で入力してください');
                    return false;
                }else if(window.confirm('登録を行います。よろしいですか？')){
                    // location.href="../system/detail01.php";//「OK」の場合はindex.phpに移動
                    document.updateform.submit();
                }else{
                    windows.alert('キャンセルされました');//警告ダイアログ
                    return false;//送信を中止
                }
            }
        </script>
    </head>
    <body>
        <table align="center">
            <tr>
                <td>
                    <span style="font-weight: bold; font-family: Noto Sans JP, sans-serif; font-size: 35pt">
                        社員名簿システム</span>
                </td>
            </tr>
        </table>
        <table align="right">
            <tr>
                <td>
                    <span style="font-family: Noto Sans JP, sans-serif; font-size: 17pt">
                        | <a  href="./index.php">トップ画面</a>
                        | <a href="./entry01.php">新規社員登録へ</a> |
                    </span>
                </td>
            </tr>
        </table><br>
        <hr>
        <form method="POST" action="update02.php" name='updateform'>
        <!--table border="1" style="border-collapse:collapse;"-->
        <table class='table table-striped table-info' style='width:700px' align='center'>
        <?php
            $DB_DSN = "mysql:host=localhost; dbname=hishii; charset=utf8";
            $DB_USER = "webaccess";
            $DB_PW = "toMeu4rH";
            $pdo = new PDO($DB_DSN, $DB_USER, $DB_PW);

            $ID = $_GET['member_ID'];

            $query_str = "SELECT * FROM member WHERE member.member_ID =" . $ID;   // 実行するSQL文を作成して変数に保持

            $sql = $pdo->prepare($query_str);     // PDOオブジェクトにSQLを渡す
            $sql->execute();                      // SQLを実行する test5
            $result = $sql->fetch();
            ?>

            <?php require './include/former.php'; ?>
            <tr>
                <th style="text-align:center">社員ID</th>
                <td><input type = "hidden" name = "member_ID" value = "<?php echo $result['member_ID'];?>"><?php echo $result['member_ID'];?></td>
            </tr>
            <tr>
                <th style="text-align:center">名前</th>
                <td><input type="text" name="name" value="<?php echo $result['name'] ?>"></td>
            </tr>
            <tr>
                <th style="text-align:center">出身地</th>
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
                <th style="text-align:center">性別</th>
                <td>
                    <?php
                        foreach($gender_array as $key => $value){
                             // if($key==){
                             //    echo "";
                              if($key==$result['seibetu']){
                                echo "<label><input type='radio' name='gender' value='" . $key . "'checked='checked'/>" . $value . "</label> ";
                              }
                              elseif(isset($key) && !empty($key)){
                                echo "<label><input type='radio' name='gender' value='" . $key . "'/>" . $value . "</label> ";
                              }
                          }
                    ?>
                </td>
            </tr>
            <tr>
                <th style="text-align:center">年齢</th>
                <td><input type='number' max='99' min='1' name="age" value="<?php echo $result['age'] ?>">歳</td>
            </tr>
            <tr>
                <th style="text-align:center">所属部署</th>
                <td>    <?php
                        foreach ($section_array as $key => $value){
                            if($result['section_ID'] == $key ){
                                echo "<label><input type='radio' name='section_ID' checked='checked' value=". $key .">" . $value . "</label> ";
                            }else{
                                echo "<label><input type='radio' name='section_ID' value=". $key .">" . $value . "</label> ";
                            }
                        }
                    ?></td>
            </tr>
            <tr>
                <th style="text-align:center">役職</th>
                <td>    <?php
                        foreach ($grade_array as $key => $value){
                            if($result['grade_ID'] == $key ){
                                echo "<label><input type='radio' name='grade_ID' checked='checked' value=". $key .">" . $value . "</label> ";
                            }else{
                                echo "<label><input type='radio' name='grade_ID' value=". $key .">" . $value . "</label> ";
                            }
                        }
                    ?></td>
        </table>
        <table align="center">
            <tr>
                <td><input type="submit" onclick="check();"class="btn btn-secondary"Secondary value="登録"></td>
                <td><input type="reset" class="btn btn-secondary"Secondaryvalue="リセット"></td>
            </tr>
        </table>
        </form>
        <!-- ↓bootsstrapのStarter template -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    </body>
</html>
