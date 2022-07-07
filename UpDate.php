<?php include("class_lib/db_conf.php"); ?>
<?php include("class_lib/database.php"); ?>
<?php $db = new Database(); ?>

<?php
session_start();
if (isset($_SESSION['Cid'])) {
    if ($_POST['btnReset'] == "Reset") {
        date_default_timezone_set('Asia/Bangkok');
        $date = date('d/m/Y, H:i:s');
        $Cid = $_SESSION['Cid'];
        $sql = "INSERT INTO `logtest`( `Cid`, `date`) VALUES ('$Cid','$date') ";
        //echo $sql;
        if ($db->todb($sql)) {
            $_SESSION["Cid"] = $_SESSION['Cid'];
            
            echo "<meta http-equiv='refresh' content='2;url=index.php'>";
        }
    }
?>

<?php } ?>