function start(){
	 var lista = $("#lista").val();
	 var info = $("#info").val();
    var listaa = lista.split("\n");
	 var total = listaa.length;
	 var created = 0;
	 var invalid = 0;
	 var all = 0;
	 	 if(lista == 0){
	 	$("#status").html("Empty..");
	 	$("#lista").css("border","1px solid#FF0000");
	 	die();
	 }else{
	 	$("#status").html("Still Create");
	 		 	$("#lista").css("border","");
	 }
	 if(info == 0){
	 	$("#status").html("Empty..");
	 		 	$("#info").css("border","1px solid#FF0000");


	 	die();

	 }else{
	 		 		 	$("#info").css("border","");

	 		 	$("#status").html("Still Create");

	 }
	 $("#total").html(total);

	 listaa.forEach(function(value,index){
	 	setTimeout(function(){
	 		var XHR = $.ajax({
	 			url:"api.php?domain="+value+"&info="+info,
	 			type:"GET",
	 			success:function(response){
	 				
	 				if(response.match("true")){
	 					$("#pzy").fadeOut(250);
	 					$("#pzy").fadeIn(250);
	 					created++;
	 					jsonEn = JSON.parse(response)
	 					var msg = jsonEn.err_msg;
	 					all++;
	 					$("#successBox").append(msg +"<br>");
	 					$("#created").html(created);
	 					if(all == total){
	 						$("#myModal").modal('toggle');
	 						$("#content").html("<span class='badge badge-success'>Created: </span><span class='badge badge-success'>" +created+"</span><br> <span class='badge badge-danger'>Invalid:</span><span class='badge badge-danger'>"+invalid+"</span><br><span class='badge badge-primary'> All:</span><span class='badge badge-primary'>"+all+"</span>");
	 						$("#status").html("Compeleted !")
	 					}
	 				}else{
	 					$("#twz").fadeOut(250);
	 					$("#twz").fadeIn(250);
	 					invalid++;
	 					jsonEn = JSON.parse(response)
	 					var msg = jsonEn.err_msg;
	 					all++;
	 						if(all == total){
	 						$("#myModal").modal('toggle');
	 						$("#content").html("Created: </span><span class='badge badge-success'>" +created+"</span><br> Invalid:</span><span class='badge badge-danger'>"+invalid+"</span><br>All:</span><span class='badge badge-primary'>"+all+"</span>");
	 						$("#status").html("Compeleted !")
	 					}
	 					$("#invalid").html(invalid);
	 					$("#invalidBox").append(msg+"<br>");
	 				}
	 			}
	 		});
	 	},450 * index);
	 });
					}
					function CopyToClipboard(containerid) {
    if (window.getSelection) {
        if (window.getSelection().empty) { // Chrome
            window.getSelection().empty();
        } else if (window.getSelection().removeAllRanges) { // Firefox
            window.getSelection().removeAllRanges();
        }
    } else if (document.selection) { // IE?
        document.selection.empty();
    }

    if (document.selection) {
        var range = document.body.createTextRange();
        range.moveToElementText(document.getElementById(containerid));
        range.select().createTextRange();
        document.execCommand("copy");
        $("#"+containerid).fadeOut(250);
        $("#"+containerid).fadeIn(250);

    } else if (window.getSelection) {
        var range = document.createRange();
        range.selectNode(document.getElementById(containerid));
        window.getSelection().addRange(range);
        document.execCommand("copy");
                $("#"+containerid).fadeOut(250);
                        $("#"+containerid).fadeIn(250);


    }
}