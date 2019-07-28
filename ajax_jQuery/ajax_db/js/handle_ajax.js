
$(document).ready(function(){
    $(".my_button").bind('click', function(){
        let name = $('.field_name').val();
        let surname = $('.field_surname').val();
        let age = $('.field_age').val();

        $('.field_name').val('');
        $('.field_surname').val('');
        $('.field_age').val('');
        $.ajax({
            url: 'handle_form.php',
            type: 'POST',
            data: {
                name:name,
                surname: surname,
                age: age
            },
            dataType: 'json',
            success: function(result){
                if(result){
                    $('.rows').append(function(){
                        let res = '';
                        for(let i=0; i<result.users.name.length; i++){
                            res += '<tr><td>' + result.users.id[i] + '</td><td>' + result.users.name[i] +
                                '</td><td>' + result.users.surname[i] + '</td><td>' + result.users.age[i] + '</td></tr>';
                        }
                        return res;
                    });
                    console.log(result);
                }else{
                    alert(result.message);
                } return false;
            }
        });
        return false;
    });
});