const max_per_col = 5

$("#addBtn").click(function(){
    $("#addForm").toggle();
    $("#mytable").toggle();
});

let loadFile = function(event){
    $("#imageContainer").html(" <img src="+"\"" + URL.createObjectURL(event.target.files[0])+"\"" + ">");
}

let loadFiles = function(event){
    let div = $("#imagesContainer");
    let current = div.html();
    let length = event.target.files.length;
    for(let i =0; i< length ; i++){
        current = current + " <img src="+"\"" + URL.createObjectURL(event.target.files[i])+"\"" + " style='display:inline-block;width:100px;height:100px;margin:15px'>";
    }
    
    div.html(current);

}

$("#addCharac").on('click',()=>{
    
    //$("<div class='col'></div>").insertAfter("#midcol")
    selection = $("#selection")
    selectedText = selection.find("option:selected").text()
    selectedName = selection.val()
    
    beforeLastCol = $("#row .col:nth-last-child(2)")
    nb = beforeLastCol.find(".form-group").length
    if (nb >= max_per_col){
        html = "<div class='col'>"
        $("<div class='col'><div class='form-group'><label>"+selectedText+"</label><input type='text' class='form-control'  name='"+selectedName+"'> </div></div>").insertAfter(beforeLastCol)
    }
    else{
        beforeLastCol.append("<div class='form-group'><label>"+selectedText+"</label><input type='text' class='form-control'  name='"+selectedName+"'> </div>")
    }
})

$("#selectType").on('change',(event)=>{
    selected = $("#selectType").find(":selected").val()
    $(".types").addClass("d-none")
    left = $(".types[data-tid='"+selected+"']").removeClass("d-none")
})