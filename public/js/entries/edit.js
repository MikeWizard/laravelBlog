$(document).ready(function() {
    $("#save").click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'method':$('input[name="_method"]').val()

            },
            data: /*{ 
                entry: {
                    'title':$('input[name="title"]').val(),
                    'content':$('input[name="content"]').val(),
                    'method':$('input[name="_method"]').val()

                }};*/
            $('#entryForm').serialize() ,
            url:  $(this).attr('href'),
            method: "POST",
            dataType: 'json',
            cache: false,
            success: function (data) {
       
                $('#productForm').trigger("reset");
                // $('#ajaxModel').modal('hide');
                // table.draw();
                alert(data.msg);
                $('#save').html('Save');
           
            },
            error: function (data) {
                console.log('Error:', data);
                $('#save').html('Save');
            }

        });
    });
});