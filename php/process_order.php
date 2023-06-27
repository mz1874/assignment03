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
if (isset($_POST["name"]) || isset($_SESSION["name"])) {
    $name = sanitize($_POST["name"]);
    $_SESSION['name'] = $name;
} else {
    $nameErrorMessage = "Please input your first name.\n";
    $_SESSION['nameErrorMessage'] = $nameErrorMessage;
    $validate = false;
}

if (isset($_POST["last-name"]) || isset($_SESSION["last-name"])) {
    $lastName = sanitize($_POST["last-name"]);
    $_SESSION['lastName'] = $lastName;
} else {
    $lastNameErrorMessage = "Please input your last name.\n";
    $_SESSION['lastNameErrorMessage'] = $lastNameErrorMessage;
    $validate = false;
}

if (isset($_POST["email"]) || isset($_SESSION["email"])) {
    $email = sanitize($_POST["email"]);
    $_SESSION['email'] = $email;
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
    $_SESSION['address'] = $address;
} else {
    $addressErrorMessage = "Please input your address.\n";
    $_SESSION['addressErrorMessage'] = $addressErrorMessage;
    $validate = false;
}

if (isset($_POST["town"]) && $_POST["town"] != '') {
    $town = sanitize($_POST["town"]);
    $_SESSION['town'] = $town;
} else {
    $townErrorMessage = "Please input your town.\n";
    $_SESSION['townErrorMessage'] = $townErrorMessage;
    $validate = false;
}


if (isset($_POST["state"])) {
    $state = sanitize($_POST["state"]);
    $_SESSION['state'] = $state;
} else {
    $stateErrorMessage = "Please select your state.\n";
    $_SESSION['stateErrorMessage'] = $stateErrorMessage;
    $validate = false;
}

if (isset($_POST["post-code"])) {
    $postCode = sanitize($_POST["post-code"]);
    $_SESSION['postCode'] = $postCode;
    $substr = substr($postCode, 0, 1);
    $index = intval($substr);
    switch ($state) {
        case 'VIC':
            if ($index !== 8 && $index !== 3) {
                $isValid = false;
                $postCodeErrorMessage = "The selected state must match the first digit of the postcode";
                $_SESSION['postCodeErrorMessage'] = $postCodeErrorMessage;
            }
            break;
        case 'NSW':
            if ($index !== 1 && $index !== 2) {
                $isValid = false;
                $postCodeErrorMessage = "The selected state must match the first digit of the postcode";
                $_SESSION['postCodeErrorMessage'] = $postCodeErrorMessage;
            }
            break;
        case 'QLD':
            if ($index !== 4 && $index !== 9) {
                $isValid = false;
                $postCodeErrorMessage = "The selected state must match the first digit of the postcode";
                $_SESSION['postCodeErrorMessage'] = $postCodeErrorMessage;
            }
            break;
        case 'NT':
            if ($index !== 0) {
                $isValid = false;
                $postCodeErrorMessage = "The selected state must match the first digit of the postcode";
                $_SESSION['postCodeErrorMessage'] = $postCodeErrorMessage;
            }
            break;
        case 'WA':
            if ($index !== 6) {
                $isValid = false;
                $postCodeErrorMessage = "The selected state must match the first digit of the postcode";
                $_SESSION['postCodeErrorMessage'] = $postCodeErrorMessage;
            }
            break;
        case 'SA':
            if ($index !== 5) {
                $isValid = false;
                $postCodeErrorMessage = "The selected state must match the first digit of the postcode";
                $_SESSION['postCodeErrorMessage'] = $postCodeErrorMessage;
            }
            break;
        case 'TAS':
            if ($index !== 7) {
                $isValid = false;
                $postCodeErrorMessage = "The selected state must match the first digit of the postcode";
                $_SESSION['postCodeErrorMessage'] = $postCodeErrorMessage;
            }
            break;
        case 'ACT':
            if ($index !== 0) {
                $isValid = false;
                $postCodeErrorMessage = "The selected state must match the first digit of the postcode";
                $_SESSION['postCodeErrorMessage'] = $postCodeErrorMessage;
            }
            break;
        default:
            break;
    }
} else {
    $stateErrorMessage = "Please input your postCode.\n";
    $_SESSION['postCodeErrorMessage'] = $stateErrorMessage;
    $validate = false;
}


