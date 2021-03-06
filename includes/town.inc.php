<?php
/*
Infomation 
Created by: Jeffrey Santana
Last edited by : Jeffrey Santana


Function: Get Data out of table town
*/

function get_town($postalcode)
{
    require 'hostinfos.cred.php';

    $array = array();
    $sql = "SELECT * from town where town_postalcode = ? ";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        return $array;
        exit();
    } else {
        #insert the date into table
        mysqli_stmt_bind_param($stmt, "i", $postalcode);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $postalcode, $name);
        while (mysqli_stmt_fetch($stmt)) {
            $returnarray = array('town_postalcode' => $id, 'town_name' => $name);
        }
        return $returnarray;
    }
}
function get_towns()
{
    require 'hostinfos.cred.php';

    $array = array();
    $sql = "SELECT * from town";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $array[] = $row;
    }
    $returnarray = array('towns' => $array);
    return $returnarray;
}
