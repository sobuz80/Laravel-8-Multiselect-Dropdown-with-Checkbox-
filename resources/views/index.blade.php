<!DOCTYPE html>
<html>
<head>
<title>Laravel 8 Multiselect Dropdown with Checkbox In Bootstrap 4</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body style="background: #8ab4e8;">
<div class="container" >
<h2 align="center">Laravel 8 Multiselect Dropdown with Checkbox In Bootstrap 4</h2>
<form method="post" id="category_form">
<div class="form_select">
<label>Select</label>
<select id="category" name="name[]" multiple class="form-select" >
<option value="Codeigniter">Codeigniter</option>
<option value="CakePHP">CakePHP</option>
<option value="Laravel">Laravel</option>
<option value="YII">YII</option>
<option value="Zend">Zend</option>
<option value="Symfony">Symfony</option>
<option value="Phalcon">Phalcon</option>
<option value="Slim">Slim</option>
</select>
</div>
<div class="form-group">
<input type="submit" class="btn btn-primary" name="submit" value="Submit" />
</div>
</form>
</div>
<style>
form#category_form {
background: #f2f2f2;
padding: 50px;
width: 50%;
margin: 0 auto;
}
.form-group {
text-align: right;
}
button.multiselect.dropdown-toggle.btn.btn-default {
border: 1px solid;
margin: 0 0 10px;
display: flex;
align-items: center;
justify-content: space-between;
}
</style>
</body>
<script>
$(document).ready(function(){
$('#category').multiselect({
nonSelectedText: 'Select category',
enableFiltering: true,
enableCaseInsensitiveFiltering: true,
buttonWidth:'400px'
});
$('#category_form').on('submit', function(event){
event.preventDefault();
var form_data = $(this).serialize();
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$.ajax({
url:"{{ url('store') }}",
method:"POST",
data:form_data,
success:function(data)
{
$('#category option:selected').each(function(){
$(this).prop('selected', false);
});
$('#category').multiselect('refresh');
alert(data['success']);
}
});
});
});
</script>
</html>