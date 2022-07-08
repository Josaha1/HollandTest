<?php 
 
// Load the database configuration file 
include("class_lib/db_conf.php");
include("class_lib/database.php");
$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME); 
mysqli_query($connection,"set character set utf8");
if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
$TID = isset( $_GET['tid'] ) ? $TID = $_GET['tid'] : $TID = "";
// Fetch records from database 
$query = $db->query("SELECT `logtest`.* ,`userlog`.* FROM `userlog` INNER JOIN `logtest` ON `logtest`.`Cid` = `userlog`.`Cid` WHERE `logtest`.`TID` = '$TID' ORDER BY TID ASC"); 
if($query->num_rows > 0){ 
    $delimiter = ","; 
    $filename = "members-data_" . date('Y-m-d') . ".csv"; 
     
    // Create a file pointer 
    $f = fopen('php://memory', 'w'); 
     
    // Set column headers 
    $fields = array('CID', 'FIRST NAME', 'LAST NAME', 'R1', 'I1', 'A1', 'S1', 'E1', 'C1', 'R2', 'I2', 'A2', 'S2', 'E2', 'C2', 'R3', 'I3', 'A3', 'S3', 'E3', 'C3'); 
    fputcsv($f, $fields, $delimiter); 
     
    // Output each row of the data, format line as csv and write to file pointer 
    while($row = $query->fetch_assoc()){ 
    
        $lineData = array($row['Cid'], $row['FName'], $row['LName'], $row['Sum1R'], $row['SUMI1'], $row['SUMA1'], $row['SUMS1'], $row['SUME1'], $row['SUMC1'],
        $row['Sum2R'], $row['SUMI2'], $row['SUMA2'], $row['SUMS2'], $row['SUME2'], $row['SUMC2'],
        $row['Sum3R'], $row['SUMI3'], $row['SUMA3'], $row['SUMS3'], $row['SUME3'], $row['SUMC3']); 
        fputcsv($f, $lineData, $delimiter); 
    } 
     
    // Move back to beginning of file 
    fseek($f, 0); 
     
    // Set headers to download file rather than displayed 
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    //output all remaining data on a file pointer 
    fpassthru($f); 
} 
exit; 
 
?>