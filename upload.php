<?php 
     include 'dbconfig.php';
     if($_FILES['myfile']['name']!='') 
     {
         error_reporting(E_ALL);
         $data=explode(".", $_FILES['myfile']['name']);
         $extension=$data[1];
         $allowed_extension=array("jpg","png","gif");
         if (in_array($extension, $allowed_extension)) 
         {
             $new_file_name=rand().'.'.$extension;
             $path='uploads/'.$new_file_name;
              // $myfile=$_FILES['myfile']['name'];
              // $tmpfile=$_FILES['myfile']['tmp_name'];
         
         if(move_uploaded_file($_FILES['myfile']['tmp_name'], $path))
         {
             echo "img uploaded";
         }
         else
         {
              echo "there is some error";
         }
         // $sql="insert into tblsample(filename) values('$myfile')";
         // if(mysqli_query($con, $sql)
         // {
         //    echo "file uploaded";
         // }
         }
         else
         {
            echo "invalid image";
         }
      }   

    
 ?>