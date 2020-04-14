// JavaScript Document
var FD={
	status:[0,0,0],
	value:["电子邮箱","电话/手机","内容"],
	send:false,
	key:0,
	form:$("#rightContacts"),
	submit:function(){
		if(FD.send)return;
		FD.send=true;
		var data={
			email:FD.status[0]==0?"":$.trim(FD.eles.eq(0).val()),
			phone:FD.status[1]==0?"":$.trim(FD.eles.eq(1).val()),
			contents:FD.status[2]==0?"":$.trim(FD.eles.eq(2).val())
		};
		$.post(FD.form.attr("action")+"/json",data,function(json){
			if(json.status){
				FD.status=[0,0,0];
				FD.eles.each(function(i,e){
					var e=$(e);
					e.val(FD.value[e.data("n")])
				})	
			};
			alert(json.msg);
			FD.send=false
		},"json")
	}
}
FD.eles=$("#feedbackEmail,#feedbackPhone,#feedbackContents").each(function(i,e){
	$(e).data("n",i).val(FD.value[i]).attr("title","输入信息")
}).focus(function(){
	var e=$(this),n=e.data("n");if(FD.status[n]==0)e.val("");
	FD.status[n]=1
}).blur(function(){
	var e=$(this),n=e.data("n");
	if($.trim(e.val())==""){
		FD.status[n]=0;
		e.val(FD.value[n])
	}else FD.status[n]=1
}).keydown(function(e){
	return;
	if(e.ctrlKey&&e.keyCode==13)FD.submit()
})
$("#cccc").click(function(){FD.submit()});