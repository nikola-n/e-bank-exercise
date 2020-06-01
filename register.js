$(document).ready(function(){


    $.get("api/frontend/registerAjax.php").then(function(data){
        
        data = JSON.parse(data);
        console.log(data);
        //branch_id
        // 
    })

});