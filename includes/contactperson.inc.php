<?php
/*
Infomation 
Created by: Jeffrey Santana
Last edited by : Jeffrey Santana

Function: Get Data out of table contactperson
*/

function get_contactperson($id)
{
    require 'hostinfos.cred.php';

    $array = array();
    $sql = "SELECT * from contactperson where contactperson_id = ? ";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        return $array;
        exit();
    } else {
        #insert the date into table
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id, $firstname, $lastname, $jobdescription, $email, $phone, $company);
        while (mysqli_stmt_fetch($stmt)) {
            $returnarray = array('contactperson_id' => $id, 'contactperson_firstname' => $firstname, 'contactperson_lastname' => $lastname, 'contactperson_jobdescription' => $jobdescription, 'contactperson_email' => $email, 'contactperson_phone' => $phone, 'contactperson_company' => $company);
        }
        return $returnarray;
    }
}
function get_contactpersons($company_id)
{
    require 'hostinfos.cred.php';
    $array = array();
    $sql = "SELECT * from contactperson where contactperson_company = ? ";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        return $array;
        exit();
    } else {
        #insert the date into table
        mysqli_stmt_bind_param($stmt, "i", $company_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id, $firstname, $lastname, $jobdescription, $email, $phone, $company);
        while (mysqli_stmt_fetch($stmt)) {
            $array[$id] = array('contactperson_id' => $id, 'contactperson_firstname' => $firstname, 'contactperson_lastname' => $lastname, 'contactperson_jobdescription' => $jobdescription, 'contactperson_email' => $email, 'contactperson_phone' => $phone, 'contactperson_company' => $company);
        }
    $returnarray = array('contactpersons' => $array);
    return $returnarray;
}
}
