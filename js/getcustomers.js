$(document).ready(function()
{
	$("#phone").on("change",function()
	{
		var phone=$('#phone').val();
		$.ajax({
			url:"getcustomers.php?phone="+phone,
			async:false,
			success:function(result)
			{
				if(result!=2)
				{
					$("#custname").val(result);
					$("#warningmsg").html("");
				}
				else if(result==2)
				{
				$("#custname").val("");
				window.open("lead.php?phone="+phone);
				$("#warningmsg").html("<a href='lead.php?phone="+phone+"' target='_blank'>Please enter customer details by clicking here first</a>");
				}
				
			}
			
		});
	});
});