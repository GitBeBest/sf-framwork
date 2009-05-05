<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$title?></title>
<link href="<?=site_path("images/admin.css")?>" type="text/css" media="screen" rel="stylesheet"/>
<script language="javascript" src="<?=site_path("js/jquery.js")?>" type="text/javascript"></script>
<script language="javascript" src="<?=site_path("js/jquery.form.js")?>" type="text/javascript"></script>
<script language="javascript" src="<?=site_path("js/validate/jquery.validate.js")?>" type="text/javascript"></script>
<script language="javascript" src="<?=site_path("js/jquery.datePicker.js")?>" type="text/javascript"></script>
<script language="javascript" type="text/javascript" src="<?=site_path("js/loadbox.js")?>"></script>
<script language="javascript" type="text/javascript" src="<?=site_path("js/func.js")?>"></script>
<script language="javascript" type="text/jscript">
$(document).ready(function() {
    $("#selectAll").click( function() {
        $("input[name='select_id[]']").each( function() { $(this).attr("checked",!this.checked); })
    });
	$("#validateForm").validate({errorElement: "em"});
	$('.date-pick').datePicker({startDate:'1970-01-01'});
	$('.tb_data tr').addClass("mouseout");
	$('.tb_data tr').mouseover(function(){$(this).removeClass("mouseout").addClass("mouseover");});
	$('.tb_data tr').mouseout(function(){$(this).removeClass("mouseover").addClass("mouseout");});
});
</script>
</head>
<body>
<div>
<?=$inc_body?>
</div>
</body>
</html>
