<link href= 'http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href="css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<!-- FOR J Query Validation -->
<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<link rel="stylesheet" href="css/template.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<script src="js/jquery.validationEngine.js" type="text/javascript"></script>
<!-- FOR J Query Validation -->


<script type="text/javascript">
function clearText(field){
	if (field.defaultValue == field.value) field.value = '';
	else if (field.value == '') field.value = field.defaultValue;      
}
</script>

<!-- For Colorbox -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="js/jquery.colorbox.js"></script>
<link rel="stylesheet" href="css/colorbox.css" />
<script>
	$(document).ready(function(){
		$(".inline").colorbox({inline:true, width:"50%"});				
	});
</script>