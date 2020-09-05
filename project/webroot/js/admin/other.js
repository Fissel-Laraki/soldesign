
const max_per_col = 3

$("#addBtn").click(function(){
    $("#addForm").toggle()
    $("#mytable").toggle()
})

let loadFile = function(event){
    $("#imageContainer").html(" <img src="+"\"" + URL.createObjectURL(event.target.files[0])+"\"" + ">")
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
