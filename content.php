<style>
   .hidden{
      display:none;
   }
   .msg{
     
   }
</style>
<div class="alert  hidden"></div>
<form id="contactForm" name="contactForm" method="post" class="col-md-4">
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="name" id="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Mobile</label>
    <input type="text" name="mobile" id="mobile" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" id="password" class="form-control" id="exampleInputPassword1">
  </div>
  
  <input type="submit" id="btn" class="btn btn-primary" value="Submit Now">

</form>

<script>
      jQuery('#contactForm').on('submit', function(e){
          jQuery('#btn').val("Please wait... ");
          jQuery('#btn').attr('disabled', true);
          jQuery.ajax({
              url: 'login.php',
              type: 'post',
              dataType: "json",
              data: jQuery('#contactForm').serialize(),
              success: function(result){
                if (result.code == "1") {
                   $('.alert').removeClass('hidden')
                   $('.alert').html('<div class="alert alert-danger">'+result.msg+'</div>')
                   jQuery('#btn').val('Re-Login Please.');
                   jQuery('#btn').attr('disabled', false);
                }
                if (result.code == "200"){
                  $('.alert').removeClass('hidden')
                   $('.alert').html('<div class="alert alert-danger">'+result.msg+'</div>')
                   jQuery('#btn').val('Re-Login Please');
                   jQuery('#btn').attr('disabled', false);
                }
                if (result.code == "400"){
                  $('.alert').removeClass('hidden')
                   $('.alert').html('<div class="alert alert-success">'+result.msg+'</div>')
                   jQuery('#btn').val('Submitted');
                   jQuery('#btn').attr('disabled', true);

                } else {
                    $(".display-error").html("<ul>"+data.msg+"</ul>");
                    $(".display-error").css("display","block");
                }
                 
                 //alert(result);
                 //jQuery('#btn').val('Submit Now');
                 //jQuery('#btn').attr('disabled', false);
                 //window.location.href="mainlogin.php";
              }
          });
        
          e.preventDefault();
      });
</script>