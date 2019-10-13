<!DOCTYPE html>
<html>
<head>
	<title>upload files</title>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scal=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
   <form enctype="multipart/form-data">
   	   <div class="form-group">
   	   	 <input type="file" name="myfile">
   	   	 <input type="submit" id="#mybtn" name="mybtn" class="btn btn-primary">
   	   </div>

   </form>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).on("click","#mybtn",function(){
        var myfile=$("#myfile").val();
        var data=new FormData(myfile);
             $.ajax({
                 url:"upload.php",
                 type:"post",
                 // data: $(this).serialize(),
                 data:data,
                 succes:function(data)
                 {
                 	alert(data);
                 }
          });
	});
</script>
</body>
</html>