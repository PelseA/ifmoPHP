console.log("Подключен");

//SyntaxError: redeclaration of let form   //вопрос: где  и что это?
let form = document.getElementsByTagName('form')[0];
let input = form.getElementsByClassName('validate');//массив
form.addEventListener('submit', validating);
function validating(){
    event.preventDefault();
    for(let i = 0; i < input.length; i++){
        if(!input[i].value){
            let message_error = document.getElementById("message_error");
            let text = "Введите дату и время";
            message_error.innerText = text;
            return;
        }
        this.submit();
    }
    return true;
}