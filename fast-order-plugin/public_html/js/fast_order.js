console.log('try connect');
let add_field = document.getElementById('add_field');
add_field.addEventListener('click', addField);

let clear_fields = document.getElementById('clear_fields');
clear_fields.addEventListener('click', clearFields);

// let submit = document.getElementById('do_validate');
// submit.addEventListener('click', doValidate);

function addField(){
    console.log('add field');
    let th_article = document.getElementById('th_article');
    let th_quontity = document.getElementById('th_quontity');

    let article_input = document.createElement('input');
    let quontity_input = document.createElement('input');

    let p_article = document.createElement('p');
    let p_quontity = document.createElement('p');

    article_input.setAttribute('type', 'text');
    quontity_input.setAttribute('type', 'text');

    article_input.setAttribute('required','');
    quontity_input.setAttribute('required','');

    article_input.setAttribute('name','article_number[]');
    quontity_input.setAttribute('name','quontity[]');

    article_input.setAttribute('id', 'article');
    quontity_input.setAttribute('id', 'quontity');

    p_article.appendChild(article_input);
    p_quontity.appendChild(quontity_input);

    th_article.appendChild(p_article);
    th_quontity.appendChild(p_quontity);
}

function clearFields(){
    let inputs = document.getElementsByTagName('input');
    for(let i=0; i<inputs.length; i++){
        if(inputs[i].getAttribute('id')=='article' || inputs[i].getAttribute('id')=='quontity'){
            inputs[i].value = "";
        }
    }
}

// function doValidate(event){
//     event.preventDefault();
//     let inputs = document.getElementsByTagName('input');
//     for(let i=0; i<inputs.length; i++){
//         if(inputs[i].getAttribute('id')=='article' || inputs[i].getAttribute('id')=='quontity'){
//             if (inputs[i].value == ""){
//                 let warning_message = document.getElementById('warning_message');
//                 warning_message.innerText = 'All fields must be filled in.';
//             }
//         }
//         //забыла, как разрешить отправку
//     }
//
// }