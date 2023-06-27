"use strict"


function enableAllElement() {
    var disabledElements = document.querySelectorAll('[disabled]');
    disabledElements.forEach(e => {
        e.disabled = false
    });
}

function getProducts() {
    if (localStorage.getItem("products") != null) {
        var products = JSON.parse(localStorage.getItem("products"));
        var selectElement = document.getElementById("product-select");
        if (selectElement != null){
            for (let i = 0; i < products.length; i++) {
                var optionElement = document.createElement("option");
                optionElement.setAttribute('value', products[i].id)
                if (document.title !== "Fix_order") {
                    optionElement.setAttribute('disabled', "true")
                }
                optionElement.textContent = products[i].type + "\t" + products[i].name
                selectElement.appendChild(optionElement)
            }
        }
    }
}

function getLocalStorage() {
    var firstNameInput = document.getElementById('first-name');
    var lastNameInput = document.getElementById('last-name');
    var emailInput = document.getElementById('email');
    var addressInput = document.getElementsByName('address')[0];
    var townInput = document.getElementsByName('town')[0];
    var stateSelect = document.getElementsByName('state')[0];
    var postcodeInput = document.getElementsByName('post-code')[0];
    var phoneInput = document.getElementById('phone');
    var contactInputs = document.getElementsByName('contact');
    var productSelect = document.getElementById('product-select');
    var qualityInput = document.getElementById('quality');
    var dayInput = document.getElementById('day');
    var priceInput = document.getElementById('price');
    var costInput = document.getElementById('cost');
    var featureInputs = document.getElementsByName('type1');
    var messageInput = document.getElementById('message');
    var realAddress = document.getElementById("hidden-input");

    var formData = localStorage.getItem("formData");
    if (formData != null) {
        var formObj = JSON.parse(formData)
// 从 localStorage 获取字段值
        firstNameInput.value = formObj.firstNameInput;
        lastNameInput.value = formObj.lastNameInput;
        emailInput.value = formObj.emailInput;
        addressInput.value = formObj.addressInput;
        townInput.value = formObj.townInput;
        stateSelect.value = formObj.stateSelect;
        postcodeInput.value = formObj.postcodeInput;
        phoneInput.value = formObj.phoneInput;

        // 设置选中的联系方式
        var contactValue = formObj.contactInputs;
        for (var i = 0; i < contactInputs.length; i++) {
            contactInputs[i].checked = contactValue[i]
        }
        productSelect.value = formObj.productSelect;
        qualityInput.value = formObj.qualityInput;
        dayInput.value = formObj.dayInput;
        if (priceInput!=null){
            priceInput.value = formObj.priceInput;
        }
        costInput.value = formObj.costInput;
// 设置选中的特征
        if (formObj.realAddress !== ""){
            realAddress.value = formObj.realAddress
        }else {
            if (formObj.addressInput == "" || formObj.townInput  == "" || formObj.stateSelect == "" ||formObj.postcodeInput == "" ){
                realAddress.value = ""
            }else {

            }
        }
        var featureValues = formObj.featureInputs;
        for (let i = 0; i < featureInputs.length; i++) {
            featureInputs[i].checked = featureValues[i]
        }
        messageInput.value = formObj.messageInput;

        document.getElementById("credit-name").value = formObj.firstNameInput + formObj.lastNameInput;

    }
}

