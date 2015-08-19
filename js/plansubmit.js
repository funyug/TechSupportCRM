$(document).ready(function(e){

$('#myform').submit(function(e){
e.preventDefault();
var formData = new FormData($(this)[0]);
jQuery.each(jQuery('#upload')[0].files, function(i, file) {
		formData.append('file-'+i, file);
		});
var planname=$('#planname').val();
var price=$('#price').val();
var duration=$('#duration').val();

$("#success").html("<img src='loading.gif' height='40' width='40'></img>");
var datastring='planname='+planname+'&price='+price+'&duration='+duration;
$.ajax({
method:"POST",
url:'plansubmit.php?'+datastring,
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