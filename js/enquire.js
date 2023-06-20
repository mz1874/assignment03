"use strict"


let initArr = [{
    "id": 1,
    "type": "CL5",
    "name": "Digital Mixing Console",
    "image": "images/product1.webp",
    "price": 99,
    "description": ["Input channels: 64 mono, 8 stereo.", "Fader configuration: 16-fader left section, 8-fader Centralogic section, 2-fader master section.", "Stainless steel stay for iPad support.", "Meter bridge optional."],
}, {
    "id": 2,
    "type": "QL5",
    "name": "Digital Mixing Console",
    "image": "images/c2.webp",
    "price": 99,
    "description": ["Input channels: 64 mono, 8 stereo.", "Fader configuration: 16-fader left section, 8-fader Centralogic section, 2-fader master section.", "Stainless steel stay for iPad support.", "Meter bridge optional."],
}, {
    "id": 3,
    "type": "QL1",
    "name": "Digital Mixing Console",
    "image": "images/c3.webp",
    "price": 99,
    "description": ["Input channels: 64 mono, 8 stereo.", "Fader configuration: 16-fader left section, 8-fader Centralogic section, 2-fader master section.", "Stainless steel stay for iPad support.", "Meter bridge optional."],
}, {
    "id": 4,
    "type": "Yamaha",
    "name": "AG01",
    "image": "images/mc.webp",
    "price": 99,
    "description": ["Input channels: 64 mono, 8 stereo.", "Fader configuration: 16-fader left section, 8-fader Centralogic section, 2-fader master section.", "Stainless steel stay for iPad support.", "Meter bridge optional."],
}, {
    "id": 5,
    "type": "Yamaha",
    "name": "AG06MK2",
    "image": "images/mc1.webp",
    "price": 99,
    "description": ["Input channels: 64 mono, 8 stereo.", "Fader configuration: 16-fader left section, 8-fader Centralogic section, 2-fader master section.", "Stainless steel stay for iPad support.", "Meter bridge optional."],
}, {
    "id": 6,
    "type": "Yamaha",
    "name": "AG06MK2 LSPK",
    "image": "images/mc3.webp",
    "price": 99,
    "description": ["Input channels: 64 mono, 8 stereo.", "Fader configuration: 16-fader left section, 8-fader Centralogic section, 2-fader master section.", "Stainless steel stay for iPad support.", "Meter bridge optional."],
}, {
    "id": 7,
    "type": "Yamaha ",
    "name": "AK SPEAKER",
    "image": "images/ss1.webp",
    "price": 99,
    "description": ["Input channels: 64 mono, 8 stereo.", "Fader configuration: 16-fader left section, 8-fader Centralogic section, 2-fader master section.", "Stainless steel stay for iPad support.", "Meter bridge optional."],
}, {
    "id": 8,
    "type": "Yamaha",
    "name": "AK103 SPEAKER",
    "image": "images/s2.webp",
    "price": 99,
    "description": ["Input channels: 64 mono, 8 stereo.", "Fader configuration: 16-fader left section, 8-fader Centralogic section, 2-fader master section.", "Stainless steel stay for iPad support.", "Meter bridge optional."],
}, {
    "id": 9,
    "type": "Yamaha",
    "name": "7345AC SPEAKER",
    "image": "images/s3.webp",
    "price": 99,
    "description": ["Input channels: 64 mono, 8 stereo.", "Fader configuration: 16-fader left section, 8-fader Centralogic section, 2-fader master section.", "Stainless steel stay for iPad support.", "Meter bridge optional."],
}

]


function getProducts() {
    if (localStorage.getItem("products") != null) {
        var products = JSON.parse(localStorage.getItem("products"));
        var selectElement = document.getElementById("product-select");
        for (let i = 0; i < products.length; i++) {
            var optionElement = document.createElement("option");
            optionElement.setAttribute('value', products[i].id)
            optionElement.textContent = products[i].type + "\t" + products[i].name
            selectElement.appendChild(optionElement)
        }
    }
}

