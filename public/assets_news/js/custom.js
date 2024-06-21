console.log("working");
$(document).ready(function () {

    $("#mobile_side_icon").click(function(){ 
       
        $(".side_nav_bar").show();
     }); 
     
     $("#close").click(function(){ 
        console.log("click");
        $(".side_nav_bar").hide();
     });
});