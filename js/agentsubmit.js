$(document).ready(function(e){
$('#submit').click(function(e){
e.preventDefault();
var formData = new FormData($(this)[0]);
jQuery.each(jQuery('#upload')[0].files, function(i, file) {
		formData.append('file-'+i, file);
		});
var agentname=$('#agentname').val();
var bio=$('#bio').val();
var username=$('#username').val();
var password=$('#password').val();


$("#success").html("<img src='loading.gif' height='40' width='40'></img>");
var datastring='agentname='+agentname+'&bio='+bio+'&username='+username+'&password='+password;
$.ajax({
method:"POST",
url:'agentsubmit.php?'+datastring,
data:formData,
cache:false,
async:false,
contentType:false,
processData:false,
success:function(result){
		$("#success").html(result);
		}
		});
});


});