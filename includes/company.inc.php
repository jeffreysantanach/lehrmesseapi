<?php
/*
Infomation 
Created by: Jeffrey Santana
Last edited by : Jeffrey Santana


Function: Get Data out of table company
*/

function get_company($id)
{
    require 'hostinfos.cred.php';

    $array = array();
    $sql = "SELECT * from company where company_id = ? ";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        return $array;
        exit();
    } else {
        #insert the date into table
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id, $name, $adress, $email, $phone, $booth, $description, $location);
        while (mysqli_stmt_fetch($stmt)) {
            $returnarray = array('company_id' => $id, 'company_name' => $name, 'company_adress' => $adress, 'company_email' => $email, 'company_phone' => $phone, 'company_booth' => $booth, 'company_description' => $description, 'company_location' => $location);
        }
        return $returnarray;
    }
}
function get_companies()
{
    require 'hostinfos.cred.php';

    $array = array();
    $sql = "SELECT * from company";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $array[] = $row;
    }
    $returnarray = array('companies' => $array);
    return $returnarray;
}
function get_company_booth($booth)
{
    require 'hostinfos.cred.php';

    $array = array();
    $sql = "SELECT * from company where company_booth = ? ";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        return $array;
        exit();
    } else {
        #insert the date into table
        mysqli_stmt_bind_param($stmt, "i", $booth);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id, $name, $adress, $email, $phone, $booth, $description, $location);
        while (mysqli_stmt_fetch($stmt)) {
            $returnarray = array('company_id' => $id, 'company_name' => $name, 'company_adress' => $adress, 'company_email' => $email, 'company_phone' => $phone, 'company_booth' => $booth, 'company_description' => $description, 'company_location' => $location);
        }
        return $returnarray;
    }
}