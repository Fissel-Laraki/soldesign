
const BASE_URL = "/soldesign/project/";


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