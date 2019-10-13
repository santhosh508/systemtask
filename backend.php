<?php
include 'dbconfig.php';
error_reporting(E_ALL);
// session_start();
// extract($_POST);


  if(isset($_POST['first_name']) && isset($_POST['last_name']) ) 
   {
		$first_name=mysqli_real_escape_string($con, $_POST['first_name']);
		$last_name=mysqli_real_escape_string($con, $_POST['last_name']);
		$insert_query="insert into userdata(firstname, lastname) values('$first_name', '$last_name')";
		$result=mysqli_query($con, $insert_query);
		if ($result) 
		{
			echo "inserted.......";
		}
		else
		{
			echo "not inserted";
		}
   }

   if (isset($_POST['alldata'])) 
    {
   		$data='<table class="table table-bordered table-striped text-center" style="color:#FFDF00">
   		        <tr>
   		            <th>First Name</th>
   		            <th>Last Name</th>
   		            <th colspan="2">Actions</th>
   		        </tr>';
   		        $fetchquery="select * from userdata";
   		        $result=mysqli_query($con, $fetchquery);
   		        if(mysqli_num_rows($result)>0) 
   		        {
   		        	while ($row=mysqli_fetch_array($result)) 
   		        	{
   		        		$data .='<tr>
   		        		             <td>'.$row['firstname'].'</td>
   		        		             <td>'.$row['lastname'].'</td>

   		       <td><i onclick=get_details('.$row['id'].') class="fa fa-edit fa-lg" ></i></td> 		             
   		       <td><button class="btn btn-danger" onclick="delete_data('.$row['id'].')" >Delete</button></td>
   		        		         </tr>';
   		        	}
   		        }       
   		        $data .='</table>';
   		        echo $data;
   	}	

   	if(isset($_POST['delete_id'])) 
   	{
   		$delete_id=$_POST['delete_id'];
   		$delete_query="delete from userdata where id='$delete_id' ";
   		$result=mysqli_query($con, $delete_query);
   		if ($result) 
   		{
   			echo "delted";
   		}
   	}

    if (isset($_POST['get_id'])) 
    {
    	$get_id=$_POST['get_id'];
    	$get_query="select * from userdata where id='$get_id' ";
    	$result=mysqli_query($con, $get_query);
    	$response=array();
    	if(mysqli_num_rows($result)>0)
    	{
    		
    		while ($row=mysqli_fetch_assoc($result)) 
    		{
    			$response=$row;
    		}
    	}
    	  echo json_encode($response);

    }
    if (isset($_POST['update_first_name']) && isset($_POST['update_last_name'])) 
    {
    	$update_first_name=$_POST['update_first_name'];
    	$update_last_name=$_POST['update_last_name'];
    	$hidden_input=$_POST['hidden_input'];

    	$update_query="update userdata set firstname='$update_first_name', lastname='$update_last_name' where id='$hidden_input' ";
    	mysqli_query($con, $update_query);
    }
?>