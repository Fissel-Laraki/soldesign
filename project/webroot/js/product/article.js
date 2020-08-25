
const BASE_URL = "/soldesign/project/";


let cart = $("#totalCart");

function addCart(id){
    current = cart.html();
    $.get(BASE_URL+"product/addCart/"+id,(data)=>{
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