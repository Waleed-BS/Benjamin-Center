$(document).ready(function(){
    $("#validate").click(function() {
        var box1 = $("#box1").val();
        var box2 = $("#box2").val();
        var box3 = $("#box3").val();
        var box4 = $("#box4").val();


        $("#messageContainer").children("h5").remove();
        var sum = parseInt(box1) + parseInt(box2) + parseInt(box3) + parseInt(box4);
        //console.log(sum,"Sum of vals");
        if(sum <= 100 && sum >= 0){
            $("#totalfulltime").val(sum);
        }
        else if (sum > 100 || sum < 0){
            $("#messageContainer").append("<h5 style = 'color:red;'>Sum of values must be within 0-100%</h5>");
            $("#totalfulltime").val(sum);
        }


    });

    $("#validate2").click(function() {
        var box5 = $("#box5").val();
        var box6 = $("#box6").val();
        var box7 = $("#box7").val();
        var box8 = $("#box8").val();


        $("#messageContainer2").children("h5").remove();
        var sum = parseInt(box5) + parseInt(box6) + parseInt(box7) + parseInt(box8);
        //console.log(sum,"Sum of vals");
        if(sum <= 100 && sum >= 0){
            $("#totalparttime").val(sum);
        }
        else if (sum > 100 || sum < 0){
            $("#messageContainer2").append("<h5 style = 'color:red;'>Sum of values must be within 0-100%</h5>");
            $("#totalparttime").val(sum);
        }
    });
});
