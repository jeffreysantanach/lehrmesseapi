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

}
function get_professsions()
{
require 'hostinfos.cred.php';
$sql = "SELECT * from profession";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
return $row;
}

print(get_professsions());