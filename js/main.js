

$( document ).ready(function() {
    
    $(".menu-icon").on( "click", function() {
        $(".side_nav").addClass("active");
        $(".menu-icon").css("display", "none");
        $(".close-icon").addClass("close-icon-active");
        
        });

        $(".close-icon").on( "click", function() {
            $(".side_nav").removeClass("active");
            $(".close-icon").removeClass("close-icon-active");
            $(".menu-icon").css("display", "block");
            });

    
});