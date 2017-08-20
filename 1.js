
$("#badmin").click(function(){
	$.post('1.php',
		{
			num:"a",
			user:"bookadmin"
		},
		function(data){
			$("#tab").html(data);
		})
})

$("#reader").click(function(){
	$.post('1.php',
		{
			num:"a",
			user:"reader"
		},
		function(data){
			$("#tab").html(data);
		})
})

$("#fromGo_1").click(function(){   //添加图书管理员
	var u = $("#u1").val();
	var p = $("#p1").val();

	$.post('1.php',
		{
			num:"b",
			u:u,
			p:p
		},
		function(data){
			alert(data);
		})	
})

$("#fromGo_2").click(function(){  //添加读者
	var u = $("#u2").val();
	var p = $("#p2").val();

	$.post('1.php',
		{
			num:"c",
			u:u,
			p:p
		},
		function(data){
			alert(data);
		})	
})

$("#btn_3").click(function(){  //删除数据
	var str=""; 
	$("input[type='checkbox']:checked").each(function(){  
		str+=$(this).val()+",";  
		//alert($(this).val());  
	})
	//alert(id);
	$.post('1.php',
		{
			num:"d",
			id:str
		},
		function(data){
			alert(data);
	})
})

$("#fromGo_4").click(function(){  
	var u = $("#u4").val();

	$.post('1.php',
		{
			num:"e",
			u:u
		},
		function(data){
			$("#tab").html(data);
		})	
})



