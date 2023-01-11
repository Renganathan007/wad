<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign In</title>
    <style>
        body{
            margin: 0;
            padding: 0;
            background-size: cover;
            background-image: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url("signin.jpg");
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
        #signinform{
            height: 200px;
            width: 50%;
            color: white;
            margin-left: 25%;
            text-align: center;
            padding-top: 100px;
            border: 10px solid whitesmoke;
            border-radius: 10px;
        }
        #signinbtn{
            height: 30px;
            width: 90px;
            text-align: center;
            font-weight: bold;
            font-size: 15px;
            margin-left: 50px;
            border: 5px solid whitesmoke;
            border-radius: 5px;
            
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
        <li><a  href="aboutus.html">ABOUTUS</a></li>
        <li><a href="signup.php">SIGNUP</a></li>
        <li><a class="active" href="signin.php">SIGNIN</a></li>
        <li><a href="Gallery.html">GALLERY</a></li>
        <li><a href="feeback.php">FEEDBACK</a></li>
</ul>

    <h1 style="text-align: center;">Sign In</h1>
    <br>
    <br>
    <div id="signinform">
        <form action="signin.php" method="post">
            <label for="name">Username <sup>*</sup>: </label>
            <input type="text" id="username" name="user_name" required>
            <br>
            <br>
            <label for="password">Password <sup>*</sup>: </label>
            <input type="password" id="pass" name="pass_word" required>
            <br>
            <br>
            <br>
            <input type="submit" id="signinbtn" name="submit" value="Sign In" >
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

    if(isset($_POST['user_name']))
    {
        $uname = $_POST['user_name'];
        $pword = $_POST['pass_word'];
        $flag = 0;
        $extract_sql = "SELECT * FROM register";
        $extract = "SELECT * FROM bmi";
        $res = mysqli_query($conn, $extract);
        $result = mysqli_query($conn, $extract_sql);
        if (mysqli_num_rows($result) > 0) 
        {
            while($row = mysqli_fetch_assoc($result)) 
            {
                if(($row["username_value"]==$uname) && ($row["password_value"]==$pword))
                {
                    $flag = 1;
                    if (mysqli_num_rows($res) > 0) {
                        while ($row1 = mysqli_fetch_assoc($res)) {
                            if ($row1["username_value"]==$uname) {
                                $page = 0;
                                break;
                            }
                            else{
                                $page = 1;
                                
                            }
                        }
                    }
                    if  ($page == 0)  
                    {   
                        if (isset($_POST["submit"])) {
                            header("Location:modules.html");

                        }
                    }
                    if ($page == 1) {
                        if (isset($_POST["submit"])) {
                             header("Location:bmi.html");

                        }
                    }
                    if($uname=='admin'){
                    header("Location:admin.html");
                    }
                    
                   
                }
            }
        }

        if($flag ==  0)
        {
            include 'result_false.html';
           // echo "No Such User Available";
        }
        
    }
    mysqli_close($conn);
?>