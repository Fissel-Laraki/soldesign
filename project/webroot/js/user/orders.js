const BASE_URL = "/soldesign/project/";
const screenWidth = window.screen.width;
function details(oid,j){
    let url  = BASE_URL+"user/orderDetail/"+oid;
    let text = "";
    $.get(url,function(data,status){
        data = JSON.parse(data);
        console.log(data);
        table = $("#details");
        table.html("");
        
        $("#tableContainer").removeClass("d-none");
        let i = 0;
        data.forEach(element => {
            i=0;
            element.img_url = "<img src='"+BASE_URL+"webroot/img/"+element.img_url+"'>";
            element.format = element.format + " cm";
            element.price = element.price + " €";
            text = text + "<tr>";
            for(item in element){
                text= text + "<td>";
                text = text + element[item];
                text = text + "</td>";
                i++;
            }
            text = text + "</tr>";
        });
        
        $("#caption").html("Détails de la commande numéro "+j);
        table.html(text);
    });
}

$(window).scroll(function(event){
    $("#tableContainer").css('margin-top',$(this).scrollTop());
});

$("tr.classTr").click(function(event){
    $('tr.table-success').removeClass("table-success");
    parent = event.target.parentNode;
    oid = parent.dataset.oid;
    i = parent.dataset.i;
    if (screenWidth < 400 ){
        $("#orders").addClass("d-none");
    }
    details(oid,i);
    parent.classList.add("table-success");
    
});

function toggler(){
    $("#orders").removeClass("d-none");
    $("#tableContainer").addClass("d-none");
}