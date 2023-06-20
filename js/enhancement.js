"use strict"


// enhancement 01
function changeStyle() {
    let title = document.title
// 创建链接数组
    var links = [
        {href: 'index.php', text: 'Home'},
        {href: 'products.html', text: 'Products'},
        {href: 'product.html', text: 'Product'},
        {href: 'enquire.html', text: 'Enquire'},
        {href: 'enhancement.html', text: 'Enhancement'},
        {href: 'enhancement2.html', text: 'Enhancement2'},
        {href: 'about.html', text: 'About Me'}
    ];
// 循环创建链接并添加到 <div> 中
    for (var i = 0; i < links.length; i++) {
        var link = links[i];
        var aElement = document.createElement('a');
        aElement.href = link.href;
        aElement.target = '_parent';
        var strongElement = document.createElement('strong');
        if (link.text === title) {
            strongElement.style = "color:red"
        }
        strongElement.textContent = link.text;
        aElement.appendChild(strongElement);
        document.getElementById("menu").appendChild(aElement);
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


function createProductElements() {
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

    if (document.title === "Product") {
        for (var i = 0; i < initArr.length; i++) {
            var divElement = document.createElement('div');

            divElement.className = 'pr-div-01 product-section';

            var h2Element = document.createElement('h2');
            h2Element.className = 'pr-second-h2';

            var h2Text = document.createTextNode(initArr[i].type);
            h2Element.appendChild(h2Text);

            var smallElement = document.createElement('small');
            smallElement.style.color = 'darkgray';
            smallElement.style.fontSize = '15px';

            var smallText = document.createTextNode(initArr[i].name);
            smallElement.appendChild(smallText);

            h2Element.appendChild(smallElement);

            divElement.appendChild(h2Element);

            var imageDiv = document.createElement('div');
            imageDiv.className = 'pr-image';

            var imgElement = document.createElement('img');
            imgElement.src = initArr[i].image;
            imgElement.alt = 'digit';

            imageDiv.appendChild(imgElement);

            divElement.appendChild(imageDiv);

            var asideElement = document.createElement('aside');
            asideElement.className = 'pr-details';

            var ulElement = document.createElement('ul');
            for (let j = 0; j < initArr[i].description.length; j++) {
                var liElement = document.createElement('li');
                var li1Text = document.createTextNode(initArr[i].description[j]);
                liElement.appendChild(li1Text);
                ulElement.appendChild(liElement);
            }
            var priceLi = document.createElement('li');
            var priceLiText = document.createTextNode("Price:$ " + initArr[i].price + " \tper day");
            priceLi.appendChild(priceLiText);
            ulElement.appendChild(priceLi);

            asideElement.appendChild(ulElement);
            var inputElement = document.createElement('input');
            inputElement.type = 'button';
            inputElement.id = "register"
            inputElement.value = 'Product Registration';
            inputElement.className = 'pr-button';
            asideElement.appendChild(inputElement);
            divElement.appendChild(asideElement);
            document.body.appendChild(divElement);
        }
    }

}


function timer() {
    var countdownElement = document.getElementById("countdown");
    if (countdownElement != null) {
        // 十分钟
        var timeLimit = 600000;
        var timerId = setTimeout(function () {
            alert("Time limit exceeded.");
            window.location.href = "index.php";
        }, timeLimit);

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

}


function enhancement3() {
    var htmlElement = document.getElementById("credit-name");
    var formData = localStorage.getItem("formData");
    if (htmlElement != null) {
        if (formData != null) {
            var formObj = JSON.parse(formData)
            htmlElement.value = formObj.firstNameInput +"\t"+ formObj.lastNameInput;
        }
    }
}

function changeLocation() {
    window.location.href = "enquire.html"
}

function init() {
    createProductElements()
    timer();
    changeStyle();
    if (document.getElementById("different") != null) {
        document.getElementById("different").onclick = changeVisibility;
    }
    enhancement3();
    var regitser = document.getElementById("register");
    if (regitser != null){
         document.getElementById("register").onclick = changeLocation
    }

}

window.onload = init
