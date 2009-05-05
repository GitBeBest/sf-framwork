// JavaScript Document
function selectAll()
{
	$("input[name='select_id[]']").each(
		function(){
			$(this).attr("checked",!this.checked); 
		}
	);
}

function nextPage()
{
	if(confirm('你正在离开当前页面！\r\n如果你对页面做了修改请点"确定"保存修改，如果不需要保存修改请点"取消"。\r\n你需要保存吗？'))
		$('#validateForm').submit();
}