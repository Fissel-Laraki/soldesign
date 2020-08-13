const BASE_URL = "/soldesign/project/";
function details(oid,i){
    let url  = BASE_URL+"user/orderDetail/"+oid;
    let text = "";
    $.get(url,function(data,status){
        data = JSON.parse(data);
        table = $("#details");
        table.html("");
        
        $("#tableContainer").removeClass("d-none");
        let i = 0;
        data.forEach(element => {
            i=0;
            text = text + "<tr>";
            for(item in element){
                text= text + "<td>";
                if (i == 0){
                    text = text + "<img src='"+BASE_URL+"webroot/img/";
                }
                text = text + element[item];
                if (i==0){
                    text = text + "'>"
                }
                text = text + "</td>";
                i++;
            }
            text = text + "</tr>";
        });
        
        $("#caption").html("Détails de la commande numéro "+i);
        table.html(text);
    });
}

$(window).scroll(function(event){
    $("#tableContainer").css('margin-top',$(this).scrollTop());
})

$("tr.classTr").click(function(event){
    $('tr.table-info').removeClass("table-info");
    parent = event.target.parentNode;
    oid = parent.dataset.oid;
    i = parent.dataset.i;
    console.log(oid); 
    details(oid,i);
    parent.classList.add("table-info");
    
});

$(".confirm-btn").click(function(event){
    oid = $(this).data('oid');
    let url = BASE_URL+"admin/updateOrder/"+oid;
    console.log(url);
    $.get(BASE_URL+"admin/updateOrder/"+oid);
    $('.classTr[data-oid='+oid+']').hide();
});