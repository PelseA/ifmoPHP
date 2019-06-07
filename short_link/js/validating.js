console.log("Подключен validating.js");
//очистить поле ввода
let clear_btn = document.getElementById("clearing");
clear_btn.addEventListener('click', clearing);
function clearing(){
    let link = document.getElementById("link");
    link.value = '';
}

let form = document.forms.form_link;
//Отправка без перезагрузки ajax-запросом И ответ сервера
form.addEventListener('submit', ajaxHandler);
function ajaxHandler(event) {
    event.preventDefault();

    let form_data = new FormData(this);
    console.log(form_data);
    let xhr = new XMLHttpRequest();//объект запроса
    console.log(xhr);
    //запрос будет отправлен методом POST на обработчик формы formHandler.php
    xhr.open("POST", this.action, true);
    xhr.send(form_data);
    xhr.onload = function (event) {
        //функция будет вызвана когда придет ответ от сервера
        if (xhr.status == 200) {
            responseHandler(xhr.responseText);
        }
    }
}
function message_success(text){
    console.log(text);
    //выведем сообщение для пользователя
    let message_success = document.getElementById('message_success');
    let message = 'Ваша ссылка '+ text;
    let p = document.createElement('p');
    p.classList.add('message_success');
    p.innerText = message;
    message_success.appendChild(p);
}

function responseHandler(text){//text - который откуда??? из echo formHandler.php?
    message_success(text);
    console.log('ответ сервера: ' + text);
}

