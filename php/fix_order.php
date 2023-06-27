<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fix_order</title>
    <link rel="stylesheet" type="text/css" href="../styles/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--    <script src="js/enquire.js"></script>-->
    <!--        <script src="../js/part2.js"></script>-->
    <!--        <script src="../js/enhancement.js"></script>-->

</head>

<body>
<div class="header">
    <nav class="navbar">
        <a href="../images/weblogo.png" class="logo"><img style="width: 120px" src="images/weblogo.png" alt="logo"></a>
        <div class="menu" id="menu">

        </div>
        <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>
</div>


<?php
session_start();
foreach ($_SESSION as $key => $value) {
    echo "Key: $key, Value: $value<br>";
}

?>


<div class="form form-payment">
    <form id="enquire-form" action="process_order.php" method="post" novalidate="novalidate" class="basic-grey">
        <h1 style="color: red">Fix Detail information
            <span>Please Confirm all your information in the fields.</span>
            <div id="countdown"></div>
        </h1>
        <label>
            <span class="colored">First name :</span>
            <?php
            if (isset($_SESSION['nameErrorMessage'])):
                $error = $_SESSION['nameErrorMessage'];
                echo "<input id='first-name' pattern='[a-zA-z]{1,25}' type='text' name='name' placeholder='$error' />";
                if (isset($_SESSION['nameErrorMessage2'])):
                    echo "<lable style='color: red'>&nbsp;&nbsp;&nbsp;&nbsp; {$_SESSION["nameErrorMessage2"]} </lable>";
                endif;
            else:
                echo "<input id='first-name' pattern='[a-zA-z]{1,25}' type='text' value='{$_SESSION["name"]} ' disabled name='name' />";
            endif;
            //            session_destroy();
            ?>
        </label>

        <label>
            <span class="colored">Last name :</span>
            <?php
            if (isset($_SESSION['lastNameErrorMessage'])):
                $error = $_SESSION['lastNameErrorMessage'];
                echo "<input id='last-name' pattern='[a-zA-z]{1,25}' type='text' name='last-name' placeholder='$error' />";
            else:
                echo "<input id='last-name' pattern='[a-zA-z]{1,25}' type='text' value='{$_SESSION["lastName"]}' disabled name='last-name' />";
            endif;
            ?>
        </label>

        <label>
            <span class="colored">Email address :</span>
            <?php
            if (isset($_SESSION['emailErrorMessage'])):
                $error = $_SESSION['emailErrorMessage'];
                echo "<input id='email' pattern='[a-zA-z]{1,25}' type='email' name='email' placeholder='$error' />";
            else:
                echo "<input id='email' pattern='[a-zA-z]{1,25}' type='email' value='{$_SESSION["email"]}'  disabled name='email' />";
            endif;
            ?>
        </label>

        <fieldset class="fieldset">
            <legend class="colored">Address:</legend>
            <label class="colored">Street address:</label>
            <?php
            if (isset($_SESSION['addressErrorMessage'])):
                $error = $_SESSION['addressErrorMessage'];
                echo "<input  pattern='[a-zA-z0-9]{1,40}' type='text' name='address' placeholder='$error' />";
            else:
                echo "<input  pattern='[a-zA-z0-9]{1,40}' type='text' value='{$_SESSION["address"]}'  disabled name='address' />";
            endif;
            ?>

            <label class="colored">Suburb/town:</label>

            <?php
            if (isset($_SESSION['townErrorMessage'])):
                $error = $_SESSION['townErrorMessage'];
                echo "<input  pattern='[a-zA-z0-9]{1,20}' type='text' name='town' placeholder='$error' />";
            else:
                echo "<input  pattern='[a-zA-z0-9]{1,20}' type='text' value='{$_SESSION["town"]}'   disabled name='town' />";
            endif;
            //            session_destroy();
            ?>

            <!--            <label class="colored">State:</label> <select name="state" style="width: 10%">-->
            <!--                <option value="VIC">VIC</option>-->
            <!--                <option value="NSW">NSW</option>-->
            <!--                <option value="QLD">QLD</option>-->
            <!--                <option value="NT">NT</option>-->
            <!--                <option value="WA">WA</option>-->
            <!--                <option value="SA">SA</option>-->
            <!--                <option value="TAS">TAS</option>-->
            <!--                <option value="ACT">ACT</option>-->
            <!--            </select>-->
            <?php
            if (isset($_SESSION['stateErrorMessage'])):
                $error = $_SESSION['stateErrorMessage'];
                echo "<label class='colored'>State:</label> <select name='state' style='width: 10%'>
                    <option value='VIC'>VIC</option>
                    <option value='NSW'>NSW</option>
                    <option value='QLD'>QLD</option>
                    <option value='NT'>NT</option>
                    <option value='WA'>WA</option>
                    <option value='SA'>SA</option>
                    <option value='TAS'>TAS</option>
                    <option value='ACT'>ACT</option>
                </select>
                ";
                echo "<lable style='color: red'>$error</lable>";
            else:
                if ($_SESSION['state'] == "VIC") {
                    echo "<label class='colored'>State:</label> <select name='state' disabled style='width: 10%'>
                    <option value='VIC' selected>VIC</option>
                    <option value='NSW'>NSW</option>
                    <option value='QLD'>QLD</option>
                    <option value='NT'>NT</option>
                    <option value='WA'>WA</option>
                    <option value='SA'>SA</option>
                    <option value='TAS'>TAS</option>
                    <option value='ACT'>ACT</option>
                </select>
                ";
                } elseif ($_SESSION['state'] == "NSW") {
                    echo "<label class='colored'>State:</label> <select name='state' disabled style='width: 10%'>
                    <option value='VIC'>VIC</option>
                    <option value='NSW' selected>NSW</option>
                    <option value='QLD'>QLD</option>
                    <option value='NT'>NT</option>
                    <option value='WA'>WA</option>
                    <option value='SA'>SA</option>
                    <option value='TAS'>TAS</option>
                    <option value='ACT'>ACT</option>
                </select>
                ";
                } elseif ($_SESSION['state'] == "QLD") {
                    echo "<label class='colored'>State:</label> <select name='state' disabled style='width: 10%'>
                    <option value='VIC'>VIC</option>
                    <option value='NSW'>NSW</option>
                    <option value='QLD' selected>QLD</option>
                    <option value='NT'>NT</option>
                    <option value='WA'>WA</option>
                    <option value='SA'>SA</option>
                    <option value='TAS'>TAS</option>
                    <option value='ACT'>ACT</option>
                </select>
                ";
                } elseif ($_SESSION['state'] == "NT") {
                    echo "<label class='colored'>State:</label> <select name='state' disabled style='width: 10%'>
                    <option value='VIC'>VIC</option>
                    <option value='NSW'>NSW</option>
                    <option value='QLD'>QLD</option>
                    <option value='NT' selected>NT</option>
                    <option value='WA'>WA</option>
                    <option value='SA'>SA</option>
                    <option value='TAS'>TAS</option>
                    <option value='ACT'>ACT</option>
                </select>
                ";
                } elseif ($_SESSION['state'] == "WA") {
                    echo "<label class='colored'>State:</label> <select name='state' disabled style='width: 10%'>
                    <option value='VIC'>VIC</option>
                    <option value='NSW'>NSW</option>
                    <option value='QLD'>QLD</option>
                    <option value='NT' >NT</option>
                    <option value='WA' selected>WA</option>
                    <option value='SA'>SA</option>
                    <option value='TAS'>TAS</option>
                    <option value='ACT'>ACT</option>
                </select>
                ";
                } elseif ($_SESSION['state'] == "SA") {
                    echo "<label class='colored'>State:</label> <select name='state' disabled style='width: 10%'>
                    <option value='VIC'>VIC</option>
                    <option value='NSW'>NSW</option>
                    <option value='QLD'>QLD</option>
                    <option value='NT'>NT</option>
                    <option value='WA'>WA</option>
                    <option value='SA' selected>SA</option>
                    <option value='TAS'>TAS</option>
                    <option value='ACT'>ACT</option>
                </select>
                ";
                } elseif ($_SESSION['state'] == "TAS") {
                    echo "<label class='colored'>State:</label> <select name='state' disabled style='width: 10%'>
                    <option value='VIC'>VIC</option>
                    <option value='NSW'>NSW</option>
                    <option value='QLD'>QLD</option>
                    <option value='NT'>NT</option>
                    <option value='WA'>WA</option>
                    <option value='SA'>SA</option>
                    <option value='TAS' selected>TAS</option>
                    <option value='ACT'>ACT</option>
                </select>
                ";
                } elseif ($_SESSION['state'] == "ACT") {
                    echo "<label class='colored'>State:</label> <select name='state' disabled style='width: 10%'>
                    <option value='VIC'>VIC</option>
                    <option value='NSW'>NSW</option>
                    <option value='QLD'>QLD</option>
                    <option value='NT'>NT</option>
                    <option value='WA'>WA</option>
                    <option value='SA'>SA</option>
                    <option value='TAS'>TAS</option>
                    <option value='ACT selected'>ACT</option>
                </select>
                ";
                }
            endif;
            ?>


            <label class="colored">Postcode:</label>
            <?php
            if (isset($_SESSION['postCodeErrorMessage'])):
                $error = $_SESSION['postCodeErrorMessage'];
                echo "<input  pattern='[0-9]{4}' type='text' name='post-code' placeholder='$error' />";
            else:
                echo "<input  pattern='[0-9]{4}' type='text' value='{$_SESSION["postCode"]}' disabled name='post-code' />";
            endif;
            //            session_destroy();
            ?>
        </fieldset>
        <label class="pd">
            <span class="pd colored">Phone number :</span>
            <?php
            if (isset($_SESSION['phoneErrorMessage'])):
                $error = $_SESSION['phoneErrorMessage'];
                echo "<input id='phone' pattern='[0-9]{10}' type='text' name='phone' placeholder='$error' />";
                echo "<lable style='color: red'>$error</lable>";
            else:
                echo "<input id='phone' pattern='[0-9]{10}'  value='{$_SESSION["phone"]}' disabled type='text' name='phone' />";
            endif;
            //            session_destroy();
            ?>
        </label>

        <fieldset class="fieldset">
            <legend>Please select the contact type：</legend>

            <?php
            if (isset($_SESSION['contactErrorMessage']) && $_SESSION['contactErrorMessage'] != ''):
                $error = $_SESSION['contactErrorMessage'];
                echo "<div>
                <input type='radio' id='contactChoice1' class='contact' name='contact' value='email'/>
                <label for='contactChoice1' class='contact'>email</label>
            
                <input type='radio' id='contactChoice2' class='contact' name='contact' value='phone'/>
                <label for='contactChoice2' class='contact'>phone</label>
            
                <input type='radio' id='contactChoice3' class='contact' name='contact' value='mail'/>
                <label for='contactChoice3' class='contact'>mail</label>
            </div>
            ";
                echo "<lable style='color: red'>&nbsp;&nbsp;&nbsp;&nbsp; $error</lable>";
            else:
                if ($_SESSION['contact'] == "email") {
                    echo "<div>
                <input type='radio' id='contactChoice1' class='contact' name='contact' checked value='email'/>
                <label for='contactChoice1' class='contact'>email</label>
            
                <input type='radio' id='contactChoice2' class='contact' name='contact' value='phone'/>
                <label for='contactChoice2' class='contact'>phone</label>
            
                <input type='radio' id='contactChoice3' class='contact' name='contact' value='mail'/>
                <label for='contactChoice3' class='contact'>mail</label>
            </div>
            ";
                } elseif ($_SESSION['contact'] == "phone") {
                    echo "<div>
                <input type='radio' id='contactChoice1' class='contact' name='contact'  value='email'/>
                <label for='contactChoice1' class='contact'>email</label>
            
                <input type='radio' id='contactChoice2' class='contact' name='contact' checked value='phone'/>
                <label for='contactChoice2' class='contact'>phone</label>
            
                <input type='radio' id='contactChoice3' class='contact' name='contact' value='mail'/>
                <label for='contactChoice3' class='contact'>mail</label>
            </div>
            ";
                } else {
                    echo "<div>
                <input type='radio' id='contactChoice1' class='contact' name='contact'  value='email'/>
                <label for='contactChoice1' class='contact'>email</label>
            
                <input type='radio' id='contactChoice2' class='contact' name='contact'  value='phone'/>
                <label for='contactChoice2' class='contact'>phone</label>
            
                <input type='radio' id='contactChoice3' class='contact' name='contact' checked value='mail'/>
                <label for='contactChoice3' class='contact'>mail</label>
            </div>
            ";
                }
            endif;
            //            session_destroy();
            ?>

        </fieldset>

        <label>
            <span class="pd">Product</span>
            <select name="product" id="product-select" style="width: 10%; margin-top: 10px">
                <option>Please select</option>
            </select>
            <?php
            if (isset($_SESSION['productErrorMessage']) && $_SESSION['productErrorMessage'] != ""):
                $error = $_SESSION['productErrorMessage'];
                echo "<lable style='color: red'>&nbsp;&nbsp;&nbsp;&nbsp; $error</lable>";
            endif;
            ?>

        </label>


        <label>
            <span>Quality :</span>
            <?php
            if (isset($_SESSION['qualityErrorMessage'])):
                $error = $_SESSION['qualityErrorMessage'];
                echo "<input id='quality' type='text'  name='quality' placeholder='$error'/>";
            else:
                echo "<input id='quality' type='text' disabled value='{$_SESSION["quality"]}' name='quality'/>";
            endif;
            //            session_destroy();
            ?>
        </label>


        <label>
            <span>Number of day :</span>
            <?php
            if (isset($_SESSION['dayErrorMessage'])):
                $error = $_SESSION['dayErrorMessage'];
                echo "<input id='day' type='text' name='day' placeholder='$error'/>";
            else:
                echo "<input id='day' type='text'  value='{$_SESSION["day"]}' disabled name='day'/>";
            endif;
            ?>


        </label>


        <label>
            <span>Per price :</span>
            <?php
            if (isset($_SESSION['productErrorMessage'])):
                $error = $_SESSION['productErrorMessage'];
                echo "<input id='price' type='text' name='price' disabled placeholder='$error'/>";
            else:
                echo "<input id='price' type='text' value='{$_SESSION["price"]}'  disabled name='price'/>";
            endif;
            ?>
        </label>


        <label>
            <span>Total Cost :</span>
            <?php
            if (isset($_SESSION['productErrorMessage'])):
                $error = $_SESSION['productErrorMessage'];
                echo "<input id='cost' type='text' name='cost' disabled placeholder='$error'/>";
            else:
                echo "<input id='cost' type='text' value='{$_SESSION["cost"]}' name='cost' disabled/>";
            endif;
            ?>

        </label>


        <fieldset class="fieldset fl">
            <legend>Product features</legend>
            <div>
                <input type="checkbox" class="contact" id="input1" name="type1" value="1">
                <label for="input1" class="contact"> Signal I/O</label>
                <input type="checkbox" class="contact" id="vehicle2" name="type1" value="2">
                <label for="vehicle2" class="contact"> Multiple I/O</label>
                <input type="checkbox" class="contact" id="vehicle3" name="type1" value="3">
                <label for="vehicle3" class="contact"> Only for Mixing </label>
            </div>
            <?php

            if (isset($_SESSION['type1ErrorMessage']) && $_SESSION['type1ErrorMessage'] != ""):
                $error = $_SESSION['type1ErrorMessage'];
                echo "<lable style='color: red'>&nbsp;&nbsp;&nbsp;&nbsp; $error</lable>";
            endif;
            ?>
        </fieldset>


        <label id="real-address">
            <span>Real address :</span>
            <?php
            if (isset($_SESSION['realAddressErrorMessage']) && $_SESSION['realAddressErrorMessage'] != ""):
                $error = $_SESSION['realAddressErrorMessage'];
                echo "<input id='hidden-input' type='text' name='real-address'/>";
            else:
                echo "<input id='hidden-input' type='text'  disabled name='real-address'/>";
            endif;
            ?>

        </label>

        <label>
            <span class="pd">Message :</span>
            <?php
            if (isset($_SESSION['messageErrorMessage'])):
                $error = $_SESSION['messageErrorMessage'];
                echo "<textarea id='message'  style='margin-top: 10px' name='message'
                      placeholder='$error'></textarea>";
            else:
                echo "<textarea id='message'  style='margin-top: 10px' value='' name='message'
                      placeholder='Your Message to Us' disabled>{$_SESSION["message"]}</textarea>";
            endif;
            ?>

        </label>

        <h1 style="text-align: center; color: red">Your payment details</h1>

        <fieldset class="fieldset">
            <legend>Credit card type：</legend>
            <!--            <div>-->
            <!--                <input type="radio" id="credit_type1" class="contact" name="credit_card" value="Visa"/>-->
            <!--                <label for="contactChoice1" class="contact">Visa</label>-->
            <!---->
            <!--                <input type="radio" id="credit_type2" class="contact" name="credit_card" value="Mastercard"/>-->
            <!--                <label for="contactChoice2" class="contact">Mastercard</label>-->
            <!---->
            <!--                <input type="radio" id="credit_type3" class="contact" name="credit_card" value="American Express"/>-->
            <!--                <label for="contactChoice3" class="contact">American Express</label>-->
            <!--            </div>-->

            <?php
            if (isset($_SESSION['credit_cardErrorMessage']) && $_SESSION['credit_cardErrorMessage'] != ""):
                $error = $_SESSION['credit_cardErrorMessage'];
                echo "<div>
                        <input type='radio' id='credit_type1' class='contact' name='credit_card' value='Visa'/>
                        <label for='contactChoice1' class='contact'>Visa</label>
                    
                        <input type='radio' id='credit_type2' class='contact' name='credit_card' value='Mastercard'/>
                        <label for='contactChoice2' class='contact'>Mastercard</label>
                    
                        <input type='radio' id='credit_type3' class='contact' name='credit_card' value='American Express'/>
                        <label for='contactChoice3' class='contact'>American Express</label>
                    </div>
                ";
                echo "<lable style='color: red'>&nbsp;&nbsp;&nbsp;&nbsp; $error</lable>";

            else:
                if ($_SESSION['credit_card'] == "Visa") {
                    echo "<div>
                        <input type='radio' disabled id='credit_type1' class='contact' name='credit_card' checked value='Visa'/>
                        <label for='contactChoice1' class='contact'>Visa</label>
                    
                        <input type='radio' disabled id='credit_type2' class='contact' name='credit_card' value='Mastercard'/>
                        <label for='contactChoice2' class='contact'>Mastercard</label>
                    
                        <input type='radio'  disabled id='credit_type3' class='contact' name='credit_card' value='American Express'/>
                        <label for='contactChoice3' class='contact'>American Express</label>
                    </div>
                ";
                } elseif ($_SESSION['credit_card'] == "Mastercard") {
                    echo "<div>
                        <input type='radio' disabled id='credit_type1' class='contact' name='credit_card'  value='Visa'/>
                        <label for='contactChoice1' class='contact'>Visa</label>
                    
                        <input type='radio' disabled id='credit_type2' class='contact' name='credit_card'  checked value='Mastercard'/>
                        <label for='contactChoice2' class='contact'>Mastercard</label>
                    
                        <input type='radio'  disabled id='credit_type3' class='contact' name='credit_card' value='American Express'/>
                        <label for='contactChoice3' class='contact'>American Express</label>
                    </div>
                ";
                } else {
                    echo "<div>
                        <input type='radio' disabled id='credit_type1' class='contact' name='credit_card'  value='Visa'/>
                        <label for='contactChoice1' class='contact'>Visa</label>
                    
                        <input type='radio' disabled id='credit_type2' class='contact' name='credit_card'   value='Mastercard'/>
                        <label for='contactChoice2' class='contact'>Mastercard</label>
                    
                        <input type='radio'  disabled id='credit_type3' class='contact' name='credit_card' checked value='American Express'/>
                        <label for='contactChoice3' class='contact'>American Express</label>
                    </div>
                ";
                }

            endif;
            ?>

        </fieldset>


        <label>
            <span>Name on credit card:</span>
            <?php
            if (isset($_SESSION["creditNameErrorMessage"])):
                $error = $_SESSION['creditNameErrorMessage'];
                echo "<input id='credit-name' type='text' name='creditName' placeholder='$error'/>";
                echo "<lable style='color: red'>{$_SESSION["creditNameErrorMessage"]}</lable>";
            else:
                echo "<input id='credit-name' type='text' disabled   name='creditName'/>";
            endif;
            ?>
        </label>


        <label>
            <span>Credit card number:</span>
            <?php
            if (isset($_SESSION['creditNumberErrorMessage'])):
                $error = $_SESSION['creditNumberErrorMessage'];
                echo "<input id='credit-number' type='text' name='creditNumber' placeholder='$error'/>";
            else:
                echo "<input id='credit-number' type='text' disabled value='{$_SESSION["creditNumber"]}' name='creditNumber'/>";
            endif;
            ?>

        </label>


        <label>
            <span>Credit card expiry date (mm-yy)</span>
            <?php
            if (isset($_SESSION['expiryDataErrorMessage'])):
                $error = $_SESSION['expiryDataErrorMessage'];
                echo "<input id='expiry-date' type='text' pattern='(0[1-9]|1[0-2])-[0-9]{2}' name='expiryData' placeholder='$error'/>";
                echo "<input id='expiry-date' type='text' pattern='(0[1-9]|1[0-2])-[0-9]{2}' name='expiryData' placeholder='$error'/>";
            else:
                echo "<input id='expiry-date' type='text' disabled value='{$_SESSION["expiryData"]}'  pattern='(0[1-9]|1[0-2])-[0-9]{2}' name='expiryData'/>";
            endif;
            ?>


        </label>


        <label>
            <span>Card verification value (CVV)</span>
            <?php
            if (isset($_SESSION['cvvErrorMessage'])):
                $error = $_SESSION['cvvErrorMessage'];
                echo "<input id='cvv' type='text' name='cvv' placeholder='$error'/>";
            else:
                echo "<input id='cvv' type='text'  disabled value='{$_SESSION["cvv"]}' disabled name='cvv'/>";
            endif;
            session_destroy();
            ?>
        </label>


        <label>
            <span>&nbsp;</span>
            <input type="submit" class="button" value="Pay now"/>
            <input type="button" id="cancel" class="button" value="Cancel Order"/>
        </label>

    </form>

</div>

<footer class="my-footer">
    <div>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#"><small>Home</small></a></li>
            <li class="list-inline-item"><a href="#"><small>Services</small></a></li>
            <li class="list-inline-item"><a href="#"><small>Terms</small></a></li>
            <li class="list-inline-item"><a href="#"><small>Privacy Policy</small></a></li>
        </ul>
        <br>
        <hr style="width: 30%; margin: 0 auto">
        <p class="copyright" style="color: #ffffff"><small>Monster Musk 2023</small></p>
    </div>
</footer>
</body>
<script>

    function enableAllElement() {
        var disabledElements = document.querySelectorAll('[disabled]');
        disabledElements.forEach(e => {
            e.disabled = false
        });
    }
    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById("enquire-form").onsubmit = enableAllElement;
    })

</script>
</html>