$(document).ready(function(e){

$('#submit').click(function(e){
e.preventDefault();
var formData = new FormData($(this)[0]);

/*
var data=new FormData();
*/
jQuery.each(jQuery('#upload')[0].files, function(i, file) {
		formData.append('file-'+i, file);
		});
var phone=$('#phone').val();
var added=1;
var custname=$('#custname').val();
var email=$('#email').val();
var address=$('#address').val();
var city=$('#city').val();
var pincode=$('#pincode').val();
var country=$('#country').val();
var date=$('#date').val();
var issue=$('#issue').val();
$("#success").html("<img src='loading.gif' height='40' width='40'></img>");
var datastring='phone='+phone+'&custname='+custname+'&email='+email+'&address='+address+'&city='+city+'&pincode='+pincode+'&country='+country+'&date='+date+'&issue='+issue;
$.ajax({
method:"POST",
url:'leadsubmit.php?'+datastring,
data:formData,
cache:false,
contentType:false,
processData:false,
success:function(result){
		$("#success").html(result);
		if(window.opener)
		{	
			window.opener.$('#phone').trigger('change');
			window.close();
		}
		}
		});
return false;
});

});