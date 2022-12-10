$( document ).ready(function() {
    $('#year').click(function (){
        $('.f-t-year').hide();
        $('.f-year').show();
    });

    $('#fromto').click(function (){
        $('.f-year').hide();
        $('.f-t-year').show();
    });

    $('#characterLeft').text('140 characters left');
    $('#message').keydown(function () {
        var max = 140;
        var len = $(this).val().length;
        if (len >= max) {
            $('#characterLeft').text('You have reached the limit');
            $('#characterLeft').addClass('red');
            $('#btnSubmit').addClass('disabled');
        }
        else {
            var ch = max - len;
            $('#characterLeft').text(ch + ' characters left');
            $('#btnSubmit').removeClass('disabled');
            $('#characterLeft').removeClass('red');
        }
    });

    $('#add-filter').click(function (e){
        e.preventDefault();
        $('.keyword').hide();
        $('.form-filter').show();
    });

    $('#remove-filter').click(function (e){
        e.preventDefault();
        $('.form-filter').hide();
        $('.keyword').show();

    });

    $('#emailClick').click(function (e){
        e.preventDefault();
        $('#emailmodal').modal('toggle')
    })
});
