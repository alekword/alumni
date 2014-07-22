$("button#submit").click( function() {
	if($("#username").val() == "" || $("#password").val() == "")
		$("div#ack").html("*กรุณากรอกข้อมูลให้ครบ");
	else
		$.post( $("#myForm").attr("action"),
			    $("#myForm").serializeArray(),
			    function(data){
					$("div#ack").html(data);
			    });

		$("#myForm").submit( function (){
			return false;
		});

});
