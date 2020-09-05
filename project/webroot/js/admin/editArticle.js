const BASE_URL ="/soldesign/project"
const DS = "/"

$(document).on('click',".deleteMedia",(event)=>{
    mid = $(event.target).data('mid')
    console.log(mid)
    console.log("clicked")
    if(mid != -1){
        url = BASE_URL+DS+'admin'+DS+'deleteMedia'+DS+mid
        $.get(url)
    }
    $(event.target).parent().hide()
})
let loadFile = function(event){
    $("#imageContainer").html(" <img src="+"\"" + URL.createObjectURL(event.target.files[0])+"\"" + ">")
}

let loadFiles = function(event){
    console.log("added")
    div = $("#imagesContainer")
    current = div.html()
    if (current == undefined){
        current = " ";
    }
    length = event.target.files.length
    for(i =0 ;i< length;  i++){
        current = current + " <div class='my-2'> "+" <img src="+"\"" + URL.createObjectURL(event.target.files[i])+"\"" + " data-mid='-1' style='display:inline-block;width:100px;height:100px;margin:15px'> <br/>" +"<button type='button' class='btn btn-danger w-50 mx-4 my-1 deleteMedia'  data-mid='-1' ><i class='fa fa-trash'></i></button> </div>"
    }
    
    div.html(current)

}