<?php
function splitName($name)
{

    $name = trim($name);
    $nameArray = explode(" ", $name);
    $firstname =  $nameArray[0];
    $lastname = $nameArray[1];

    return array($firstname, $lastname);
}
