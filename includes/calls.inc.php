<?php
/*
Infomation 
Created by: Jeffrey Santana
Last edited by : Jeffrey Santana


Function: Get Data out of table contactperson
*/

require 'apprenticeship.inc.php';
require 'company.inc.php';
require 'contactperson.inc.php';
require 'profession.inc.php';
require 'town.inc.php';


#companies

function companies()
{
    $companies = get_companies();
    $companies = $companies['companies'];
    $returnarray = array();
    foreach ($companies as $company) {
        $town = get_town($company['company_location']);
        $town = $town['town_name'];
        $array = array(
            'name' => $company['company_name'],
            'email' => $company['company_email'],
            'phone' => $company['company_phone'],
            'street' => $company['company_adress'],
            'postalcode' => $company['company_location'],
            'city' => $town,
            'website' => $company['company_website'],
            'booth' => $company['company_booth']
        );
        $returnarray[$company['company_id']] = $array;
    }
    
    return $returnarray;
}

function company($id)
{
    $company = get_company($id);
    $town = get_town($company['company_location']);
    $town = $town['town_name'];
    $contactpersons = get_contactpersons($id);
    $contactpersons = $contactpersons['contactpersons'];
    $apprenticeships = get_apprenticeships_of_company($id);
    $apprenticeships = $apprenticeships['apprenticeships'];
    if (isset($apprenticeships)) {
        foreach ($apprenticeships as $apprenticeship) {
            $profession = get_profession($apprenticeship['apprenticeship_profession']);
            $apprenticearray[$apprenticeship['apprenticeship_id']] = array(
                'name' => $profession['profession_name'],
                'description' => $profession['profession_description']
            );
        }
    }
    if (isset($contactpersons)) {
            foreach ($contactpersons as $contactperson) {
                $person = get_contactperson($contactperson['contactperson_id']);
                $company_contactperson = get_company($contactperson['contactperson_id']);
                $company_name = $company_contactperson['company_name'];
                $personarray[$contactperson['contactperson_id']] = array(
                    'firstname' => $person['contactperson_firstname'],
                    'lastname' => $person['contactperson_lastname'],
                    'jobdescription' => $person['contactperson_jobdescription'],
                    'email' => $person['contactperson_email'],
                    'phone' => $person['contactperson_phone'],
                    'company' => $company_name
                );
            }
        }
    
    $returnarray = array(
        'name' => $company['company_name'],
        'email' => $company['company_email'],
        'phone' => $company['company_phone'],
        'street' => $company['company_adress'],
        'postalcode' => $company['company_location'],
        'city' => $town,
        'website' => $company['company_website'],
        'contactpersons' =>  $personarray,
        'apprenticeships' => $apprenticearray,
        'booth' => $company['company_booth'],
        'description' => $company['company_description'],
        'video' => $company['company_video']

    );
    return $returnarray;
}

function apprenticeships()
{
    $apprenticeships = get_apprenticeships();
    $apprenticeships = $apprenticeships['apprenticeships'];
    $array = array();
    foreach ($apprenticeships as $apprenticeship) {
        $profession_id = $apprenticeship['apprenticeship_profession'];
        $key_exists = array_key_exists($profession_id, $array);
        if (!$key_exists) {
            $profession = get_profession($profession_id);
            $array[$profession_id] = array(
                'name' => $profession['profession_name'],
                'description' => $profession['profession_description']
            );
        }
    }
    $returnarray = array('apprenticeships' => $array);
    return $returnarray;
}
