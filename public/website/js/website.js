$(document).ready(function(){
    $("#menu-open").click(function(){
        $(".mobile-links").css("margin-left", "0"); 
        $(".mobile-links i").css("position", "fixed"); 
    });

    $(".mobile-links i").click(function(){
        $(".mobile-links").css("margin-left", "-110%"); 
        $(".mobile-links i").css("position", "relative"); 
    });
    $(".mobile-links a").click(function(){
        $(".mobile-links").css("margin-left", "-110%"); 
        $(".mobile-links i").css("position", "relative"); 
    })
 });