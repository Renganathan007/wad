<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign Up</title>
    <style>
          body {
            margin: 0;
            padding: 0;
            background-size: cover;
            background-image: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url("register.jpg");
            background-repeat: no-repeat;
            background-position: center;
            width: 100%;
            height: 100vh;
        }
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color:  rgb(238, 234, 221);
        }
        
        li {
            float: left;
            border-right: 1px solid #bbb;
        }
        
        li:last-child {
            border-right: none;
        }
        
        li a {
            display: block;
            color: navy;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
        
        li a:hover:not(.active) {
            background-color: #FFDAAF;
        }
        #signupform{
            height: 350px;
            width: 50%;
            background-color: ;
            margin-left: 25%;
            text-align: center;
            border: 10px solid whitesmoke;
            border-radius: 10px;
            padding-top:20px;
            color: white;


        }
        #signupbtn{
            height: 30px;
            width: 90px;
            text-align: center;
            font-weight: bold;
            font-size: 15px;
            margin-left: 50px;
        }
        h1 {
            background-color: #FFDAAF;
            color: navy;
            margin-left: 300px;
            margin-right: 300px;
            border-radius: 2px;
            height: 40px;
            padding-top: 0px;
        }
    </style>
</head>
<body>
<ul>
        <li><a href="home.html">HOME</a></li>
        <li><a href="aboutus.html">ABOUTUS</a></li>
        <li><a class="active" href="signup.php">SIGNUP</a></li>
        <li><a href="signin.php">SIGNIN</a></li>
        <li><a href="Gallery.html">GALLERY</a></li>
        <li><a href="feeback.php">FEEDBACK</a></li>
    </ul>

    <h1 style="text-align: center;">Sign Up</h1>
    <br>
    <br>
    <div id="signupform">
        <form action="signup.php" method="post" >
            <label for="name">Username <sup>*</sup></label>: 
            <input type="text" id="username" name="user_name" pattern= "[A-Za-z]+" required>
            <br>
            <br>
            <label for="gender">Gender<sup>*</sup></label>:
            <input type="radio" id="Male" name="gender" value="Male">
            <label for="gender">Male</label>
            <input type="radio" id="Female" name="gender" value="Female">
            
            <label for="gender">Female</label>
            <br>
            <br>
            <label for="Age">Age </label>:
            <input type="number" id="age" name="age"  max="60"required>
            <br>
            <br>
            <label for="password">Password <sup>*</sup></label>:
            <input type="password" id="pass" name="pass_word" required>
            <br>
            <br>
            <label for="phNumber">Mobile <sup>*</sup> </label>:
            <input type="tel" id="phNumber" name="ph_number"pattern="[0-9]{10}" required>
            <br>
            <br>
            <label for="email">Email ID <sup>*</sup>: </label>
            <input type="email" id="email" name="email_id" required>
            <br>
            <br>
            <label for="Address">Address: </label>
            <input type="text" id="address" name="loc_address"pattern="[A-za-z0-9]+{50}" required>
            <br>
            <br>
            <input type="submit" id="signupbtn" name="submit" value="Sign Up">
        </form>
    </div>
</body>
</html>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "fitness";

    $conn = mysqli_connect($servername, $username, $password, $db);

    if(!$conn){
        die("Connection failed: ".mysqli_connect_error());
    }

    if(isset($_POST['user_name'])){
        $uname = $_POST['user_name'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $pword = $_POST['pass_word'];
        $pnumber = $_POST['ph_number'];
        $email = $_POST['email_id'];
        $address = $_POST['loc_address'];

        $insert_sql = "INSERT INTO register(username_value,gender,age, password_value, ph_number, email_ID,loc_address) VALUES('$uname','$gender',$age,'$pword', $pnumber, '$email','$address')";
        if(isset($_POST["submit"]))
                    {
                        header("Location:home.html");
                    
                    }
                    

        if(!mysqli_query($conn, $insert_sql)) {
            echo "Error: " . $insert_sql . "<br>" . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
?>