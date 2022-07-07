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
        $R12 = $_POST['1R12'];
        $R13 = $_POST['1R13'];
        $R14 = $_POST['1R14'];
        $Sum1R = $R1+$R2+$R3+$R4+$R5+$R6+$R7+$R8+$R9+$R10+$R11+$R12+$R13+$R14;
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
        $I12 = $_POST['1I12'];
        $I13 = $_POST['1I13'];
        $I14 = $_POST['1I14'];
        $SUMI1 = $I1+$I2+$I3+$I4+$I5+$I6+$I7+$I8+$I9+$I10+$I11+$I12+$I13+$I14;
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
        $A12 = $_POST['1A12'];
        $A13 = $_POST['1A13'];
        $A14 = $_POST['1A14'];
        $SUMA1 = $A1+$A2+$A3+$A4+$A5+$A6+$A7+$A8+$A9+$A10+$A11+$A12+$A13+$A14;
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
        $S12 = $_POST['1S12'];
        $S13 = $_POST['1S13'];
        $S14 = $_POST['1S14'];
        $SUMS1 = $S1+$S2+$S3+$S4+$S5+$S6+$S7+$S8+$S9+$S10+$S11+$S12+$S13+$S14;
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
        $E12 = $_POST['1E12'];
        $E13 = $_POST['1E13'];
        $E14 = $_POST['1E14'];
        $SUME1 = $E1+$E2+$E3+$E4+$E5+$E6+$E7+$E8+$E9+$E10+$E11+$E12+$E13+$E14;
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
        $C12 = $_POST['1C12'];
        $C13 = $_POST['1C13'];
        $C14 = $_POST['1C14'];
        $SUMC1 = $C1+$C2+$C3+$C4+$C5+$C6+$C7+$C8+$C9+$C10+$C11+$C12+$C13+$C14;
        $sql = "UPDATE `logtest` SET `3R1`='$R1',`3R2`='$R2',`3R3`='$R3',`3R4`='$R4',`3R5`='$R5',`3R6`='$R6',`3R7`='$R7',`3R8`='$R8',`3R9`='$R9',`3R10`='$R10',`3R11`='$R11',`3R12`='$R12',`3R13`='$R13',`3R14`='$R14',`Sum3R`='$Sum1R' 
        ,`3I1`='$I1',`3I2`='$I2',`3I3`='$I3',`3I4`='$I4',`3I5`='$I5',`3I6`='$I7',`3I7`='$I7',`3I8`='$I8',`3I9`='$I9',`3I10`='$I10',`3I11`='$I11',`3I12`='$I12',`3I13`='$I13',`3I14`='$I14',`SUMI3`='$SUMI1',
        `3A1`='$A1',`3A2`='$A2',`3A3`='$A3',`3A4`='$A4',`3A5`='$A5',`3A6`='$A6',`3A7`='$A7',`3A8`='$A8',`3A9`='$A9',`3A10`='$A10',`3A11`='$A11',`3A12`='$A12',`3A13`='$A13',`3A14`='$A14',`SUMA3`='$SUMA1',
        `3S1`='$S1',`3S2`='$S2',`3S3`='$S3',`3S4`='$S4',`3S5`='$S5',`3S6`='$S6',`3S7`='$S7',`3S8`='$S8',`3S9`='$S9',`3S10`='$S10',`3S11`='$S11',`3S12`='$S12',`3S13`='$S13',`3S14`='$S14',`SUMS3`='$SUMS1',
        `3E1`='$E1',`3E2`='$E2',`3E3`='$E3',`3E4`='$E4',`3E5`='$E5',`3E6`='$E6',`3E7`='$E7',`3E8`='$E8',`3E9`='$E9',`3E10`='$E10',`3E11`='$E11',`3E12`='$E12',`3E13`='$E13',`3E14`='$E14',`SUME3`='$SUME1',
        `3C1`='$C1',`3C2`='$C2',`3C3`='$C3',`3C4`='$C4',`3C5`='$C5',`3C6`='$C6',`3C7`='$C7',`3C8`='$C8',`3C9`='$C9',`3C10`='$C10',`3C11`='$C11',`3C12`='$C12',`3C13`='$C13',`3C14`='$C14',`SUMC3`='$SUMC1'
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