$(function(){
	$.ajax({
		type:'post',
		url:'../interface.php?mod=load_menu',
		data:{
			user_name:'admin',
			pswd:'123456'
		},
		dataType:'json',
		success:function(data){
			if(data.code=='0001'){
				data=data.msg;
				$("#xml").val(data);
			}else{
				alert('操作失败,'+data.msg);
			}
		}
	});
	
	$("#submit").click(function(){
		$.ajax({
			type:'post',
			url:'../interface.php?mod=set_menu',
			data:{
				user_name:'admin',
				pswd:'123456',
				data:$("#xml").val()
			},
			dataType:'json',
			success:function(data){
				if(data.code=='0001'){
					alert(data.msg);
				}else{
					alert('操作失败,'+data.msg);
				}
			}
		});
	});
	
	
});