$(document).ready(function () {
  //ajax delete
    $(document).on('click', '.del', function () {
        inputData = $('#formDelete').serialize();
        route = $(this).data('href');
        swal(
            {
                title: "Are you sure?",
                text: "You will not be able to recover this imaginary file!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel plx!",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function (isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: route,
                        type: 'POST',
                        data: inputData,
                        success: function ( msg ) {
                            if ( msg.status === 'success' ) {
                                window.location.reload();
                            }
                        }
                    });
                } else {
                    swal("Cancelled", "Your imaginary file is safe :)", "error");
                }
            }
        );
    });
//search 
    $(document).on('keyup', '#search', function () {
        target = $(this).data('target');
        if ($(this).val().length>0) {
            $.ajax({
                type : "GET",
                url : $(this).data('href'),
                async : true,
                data : {'search':$(this).val()} ,
                success : function (data) {
                    JSON.stringify(data);
                    var result = "";
                    for (var i = 0; i < data.results.length; i++) {
                        target=target+data.results[i].id;
                        console.log(target);
                        result += "<li><a href='"+target+"'>"+data.results[i].name+"</a></li>";
                    }
                    $('.search_result').html(result);
                }
            });
        } else {
            $('.search_result').html('');
        }
    });

    //calculate book's tour
    $(document).on('change', '.adult', function () {
        quantity = $(this).val();
        id = $(this).data('id');
        $.ajax({
            type : "GET",
            url : '/calculate',
            async : true,
            data : {'quantity': quantity, 'id': id} ,
            success : function (data) {
                $('.payment_surcharge').html(data.paymentSurcharge);
                $('.total_amount').html(data.totalAmount);
                $('.amount').val(data.totalAmount);
            },
        });
    });

    //payment method
    $('#payment').hide();
    $(document).on('click', '.method', function () {
        if ($(this).val() == 1) {
            $("#payment").show();
        } else {
            $("#payment").hide();
        }
    });
});