if (isset($_POST["phone"]) && $_POST['phone'] != '') {
    $phone = sanitize($_POST["phone"]);
    $_SESSION['phone'] = $phone;
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

if (isset($_POST["contact"])) {
    $contact = sanitize($_POST["contact"]);
    $_SESSION['contact'] = $contact;
} else {
    $contactErrorMessage = "Please select your contact type.\n";
    $_SESSION['contactErrorMessage'] = $contactErrorMessage;
    $validate = false;
}

if (isset($_POST["product"])) {
    $product = sanitize($_POST["product"]);
    $_SESSION['product'] = $product;
} else {
    $productErrorMessage = "Please select your product\n";
    $_SESSION['productErrorMessage'] = $productErrorMessage;
    $validate = false;
}

if (isset($_POST["quality"]) && $_POST["quality"] != "") {
    $quality = sanitize($_POST["quality"]);
    $_SESSION['quality'] = $quality;
} else {
    $qualityErrorMessage = "Please input your quality number.\n";
    $_SESSION['qualityErrorMessage'] = $qualityErrorMessage;
    $validate = false;
}

if (isset($_POST["day"]) && $_POST["day"] != '') {
    $day = sanitize($_POST["day"]);
    $_SESSION['day'] = $day;
} else {
    $dayErrorMessage = "Please input your day\n";
    $_SESSION['dayErrorMessage'] = $dayErrorMessage;
    $validate = false;
}

if (isset($_POST["price"])) {
    $price = sanitize($_POST["price"]);
    $_SESSION['price'] = $price;
} else {
    $priceErrorMessage = "You did not select a product\n";
    $_SESSION['priceErrorMessage'] = $priceErrorMessage;
    $validate = false;
}

if (isset($_POST["cost"])) {
    $cost = sanitize($_POST["cost"]);
    $_SESSION['cost'] = $cost;
} else {
    $costErrorMessage = "You did not select a product or did not input the day or quality\n";
    $_SESSION['costErrorMessage'] = $costErrorMessage;
    $validate = false;
}

if (isset($_POST["type1"]) && $_POST["type1"] != "") {
    $type1 = sanitize($_POST["type1"]);
    $_SESSION['type1'] = $type1;
} else {
    $type1ErrorMessage = "You did not select the product type \n";
    $_SESSION['type1ErrorMessage'] = $type1ErrorMessage;
    $validate = false;
}


if (isset($_POST["real-address"]) && $_POST["real-address"] != '') {
    $realAddress = sanitize($_POST["real-address"]);
    $_SESSION['realAddress'] = $realAddress;
}
//else {
//    $realAddressErrorMessage = "You did not input the real-address \n";
//    $_SESSION['realAddressErrorMessage'] = $realAddressErrorMessage;
//    $validate = false;
//}

if (isset($_POST["message"]) && $_POST["message"] != "") {
    $message = sanitize($_POST["message"]);
    $_SESSION['message'] = $message;
} else {
    $messageErrorMessage = "You did not input message \n";
    $_SESSION['messageErrorMessage'] = $messageErrorMessage;
    $validate = false;
}


if (isset($_POST["credit_card"])) {
    $credit_card = sanitize($_POST["credit_card"]);
    $_SESSION['credit_card'] = $credit_card;
} else {
    $credit_cardErrorMessage = "You did not select the card type \n";
    $_SESSION['credit_cardErrorMessage'] = $credit_cardErrorMessage;
    $validate = false;
}

if (isset($_POST["creditName"]) && trim($_POST["creditName"]) != '') {
    $creditName = sanitize($_POST["creditName"]);
    if (strlen($creditName) > 40) {
        $validate = false;
        $_SESSION['creditNameErrorMessage'] = "maximum of 40 characters of creditName ";
    }
    $regex = '/^[A-Za-z\s]+$/';
    if (!preg_match($regex, $creditName)) {
        $validate = false;
        $_SESSION['creditNameErrorMessage'] = "The creditCard name should has only alphabetical and space";
    }
} else {
    $creditNameErrorMessage = "You did not input the credit card Name \n";
    $_SESSION['creditNameErrorMessage'] = $creditNameErrorMessage;
    $validate = false;
}
if (isset($_POST["creditNumber"]) && $_POST["creditNumber"] != '') {
    $creditNumber = sanitize($_POST["creditNumber"]);
    $_SESSION['creditNumber'] = $creditNumber;
} else {
    $creditNumberErrorMessage = "You did not input the creditNumber \n";
    $_SESSION['creditNumberErrorMessage'] = $creditNumberErrorMessage;
    $validate = false;
}


$cardLength = strlen($creditNumber);
$firstNumberOfCard = intval(substr($creditNumber, 0, 1));
$firstTwoNumberOfCard = intval(substr($creditNumber, 0, 2));

switch ($credit_card) {
    case 'Visa':
        if (!($cardLength === 16 && $firstNumberOfCard === 4)) {
            $validate = false;
            $_SESSION['creditNumberErrorMessage'] = "Visa cards have 16 digits and start with a 4";
        }
        break;
    case 'Mastercard':
        if (!($cardLength === 16 && ($firstTwoNumberOfCard >= 51 && $firstTwoNumberOfCard <= 55))) {
            $validate = false;
            $_SESSION['creditNumberErrorMessage'] = "MasterCard have 16 digits and start with digits 51 through to 55";
        }
        break;
    case 'American Express':
        if (!($cardLength === 15 && ($firstTwoNumberOfCard === 34 || $firstTwoNumberOfCard === 37))) {
            $validate = false;
            $_SESSION['creditNumberErrorMessage'] = "American Express has 15 digits and starts with 34 or 37 ";
        }
        break;
    default:
        // 处理未知卡类型
        $validate = false;
        $_SESSION['creditNumberErrorMessage'] = "Invalid card type";
        break;
}


if (isset($_POST["expiryData"]) && $_POST["expiryData"] != '') {
    $expiryData = sanitize($_POST["expiryData"]);
    $_SESSION['expiryData'] = $expiryData;
    if (!preg_match('/(0[1-9]|1[0-2])-[0-9]{2}/', $expiryData)) {
        $_SESSION['expiryDataErrorMessage'] = "the format of expiry data is incorrect ";
        $validate = false;
    }
} else {
    $expiryDataErrorMessage = "You did not input the expiryData \n";
    $_SESSION['expiryDataErrorMessage'] = $expiryDataErrorMessage;
    $validate = false;
}

if (isset($_POST["cvv"]) && $_POST["cvv"] != '') {
    $cvv = sanitize($_POST["cvv"]);
    $_SESSION['cvv'] = $cvv;
} else {
    $errorMessage = "You did not input the cvv \n";
    $_SESSION['cvvErrorMessage'] = $errorMessage;
    $validate = false;
}


//if ($validate == false) {
//    header("location:fix_order.php");
//} else {
//
//}

foreach ($_SESSION as $key => $value) {
    echo "Key: $key, Value: $value<br>";
}

//echo $state;
//echo $stateErrorMessage
//echo $expiryDataErrorMessage;
?>