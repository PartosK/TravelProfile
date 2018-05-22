$(document).ready(function () {


    $('input[name="email"]:radio').change(function () {
      var id =  $(this).val();

        $.ajaxSetup({
            headers :{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: "/mainEmail",
            dataType: 'text',
            data: {
                "id"  : id,
            },
            cache: false,
            success: function (data) {

                if (data != false) {
                    alert('Выбран основной Email')
                }
                else {
                    alert('Ошибка');
                }
            }
        });

    });

});