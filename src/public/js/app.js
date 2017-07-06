
// Delete Parent categories with all sub-categories
$(document).on('click', '.delete-btn', function(e) {
    e.preventDefault();
    var self = $(this);
    swal({
            title: "Удалить?",
            text: "Вы уверены, что хотите удалить категорию?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Удалить",
            cancelButtonText:"Отмена",
            closeOnConfirm: true
        },
        function(isConfirm){
            if(isConfirm){
                swal("Удалено","Категория удалена", "success");
                setTimeout(function() {
                    self.parents(".delete_form").submit();
                }, 1000);
            }
            else{
                swal("Отменено","Категория осталась", "error");
            }
        });
});


// Delete sub categories
$(document).on('click', '.delete-btn-sub', function(e) {
    e.preventDefault();
    var self = $(this);
    swal({
            title: "Удалить?",
            text: "Вы уверены, что хотите удалить подкатегорию?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Удалить",
            cancelButtonText:"Отмена",
            closeOnConfirm: true
        },
        function(isConfirm){
            if(isConfirm){
                swal("Удалено","Подкатегоия удалена", "success");
                setTimeout(function() {
                    self.parents(".delete_form_sub").submit();
                }, 1000);
            }
            else{
                swal("Отменено","Категория осталась", "error");
            }
        });
});

// Delete Brands
$(document).on('click', '#delete-btn-brand', function(e) {
    e.preventDefault();
    var self = $(this);
    swal({
            title: "Удалить?",
            text: "Вы уверены, что хотите удалить бренд?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Удалить",
            cancelButtonText:"Отмена",
            closeOnConfirm: true
        },
        function(isConfirm){
            if(isConfirm){
                swal("Удалено","Бренд удален", "success");
                setTimeout(function() {
                    self.parents(".delete_form_brand").submit();
                }, 1000);
            }
            else{
                swal("Отменено","Бренд остался", "error");
            }
        });
});

// Delete Products
$(document).on('click', '#delete-product-btn', function(e) {
    e.preventDefault();
    var self = $(this);
    swal({
            title: "Удалить",
            text: "Вы уверены, что хотите удалить товар?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Удалить",
            cancelButtonText:"Отмена",
            closeOnConfirm: true
        },
        function(isConfirm){
            if(isConfirm){
                swal("Удалено","Товар удален", "success");
                setTimeout(function() {
                    self.parents(".delete_form_product").submit();
                }, 1000);
            }
            else{
                swal("Отменено","Товар остался", "error");
            }
        });
});



// Delete Users
$(document).on('click', '#delete-user-btn', function(e) {
    e.preventDefault();
    var self = $(this);
    swal({
            title: "Удалить?",
            text: "Вы уверены, что хотите удалить пользователя",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Удалить",
            cancelButtonText:"Отмена",
            closeOnConfirm: true
        },
        function(isConfirm){
            if(isConfirm){
                swal("Deleted!","User deleted", "success");
                setTimeout(function() {
                    self.parents(".delete_form_user").submit();
                }, 1000);
            }
            else{
                swal("Отменено","Пользователь остался", "error");
            }
        });
});


// This is for the sub-categories drop-down.
// This will fire off when a user chooses the parent category in the
// add product page
$(document).ready(function($){
    $('#product_sku').text(GetRandom);
    $('#reduced_price').blur(validate_reduced_price);
    $('#price').blur(validate_price);
    $('#reduced_price').change(submit);
    $('#price').change(submit);

    function submit() {
        if(validate_price_return() && validate_reduced_price_return() && price_return())
            $('#submit').removeAttr('disabled');
        else $('#submit').attr('disabled', 'disabled');
    }
    function validate_price() {
        if($('#price').val() < 0){
            $('#error_price').text('Цена не может быть отрицательной')

        }
        else if($('#price').val().length > 9 ){
            $('#error_price').text('Слишком высокая цена')
        }
        else if(isNaN($('#price').val())){
            $('#error_price').text('Необходимо ввести число')
        }
        else {
            price();
            $('#error_price').text('')
        }
    }

    function validate_reduced_price() {
        if($('#reduced_price').val() < 0){
            $('#error_price').text('Цена не может быть отрицательной');
        }
        else if($('#reduced_price').val().length > 9 ){
            $('#error_reduced_price').text('Слишком высокая цена');
        }
        else if(isNaN($('#reduced_price').val())){
            $('#error_reduced_price').text('Необходимо ввести чило');
        }
        else{
            $('#error_reduced_price').text('')
            price();
        }
    }
    function price() {

        if( $('#reduced_price').val() > $('#price').val() && $('#reduced_price').val()!=null) {
            $('#error_reduced_price').text('Цена по скидке больше цены!');
        }
        else{
            $('#error_reduced_price').text('');
        }
    }

    function validate_price_return() {
        if($('#price').val() < 0){
            return false;
        }
        else if($('#price').val().length > 9 ){
            return false;
        }
        else if(isNaN($('#price').val())){
            return false;
        }
        else {
            price();
            return true;
        }
    }

    function validate_reduced_price_return() {
        if($('#reduced_price').val() < 0){
            return false;
        }
        else if($('#reduced_price').val().length > 9 ){
            return false;
        }
        else if(isNaN($('#reduced_price').val())){
            return false;
        }
        else{
            price();
            return true;
        }
    }
    function price_return() {

        if( $('#reduced_price').val() >= $('#price').val()) {
            return false;
        }
        else{
            return true;

        }

    }

    $('#category').change(function(){
        $.get($(this).data('url'), {
                option: $(this).val()
            },
            function(data) {
                var subcat = $('#sub_category');
                subcat.empty();
                $.each(data, function(index, element) {
                    subcat.append("<option value='"+ element.id +"'>" + element.category + "</option>");
                });
            });
    });
});


// Generate a random SKU for a product
function GetRandom() {
    var myElement = document.getElementById("product_sku");
    myElement.value = Math.floor(100000000 + Math.random() * 900000000);
}



<!-- Menu Toggle Script -->
$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});


