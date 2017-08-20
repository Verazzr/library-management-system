var tag =3;
$("#book").click(function(){
	$.post('2.php',
		{
			num:"a",
			user:"book"
		},
		function(data){
			$("#tab").html(data);
		})
	tag = 1;
})

$("#borrow").click(function(){
	$.post('2.php',
		{
			num:"a",
			user:"borrow"
		},
		function(data){
			$("#tab").html(data);
		})
	tag = 2;
})

$("#fromGo_1").click(function(){   //添加图书信息
	var u = $("#u1").val();
	var p = $("#p1").val();
	var a = $("#a1").val();

	$.post('2.php',
		{
			num:"b",
			u:u,
			p:p,
			a:a
		},
		function(data){
			alert(data);
		})	
})

$("#fromGo_2").click(function(){  //添加借阅信息
	var u = $("#u2").val();
	var p = $("#p2").val();
	var a = $("#a2").val();

	$.post('2.php',
		{
			num:"c",
			u:u,
			p:p,
			a:a
		},
		function(data){
			alert(data);
		})	
})

$("#btn_3").click(function(){  //删除数据  借阅表根据书号删除信息
	var str=""; 
	$("input[type='checkbox']:checked").each(function(){  
		str+=$(this).val()+",";  
		//alert($(this).val());  
	})
	//alert(id);
	$.post('2.php',
		{
			num:"d",
			id:str,
			tag:tag

		},
		function(data){
			alert(data);
	})
})

$("#fromGo_4").click(function(){    //我想知道某一本数是否被借阅，搜索借阅表
	var u = $("#u4").val();

	$.post('2.php',
		{
			num:"e",
			u:u
		},
		function(data){
			$("#tab").html(data);
		})
	tag = 2;	
})