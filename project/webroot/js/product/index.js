const BASE_URL = "/soldesign/project/";



let addCartBtn = $(".addCartBtn");
let cart = $("#totalCart");
let filter= $("#filter");
let products =$("#products")

$(".product").removeClass('d-none');
/*
$(".product").hide();
$(".product").show(1000);
*/


function addCart(id){
    $.get(BASE_URL+"product/addCart/"+id,(data)=>{
        if(data){
            console.log(data);
            changeCart(parseInt(data));
        }
    });
}

function changeCart(i)
{
    let current = parseInt(cart.html());
    if (i != current){
        cart.html(i+1);
    }
}

$("#filter").change(function(){

    $("#form").submit();
    let categoriesChecked = $(".categoryCheck:checked").get();
    let seriesChecked = $(".serieCheck:checked").get();
    let c =[];
    let s =[];

    
    categoriesChecked.forEach(function(item){
        c.push(parseInt(item.dataset.filtercategory));
    });
    seriesChecked.forEach(function(item){
        s.push(parseInt(item.dataset.filterserie));
    });

    if(c.length == 0 && s.length == 0 ){
        $('.product').show();
    }else{
        $(".product").hide();
    }

    
    $(".product").each(function(){
        if ( s.includes($(this).data('filterSerie')) && c.includes($(this).data('filterCategory')) ){
            $(this).show("fast");
        }else if( s.includes($(this).data('filterSerie')) && c.length == 0){
            $(this).show("fast");
        }else if( c.includes($(this).data('filterCategory')) && s.length==0){
            $(this).show("fast");
        }
    })
});

$("#inputMin").on("input",function(){
    let value = $(this).val();
    $("#priceMin").html(value);
});

$("#inputMax").on("input",function(){
    let value = $(this).val();
    $("#priceMax").html(value);
});

function toggler(){
    if(filter.hasClass("d-none")){
        filter.removeClass("d-none");
        products.addClass("d-none");
    }else{
        filter.addClass("d-none");
        products.removeClass("d-none");
    }
}

$("#search-btn").on('click',()=>{
    $("#search").val($("#fsearch").val()) ;
})