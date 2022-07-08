<?php
session_start();
?>
<?php
include("class_lib/db_conf.php");
include("class_lib/database.php");
$db = new Database();

$output = array();
$sql = "SELECT `logtest`.`TID`,`userlog`.`Cid`,`userlog`.`FName`,`userlog`.`LName`,`logtest`.`date`
FROM `userlog`
INNER JOIN `logtest`
ON `userlog`.`Cid` = `logtest`.`Cid`
WHERE (`Sum1R`+`Sum2R`+`Sum3R`) !='' && (`SUMI1`+`SumI2`+`SumI3`) !='' && (`SUMA1`+`SumA2`+`SumA3`) !='' && (`SUMS1`+`SumS2`+`SumS3`) !=''  && (`SUME1`+`SumE2`+`SumE3`) !='' && (`SUMC1`+`SumC2`+`SumC3`) !=''";


$totalQuery = mysqli_query($connection, $sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = array(
    0 => 'TID',
    1 => 'Cid',
    2 => 'FName',
    3 => 'LName',
    4 => 'date'


);

if (isset($_POST['search']['value'])) {
    $search_value = $_POST['search']['value'];
    $sql .= " And (`userlog`.`Cid` like '%" . $search_value . "%'";
    $sql .= " OR `userlog`.`FName` like '%" . $search_value . "%'";
    $sql .= " OR `userlog`.`LName` like '%" . $search_value . "%')";
}

if (isset($_POST['order'])) {
    $column_name = $_POST['order'][0]['column'];
    $order = $_POST['order'][0]['dir'];
    $sql .= " ORDER BY " . $columns[$column_name] . " " . $order . "";
} else {
    $sql .= " ORDER BY `logtest`.`TID` DESC";
}

if ($_POST['length'] != -1) {
    $start = $_POST['start'];
    $length = $_POST['length'];
    $sql .= " LIMIT  " . $start . ", " . $length;
}

$query = mysqli_query($connection, $sql);
$count_rows = mysqli_num_rows($query);
$data = array();
while ($row = mysqli_fetch_assoc($query)) {
    $tid = $row['TID'];
    $sub_array = array();
    $sub_array[] = $row['TID'];
    $sub_array[] = $row['Cid'];
    $sub_array[] = [$row['FName'] , $row['LName']];

    $sub_array[] = $row['date'];
    $Tid  = $row['TID'];
    $sql1 = "SELECT (`Sum1R`+`Sum2R`+`Sum3R`) as R ,(`SUMI1`+`SumI2`+`SumI3`) as I ,(`SUMA1`+`SumA2`+`SumA3`) as A ,(`SUMS1`+`SumS2`+`SumS3`) as S ,(`SUME1`+`SumE2`+`SumE3`) as E ,(`SUMC1`+`SumC2`+`SumC3`) as C FROM `logtest` WHERE `Tid` = '$Tid' ORDER BY `TID` DESC LIMIT 1";
    $a = '';
    foreach ($db->to_Obj($sql1) as $rows) {

        $arrays = $db->to_Obj($sql1)[0];
        $i = 0;
        $a = ("");
        arsort($arrays);
       
        foreach ($arrays as $key => $rows) {
            
            $i++;
            if ($i > 3) {
                continue;
            }
            $a[$i] =$key;
        }
        
    }
    $sub_array[] = $a;
    $sub_array[] = '<a href="toExcelTID.php?tid='.$tid.'"><button class="btn btn-primary">Export</button></a>';
    $data[] = $sub_array;
}

$output = array(
    'draw' => intval($_POST['draw']),
    'recordsTotal' => $count_rows,
    'recordsFiltered' => $total_all_rows,
    'data' => $data,
);
echo  json_encode($output);
