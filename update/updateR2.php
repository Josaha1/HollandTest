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
        $I1 = $_POST['1I1'];
        $I2 = $_POST['1I2'];
        $I3 = $_POST['1I3'];
        $I4 = $_POST['1I4'];
        $I5 = $_POST['1I5'];
        $I6 = $_POST['1I6'];
        $I7 = $_POST['1I7'];
        $I8 = $_POST['1I8'];
        $I9 = $_POST['1I9'];
        $I10 = $_POST['1I10'];
        $I11 = $_POST['1I11'];
        $SUMI1 = $I1+$I2+$I3+$I4+$I5+$I6+$I7+$I8+$I9+$I10+$I11;
        $A1 = $_POST['1A1'];
        $A2 = $_POST['1A2'];
        $A3 = $_POST['1A3'];
        $A4 = $_POST['1A4'];
        $A5 = $_POST['1A5'];
        $A6 = $_POST['1A6'];
        $A7 = $_POST['1A7'];
        $A8 = $_POST['1A8'];
        $A9 = $_POST['1A9'];
        $A10 = $_POST['1A10'];
        $A11 = $_POST['1A11'];
        $SUMA1 = $A1+$A2+$A3+$A4+$A5+$A6+$A7+$A8+$A9+$A10+$A11;
        $S1 = $_POST['1S1'];
        $S2 = $_POST['1S2'];
        $S3 = $_POST['1S3'];
        $S4 = $_POST['1S4'];
        $S5 = $_POST['1S5'];
        $S6 = $_POST['1S6'];
        $S7 = $_POST['1S7'];
        $S8 = $_POST['1S8'];
        $S9 = $_POST['1S9'];
        $S10 = $_POST['1S10'];
        $S11 = $_POST['1S11'];
        $SUMS1 = $S1+$S2+$S3+$S4+$S5+$S6+$S7+$S8+$S9+$S10+$S11;
        $E1 = $_POST['1E1'];
        $E2 = $_POST['1E2'];
        $E3 = $_POST['1E3'];
        $E4 = $_POST['1E4'];
        $E5 = $_POST['1E5'];
        $E6 = $_POST['1E6'];
        $E7 = $_POST['1E7'];
        $E8 = $_POST['1E8'];
        $E9 = $_POST['1E9'];
        $E10 = $_POST['1E10'];
        $E11 = $_POST['1E11'];
        $SUME1 = $E1+$E2+$E3+$E4+$E5+$E6+$E7+$E8+$E9+$E10+$E11;
        $C1 = $_POST['1C1'];
        $C2 = $_POST['1C2'];
        $C3 = $_POST['1C3'];
        $C4 = $_POST['1C4'];
        $C5 = $_POST['1C5'];
        $C6 = $_POST['1C6'];
        $C7 = $_POST['1C7'];
        $C8 = $_POST['1C8'];
        $C9 = $_POST['1C9'];
        $C10 = $_POST['1C10'];
        $C11 = $_POST['1C11'];
        $SUMC1 = $C1+$C2+$C3+$C4+$C5+$C6+$C7+$C8+$C9+$C10+$C11;
        $sql = "UPDATE `logtest` SET `2R1`='$R1',`2R2`='$R2',`2R3`='$R3',`2R4`='$R4',`2R5`='$R5',`2R6`='$R6',`2R7`='$R7',`2R8`='$R8',`2R9`='$R9',`2R10`='$R10',`2R11`='$R11',`Sum2R`='$Sum1R' 
        ,`2I1`='$I1',`2I2`='$I2',`2I3`='$I3',`2I4`='$I4',`2I5`='$I5',`2I6`='$I7',`2I7`='$I7',`2I8`='$I8',`2I9`='$I9',`2I10`='$I10',`2I11`='$I11',`SUMI2`='$SUMI1',
        `2A1`='$A1',`2A2`='$A2',`2A3`='$A3',`2A4`='$A4',`2A5`='$A5',`2A6`='$A6',`2A7`='$A7',`2A8`='$A8',`2A9`='$A9',`2A10`='$A10',`2A11`='$A11',`SUMA2`='$SUMA1',
        `2S1`='$S1',`2S2`='$S2',`2S3`='$S3',`2S4`='$S4',`2S5`='$S5',`2S6`='$S6',`2S7`='$S7',`2S8`='$S8',`2S9`='$S9',`2S10`='$S10',`2S11`='$S11',`SUMS2`='$SUMS1',
        `2E1`='$E1',`2E2`='$E2',`2E3`='$E3',`2E4`='$E4',`2E5`='$E5',`2E6`='$E6',`2E7`='$E7',`2E8`='$E8',`2E9`='$E9',`2E10`='$E10',`2E11`='$E11',`SUME2`='$SUME1',
        `2C1`='$C1',`2C2`='$C2',`2C3`='$C3',`2C4`='$C4',`2C5`='$C5',`2C6`='$C6',`2C7`='$C7',`2C8`='$C8',`2C9`='$C9',`2C10`='$C10',`2C11`='$C11',`SUMC2`='$SUMC1'
        WHERE `Cid` = '$Cid' ORDER BY `TID` DESC LIMIT 1 ";
        //echo $sql;
        if ($db->todb($sql)) {
            $_SESSION["Cid"] = $_SESSION['Cid'];
         
            echo "<meta http-equiv='refresh' content='0;url=../index.php'>";
        }else{
            ?>
            <script type="text/javascript">
				alert("Can't Submit");
			</script>
            <?php
            echo "<meta http-equiv='refresh' content='0;url=../activity2.php'>";
        }
    }
?>

<?php } ?>