jQuery(document).ready(function($){
    $("#profile-page h2").click(function() {
        var table = $(this).next("table.form-table");
        table.slideToggle();
    });
})