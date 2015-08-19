$(document).ready(function(e){

$('#myform').submit(function(e){
e.preventDefault();
var formData = new FormData($(this)[0]);
/*jQuery.each(jQuery('#upload')[0].files, function(i, file) {
		formData.append('file-'+i, file);
		});
		*/
var username=$('#username').val();
var password=$('#password').val();
var role=$('#role').val();


$("#success").html("<img src='loading.gif' height='40' width='40'></img>");
var datastring='username='+username+'&password='+password+'&role='+role;
$.ajax({
method:"POST",
url:'newusersubmit.php?'+datastring,
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