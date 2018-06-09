$('#btn_in').click(function () {
    $('.add_more').append("<div class='col-md-12' style='margin-top: 14px;'><input type='number' name='contact[]' style='width: 88%;margin-left: 6px;float: left;' placeholder='Enter Contact Number' class='form-control'><button class='btn btn-danger btn_remove' onclick='remove(this)' type='button'>Remove</button></div>");
});

function remove(val) {
    $(".btn_remove").on('click',function(){
        $(this).parent().remove();
    })
}