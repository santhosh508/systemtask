<!DOCTYPE html>
<html lang="en">
<head>
  <title>Insert data</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="assests/css/bootstrap4.min.css">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> -->
  <!-- <link rel="stylesheet" href="assests/css/fontawesome4.7.min.css"> -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="assests/css/custom.css">

</head>
<body>
   <!-- NAVBAR BEGIN -->
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Logo</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_content">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbar_content">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Practic</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">More</a>

        <div class="dropdown-menu dropdown-menu-right">
          <a class="dropdown-item" href="#">Action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
     
    </ul>
    
  </div>
</nav>
<!-- NAVBAR END -->

<!-- Button to Open the Modal -->
<div class="container m-10 d-flex justify-content-end" id="btns_div">
<button type="button" class="btn btn-primary m-10" data-toggle="modal" data-target="#insert_modal">
   Insert Data
</button>
</div>

<div id="message">
<h3 id="insert_message" class="alert alert-success text-center text-uppercase" style="display: none;"></h3>
</div>

<h4 class="">All Data</h4>
<div class="allrecords">
   
</div>
<!-- INSERT Modal -->
<div class="modal" id="insert_modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Insert Modal</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form>
        <div class="form-group">
           <label>First Name</label>
           <input type="text" name="first_name" id="first_name" class="form-control"> 
        </div>
        <div class="form-group">
           <label>Last Name</label>
           <input type="text" name="last_name" id="last_name" class="form-control"> 
        </div>
        </form> 
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
         <button class="btn btn-primary" onclick="savedata()">Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>



<!--UPDATE The Modal -->
<div class="modal" id="update_modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">UPDATE Modal</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form>
        <div class="form-group">
           <label>Update First Name</label>
           <input type="text" name="update_first_name" id="update_first_name" class="form-control"> 
        </div>
        <div class="form-group">
           <label>Update Last Name</label>
           <input type="text" name="update_last_name" id="update_last_name" class="form-control"> 
        </div>
        </form> 
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
         <button class="btn btn-primary" onclick="update_data()">Update</button>
         <ihttps://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.jsnput type="hidden" name="hidden_input" id="hidden_input">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
  <script src="assests/js/jquery3.4.min.js"></script>
  <script src="assests/js/bootstrap4.min.js"></script>

  <script type="text/javascript">
     // alert('ok');
   $(document).ready(function(){
       fetchdata();
   });  
         function fetchdata()
         {
           var alldata="alldata";

           $.post("backend.php", { alldata:alldata }, function(data){
              $(".allrecords").html(data);
           },
           );

           // $.ajax({
           //     url:'backend.php',
           //     type:'post',
           //     data:{alldata:alldata},
           //     success:function(data)
           //     {
           //        $(".allrecords").html(data);
           //     }
           // });
         }

         function savedata()
         {
            var first_name=$("#first_name").val();
            var last_name=$("#last_name").val();

            $.ajax({
                 url:"http://localhost/php_systemtask/backend.php",
                 type:"post",
                 // data:{first_name:first_name, last_name:last_name},
                 data:{first_name:first_name, last_name:last_name},

                 success:function(data)
                 {
                    // alert(data);
                    $("#insert_modal").modal('hide');
                    fetchdata();
                     $("#insert_message").show();
                     // $('#insert_message').fadeIn().text('data inserted');
                     $("#insert_message").fadeIn().html(data);
                    setTimeout(function(){  
                          $('#insert_message').fadeOut("Slow");  
                          }, 2000); 
                              
                 },
                 error: function (data) 
                 {
                     alert(data);
                  }
            });
         }

         function delete_data(id){
               // alert(id);
               var delete_id=id;

               if (confirm('want to delete..? ')) {


               $.ajax({
                 url:'backend.php',
                 type:'post',
                 data:{delete_id:delete_id},
                 success:function(data){
                  alert(data)
                  fetchdata();
                 }

               });
                                              }
         }

         function get_details(get_id)
         {
               // alert(get_id);
               var get_id=get_id;
               $("#hidden_input").val(get_id);
               $.ajax({
                       url:"backend.php",
                       type:"post",
                       data:{get_id:get_id},
                       success:function(data)
                       {
                         // alert(data);
                         var user=JSON.parse(data);

                         $("#update_first_name").val(user.firstname);
                         $("#update_last_name").val(user.lastname);
                         $("#update_modal").modal("show");
                         
                       }

               });
                
         }

         function update_data()
         {
            var update_first_name=$("#update_first_name").val();
            var update_last_name=$("#update_last_name").val();
            // alert(update_first_name);
            var hidden_input=$("#hidden_input").val();
            // alert(hidden_input);
            $.ajax({
                      url:'backend.php',
                      type:'post',
                      data:{update_first_name:update_first_name, update_last_name:update_last_name, hidden_input:hidden_input},
                      success:function(data){
                        // alert(data);
                        $("#update_modal").modal("hide");
                        fetchdata();
                      }

            });
         }
  </script>
</body>
</html>
   