const BASE_URL ="/soldesign/project"
const DS = "/"
$(document).ready(function()
{
    $("#deleteMedia").on('click',(event)=>{
        mid = $(event.target).data('mid')
        console.log(mid)
        url = BASE_URL+DS+'admin'+DS+'deleteMedia'+DS+mid
        $.get(url)
        $(event.target).parent().hide()
    })
    let loadFile = function(event){
        $("#imageContainer").html(" <img src="+"\"" + URL.createObjectURL(event.target.files[0])+"\"" + ">")
    }

    let loadFiles = function(event){
        let div = $("#imagesContainer")
        let current = div.html()
        let length = event.target.files.length
        for(let i =0 ;i< length;  i++){
            current = current + " <img src="+"\"" + URL.createObjectURL(event.target.files[i])+"\"" + " style='display:inline-blockwidth:100pxheight:100pxmargin:15px'>"
        }
        
        div.html(current)

    }
})