function getPrice() {
    var selectElement = document.getElementById("product-select");
    selectElement.addEventListener("change", function () {
        var selectedOptions = selectElement.selectedOptions;
        if (localStorage.getItem("products") != null) {
            var products = JSON.parse(localStorage.getItem("products"));
            var obj = products[selectedOptions[0].value - 1]
            document.getElementById("price").value = obj.price
        }
    })
}


function getCost() {

    document.getElementById("quality").addEventListener("input", function () {
        var selectElement = document.getElementById("product-select");
        var selectedOptions = selectElement.selectedOptions;
        if (selectedOptions[0].value == "Please select") {
            alert("You have select a product first")
            document.getElementById("quality").value = "";
            return
        }
        let price = document.getElementById("price").value
        // 获取数量
        var value = document.getElementById("quality").value;
        var number = parseInt(value);
        if (isNaN(number)) {
            alert("please input a number in Quality")
            document.getElementById("quality").value = "";
        } else {
            let cost = number * price
            document.getElementById("cost").value = cost
        }
    })
    let dayElement = document.getElementById("day");
    dayElement.addEventListener("input", function () {
        let dayNumber = parseInt(dayElement.value)
        if (isNaN(dayNumber)) {
            alert("Please input a number in Day")
        }
        document.getElementById("cost").value = document.getElementById("cost").value * dayNumber
    })
}

// 邮箱校验函数
function validateEmail(email) {
    var pattern = /^\S+@\S+\.\S+$/;
    return pattern.test(email);
}

// 手机号校验函数
function validatePhoneNumber(phoneNumber) {
    var pattern = /^[0-9]{10}$/;
    return pattern.test(phoneNumber);
}

// 邮编校验函数
function validatePostcode(postcode) {
    var pattern = /^[0-9]{4}$/;
    return pattern.test(postcode);
}

function storeData() {
    var form = document.getElementById('enquire-form');
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
    var realAddressInput = document.getElementById("hidden-input");

    var formData = {
        form: form.outerHTML,
        firstNameInput: firstNameInput.value,
        lastNameInput: lastNameInput.value,
        emailInput: emailInput.value,
        addressInput: addressInput.value,
        townInput: townInput.value,
        stateSelect: stateSelect.value,
        postcodeInput: postcodeInput.value,
        phoneInput: phoneInput.value,
        contactInputs: Array.from(contactInputs).map(input => input.checked),
        productSelect: productSelect.selectedIndex,
        qualityInput: qualityInput.value,
        dayInput: dayInput.value,
        priceInput: priceInput.value,
        costInput: costInput.value,
        featureInputs: Array.from(featureInputs).map(input => input.checked),
        messageInput: messageInput.value,
    };
    if (realAddressInput != null && realAddressInput.value !=null){
        formData.realAddress = realAddressInput.value
    }

// 将对象转换为字符串并存储在localStorage中
    localStorage.setItem('formData', JSON.stringify(formData));
}

