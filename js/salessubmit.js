$(document).ready(function(e){

$('#myform').submit(function(e){
e.preventDefault();
var formData = new FormData($(this)[0]);

/*
var data=new FormData();
*/
jQuery.each(jQuery('#upload')[0].files, function(i, file) {
		formData.append('file-'+i, file);
		});
var phone=$('#phone').val();
var planname=$('#planname').val();

var dateofsale=$('#dateofsale').val();
var dateofexpiry=$('#dateofexpiry').val();
var agent=$('#agent').val();

var custname=$('#custname').val();
if (custname  === '') {
        alert('Customer name is empty.');
        return false;
    }
var gatewayid=$('#gatewayid').val();
var amount=$('#amount').val();
$("#success").html("<img src='loading.gif' height='40' width='40'></img>");
var datastring='phone='+phone+'&custname='+custname+'&planname='+planname+'&dateofsale='+dateofsale+'&dateofexpiry='+dateofexpiry+'&agent='+agent+'&gatewayid='+gatewayid+'&amount='+amount;
$.ajax({
method:"POST",
url:'salessubmit.php?'+datastring,
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