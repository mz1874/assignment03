<?php

function sanitize($value)
{
    $value = trim($value);

    $value = stripslashes($value);

    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}


function validateEmail($email)
{
    $emailPatten = "/^\S+@\S+\.\S+$/";
    return preg_match($emailPatten, $email);
}

function validatePhone($email)
{
    $phonePatten = "/^[0-9]{10}$/";
    return preg_match($phonePatten, $email);
}

$validate = true;
session_start();

if (isset($_POST["name"]) && $_POST["name"] != '') {
    $name = sanitize($_POST["name"]);
} else {
    $nameErrorMessage = "Please input your first name.\n";
    $_SESSION['nameErrorMessage'] = $nameErrorMessage;
    $validate = false;
}

if (isset($_POST["last-name"]) && $_POST["last-name"] != '') {
    $lastName = sanitize($_POST["last-name"]);
} else {
    $lastNameErrorMessage = "Please input your last name.\n";
    $_SESSION['lastNameErrorMessage'] = $lastNameErrorMessage;
    $validate = false;
}

if (isset($_POST["email"]) && $_POST["email"] != '') {
    $email = sanitize($_POST["email"]);
    if (!validateEmail($email)) {
        $validate = false;
        $emailErrorMessage = "Your mail is invalid\n";
        $_SESSION['emailErrorMessage'] = $emailErrorMessage;
    }
} else {
    $emailErrorMessage = "Please input your last email.\n";
    $_SESSION['emailErrorMessage'] = $emailErrorMessage;
    $validate = false;
}

if (isset($_POST["address"]) && $_POST["address"] != '') {
    $address = sanitize($_POST["address"]);
} else {
    $addressErrorMessage = "Please input your address.\n";
    $_SESSION['addressErrorMessage'] = $addressErrorMessage;
    $validate = false;
}

if (isset($_POST["town"]) && $_POST["town"] != '') {
    $town = sanitize($_POST["town"]);
} else {
    $townErrorMessage = "Please input your town.\n";
    $_SESSION['townErrorMessage'] = $townErrorMessage;
    $validate = false;
}




if (isset($_POST["state"]) && $_POST["state"] != '') {
    $state = sanitize($_POST["state"]);
} else {
    $stateErrorMessage = "Please select your state.\n";
    $_SESSION['stateErrorMessage'] = $stateErrorMessage;
    $validate = false;
}

if (isset($_POST["post-code"]) && isset($_POST["state"])) {
    $postCode = sanitize($_POST["post-code"]);
    $substr = substr($postCode, 0, 1);
    $index = intval($substr);
    switch ($state) {
        case 'VIC':
            if ($index !== 8 && $index !== 3) {
                $isValid = false;
                $stateErrorMessage = "The selected state must match the first digit of the postcode";
                $_SESSION['stateErrorMessage'] = $stateErrorMessage;
            }
            break;
        case 'NSW':
            if ($index !== 1 && $index !== 2) {
                $isValid = false;
                $stateErrorMessage = "The selected state must match the first digit of the postcode";
                $_SESSION['stateErrorMessage'] = $stateErrorMessage;
            }
            break;
        case 'QLD':
            if ($index !== 4 && $index !== 9) {
                $isValid = false;
                $stateErrorMessage = "The selected state must match the first digit of the postcode";
                $_SESSION['stateErrorMessage'] = $stateErrorMessage;
            }
            break;
        case 'NT':
            if ($index !== 0) {
                $isValid = false;
                $stateErrorMessage = "The selected state must match the first digit of the postcode";
                $_SESSION['stateErrorMessage'] = $stateErrorMessage;
            }
            break;
        case 'WA':
            if ($index !== 6) {
                $isValid = false;
                $stateErrorMessage = "The selected state must match the first digit of the postcode";
                $_SESSION['stateErrorMessage'] = $stateErrorMessage;
            }
            break;
        case 'SA':
            if ($index !== 5) {
                $isValid = false;
                $stateErrorMessage = "The selected state must match the first digit of the postcode";
                $_SESSION['stateErrorMessage'] = $stateErrorMessage;
            }
            break;
        case 'TAS':
            if ($index !== 7) {
                $isValid = false;
                $stateErrorMessage = "The selected state must match the first digit of the postcode";
                $_SESSION['stateErrorMessage'] = $stateErrorMessage;
            }
            break;
        case 'ACT':
            if ($index !== 0) {
                $isValid = false;
                $stateErrorMessage = "The selected state must match the first digit of the postcode";
                $_SESSION['stateErrorMessage'] = $stateErrorMessage;
            }
            break;
        default:
            break;
    }
} else {
    $stateErrorMessage = "Please select your postCode.\n";
    $_SESSION['stateErrorMessage'] = $stateErrorMessage;
    $validate = false;
}


