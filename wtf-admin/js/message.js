$(document).ready(function(){
  $("tbody tr").bind("click",function(){
    var elements = $(this).children();
    $("#msg").html("<strong>"+$(elements[0]).html()+"</strong> 留言道:&nbsp;&nbsp;<strong>"+$(elements[2]).html()+"</strong>&nbsp;&nbsp;时间:&nbsp;<strong>"+$(elements[1]).html()+"</strong>");
    $('#myModal').modal('show');
    $("#send_reply").attr("name",$(elements[0]).html());
  });
  $("#send_reply").bind("click",function(){
    reply();
  });

  $(".message_reply").bind("click",function(){
    var user = $(this).parent().children(".message_info").children(".message_user").children();
    var content = $(this).parent().children(".message_info").children(".message_content");
    var time = $(this).parent().children(".message_time");
    $("#msg").html("<strong>"+user.html()+"</strong> 留言道:&nbsp;&nbsp;<strong>"+content.html()+"</strong>&nbsp;&nbsp;时间:&nbsp;<strong>"+time.html()+"</strong>");
    $('#myModal').modal('show');
    $("#send_reply").attr("name",user.html());
  });
  $("#send_reply").bind("click",function(){
    reply();
  });

});
function reply(){
  var user = $("#send_reply").attr("name");
  var content = $("textarea").val();
  if(content != ""){
    $.ajax({
      type:"post",
      url:"./php/reply_note.php",
      data:"&user="+user+"&content="+content,
      success:
      function (returnKey){
        if(returnKey == 1){
          $('#myModal').modal('hide');
          $("textarea").val("");
        }else{
          alert("发送失败");
        }
      }
    });
  }
}
