$(document).ready(function(){
  $("#panelTab a").click(function(e) {
    e.preventDefault();
    $(this).tab('show');
  });

	$("#text").bind("click",function(){
		$("#home,#news-content").hide();
		$("#text-content").show();
	});
	$("#news").bind("click",function(){
		$("#home,#text-content").hide();
		$("#news-content").show();
	});
	$("#submit_text").bind("click",function(){
		submit_text();
	});
	$("body").on("click",".submit_news",function(){
		submit_news();
	});
	$("body").on("click",".delete_news",function(){
		delete_news(this);
	});
	$("body").on("click",".add_news",function(){
		add_news(this);
	});
});
function menu_manage(btn){
	var btn_name;
	switch(btn){
		case "11":
			btn_name = "八面来风";
			break;
		case "12":
			btn_name = "早参 晚参";
			break;
		case "13":
			btn_name = "周策略";
			break;
		case "14":
			btn_name = "两融内参";
			break;
		case "15":
			btn_name = "期货内参";
			break;
		case "21":
			btn_name = "货币类";
			break;
		case "22":
			btn_name = "债券类";
			break;
		case "23":
			btn_name = "权益类";
			break;
		case "24":
			btn_name = "海外类";
			break;
		case "25":
			btn_name = "其它";
			break;
		case "31":
			btn_name = "王牌投顾专栏";
			break;
		case "32":
			btn_name = "热点新闻";
			break;
		case "33":
			btn_name = "生活百味";
			break;
		case "34":
			btn_name = "互动抽奖";
			break;
		case "35":
			btn_name = "给小鑫留言";
			break;
	}
	$("#dropdown1 h2").html(btn_name);
	$("#dropdown1").attr("name",btn);
	$("#home,#text-content,#news-content").hide();
	$.ajax({
		type: "POST",
		url: "./php/get_menu_info.php",  
		data: "&btn="+btn,
		success: 
		function(returnKey){
			var btn_info = eval(returnKey);
			if(btn_info[0] == 'text'){
				$("#text-content textarea").val(btn_info[1]);
				var str = '<p>图文消息个数，限制为10条以内;多条图文消息信息，默认第一个item为大图;图片链接，支持JPG格式，较好的效果为大图640*320，小图80*80</p><div class="accordion" id="accordion2"><div class="accordion-group" >';
				str	+=			'<div class="accordion-heading">';
				str	+=				'<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#coll1">';
				str	+=					'图文消息-1';
				str	+=				'</a>';
				str	+=			'</div>';
				str	+=			'<div id="coll1" class="accordion-body collapse in">';
				str	+=				'<div class="accordion-inner">';
				str	+=					'<p>标题</p>';
				str	+=					'<input type="text">';
				str	+=					'<p>封面图片上传/输入地址</p>';
				str	+=					'<form id="upload1" action="./php/post_img.php" method="post"><input type="file" name="file"><button class="btn btn-primary" onclick="javascript:$(\'#upload1\').ajaxSubmit(function(rk) {$(\'#imgscr1\').val(\'http://www.qqhbweixin.com/wechat/images/upload/\'+rk);});">上传图片</button></form><input id="imgscr1" type="text" value="">';
				str	+=					'<p>描述</p>';
				str	+=					'<input  type="text">';
				str	+=					'<p>正文</p>';
				str	+=					'<textarea name="editor1" id="myEditor1"></textarea>';
				str	+=					'<p>URL地址:(如填写点击则跳转至此地址)</p>';
				str	+=					'<input type="text"><br />';
				str	+=					'<button class="btn btn-success submit_news">提交修改</button><p>点击任意一个提交按钮后所有图文消息都会提交</p>';
				str	+=					'<p>删除:</p><button class="btn btn-warning delete_news">删除本条图文消息</button>';
				str	+=					'<p>添加:</p><button class="btn btn-info add_news">此条图文消息后添加</button>';
				str	+=				'</div>';
				str	+=			'</div>';
				str	+=		'</div>';
				str+= '<script language="javascript">var editor1= new UE.ui.Editor();editor1.render("myEditor1");$("#upload1").ajaxForm();</script>';
				str	+=		'</div>';
				$("#news-content").html(str);
				$("#type_switch #news").removeClass("active");
				$("#type_switch #text").addClass("active");
				
				$("#text-content").show();
			}else if(btn_info[0] == 'news'){
				var content = btn_info[1];
				var str = '<p>图文消息个数，限制为10条以内;多条图文消息信息，默认第一个item为大图;图片链接，支持JPG格式，较好的效果为大图640*320，小图80*80</p><div class="accordion" id="accordion2">';
				for(var i = 1;i <= content[0];i++){
					str+=	'<div class="accordion-group" >';
					str+=		'<div class="accordion-heading">';
					str+=			'<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#coll'+i+'">图文消息-'+i;		
					str+=			'</a>';
					str+=		'</div>';
					str+=		'<div id="coll'+i+'" class="accordion-body collapse ';
					if(i == 1)str += 'in';
					str+=			'"><div class="accordion-inner">';
					str+=				'<p>标题</p>';
					str+=				'<input type="text" value="'+content[i][0]+'">';
					str+=				'<p>封面图片上传/输入地址</p>';
					str	+=					'<form id="upload'+i+'" action="./php/post_img.php" method="post"><input type="file" name="file"><button class="btn btn-primary" onclick="javascript:$(\'#upload'+i+'\').ajaxSubmit(function(rk) {$(\'#imgscr'+i+'\').val(\'http://www.qqhbweixin.com/wechat/images/upload/\'+rk);});">上传图片</button></form><input id="imgscr'+i+'" type="text" value="'+content[i][2]+'">';
					str+=				'<p>描述</p>';
					str+=				'<input type="text" value="'+content[i][4]+'">';
					str+=				'<p>正文</p>';
					str+=				'<textarea  name="editor'+i+'" id="myEditor'+i+'">'+content[i][1]+'</textarea>';
					str+=				'<p>URL地址:(如填写点击则跳转至此地址)</p>';
					str+=				'<input type="text" value="'+content[i][3]+'"><br />';
					str+=				'<button class="btn btn-success submit_news btn-sub" >提交修改</button>';
					str	+=					'<button class="btn btn-warning delete_news btn-sub">删除本条图文消息</button>';
					str	+=					'<button class="btn btn-info add_news btn-sub">此条图文消息后添加</button>';
					str+=			'</div>';
					str+=		'</div>';
					str+=	'</div>';
					str+= '<script language="javascript">var editor'+i+'= new UE.ui.Editor();editor'+i+'.render("myEditor'+i+'");$("#upload'+i+'").ajaxForm();</script>';
				}
				str+=	'</div>';
				$("#news-content").html(str);
				
				$("#text-content textarea").val("");
				$("#type_switch #text").removeClass("active");
				$("#type_switch #news").addClass("active");
				
				$("#news-content").show();
			}
		}
	});
}
function submit_text(){
	var btn = $("#dropdown1").attr("name");
	var content = $("#text-content textarea").val();
	$.ajax({
		type: "POST",
		url: "./php/update_menu_info.php",  
		data: "&btn="+btn+"&content="+content+"&type=text",
		success: 
		function(returnKey){
			if(returnKey == 1){
				alert("更新成功");
				var str = '<p>图文消息个数，限制为10条以内;多条图文消息信息，默认第一个item为大图;图片链接，支持JPG格式，较好的效果为大图640*320，小图80*80</p><div class="accordion" id="accordion2"><div class="accordion-group">';
				str	+=			'<div class="accordion-heading">';
				str	+=				'<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#coll1">';
				str	+=					'图文消息-1';
				str	+=				'</a>';
				str	+=			'</div>';
				str	+=			'<div id="coll1" class="accordion-body collapse in">';
				str	+=				'<div class="accordion-inner">';
				str	+=					'<p>标题</p>';
				str	+=					'<input type="text">';
				str	+=					'<p>封面图片上传/输入地址</p>';
				str	+=					'<form id="upload1" action="./php/post_img.php" method="post"><input type="file" name="file"><button class="btn btn-primary" onclick="javascript:$(\'#upload1\').ajaxSubmit(function(rk) {$(\'#imgscr1\').val(\'http://www.qqhbweixin.com/wechat/images/upload/\'+rk);});">上传图片</button></form><input id="imgscr1" type="text" value="">';
				str	+=					'<p>描述</p>';
				str	+=					'<input type="text">';
				str	+=					'<p>正文</p>';
				str	+=					'<textarea name="editor1" id="myEditor1"></textarea>';
				str	+=					'<p>URL地址:(如填写点击则跳转至此地址)</p>';
				str	+=					'<input type="text"><br />';
				str	+=					'<button class="btn btn-success submit_news">提交修改</button><p>点击任意一个提交按钮后所有图文消息都会提交</p>';
				str	+=					'<p>删除:</p><button class="btn btn-warning delete_news">删除本条图文消息</button>';
				str	+=					'<p>添加:</p><button class="btn btn-info add_news">此条图文消息后添加</button>';
				str	+=				'</div>';
				str	+=			'</div>';
				str	+=		'</div>';
				str += '<script language="javascript">var editor1= new UE.ui.Editor();editor1.render("myEditor1");$("#upload1").ajaxForm();</script>';
				str += '</div>';
			}else{
				alert("更新失败");
			}
		}
	});
}
function submit_news(){
	var btn = $("#dropdown1").attr("name");
	var news = $("#accordion2").children();
	var content = news.length/2;
	for(var i = 1;i <= (news.length/2);i++){ 
		var elements = $(news[(i-1)*2]).children(".accordion-body").children().children();
		var title = $(elements[1]).val();
		var img = $(elements[4]).val();
		var description = $(elements[6]).val();
		var textarea_name = $(elements[9]).attr("name");
		if(eval(textarea_name+'.hasContents()')){ //此处以非空为例
			eval(textarea_name+'.sync();')       //同步内容
		}
		var text = eval(textarea_name+'.getContent()');
		var url = $(elements[11]).val();
		if(typeof(url) == "undefined"||url == ""){
			url = "http://www.qqhbweixin.com/wechat/page.php?id="+i+btn;//www.qqhbweixin.com
		}
		text = text.replace(/&#39;/g, "\\'");
		text = text.replace(/&quot;/g, '\\"');
		text = text.replace(/&nbsp;/g, " ");
		title = title.replace(/&#39;/g, "\\'");
		title = title.replace(/&nbsp;/g, " ");
		title = title.replace(/&quot;/g, '\\"');
		description = description.replace(/&#39;/g, "\\'");
		description = description.replace(/&nbsp;/g, " ");
		content += ",array(\'"+title+"\',\'"+text+"\',\'"+img.replace(/'/g, "\\'")+"\',\'"+url.replace(/'/g, "\\'")+"\',\'"+description+"\')";
	}
	//alert(content);
	$.ajax({
		type: "POST",
		url: "./php/update_menu_info.php",  
		data: "&btn="+btn+"&content="+content+"&type=news",
		success: 
		function(returnKey){
			if(returnKey == 1){
				$("#text-content textarea").val("");
				alert("成功更新按钮信息");
			}else{
				alert("更新失败");
			}
		}
	});
}
function delete_news(target){
	var btn = $("#dropdown1").attr("name");
	var news = $(target).parent().parent().parent().parent().children();
	if(news.length/2 == 1){
		alert('至少得有一条图文');
	}else{
		$(target).parent().parent().parent().next().remove();
		$(target).parent().parent().parent().remove();
		submit_news();
		menu_manage(btn);
	}
}
function add_news(target){
	var news = $(target).parent().parent().parent().parent().children();
	if(news.length/2 == 10){
		alert('不能多于10条图文消息');
	}else{
		str = 		'<div class="accordion-group" >';
		str	+=			'<div class="accordion-heading">';
		str	+=				'<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#coll'+(news.length/2+1)+'">';
		str	+=					'图文消息-'+(news.length/2+1);
		str	+=				'</a>';
		str	+=			'</div>';
		str	+=			'<div id="coll'+(news.length/2+1)+'" class="accordion-body collapse in">';
		str	+=				'<div class="accordion-inner">';
		str	+=					'<p>标题</p>';
		str	+=					'<input type="text">';
		str	+=					'<p>封面图片上传/输入地址</p>';
		str	+=					'<form id="upload'+(news.length/2+1)+'" action="./php/post_img.php" method="post"><input type="file" name="file"><button class="btn btn-primary" onclick="javascript:$(\'#upload'+(news.length/2+1)+'\').ajaxSubmit(function(rk) {$(\'#imgscr'+(news.length/2+1)+'\').val(\'http://www.qqhbweixin.com/wechat/images/upload/\'+rk);});">上传图片</button></form><input id="imgscr'+(news.length/2+1)+'" type="text" value="">';
		str	+=					'<p>描述</p>';
		str	+=					'<input type="text">';
		str	+=					'<p>正文</p>';
		str	+=					'<textarea name="editor'+(news.length/2+1)+'" id="myEditor'+(news.length/2+1)+'"></textarea>';
		str	+=					'<p>URL地址:(如填写点击则跳转至此地址)</p>';
		str	+=					'<input type="text"><br />';
		str	+=					'<button class="btn btn-success submit_news">提交修改</button><p>点击任意一个提交按钮后所有图文消息都会提交</p>';
		str	+=					'<p>删除:</p><button class="btn btn-warning delete_news">删除本条图文消息</button>';
		str	+=					'<p>添加:</p><button class="btn btn-info add_news">此条图文消息后添加</button>';
		str	+=				'</div>';
		str	+=			'</div>';
		str	+=		'</div>';
		str += '<script language="javascript">var editor'+(news.length/2+1)+'= new UE.ui.Editor();editor'+(news.length/2+1)+'.render("myEditor'+(news.length/2+1)+'");$("#upload'+(news.length/2+1)+'").ajaxForm();</script>';
		$(target).parent().parent().parent().next().after(str);
	}
}
