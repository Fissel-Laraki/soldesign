const BASE_URL = "/soldesign/project/";



let addCartBtn = $(".addCartBtn");
let cart = $("#totalCart");

function addCart(id){
    $.get(BASE_URL+"product/addCart/"+id);
    incrementCart();
}

function incrementCart()
{
    let current = parseInt(cart.html());
    cart.html(current+1);
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

    let products = [];
    $(".product").each(function(){
        if ( s.includes($(this).data('filterSerie')) && c.includes($(this).data('filterCategory')) ){
            $(this).show("fast");
        }else if( s.includes($(this).data('filterSerie')) && c.length == 0){
            $(this).show("fast");
        }else if( c.includes($(this).data('filterCategory')) && s.length==0){
            $(this).show("fast");
        }
    })
})