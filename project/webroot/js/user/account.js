$(document).ready(function()
{
    const BASE_URL = "/soldesign/project"
    const DS = "/"
    
    $(".list-group-item").on('click',(event)=>{
        $('.divs').addClass('d-none')
        $(".list-group-item").removeClass('activee')
        $(event.target).addClass('activee')
        data = $(event.target).data('div')
        $("#div-"+data).removeClass('d-none')
    })    

    $('#btn').on('click',()=>{
        let data = {}
        inputs = document.getElementsByTagName("input")
        for ( i = 0; i< inputs.length ; i++){
            if(inputs[i].value.length > 0 ){
                data[inputs[i].name] = inputs[i].value;
            }
        } 
        url = BASE_URL+DS+"user"+DS+"update"
        $.post(url,data).done(function(data){
            console.log(data)
        })

        
    })

    $("#edit").on('click',()=>{
        $('#container').addClass('d-none')
        $('#editContainer').removeClass('d-none')
    })

    $('#back').on('click',()=>{
        $('#container').removeClass('d-none')
        $('#editContainer').addClass('d-none')
    })
    

});