if (isset($_POST["phone"]) && $_POST['phone'] != '') {
    $phone = sanitize($_POST["phone"]);
    if (!validatePhone(validatePhone($phone))) {
        $validate = false;
        $phoneErrorMessage = "Your phone number is invalid\n";
        $_SESSION['phoneErrorMessage'] = $phoneErrorMessage;
    }
} else {
    $phoneErrorMessage = "Please input your phone number.\n";
    $_SESSION['phoneErrorMessage'] = $phoneErrorMessage;
    $validate = false;
}

if (isset($_POST["contact"]) && $_POST["contact"] != '') {
    $contact = sanitize($_POST["contact"]);
} else {
    $contactErrorMessage = "Please select your contact type.\n";
    $_SESSION['contactErrorMessage'] = $contactErrorMessage;
    $validate = false;
}

if (isset($_POST["product"])) {
    $product = sanitize($_POST["product"]);
} else {
    $productErrorMessage = "Please select your product type.\n";
    $_SESSION['productErrorMessage'] = $productErrorMessage;
    $validate = false;
}

if (isset($_POST["quality"]) && $_POST["quality"] != "") {
    $quality = sanitize($_POST["quality"]);
} else {
    $qualityErrorMessage = "Please input your quality number.\n";
    $_SESSION['qualityErrorMessage'] = $qualityErrorMessage;
    $validate = false;
}

if (isset($_POST["day"]) && $_POST["day"] != '') {
    $day = sanitize($_POST["day"]);
} else {
    $dayErrorMessage = "Please input your day\n";
    $_SESSION['dayErrorMessage'] = $dayErrorMessage;
    $validate = false;
}

//if (isset($_POST["price"])) {
//    $price = sanitize($_POST["price"]);
//}
//
//if (isset($_POST["cost"])) {
//    $cost = sanitize($_POST["cost"]);
//}

if (isset($_POST["type1"]) && $_POST["type1"] != "") {
    $type1 = sanitize($_POST["type1"]);
} else {
    $type1ErrorMessage = "You did not select the product type \n";
    $_SESSION['type1ErrorMessage'] = $type1ErrorMessage;
    $validate = false;
}


if ($validate == false){
    header("location:fix_order.php");
}

//
//if (isset($_POST["real-address"])) {
//    $realAddress = sanitize($_POST["real-address"]);
//} else {
//    $errorMessage .= "You did not input the real-address \n";
//    $validate = false;
//}
//
//if (isset($_POST["message"])) {
//    $message = sanitize($_POST["message"]);
//}
//
//
//if (isset($_POST["credit_card"])) {
//    $credit_card = sanitize($_POST["credit_card"]);
//} else {
//    $errorMessage .= "You did not input the credit_card \n";
//    $validate = false;
//}
//
//if (isset($_POST["creditName"])) {
//    $creditName = sanitize($_POST["creditName"]);
//} else {
//    $errorMessage .= "You did not input the creditName \n";
//    $validate = false;
//}
//
//
//if (isset($_POST["creditNumber"])) {
//    $creditNumber = sanitize($_POST["creditNumber"]);
//} else {
//    $errorMessage .= "You did not input the creditNumber \n";
//    $validate = false;
//}
//
//
//if (isset($_POST["expiryData"])) {
//    $expiryData = sanitize($_POST["expiryData"]);
//} else {
//    $errorMessage .= "You did not input the expiryData \n";
//    $validate = false;
//}
//
//if (isset($_POST["cvv"])) {
//    $cvv = sanitize($_POST["cvv"]);
//} else {
//    $errorMessage .= "You did not input the cvv \n";
//    $validate = false;
//}

?>