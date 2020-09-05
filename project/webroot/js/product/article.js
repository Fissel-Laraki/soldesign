
const BASE_URL = "/soldesign/project/";


let cart = $("#totalCart");

$("#total").html(parseInt($("#price").html()) * $("#quantity").val());  

function addCart(id){
    current = cart.html();
    quantity = $("#quantity").val();
    $.get(BASE_URL+"product/addCart/"+id+"/"+quantity,(data)=>{
        if(parseInt(current) < parseInt(data)){
            incrementCart();
        }
    });
}

function incrementCart()
{
    let newV = parseInt(cart.html()) +1 ;
    cart.html(" "+newV);
}

$("#quantity").on('change',()=>{
    if($("#quantity").val() < 0){
        $("#quantity").val(0);
    }
    $("#total").html(parseInt($("#price").html()) * $("#quantity").val());  
});