$(document).ready(function(){

    // $('.register_form').submit(function(event){
    //     event.preventDefault();
    //     var first_name = $('#inputFirstName').val();
    //     var last_name = $('#inputLastName').val();
    //     var email = $('#inputEmail').val();
    //     var password = $('#inputPassword').val();

    //     $.post("",
    //     {   
    //         type: 'POST',
    //         first_name: first_name,
    //         last_name: last_name,
    //         email: email,
    //         password: password,
    //     });
    // });

    $(document).on('click', '.btn', function()
    {
        console.log('btn pressed')
        $(".inputPassword").attr("type", "password");
        $(".inputRPassword").attr("type", "password");
        $("i").removeClass("fa-eye");
        $("i").addClass("fa-eye-slash"); 
    });

    $('.btn-back').click(function(){
        var base_url = window.location.origin + '/' + window.location.pathname.split ('/') [1] + '/';
        location.replace(base_url);
    });

    $(".toggle-password").click(function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        let input = $("#inputPassword");
        input.attr("type", input.attr("type") === "password" ? "text" : "password");
      });
  
       $(".toggle-repeat-password").click(function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        let input = $("#inputRPassword");
        input.attr("type", input.attr("type") === "password" ? "text" : "password");
      });

});