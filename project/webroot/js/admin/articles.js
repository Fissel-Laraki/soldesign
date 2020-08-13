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