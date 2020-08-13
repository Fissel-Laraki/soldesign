
let imgSize = $(".categoryContainer").width();

$(".categoryContainer").mouseover(function(){
        $(this).animate({marginLeft:10,marginRight:10},50);
});

$(".categoryContainer").mouseout(function(){
        let current = $(this);
        window.setTimeout(function(){
            current.animate({marginLeft:0,marginRight:0},0);
        },50);
})