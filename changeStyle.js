function init(){
    let title = document.title
// 创建链接数组
    var links = [
        { href: 'index.php', text: 'Home' },
        { href: 'products.html', text: 'Products' },
        { href: 'enquire.html', text: 'Enquire' },
        { href: 'enhancement.html', text: 'Enhancement' },
        { href: 'enhancement2.html', text: 'Enhancement2' },
        { href: 'about.html', text: 'About Me' }
    ];
// 循环创建链接并添加到 <div> 中
    for (var i = 0; i < links.length; i++) {
        var link = links[i];
        var aElement = document.createElement('a');
        aElement.href = link.href;
        aElement.target = '_parent';
        var strongElement = document.createElement('strong');
        if (link.text === title){
            strongElement.style = "color:red"
        }
        strongElement.textContent = link.text;
        aElement.appendChild(strongElement);


        document.getElementById("menu").appendChild(aElement);
    }

}

window.onload = init
