<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <!-- ↓bootsstrapのStarter template -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <title>社員情報検索</title>
    </head>
    <body>
        <table>
            <tr>
                <big><h1>社員名簿システム</h1>
                | <a href="./index.php">トップ画面</a>
                | <a href="./entry01.php">新規社員登録へ</a> |
            </tr>
        </table>
        <hr>
             <?php
             $DB_DSN = "mysql:host=localhost; dbname=hishii; charset=utf8";
             $DB_USER = "webaccess";
             $DB_PW = "toMeu4rH";
             $pdo = new PDO($DB_DSN, $DB_USER, $DB_PW);

             $query_str = "SELECT * FROM member
             LEFT JOIN section1_master ON section1_master.ID = member.section_ID
             LEFT JOIN grade_master ON grade_master.ID = member.grade_ID
            WHERE 1";   // 実行するSQL文を作成して変数に保持

            $where_str = "";
            $cond_name = "";
            $cond_gender = "";
            $cond_section = "";
            $cond_grade = "";

            if(isset($_GET['name']) && !empty($_GET['name'])){
                $where_str .= " AND name LIKE '%" . $_GET['name'] . "%'";
                $cond_name = $_GET['name'];
            }
            if(isset($_GET['gender']) && !empty($_GET['gender'])){
                $where_str .= " AND seibetu = '" . $_GET['gender'] . "'";
                $cond_gender = $_GET['gender'];
            }
            if(isset($_GET['section']) && !empty($_GET['section'])){
                $where_str .= " AND section_ID = '" . $_GET['section'] . "'";
                $cond_section = $_GET['section'];
            }
            if(isset($_GET['grade']) && !empty($_GET['grade'])){
                $where_str .= " AND grade_ID = '" . $_GET['grade'] . "'";
                $cond_grade = $_GET['grade'];
            }


            $query_str = $query_str .= $where_str; //あとで修正、平子さんからＦＢ

            echo $query_str;                                   // 実行するSQL文を画面に表示するだけ（デバッグプリント
            $sql = $pdo->prepare($query_str);                  // PDOオブジェクトにSQLを渡す
            $sql->execute();                                   // SQLを実行する
            $result = $sql->fetchAll();                        // 実行結果を取得して$resultに代入する
        ?>
                <form method="GET" action="./index.php" name='searchform' style="text-align:center">    
                    名前： <input type="search" name="name" size="20" maxlength="30"  value="<?php echo $cond_name;?>"> <!--プレースホルダー削除-->
                    <?php require './include/former.php'; ?>
                    性別：<select name="gender">
                        <?php
                            foreach ($gender_array as $key => $value){
                                if($cond_gender == $key ){
                                    echo "<option selected='selected' value=". $key .">" . $value . "</option>";
                                }else{
                                    echo "<option value=". $key .">" . $value . "</option>";
                                }
                            }
                        ?>
                    </select>
                </td>
                <?php
                    $query_str2 = "SELECT ID, section_name FROM section1_master WHERE 1";

                    $sql2 = $pdo->prepare($query_str2);                  // PDOオブジェクトにSQLを渡す
                    $sql2->execute();                                   // SQLを実行する
                    $result2 = $sql2->fetchAll();                        // 実行結果を取得して$resultに代入する


                    // var_dump($result2);

                    echo "<td>部署：</td><td><select name='section'>
                    <option value='' selected>すべて</option>";

                        foreach($result2 as $s){
                            if($cond_section == $s['ID']){
                                echo "<option value=" . $s['ID'] . "selected>" . $s['section_name'] . "</option>";
                            }else{
                                echo "<option value=" . $s['ID'] . ">" . $s['section_name'] . "</option>";
                            }
                        }
                    echo"</select></td>";

                    $query_str3 = "SELECT * FROM grade_master WHERE 1";

                    $sql3 = $pdo->prepare($query_str3);                  // PDOオブジェクトにSQLを渡す
                    $sql3->execute();                                   // SQLを実行する
                    $result3 = $sql3->fetchAll();                        // 実行結果を取得して$resultに代入する

                    echo "<td>役職：</td><td><select name='grade'>
                        <option value='' selected>すべて</option>";

                        foreach($result3 as $g){
                            echo "<option value=" . $g['ID'] . ">" . $g['grade_name'] . "</option>";
                        }

                    echo"</select></td></tr>";
                ?>
        </table>
        <table>
            <tr>
                <td><input type="submit" class="btn btn-secondary"Secondary value="検索"></td>
                <td><input type="reset" class="btn btn-secondary"Secondaryvalue="リセットする"></td>
            </tr>
        </table>
        <hr>
        <!-- <table border="1" style="border-collapse:collapse;"> -->
        <table class='table table-striped table-info'>
            <tr>
                <th>社員ID</th>
                <th>名前</th>
                <th>部署</th>
                <th>役職</th>
            </tr>
            <?php
                echo "検索件数：" . count($result);

                $CNT = count($result);

                if($CNT == 0){
                    echo "<tr><td colspan='5'>検索結果なし</td></tr>";
                }else{
                    foreach ($result as $x) {
                        echo "<tr><td style='text-align: right'>" . $x['member_ID'] . "</td>";
                        echo "<td><a href='detail01.php?id=" .
                            $x['member_ID'] . "'>" .
                            $x['name'] . "</a></td>";
                        echo "<td>" . $x['section_name'] . "</td>";
                        echo "<td>" . $x['grade_name'] . "</td></tr>";
                    }
                }
            ?>
        </table>
        <pre>
            <?php
                var_dump($result);
            ?>
        </pre>
        <!-- ↓bootsstrapのStarter template -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    </body>
</html>
