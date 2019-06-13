let form = document.getElementsByTagName('form')[0];
form.addEventListener('submit', validating);
function validating(event) {
    event.preventDefault();
    let input = document.getElementsByClassName("validating")[0];
    if(!(input.value)){
        let p = document.getElementById("error");
        let text = 'Выберите файлы';
        p.innerText = text;
        return;
    }
    this.submit();

}