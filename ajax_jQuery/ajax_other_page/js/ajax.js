$(document).ready(function(){
    $(".my_button").bind('click', function(){
        let product = $('.product').val();
        let quantity = $('.quantity').val();

        $('.product').val('');
        $('.quantity').val('');

        $.ajax({
            url: 'php/handle_form.php',
            type: 'POST',
            data: {
                product: product,
                quantity: quantity
            },
            dataType: 'json',
            success: function(result){
                if(result){
                    $('.choice').append(function(){
                        let res = '';
                        res = '<tr><td>' + ' Вы заказали товар: ' + result.order.product + '</td><td>' +
                            ' Количество: ' + result.order.quantity[0] + ' шт. ' + '</td></tr>';
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