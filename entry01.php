<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <!-- ↓bootsstrapのStarter template -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <title>新規社員情報登録</title>
        <link rel="stylesheet" href="deco.css">
        <script type="text/javascript">
        function check(){
            var name01_flag=0;
            var pref_flag=0;
            var age01_flag=0;
            var age01_value = document.mainform.age01.value;

            //入力判定
            if(document.mainform.name01.value==""){
                name01_flag=1;
            }else if(document.mainform.pref.value==""){
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
                window.alert('年齢は必須です/数値を入力してください/1-99の範囲で入力してください');
                return false;
            }else if(window.confirm('登録を行います。よろしいですか？')){
                // location.href="./entry02.php";//「OK」の場合はindex.phpに移動
                document.mainform.submit();
            }else{
                windows.alert('キャンセルされました');//警告ダイアログ　テスト
                return false;//送信を中止
            }
        }
        </script>
    </head>
    <body>
        <table>
            <tr>
                <big>社員名簿システム
                | <a href="./index.php">トップ画面</a>
                | <a href="./entry01.php">新規社員登録</a> |

            </tr>
        </table>
        <hr>
        <form method="POST" action="./entry02.php" name='mainform'><!--どこで受け取るか-->
        <table class='table table-striped table-info'>
            <tr>
                <th>名前</th>
                <td>
                    <input type="text" name="name01" size="20" maxlength="30" /> <!--プレースホルダー削除-->
                </td>
            </tr>
            <tr>
                <th>出身地</th>
                <td>
                    <select name="pref">
                        <?php
                            include './include/former.php';
                                foreach ($pref_array as $key => $pref){
                                    echo "<option value='" . $key . "'>". $pref ."</option>";
                                }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th>性別</th>
                <td>
                    <?php
                        include './include/former.php';
                        // foreach ($gender_array as $key01 => $gender){
                        //     echo "<input type='radio' name='gender01' value='" . $key01 . "'/>" . $gender; //初期値を男性にしたいい
                        // }
                        foreach($gender_array as $key01 => $gender){
                         // if($key01==){
                         //    echo "";
                          if($key01==1){
                            echo "<input type='radio' id='gender_radio1' name='gender01' value='" . $key01 . "'checked='checked'/><label for = 'gender_radio1'>" . $gender . "</label>";
                            // 男性を押しても押せるようにした
                          }
                          if($key01==2){
                            echo "<input type='radio' id='gender_radio2' name='gender01' value='" . $key01 . "'/><label for = 'gender_radio2'>" . $gender . "</label>";
                            // echo "<input type='radio' name='gender01' value='" . $key01 . "'/>" . $gender;
                          }
                        }
                    ?>
                </td>
            </tr>
            <tr>
                <th>年齢</th>
                <td><input type="number" name="age01" max="99" min="1" > 歳</td>
            </tr>
            <tr>
                <th>所属部署</th>
                <td>
                    <?php
                        $DB_DSN = "mysql:host=localhost; dbname=hishii; charset=utf8";
                        $DB_USER = "webaccess";
                        $DB_PW = "toMeu4rH";
                        $pdo = new PDO($DB_DSN, $DB_USER, $DB_PW);

                        $query_str2 = "SELECT ID, section_name FROM section1_master WHERE 1";

                        $sql2 = $pdo->prepare($query_str2);                  // PDOオブジェクトにSQLを渡す
                        $sql2->execute();                                   // SQLを実行する
                        $result2 = $sql2->fetchAll();                        // 実行結果を取得して$resultに代入する

                        foreach($result2 as $s){
                            if($s['ID']==1){
                                echo "<input type='radio' id='section_radio1' name='section01' value='" . $s['ID'] . "' checked='checked'><label for = 'section_radio1'>" . $s['section_name'] . "</label>";
                            }else{
                                echo "<input type='radio' id='section_radio" . $s['ID'] . "' name='section01' value='" . $s['ID'] . "'><label for = 'section_radio" . $s['ID'] . "'>" . $s['section_name'] . "</label>";
                            }
                        }
                        echo "</td></tr>";

                        $query_str3 = "SELECT ID, grade_name FROM grade_master WHERE 1";

                        $sql3 = $pdo->prepare($query_str3);                  // PDOオブジェクトにSQLを渡す
                        $sql3->execute();                                   // SQLを実行する
                        $result3 = $sql3->fetchAll();                        // 実行結果を取得して$resultに代入する

                        echo "<tr><th>役職</th><td>";
                        foreach($result3 as $g){
                            if($g['ID']==1){
                                echo "<input type='radio' id='grade_radio1' name='grade01' value='" . $g['ID'] . "' checked='checked'><label for = 'grade_radio1'>" . $g['grade_name'] . "</label>";
                                // echo "<input type='radio' name='grade01' value='" . $g['ID'] . "' checked='checked'>" . $g['grade_name'];
                            }else{
                                echo "<input type='radio' id='grade_radio" . $g['ID'] . "' name='grade01' value='" . $g['ID'] . "'><label for = 'grade_radio" . $g['ID'] . "'>" . $g['grade_name'] . "</label>";
                                // echo "<input type='radio' name='grade01' value='" . $g['ID'] . "'>" . $g['grade_name'];
                            }
                        }
                        echo "</td></tr>";
                    ?>
        </table>
        <table>
            <tr>
                <td><input type="button" onclick="check();"class="btn btn-secondary"Secondary value="登録"></td>
                <td><input type="reset" class="btn btn-secondary"Secondary value="リセット"></td>
            </tr>
        </table>
        <!-- ↓bootsstrapのStarter template -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    </body>
</html>
