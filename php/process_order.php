<?php

function sanitize($value)
{
    $value = trim($value);

    $value = stripslashes($value);

    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}


$validate = true;
$errorMessage = "";
if (isset($_POST["name"])) {
    $name = sanitize($_POST["name"]);
} else {
    $errorMessage .= "Please input your first name.\n";
    $validate = false;
}

if (isset($_POST["last-name"])) {
    $lastName = sanitize($_POST["last-name"]);
} else {
    $errorMessage .= "Please input your last name.\n";
    $validate = false;
}
if (isset($_POST["email"])) {
    $email = sanitize($_POST["email"]);
} else {
    $errorMessage .= "Please input your last email.\n";
    $validate = false;
}

if (isset($_POST["state"])) {
    $state = sanitize($_POST["state"]);
} else {
    $errorMessage .= "Please select your state.\n";
    $validate = false;
}

if (isset($_POST["post-code"])) {
    $postCode = sanitize($_POST["post-code"]);
} else {
    $errorMessage .= "Please select your postCode.\n";
    $validate = false;
}


if (isset($_POST["phone"])) {
    $phone = sanitize($_POST["phone"]);
} else {
    $errorMessage .= "Please input your phone number.\n";
    $validate = false;
}

if (isset($_POST["contact"])) {
    $contact = sanitize($_POST["contact"]);
} else {
    $errorMessage .= "Please select your contact type.\n";
    $validate = false;
}

if (isset($_POST["product"])) {
    $product = sanitize($_POST["product"]);
} else {
    $errorMessage .= "Please select your contact type.\n";
    $validate = false;
}


if (isset($_POST["quality"])) {
    $name = sanitize($_POST["quality"]);
} else {
    $errorMessage .= "Please input your quality number.\n";
    $validate = false;
}


if (isset($_POST["day"])) {
    $day = sanitize($_POST["day"]);
} else {
    $errorMessage .= "Please input your day\n";
    $validate = false;
}

if (isset($_POST["price"])) {
    $price = sanitize($_POST["price"]);
}


if (isset($_POST["cost"])) {
    $cost = sanitize($_POST["cost"]);
}

if (isset($_POST["type1"])) {
    $type1 = sanitize($_POST["type1"]);
} else {
    $errorMessage .= "You did not select the product type \n";
    $validate = false;
}

if (isset($_POST["real-address"])) {
    $realAddress = sanitize($_POST["real-address"]);
} else {
    $errorMessage .= "You did not input the real-address \n";
    $validate = false;
}

if (isset($_POST["message"])) {
    $message = sanitize($_POST["message"]);
}


if (isset($_POST["credit_card"])) {
    $credit_card = sanitize($_POST["credit_card"]);
} else {
    $errorMessage .= "You did not input the credit_card \n";
    $validate = false;
}

if (isset($_POST["creditName"])) {
    $creditName = sanitize($_POST["creditName"]);
} else {
    $errorMessage .= "You did not input the creditName \n";
    $validate = false;
}


if (isset($_POST["creditNumber"])) {
    $creditNumber = sanitize($_POST["creditNumber"]);
} else {
    $errorMessage .= "You did not input the creditNumber \n";
    $validate = false;
}


if (isset($_POST["expiryData"])) {
    $expiryData = sanitize($_POST["expiryData"]);
}else{
    $errorMessage .= "You did not input the expiryData \n";
    $validate = false;
}

if (isset($_POST["cvv"])) {
    $cvv = sanitize($_POST["cvv"]);
}else{
    $errorMessage .= "You did not input the cvv \n";
    $validate = false;
}

if ($validate == false){
    header("location ");
}
?>