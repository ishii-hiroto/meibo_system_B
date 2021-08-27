<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>編集ダミー画面</title>
    </head>
    <body>
        <?php
            $id = $_POST['member_ID'];

            $DB_DSN = "mysql:host=localhost; dbname=hishii; charset=utf8";
            $DB_USER = "webaccess";
            $DB_PW = "toMeu4rH";
            $pdo = new PDO($DB_DSN, $DB_USER, $DB_PW);

            $query_str = "UPDATE member SET ";
            $set_str = "";

            if (isset($_POST['name']) && !empty($_POST['name'])) {
                $set_str .= "name = '" . $_POST['name'] ."'";
            }
            if (isset($_POST['pref']) && !empty($_POST['pref'])) {
                $set_str .= ", pref = '" . $_POST['pref'] ."'";
            }
            if (isset($_POST['gender']) && !empty($_POST['gender'])) {
                $set_str .= ", seibetu = '" . $_POST['gender'] . "'";
            }
            if (isset($_POST['age']) && !empty($_POST['age'])) {
                $set_str .= ", age = '" . $_POST['age'] . "'";
            }
            if (isset($_POST['section_ID']) && !empty($_POST['section_ID'])) {
                $set_str .= ", section_ID = '" . $_POST['section_ID'] . "'";
            }
            if (isset($_POST['grade_ID']) && !empty($_POST['grade_ID'])) {
                $set_str .= ", grade_ID = '" . $_POST['grade_ID'] . "' WHERE member.member_ID= $id";
            }

            $query_str .= $set_str;
            echo $query_str;
            $sql = $pdo->prepare($query_str);
            $sql->execute();
            // $result = $sql->fetchAll();

            header('Location:detail01.php?id='.$id);
        ?>
    </body>
</html>
