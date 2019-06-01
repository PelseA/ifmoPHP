class Validator_form {
    constructor(form) {
        this._form = form;
        this._inputs = this._form.getElementsByClassName('validate');
        this._radio = this._form.getElementsByClassName('validate_radio');
        this._textarea = this._form.getElementsByTagName('textarea');
        this._error = 0;
    }

    doValidate(rules) { //rules - объект с ключами например 'login', 'password'...
        let values_input = [];
        let names_input = [];
        for (let i = 0; i < this._inputs.length; i++) {
            let value = this._inputs[i].value;
            let name = this._inputs[i].name;
            values_input.push(value);
            names_input.push(name);
        }
        //отдельно для радио-кнопок
        for (let i = 0; i < this._radio.length; i++) {
            if (this._radio[i].checked) {
                let value = this._radio[i].value;
                let name = this._radio[i].name;
                values_input.push(value);
                names_input.push(name);
            }
        }
        let name_value = new Object();
        for (let i = 0; i < values_input.length; i++) {
            name_value[names_input[i]] = values_input[i];//добавили значения в объект
        }
        console.log(name_value);
        for (let key in name_value) {
            let use_rules = rules[key];
            let min = use_rules['min'];
            let max = use_rules['max'];
            if (!name_value[key]) {
                console.log('Ошибка в ', key);
                this.unSuccess(messages, 'empty_field', key);//'empty_field' - это error; key - это field
                this._error = 1;
                break;
            }
            if (name_value[key].length < min) {
                console.log('Минимальное количество символов ');
                this.unSuccess(messages, 'min_value', key);
                this._error = 1;
                break;
            }
            if (name_value[key].length > max) {
                this.unSuccess(messages, 'max_value', key);
                this._error = 1;
                break;
            }
        }
        console.log("Ошибки: ", this._error);
        return this._error;
    };

    success() {
        //удаляем сообщения об ошибках
        let div_message = this._form.getElementsByClassName('message')[0];
        div_message.parentNode.removeChild(div_message);
        console.log('Успешная валидация');
        //отправляем submit() либо ajax
        //return true;
    }

    unSuccess(messages, error_type, field) {
        let div_message = this._form.getElementsByClassName('message')[0];
        let text = messages[error_type] + ' ' + 'в поле' + ' ' + field;
        let p = document.createElement('p');
        p.classList.add('message_error');
        p.innerText = text;
        div_message.appendChild(p);
        //return false;
    }
}



