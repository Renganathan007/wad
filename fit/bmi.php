<?php
 $servername = "localhost";
 $username = "root";
 $password = "";
 $db = "fitness";

 $conn = mysqli_connect($servername, $username, $password, $db);

    if(!$conn){
     die("Connection failed: ".mysqli_connect_error());
    }
    if(isset($_POST['user_name']))
    {
         $uname = $_POST['user_name'];
         $weight = $_POST['Weight'];
         $height = $_POST['height'];

         $bmi = ($weight / (($height * $height)/10000));
         if($bmi < 18.5)
         {
            $category = 'Under Weight';
    
         } 
         else if ($bmi >= 18.5 && $bmi <= 24.9) 
         {
            $category = 'Normal Weight';
         } 
         else if ($bmi >= 25 && $bmi <= 29.9)
         {
            $category = 'Over Weight';
         }
         else
         {
            $category = 'obese';    
         }
        
        $insert_sql = "INSERT INTO bmi(username_value,weight_value,height_value,bmi_value,cateory) VALUES('$uname',$weight,$height,$bmi,'$category')";
        header("Location:modules.html");

        
            
        if(!mysqli_query($conn, $insert_sql))
        {
            echo "Error: " . $insert_sql . "<br>" . mysqli_error($conn);
        }
    } 
    mysqli_close($conn);
?>