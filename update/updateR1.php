<?php include("../class_lib/db_conf.php"); ?>
<?php include("../class_lib/database.php"); ?>
<?php $db = new Database(); ?>

<?php
session_start();
if (isset($_SESSION['Cid'])) {
    if ($_POST['update'] == "update") {
        date_default_timezone_set('Asia/Bangkok');
        $date = date('d/m/Y, H:i:s');
        $Cid = $_SESSION['Cid'];
        $R1 = $_POST['1R1'];
        $R2 = $_POST['1R2'];
        $R3 = $_POST['1R3'];
        $R4 = $_POST['1R4'];
        $R5 = $_POST['1R5'];
        $R6 = $_POST['1R6'];
        $R7 = $_POST['1R7'];
        $R8 = $_POST['1R8'];
        $R9 = $_POST['1R9'];
        $R10 = $_POST['1R10'];
        $R11 = $_POST['1R11'];
        $Sum1R = $R1+$R2+$R3+$R4+$R5+$R6+$R7+$R8+$R9+$R10+$R11;
        $sql = "UPDATE `logtest` SET `1R1`='$R1',`1R2`='$R2',`1R3`='$R3',`1R4`='$R4',`1R5`='$R5',`1R6`='$R6',`1R7`='$R7',`1R8`='$R8',`1R9`='$R9',`1R10`='$R10',`1R11`='$R11',`Sum1R`='$Sum1R' WHERE `Cid` = '$Cid' ORDER BY `TID` DESC LIMIT 1 ";
        //echo $sql;
        if ($db->todb($sql)) {
            $_SESSION["Cid"] = $_SESSION['Cid'];
            echo "<meta http-equiv='refresh' content='0;url=../activityI.php'>";
        }
    }
?>

<?php } ?>