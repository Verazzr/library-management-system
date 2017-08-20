
var u = $.cookie("test");
$("h1").append(" "+u);
$.post('3.php',
	{
		num:"z",
		u:u
	},
	function(data){
		$("#tab").html(data);
	}
)

$("#fromGo_4").click(function(){    //我想知道某一本数是否被借阅，搜索借阅表
	var Bname = $("#u4").val();

	$.post('3.php',
		{
			num:"e",
			u:Bname
		},
		function(data){
			$("#tab_1").html(data);
		})	
})

$("#book").click(function(){
	$.post('3.php',
		{
			num:"a",
			user:"book"
		},
		function(data){
			$("#tab_1").html(data);
		})
})