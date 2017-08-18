$(document).ready(function() {
    //BUAT CUSTOM VALIDASI (MUNCUL PESAN ERROR DIBAWAH FIELD)
    window.validate_field = function(object) {
        var hasLength = object.attr('data-length') !== undefined;
        var lenAttr = parseInt(object.attr('data-length'));
        var len = object.val().length;

        if ($('.login').hasClass('invalid')) {
            $('.prefix').css("color", "#F44336");
        } else if ($('.login').hasClass('valid')) {
            $('.prefix').css("color", "green");
        }

        if (object.val().length === 0 && object[0].validity.badInput === false && !object.is(':required')) {
            if (object.hasClass('validate')) {
                object.removeClass('valid');
                object.removeClass('invalid');
            }
        } else {
            if (object.hasClass('validate')) {
                // Check for character counter attributes
                if ((object.is(':valid') && hasLength && (len <= lenAttr)) || (object.is(':valid') && !hasLength)) {
                    object.removeClass('invalid');
                    object.addClass('valid');
                } else {
                    object.removeClass('valid');
                    object.addClass('invalid');
                }
            }
        }
    };
});

$.validator.setDefaults({
    ignore: []
});

//PESAN ERROR CUSTOM
$("#formValidate").validate({
    /*rules: {
      username: {
        required: true,
        minlength: 12
      }
    },*/
    messages: {
        pin: {
            //required: "Enter a username.",
            min: "Enter a 4 number pin.",
            max: "Enter a 4 number pin."
        },
        rt: {
            required: "Kosong!"
        },
        rw: {
            required: "Kosong!"
        },
        no_un_0: {
            required: "Kosong!"
        },
        no_un_1: {
            required: "Kosong!"
        },
        no_un_2: {
            required: "Kosong!"
        },
        no_un_3: {
            required: "Kosong!"
        },
        no_un_4: {
            required: "Kosong!"
        },
        no_un_5: {
            required: "Kosong!"
        },
        no_un_6: {
            required: "Kosong!"
        },
        skhu: {
            required: "Kosong!"
        },
        select_ijazah: {
            required: "Pilih terlebih dahulu!"
        },
        select_kps: {
            required: "Pilih terlebih dahulu!"
        },
        select_orgtua: {
            required: "Pilih terlebih dahulu!"
        }
    },
    errorElement: 'div',
    errorPlacement: function(error, element) {
        var placement = $(element).data('error');
        if (placement) {
            $(placement).append(error)
        } else {
            error.insertAfter(element);
        }
    }
});