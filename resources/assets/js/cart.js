$(document).ready(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.updateCart').click(function(e){
        e.preventDefault();
        var divChangeAmount = $(this).parent();
        var productId = divChangeAmount.data('productId');
        var price = divChangeAmount.data('price');
        var quantity = $('#quantity' + productId).val();
        var routeResult = $('.hide').data('routeResult');

        $.ajax({
            type: 'POST',
            url: routeResult + '/' + productId,
            dataType: 'JSON',
            data: {
                '_method': 'PUT',
                'quantity': quantity,
                'product_id': productId,
            },
            success: function(data){
                if (data.success) {
                    $('#result').removeClass().addClass('alert alert-success').html(data.message);
                    $('#quantity' + productId).val(quantity);
                    var newSubTotal = (price * quantity).toFixed(2);
                    $('#sub-total' + productId).html(newSubTotal);
                    $('#total-cost').html(data.total_cost);
                } else {
                    $('#result').removeClass().addClass('alert alert-danger').html(data.message);
                }
            }
        });
    });

    $('.removeCart').click(function(e){
        e.preventDefault();
        var confirmRemove = $('.hide').data('confirmRemove');

        if (confirm(confirmRemove)) {
            var divChangeAmount = $(this).parent();
            var productId = divChangeAmount.data('productId');
            var routeResult = $('.hide').data('routeResult');

            $.ajax({
                type: 'POST',
                url: routeResult + '/' + productId,
                dataType: 'JSON',
                data: {
                    '_method': 'DELETE',
                    'product_id': productId,
                },
                success: function(data){
                    if (data.isEmptyCart) {
                        $(location).attr('href', routeResult);
                    } else {
                        if (data.success) {
                            $('#result').removeClass().addClass('alert alert-success').html(data.message);
                            $('#total-cost').html(data.total_cost);
                            $('#row' + productId).hide();
                        } else {
                            $('#result').removeClass().addClass('alert alert-danger').html(data.message);
                        }
                    }

                    var currentItems = $('#items').html();
                    $('#items').html(parseInt(currentItems) - 1);
                }
            });
        }
    });
});
