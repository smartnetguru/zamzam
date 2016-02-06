/**
 * Global setting for ajax
 * It will add csrf_token by itself for methods which needs _token
 * Created by smartrahat Date: 2016.01.15 Time: 07:35PM
 */
$.ajaxSetup({
    header:{
        'X-CSRF-TOKEN':$('meta[name="csrf_token"]').attr('content')
    }
});

/**
 * Display selected image on form before store or updating storage
 * Created by: smartrahat on 04.09.2015 3:18AM
 * @param input
 */
function readURL(input) {
    if (input.files && input.files[0]) {

        var reader = new FileReader();
        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result).width(150).height(150);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
