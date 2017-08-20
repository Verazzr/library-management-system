
$("#btn").click(function(){
	var u = $("#u").val();
	$.cookie("test", u, { expires: 7 });
	var p = $("#p").val();
	var user = $("input[type='radio']:checked").val();
	$.post('judge.php',
		{
			u:u,
			p:p,
			user:user
		},
		function(data){
			if(data==1){  //等于1的时候就是没查询到数据
				alert("账号或密码错误！");
			}else{
				if(data=="systemadmin"){
					window.location.href='1.html';
				}
				if(data=="bookadmin"){
					window.location.href='2.html';
				}
				if(data=="reader"){
					window.location.href='3.html';
				}
			}
		});
});