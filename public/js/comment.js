$(document).ready(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.addComment').click(function(e){
        e.preventDefault();
        divChangeAmount = $(this).parent();
        var productId = divChangeAmount.data('productId');
        var route = $('.hide').data('route');
        var content = $('#content' + productId).val();
        var rate = $('input[name="rate"]:checked', '#formComment').val();

        if (typeof rate !== 'undefined') {
            $('#list-rating').remove();
        }

        $.ajax({
            type: 'POST',
            url: route,
            dataType: 'JSON',
            data: {
                'product_id': productId,
                'rate' : rate,
                'content': content,
            },
            success: function(data){
                if (data.success) {
                    var html = "<div class='col-md-12'> <div class='col-md-1'>" + '<img src=' + data.avatarPath +
                        " class='img-comment'>" + '</div>' + "<div class='col-md-11'>" + '<strong>' + data.user +
                        '</strong>' + ' ' + data.created_at + '<br>' + data.content + '</div><br><br><br></div>';
                    $('#comments').append(html);
                    $('#content' + productId).val('');
                    $('#rate-average').html(data.rate_average);
                    $('#rate-count').html(data.rate_count);
                } else {
                    $('#result').removeClass().addClass('alert alert-danger').html(data.message);
                }
            }
        });
    });
});
