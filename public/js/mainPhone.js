$(document).ready(function () {


    $('input[name="phone"]:radio').change(function () {
      var id =  $(this).val();

        $.ajaxSetup({
            headers :{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: "/mainPhone",
            dataType: 'text',
            data: {
                "id"  : id,
            },
            cache: false,
            success: function (data) {

                if (data != false) {
                    alert('Выбран основной Phone')
                }
                else {
                    alert('Ошибка');
                }
            }
        });

    });

});