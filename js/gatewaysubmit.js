$(document).ready(function(e){

$('#myform').submit(function(e){
e.preventDefault();
var formData = new FormData($(this)[0]);
/*jQuery.each(jQuery('#upload')[0].files, function(i, file) {
		formData.append('file-'+i, file);
		});
		*/
var gatewayname=$('#name').val();
var notes=$('#notes').val();
var priority=$('#priority').val();
var payout=$('#payout').val();
var commission=$('#commission').val();


$("#success").html("<img src='loading.gif' height='40' width='40'></img>");
var datastring='gatewayname='+gatewayname+'&notes='+notes+'&priority='+priority+'&payout='+payout+'&commission='+commission;
$.ajax({
method:"POST",
url:'gatewaysubmit.php?'+datastring,
data:formData,
cache:false,
contentType:false,
processData:false,
success:function(result){
		$("#success").html(result);
		}
		});
return false;
});
});