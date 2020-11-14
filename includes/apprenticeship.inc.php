<?php
/*
Infomation 
Created by: Jeffrey Santana
Last edited by : Jeffrey Santana
AppVersion: 0.1
FileVersion: 0.1

Function: Get Data out of table apprenticeship
*/

function get_apprenticeship($id){
require 'hostinfos.cred.php';
	
$array = array();
$sql = "SELECT * from apprenticeship where apprenticeship_id = ? ";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    return $array;
    exit();
} else {
    #insert the date into table
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt,$id,$profession,$company);
	while (mysqli_stmt_fetch($stmt)) {
	$returnarray = array('apprenticeship_id' =>$id, 'apprenticeship_profession'=> $profession, 'apprenticeship_company'=>$company);
	}
return $returnarray;
}

}
function get_apprenticeships()
{
require 'hostinfos.cred.php';
	
$array = array();
$sql = "SELECT * from apprenticeship";
$result = mysqli_query($conn,$sql);
while ($row = mysqli_fetch_assoc($result)) {
	$array[] = $row ;
}
$returnarray = array('apprenticeships' =>$array);
return $returnarray;
}


