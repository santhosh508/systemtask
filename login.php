  <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | Make Login Form by Using Bootstrap Modal with PHP Ajax Jquery</title>  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  
      </head>  
      <body>  
          
             <form> 
                     <label>Username</label>  
                     <input type="text" name="username" id="username" class="form-control" />  
                     <br />  
                     <label>Password</label>  
                     <input type="password" name="password" id="password" class="form-control" />  
                     <br />  
                     <button type="button" name="login_button" id="login_button" class="btn btn-warning">Login</button>  
            </form>
          
      </body>  
 </html>  
 
<script>
          
 $(document).ready(function(){  
      $('#login_button').click(function(){  
           var username = $('#username').val();  
           var password = $('#password').val();  
           
                $.ajax({  
                     url:"process.php",  
                     method:"POST",  
                     data: $(this).serialize(),  
                     success:function(data)  
                     {  
                         alert(data);
                     }  
                });  
      });
          
 });  
 </script>  