function validation() {

    var result = true;
    var errorMessage = "";

    // const creditTypeInputs = document.querySelectorAll('input[name="credit_card"]');
    // const creditNameInput = document.getElementById('credit-name');
    // const creditNumberInput = document.getElementById('credit-number');
    // const expiryDateInput = document.getElementById('expiry-date');
    // const cvvInput = document.getElementById('cvv');
    //
    //
    // // 验证信用卡类型
    // let selectedCreditType = false;
    // for (const creditTypeInput of creditTypeInputs) {
    //     if (creditTypeInput.checked) {
    //         selectedCreditType = true;
    //         break;
    //     }
    // }
    // if (!selectedCreditType) {
    //     errorMessage += "Please select credit card type \n"
    //     result = false;
    // }
    //
    //
    // 验证姓名
    // const creditName = creditNameInput.value.trim();
    // if (creditName === '') {
    //     errorMessage += "Please input the owner name of the card \n"
    //     result = false;
    // } else {
    //     if (creditName.length > 40) {
    //         result = false;
    //         errorMessage += "maximum of 40 characters of creditName \n"
    //     }
    //     // 检查姓名是否只包含字母和空格
    //     var regex = /^[A-Za-z\s]+$/;
    //     if (!regex.test(creditName)) {
    //         result = false;
    //         errorMessage += "The creditCard name should has only alphabetical and space \n"
    //     }
    // }
    //
    // // 验证信用卡号
    // const creditNumber = creditNumberInput.value.trim();
    // if (creditNumber === '') {
    //     errorMessage += "Please input credit card number \n"
    //     result = false;
    // }
    //
    // let cardType = ""
    //
    // creditTypeInputs.forEach(e => {
    //     if (e.checked == true) {
    //         cardType = e.value
    //     }
    // });
    //
    // const cardLength = creditNumber.length;
    // const firstNumberOfCard = parseInt(creditNumber.substring(0, 1));
    // const firstTwoNumberOfCard = parseInt(creditNumber.substring(0, 2));
    //
    // switch (cardType) {
    //     case 'Visa':
    //         if (!(cardLength === 16 && firstNumberOfCard === 4)) {
    //             result = false;
    //             errorMessage += "Visa cards have 16 digits and start with a 4 \n";
    //         }
    //         break;
    //     case 'Mastercard':
    //         if (!(cardLength === 16 && (firstTwoNumberOfCard >= 51 && firstTwoNumberOfCard <= 55))) {
    //             result = false;
    //             errorMessage += "MasterCard have 16 digits and start with digits 51 through to 55 \n";
    //         }
    //         break;
    //     case 'American Express':
    //         if (!(cardLength === 15 && (firstTwoNumberOfCard === 34 || firstTwoNumberOfCard === 37))) {
    //             result = false;
    //             errorMessage += "American Express has 15 digits and starts with 34 or 37 \n";
    //         }
    //         break;
    //     default:
    //         // 处理未知卡类型
    //         result = false;
    //         errorMessage += "Invalid card type \n";
    //         break;
    // }
    //
    //
    // const expiryDate = expiryDateInput.value.trim();
    // if (expiryDate === '') {
    //     errorMessage += "Please input expiry data \n"
    //     result = false;
    // }
    // if (!expiryDate.match(/(0[1-9]|1[0-2])-[0-9]{2}/)) {
    //     errorMessage += "the format of expiry data is incorrect \n"
    //     result = false;
    // }
    //
    // // 验证 CVV
    // const cvv = cvvInput.value.trim();
    // if (cvv === '') {
    //     errorMessage += "Please input the CVV"
    //     result = false;
    // }
    // //
    // // if (result == false) {
    // //     alert(errorMessage)
    // // } else {
    // //     enableAllElement()
    // // }
    document.getElementById("")
    enableAllElement();
    return result;

}

function timer(){
    // 十分钟
    var timeLimit = 600000;
    var timerId = setTimeout(function() {
        alert("Time limit exceeded.");
        window.location.href = "index.php";
    }, timeLimit);

    var countdownElement = document.getElementById("countdown");

    function updateCountdown() {
        var remainingTime = Math.max(0, timeLimit - (Date.now() - startTime));
        var minutes = Math.floor(remainingTime / 60000);
        var seconds = Math.floor((remainingTime % 60000) / 1000);
        countdownElement.textContent = minutes + "m " + seconds + "s";
        if (remainingTime > 0) {
            setTimeout(updateCountdown, 1000);
        }
    }

    var startTime = Date.now();
    updateCountdown();
}

function cancel() {
    localStorage.clear()
    window.location.href = 'index.php'
}

document.addEventListener("DOMContentLoaded", function () {
    // timer()
    getProducts()
    getLocalStorage()
    document.getElementById("enquire-form").onsubmit = validation;
    document.getElementById("cancel").onclick = cancel;
})