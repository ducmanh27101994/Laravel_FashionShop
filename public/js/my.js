$(document).ready(function () {
    let origin = location.origin
    $('.add-to-cart').click(function () {
        let id = $(this).attr('data-id');
        console.log(id);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: origin + '/shop-cart/' + id,
            method: 'GET',
            success: function () {
                alertify.success('Success! Add To Cart');

            }
        })

    })



    function deleteCart(id){
        $.ajax({
            url: origin + '/shop-cart/delete/' + id,
            method: 'GET',
            success: function (){
                $('.delete-' + id).remove();
                alertify.success('Remove Product!');
            }
        })
    }

    $('.delete-cart').click(function (result){
        console.log(result)
        let id = $(this).attr('data-id');
        deleteCart(id)

    })



    $('.update-product-cart').change(function () {
        let qtyNew = $(this).val();
        let id = $(this).attr('data-id');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url : origin + '/shop-cart/update/' + id,
            method: 'POST',
            data: {
                qty: qtyNew
            },
            dataType: 'json',
            success: function (result) {
                let data = result.productUpdate;

                $('#product-subtotal-' + id).html('$ ' + data.totalPrice + '.0')
                $('.total-price-cart').html('$ ' + result.totalPriceCart + '.0')

            }
        })



    })
})
