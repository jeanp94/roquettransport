// const { data } = require("jquery");

/* loading */
function loadbtn($btn) {
    $($btn).attr("disabled", "disabled");
    // $($btn).attr("oldtext", $($btn).html());
    // $($btn).empty();
    // $($btn).append("<div class='lds-ring'><div></div><div></div><div></div><div></div></div>");
}
function unloadbtn($btn) {
    // $($btn).empty();
    // $($btn).html($($btn).attr("oldtext"));
    $($btn).removeAttr("disabled");
}
/* fin loading */

var ishuman = false;

$(document).ready(function() {
    //CSRF en todas las ajax
    $.ajaxSetup({
        headers: {
            "X-CSRF-Token": $('meta[name="csrf-token"]').attr("content")
        }
    });

    $("#newsletter_form button").click(function() {
        var action = $("#newsletter_form").attr("action");
        var $thisForm = $("#newsletter_form");

        $thisForm.validate({
            rules: {
                email: {
                    required: true,
                    normalizer: function(value) {
                        return $.trim(value);
                    }
                }
            },
            errorClass: 'is-invalid',
            submitHandler: function(form) {
                var params = $thisForm.serialize()
                $.ajax({
                    url: action,
                    data: params,
                    method: 'post',
                    success: function(data){
                        if(data.rpta == "ok"){
                            $("#newsletter_form").hide()
                            $("#newsletter_form + div").fadeIn()
                        }
                        else{
                            toastr.error('UPS');
                        }
                    }
                })

                return false;
            }
        });
    });

    $(".toggle-mobile-menu").click(function(){
        $("#mobile-menu").toggleClass('active')
    })

    $('.send_lead').on('click', function (event) {
        var $form = $(this).parents('form')
        var action = $form.attr('action')
        var $btn = $(this)
        $form.validate({
            rules: {
                topic: "required",
                origin: {
                    required: true,
                    normalizer: function(value) {
                        return $.trim(value);
                    }
                },
                destination: {
                    required: true,
                    normalizer: function(value) {
                        return $.trim(value);
                    }
                },
                name: {
                    required: true,
                    normalizer: function(value) {
                        return $.trim(value);
                    }
                },
                lastname: {
                    required: true,
                    normalizer: function(value) {
                        return $.trim(value);
                    }
                },
                phone: {
                    required: true,
                    digits: true,
                    minlength: 6,
                    normalizer: function(value) {
                        return $.trim(value);
                    }
                },
                weight: {
                    required: true,
                    digits: true,
                    normalizer: function(value) {
                        return $.trim(value);
                    }
                },
                email: {
                    required: true,
                    email: true,
                },
                message: {
                    required: true,
                    normalizer: function(value) {
                        return $.trim(value);
                    }
                },
            },
            errorClass: 'is-invalid',
            submitHandler: function(form) {
                if(!ishuman){
                    toastr.error('¡No eres un humano!')
                    return false
                }
                var params = $form.serialize();
                loadbtn($btn);
                $.ajax({
                    type: 'POST',
                    url: action,
                    data: params,
                    dataType: 'json',
                    success: function(data) {
                        if(data.rpta == "ok"){
                            $form.hide();
                            $("#thanks").fadeIn();
                        }
                        else{
                            toastr.error(data.msg);
                        }
                        unloadbtn($btn);
                    },
                    error: function(data) {
                        var errors = data.responseJSON.errors;
                        jQuery.each(errors, function(i, val) {
                            toastr.error(val);
                        });
                        unloadbtn($btn);
                    }
                });

                return false;
            }
        });
    });
});

//toastr
toastr.options = {
    closeButton: false,
    debug: false,
    newestOnTop: true,
    progressBar: false,
    positionClass: "toast-top-right",
    preventDuplicates: true,
    onclick: null,
    showDuration: "300",
    hideDuration: "1000",
    timeOut: "5000",
    extendedTimeOut: "1000",
    showEasing: "swing",
    hideEasing: "linear",
    showMethod: "fadeIn",
    hideMethod: "fadeOut",
    tapToDismiss: true
};
