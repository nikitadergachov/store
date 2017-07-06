/**
 * Created by nikit on 30.11.2016.
 */
console.log('gfdgd');
$(document).ready(function(){
    window.alert('fsgdf');
    console.log('gfdgd');

    $("#payment-form").validate({

        rules:{

            name:{
                required: true,
                minlength: 4,
                maxlength: 16,
            },


        },

        messages:{

            name:{
                required: "Это поле обязательно для заполнения",
                minlength: "Логин должен быть минимум 4 символа",
                maxlength: "Максимальное число символо - 16",
            },



        }

    });

});