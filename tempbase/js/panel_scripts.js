/**
 * Created by Personal on 14/12/2017.
 */
$('#estado').change(function(){

    var estado = $(this).val();

    $.ajax({
        type: "POST",
        url: ajaxurl,
        dataType: 'json',
        async: true,
        data: {'action':'get_cities',state: estado},
        success: function(data){
            $('#ciudad').html("");

            for(var i = 0; i < data.length; i++){
                $('#ciudad').append(
                    '<option value="'+ data[i].value +'">'+ data[i].name +'</option>'
                );
            }
        },
        error: function(msg,data){
            $('#ciudad').html(
                '<option value="0">No hay ciudades</option>'
            );
            console.log(data);
            console.log(msg.statusText);
        },
        complete: function(data){
            $("#indeterminate-most").hide();
        }
    });
});

var $uploadCrop;

function readFile(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.upload-demo').addClass('ready');
            $uploadCrop.croppie('bind', {
                url: e.target.result
            }).then(function(){
                console.log('jQuery bind complete');
            });

        }

        reader.readAsDataURL(input.files[0]);
    }
    else {
        swal("Sorry - you're browser doesn't support the FileReader API");
    }
}

$uploadCrop = $('#upload-demo').croppie({
    enableExif: true,
    viewport: {
        width: 600,
        height: 600,
    },
    boundary: {
        width: 650,
        height: 650
    }
});
/*
$('#file').on('change', function () {
    readFile(this);
    $('#cut_image').modal('open',
        {dismissible: false
        });
});
$('.upload-result').on('click', function (ev) {
    $uploadCrop.croppie('result', {
        type: 'canvas',
        size: 'viewport'
    }).then(function (resp) {
        popupResult({
            src: resp
        });
    });
});*/