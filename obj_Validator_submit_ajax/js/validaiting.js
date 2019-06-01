let rules = {
    email: {
        min: 5,
        max: 30,
        match: 'email'//для значения атрибута type
    },
    login: {
        min: 2,
        max: 20,
        match: 'text'
    },
    password: {
        min: 2,
        max: 20,
        match: 'password'
    },
    textarea: {
        min: 5,
        max: 500,
        match: 'text'
    },
    age: {
        min: 1,
        max: 2,
        match: 'text'
    },
    gender: {
        min: 1,
        max: 6, //gender то что в name
        match: 'text'
    }
};
let messages = {
    min_value: 'минимальное количество символов',
    max_value: 'недопустимое количество символов',
    empty_field: 'вы не ввели данные',
    invalid_value: 'уберите недопустимые символы',
    unchecked_radio: 'выберите значение радиокнопки'
};
let form = document.forms.someForm;
//раскомментировать чтоб посмотреть submit() - не ajax
// form.addEventListener('submit', validation);
// function validation(event){
//     event.preventDefault();
//     let Validator = new Validator_form(form);
//     console.log(Validator);
//     Validator.doValidate(rules);
//     if(Validator._error === 0){
//         Validator.success();
//         this.submit();
//     }
// }

//А теперь отправка без перезагрузки ajax-запросом И ответ сервера
form.addEventListener('submit', ajaxHandler);
function ajaxHandler(event){
    event.preventDefault();
    let Validator = new Validator_form(form);
    console.log(Validator);
    Validator.doValidate(rules);
    if(Validator._error === 0){
        Validator.success();

        let form_data = new FormData(this);
        console.log(form_data);
        let xhr = new XMLHttpRequest();//объект запроса
        console.log(xhr);
        //запрос будет отправлен методом POST на обработчик формы
        //в данном случае "form_handler.php"
        xhr.open("POST", this.action, true);
        xhr.send(form_data);
        xhr.onload = function(event){
            //функция будет вызвана когда придет ответ от сервера
            if(xhr.status == 200){
                responseHandler(xhr.responseText);
            }
        }
    }

}
function message_success(){
    //выведем сообщение для пользователя
    let message_success = document.getElementById('message_success');
    let message = 'Вы зарегистрированы как ';
    let p = document.createElement('p');
    p.classList.add('message_success');
    p.innerText = message;
    message_success.appendChild(p);
}

function responseHandler(text){//text - который откуда???
    message_success();
    console.log('ответ сервера: ' + text);
}

