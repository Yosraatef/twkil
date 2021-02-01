$(document).ready(function(){
  $('#currentPass').keyup(function(){
      var currentPass = $('#currentPass').val();
    //  alert(currentPass);
      $.ajax({
        type: "post",
        url: '/admin/checkAdminPass',
        data:{currentPass:currentPass},
        success:function(resp){
          if(resp=="false"){
            $("#chekkCurrentPass").html("<font color=red>Current Password Is Incorrect</font>");
          }else if(resp=="true"){
            $("#chekkCurrentPass").html("<font color=green>Current Password Is Correct</font>");
          }

        },error:function(){
          alert('error');
        }
      });
  });



});

$(document).ready(function(){
$(".allowAgency").change(function(){
if($(this).val()== 1)
{
  $("#noHours").show();
}
else
{
  $("#noHours").hide();
}
});
});