function validate(event) {
    event.preventDefault();
    var errorMessage = "";
    // 获取表单元素
    var form = document.getElementById('enquire-form');
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


    // 校验表单字段
    var isValid = true;

    // 校验 First name 字段
    if (!firstNameInput.value.trim()) {
        isValid = false;
        errorMessage += "Please enter your First name\n"
    }

    // 校验 Last name 字段
    if (!lastNameInput.value.trim()) {
        isValid = false;
        errorMessage += 'Please enter your Last name\n'
    }

    // 校验 Email 字段
    if (!emailInput.value.trim() || !validateEmail(emailInput.value)) {
        isValid = false;
        errorMessage += 'Please enter a valid Email address\n'
    }

    // 校验 Address 字段
    if (!addressInput.value.trim()) {
        isValid = false;
        errorMessage += 'Please enter your Street address\n'
    }

    // 校验 Town 字段
    if (!townInput.value.trim()) {
        isValid = false;
        errorMessage += 'Please enter your Suburb/town\n'
    }

    // 校验 State 字段
    if (stateSelect.value === 'error') {
        isValid = false;
        errorMessage += 'Please select a State\n'
    }

    // 校验 Postcode 字段
    if (!postcodeInput.value.trim() || !validatePostcode(postcodeInput.value)) {
        isValid = false;
        errorMessage += 'Please enter a valid Postcode\n'
    } else {
        var firstWord = postcodeInput.value.trim().substring(0, 1)
        let index = parseInt(firstWord)
        switch (stateSelect.value) {
            case 'VIC':
                if (index !== 8 && index !== 3) {
                    isValid = false;
                    errorMessage += "The selected state must match the first digit of the postcode";
                }
                break
            case 'NSW':
                if (index !== 1 && index !== 2) {
                    isValid = false;
                    errorMessage += "The selected state must match the first digit of the postcode";
                }
                break
            case 'QLD':
                if (index !== 4 && index !== 9) {
                    isValid = false;
                    errorMessage += "The selected state must match the first digit of the postcode";
                }
                break
            case 'NT':
                if (index !== 0) {
                    isValid = false;
                    errorMessage += "The selected state must match the first digit of the postcode";
                }
                break
            case 'WA':
                if (index !== 6) {
                    isValid = false;
                    errorMessage += "The selected state must match the first digit of the postcode";
                }
                break
            case 'SA':
                if (index !== 5) {
                    isValid = false;
                    errorMessage += "The selected state must match the first digit of the postcode";
                }
                break;
            case 'TAS':
                if (index !== 7) {
                    isValid = false;
                    errorMessage += "The selected state must match the first digit of the postcode";
                }
                break;
            case 'ACT':
                if (index !== 0) {
                    isValid = false;
                    errorMessage += "The selected state must match the first digit of the postcode";
                }
                break
            default:
                break
        }
    }

    // 校验 Phone number 字段
    if (!phoneInput.value.trim() || !validatePhoneNumber(phoneInput.value)) {
        isValid = false;
        errorMessage += 'Please enter a valid Phone number\n'
    }

    // 校验联系方式字段
    var isContactSelected = false;
    for (var i = 0; i < contactInputs.length; i++) {
        if (contactInputs[i].checked) {
            isContactSelected = true;
            break;
        }
    }
    if (!isContactSelected) {
        isValid = false;
        errorMessage += 'Please select a preferred contact method\n'
    }

    // 校验 Product 字段
    if (productSelect.selectedIndex === 0) {
        isValid = false;
        errorMessage += 'Please select a Product\n'
    }

    // 校验 Quality 字段
    if (!qualityInput.value.trim()) {
        isValid = false;
        errorMessage += 'Please enter Quality\n'
    } else {
        var qualityNumber = parseInt(qualityInput.value.trim())
        if (isNaN(qualityNumber)) {
            isValid = false
            errorMessage += "Please enter a number into quality"
        } else {
            if (qualityNumber < 0) {
                isValid = false
                errorMessage += "Please enter a positive number in quality"
            }
        }
    }


    // 校验 Number of day 字段
    if (!dayInput.value.trim()) {
        isValid = false;
        errorMessage += 'Please enter Number of day\n'
    }

    // 校验 Product features 字段
    var isFeatureSelected = false;
    for (var j = 0; j < featureInputs.length; j++) {
        if (featureInputs[j].checked) {
            isFeatureSelected = true;
            break;
        }
    }
    if (!isFeatureSelected) {
        isValid = false;
        errorMessage += 'Please select at least one Product feature\n'
    }

    // 校验 Message 字段
    if (!messageInput.value.trim()) {
        isValid = false;
        errorMessage += 'Please enter your Message\n'
    }


    if (isValid == false) {
        alert(errorMessage)
    } else {
        storeData()
        form.submit();
    }
}

// 控制显示
function changeVisibility() {
    var visibility = document.getElementById("real-address").style.visibility;
    if (visibility === 'hidden') {
        document.getElementById("real-address").style.visibility = "visible";
        document.getElementById("hidden-input").disabled = false
    } else {
        document.getElementById("real-address").style.visibility = "hidden"
        document.getElementById("hidden-input").disabled = true
    }
}


document.addEventListener('DOMContentLoaded', function () {
    localStorage.clear();
    localStorage.setItem("products", JSON.stringify(initArr));
    getPrice();
    getProducts();
    getCost()
    // document.getElementById("different").onclick = changeVisibility;
    var from = document.getElementById("enquire-form");
    from.addEventListener("submit", validate)
});
