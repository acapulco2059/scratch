var api_url = '';
var

$.ajax({
    type : "POST",
    url : api_url,
    headers : {
        "contentType": "application/json"
    },
    dataType : "json",
    success : function(result){

    },
    error : function (result){
        console.log("failed");
    }
});
;