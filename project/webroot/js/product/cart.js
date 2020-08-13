const BASE_URL = "/soldesign/project/";

let cart = $("#totalCart");

function incrementCart()
{
    let current = parseInt(cart.html());
    cart.html(current+1);
}

function decrementCart()
{
    let current = parseInt(cart.html());
    cart.html(current-1);
}

function emptyCart(){
    cart.html(0);
}

function changeMinus(productId,productPrice){
    let element = $("#item"+productId);
    let total = $("#total");
    let currentQuantity =  parseInt(element.html());
    if (currentQuantity > 0){

        let newQuantity = currentQuantity-1;
        element.html(newQuantity);
        total.html(parseFloat(total.html())-productPrice);
        decrementCart();
        let url = BASE_URL+"product/updateCart?id="+productId+"&quantity="+newQuantity;
        $.get(url,function(){})
    }

}

function changePlus(productId,productPrice){
    let element = $("#item"+productId);
    let total = $("#total");
    let currentQuantity =  parseInt(element.html());
    let newQuantity = currentQuantity+1;
    element.html(newQuantity);
    total.html(parseFloat(total.html())+productPrice);
    incrementCart();
    let url = BASE_URL+"product/updateCart?id="+productId+"&quantity="+newQuantity;
    $.get(url,function(){})

}

$("#emptyCartBtn").click(function(){
    let url = BASE_URL+"product/destroyCart/";
    $.get(url);
    $("#tbody").empty();
    emptyCart();
})

