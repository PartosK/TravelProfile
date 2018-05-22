$(document).ready(function () {


    $('#editFio').click(function () {
        var fio =  $('#fio').val();

        $.ajaxSetup({
            headers :{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: "/editFio",
            dataType: 'text',
            data: {
                "fio"  : fio,
            },
            cache: false,
            success: function (data) {

                if (data != false) {
                    alert('Сохранено')
                }
                else {
                    alert('Ошибка');
                }
            }
        });

    });

});