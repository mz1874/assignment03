<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Confirmation Page</title>
    <link rel="stylesheet" type="text/css" href="../styles/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--    <script src="js/enquire.js"></script>-->
    <script src="../js/part2.js"></script>
    <script src="../js/enhancement.js"></script>

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


<div class="form form-payment">
    <form id="enquire-form" action="php/process_order.php" method="post" novalidate="novalidate" class="basic-grey">
        <h1 style="color: red">Fix Detail information
            <span>Please Confirm all your information in the fields.</span>
            <div id="countdown"></div>
        </h1>
        <label>
            <span class="colored">First name :</span>
            <?php
            session_start();

            $error = $_SESSION['nameErrorMessage'];
            if (isset($error)):
                echo "<input id='first-name' pattern='[a-zA-z]{1,25}' type='text' name='name' placeholder='$error' />";
            else:
                echo "<input id='first-name' pattern='[a-zA-z]{1,25}' type='text' name='name' />";
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
                echo "<input id='last-name' pattern='[a-zA-z]{1,25}' type='text' name='last-name' />";
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
                echo "<input id='email' pattern='[a-zA-z]{1,25}' type='email' name='email' />";
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
                echo "<input  pattern='[a-zA-z0-9]{1,40}' type='text' name='address' />";
            endif;
            ?>

            <label class="colored">Suburb/town:</label>

            <?php
            if (isset($_SESSION['townErrorMessage'])):
                $error = $_SESSION['townErrorMessage'];
                echo "<input  pattern='[a-zA-z0-9]{1,20}' type='text' name='town' placeholder='$error' />";
            else:
                echo "<input  pattern='[a-zA-z0-9]{1,20}' type='text' name='town' />";
            endif;
            //            session_destroy();
            ?>

            <label class="colored">State:</label> <select name="state" style="width: 10%" disabled>
                <option value="VIC">VIC</option>
                <option value="NSW">NSW</option>
                <option value="QLD">QLD</option>
                <option value="NT">NT</option>
                <option value="WA">WA</option>
                <option value="SA">SA</option>
                <option value="TAS">TAS</option>
                <option value="ACT">ACT</option>
            </select>
            <?php
            if (isset($_SESSION['stateErrorMessage'])):
                $error = $_SESSION['stateErrorMessage'];
                echo "<lable>$error</lable>";
            endif;
            ?>
            <label class="colored">Postcode:</label> <input type="text" name="post-code" pattern="[0-9]{4}" disabled>
        </fieldset>
        <label class="pd">
            <span class="pd colored">Phone number :</span>
            <input id="phone" type="text" name="phone" pattern="[0-9]{10}"
                   disabled/>
        </label>

        <fieldset class="fieldset">
            <legend>Please select the contact type：</legend>
            <div>
                <input type="radio" id="contactChoice1" class="contact" name="contact" value="email" disabled/>
                <label for="contactChoice1" class="contact">email</label>

                <input type="radio" id="contactChoice2" class="contact" name="contact" value="phone" disabled/>
                <label for="contactChoice2" class="contact">phone</label>

                <input type="radio" id="contactChoice3" class="contact" name="contact" value="mail" disabled/>
                <label for="contactChoice3" class="contact">mail</label>
            </div>
        </fieldset>

        <label>
            <span class="pd">Product</span>
            <select name="product" id="product-select" style="width: 10%; margin-top: 10px">
                <option disabled selected>Please select</option>
            </select>
        </label>


        <label>
            <span>Quality :</span>
            <input id="quality" type="text" disabled name="quality"/>
        </label>


        <label>
            <span>Number of day :</span>
            <input id="day" type="text" disabled name="day"/>
        </label>


        <label>
            <span>Per price :</span>
            <input id="price" type="text" name="price" disabled/>
        </label>


        <label>
            <span>Total Cost :</span>
            <input id="cost" type="text" name="cost" disabled/>
        </label>


        <fieldset class="fieldset fl">
            <legend>Product features</legend>
            <div>
                <input type="checkbox" class="contact" disabled id="input1" name="type1" value="1">
                <label for="input1" class="contact"> Signal I/O</label>
                <input type="checkbox" class="contact" disabled id="vehicle2" name="type1" value="2">
                <label for="vehicle2" class="contact"> Multiple I/O</label>
                <input type="checkbox" class="contact" disabled id="vehicle3" name="type1" value="3">
                <label for="vehicle3" class="contact"> Only for Mixing </label>
            </div>
        </fieldset>

        <label id="real-address">
            <span>Real address :</span>
            <input id="hidden-input" type="text" disabled="disabled" name="real-address"/>
        </label>

        <label>
            <span class="pd">Message :</span>
            <textarea id="message" disabled style="margin-top: 10px" name="message"
                      placeholder="Your Message to Us"></textarea>
        </label>

        <h1 style="text-align: center; color: red">Your payment details</h1>

        <fieldset class="fieldset">
            <legend>Credit card type：</legend>
            <div>
                <input type="radio" id="credit_type1" class="contact" name="credit_card" value="Visa"/>
                <label for="contactChoice1" class="contact">Visa</label>

                <input type="radio" id="credit_type2" class="contact" name="credit_card" value="Mastercard"/>
                <label for="contactChoice2" class="contact">Mastercard</label>

                <input type="radio" id="credit_type3" class="contact" name="credit_card" value="American Express"/>
                <label for="contactChoice3" class="contact">American Express</label>
            </div>
        </fieldset>


        <label>
            <span>Name on credit card:</span>
            <input id="credit-name" type="text" name="creditName"/>
        </label>


        <label>
            <span>Credit card number:</span>
            <input id="credit-number" type="text" name="creditNumber"/>
        </label>


        <label>
            <span>Credit card expiry date (mm-yy)</span>
            <input id="expiry-date" type="text" pattern="(0[1-9]|1[0-2])-[0-9]{2}" name="expiryData"/>
        </label>


        <label>
            <span>Card verification value (CVV)</span>
            <input id="cvv" type="text" name="cvv"/>
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
</html>