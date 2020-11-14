<?php
/*
Infomation 
Created by: Jeffrey Santana
Last edited by : Jeffrey Santana
AppVersion: 0.1
FileVersion: 0.1

Function: Get Data out of table profession
*/

function get_profession($id){
require 'hostinfos.cred.php';
$array = array();
$sql = "SELECT * from profession where profession_id = ? ";
$stmt = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    return $array;
    exit();
} else {
    #insert the date into table
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt,$id,$name,$description,$field);
	while (mysqli_stmt_fetch($stmt)) {
	$returnarray = array('profession_id' =>$id, 'profession_name'=> $name, 'profession_description'=>$description,'profession_field'=>$field);
	}
return $returnarray;
}

}
function get_professions()
{
require 'hostinfos.cred.php';
	
$array = array();
$sql = "SELECT * from profession";
$result = mysqli_query($conn,$sql);
while ($row = mysqli_fetch_assoc($result)) {
	$array[] = $row ;
}
$returnarray = array('professions' =>$array);
return $returnarray;
}


