var api_url = '';
var user = null;

$.ajax({
    type : "GET",
    url : api_url,
    headers : {
        "contentType": "application/json"
    },
    dataType : "json",
    success : function (result) {
        user = result;
        $("#pseudo").text(user.pseudo);
    },
    error : function (result) {
        console.log("failed");
    }
})