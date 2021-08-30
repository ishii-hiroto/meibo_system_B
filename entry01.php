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
                window.alert('年齢は必須です');
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
                            foreach ($gender_array as $key01 => $gender){
                                echo "<input type='radio' name='gender01' value='" . $key01 . "'/>".$gender; //初期値を男性にしたい
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
                        $query_str2 = "SELECT ID, section_name FROM section1_master WHERE 1";

                        $sql2 = $pdo->prepare($query_str2);                  // PDOオブジェクトにSQLを渡す
                        $sql2->execute();                                   // SQLを実行する
                        $result2 = $sql2->fetchAll();                        // 実行結果を取得して$resultに代入する

                        foreach($result2 as $s){
                            echo "<input type='radio' name='section1' value=" . $s['ID'] . ">" . $s['grade_name'];
                        }

                     ?>
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
