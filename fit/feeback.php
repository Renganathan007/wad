<!DOCTYPE html>
<?php
    ob_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "fitness";
    $conn = mysqli_connect($servername, $username, $password, $db);
    if(!$conn){     
        die("Connection failed: ".mysqli_connect_error());
    }
    if (isset($_POST['user_name'])) {
    $uname = $_POST['user_name'];
    $email = $_POST['email_id'];
    $pnumber = $_POST['PhoneNumber'];
    $feedback = $_POST['feedback'];
    $rate = $_POST['rates'];
    $extract_sql = "SELECT * FROM feedback";
    $result = mysqli_query($conn, $extract_sql);
    if (mysqli_num_rows($result) > 0) 
        {
            while($row = mysqli_fetch_assoc($result)) 
            {
                    if($row["username_value"]==$uname)
                    {
                        $flag=0;
                        break;
                    }
                    else{
                        $flag=1;
                        
                    }
            }
        }
        if($flag==1)
        {
            $insert = "INSERT INTO feedback(username_value,email_ID,ph_number,feedback,rating) VALUES('$uname','$email',$pnumber,'$feedback',$rate)";
                        if(isset($_POST["submit"])) {
                            header("Location:aboutus.html");
                        }
        }
        if($flag==0)
        {
            $insert="UPDATE feedback set feedback='$feedback',rating=$rate where username_value='$uname'";
            if(isset($_POST["submit"]))
            {
               header("Location:home.html");
            }
        }
    if (!mysqli_query($conn, $insert)) {
        echo "Error: " . $insert . "<br>" . mysqli_error($conn);
    }
    }
    mysqli_close($conn);

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contact</title>
    <style>
        body {
        }
        
        * {
            box-sizing: border-box;
        }
        /* Style inputs */
        
        input[type=text],
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            margin-top: 6px;
            margin-bottom: 16px;
            resize: vertical;
        }
        
        input[type=submit] {
            background-color: #04AA6D;
            align-content: center;
            color: white;
            padding: 12px 20px;
            border: none;
            cursor: pointer;
        }
        
        input[type=submit]:hover {
            background-color: #61d368;
        }
        /* Style the container/contact section */
        
        .container {
            border-radius: 5px;
            background-color:#182747;
            padding: 10px;
            color: #ccc;
        }
        /* Create two columns that float next to eachother */
        
        .column {
            float: left;
            width: 50%;
            margin-top: 6px;
            padding: 20px;
        }
        /* Clear floats after the columns */
        
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
        /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
        
        @media screen and (max-width: 600px) {
            .column,
            input[type=submit] {
                width: 100%;
                margin-top: 0;
            }
        }
        
        * {
            margin: 0;
            padding: 0;
        }
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: rgb(238, 234, 221);
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
        h1 {
            background-color: #FFDAAF;
            color: navy;
            margin-left: 300px;
            margin-right: 300px;
            border-radius: 2px;
            height: 40px;
            padding-top: 0px;
            text-align: center;
        }
        
        /* .rate {
            float: left;
            height: 46px;
            padding: 0 10px;
        }
        
        .rate:not(:checked)>input {
            position: absolute;
            top: -9999px;
        }
        
        .rate:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ccc;
        }
        
        .rate:not(:checked)>label:before {
            content: '★ ';
        }
        
        .rate>input:checked~label {
            color: #ffc700;
        }
        
        .rate:not(:checked)>label:hover,
        .rate:not(:checked)>label:hover~label {
            color: #deb217;
        }
        
        .rate>input:checked+label:hover,
        .rate>input:checked+label:hover~label,
        .rate>input:checked~label:hover,
        .rate>input:checked~label:hover~label,
        .rate>label:hover~input:checked~label {
            color: #c59b08;
        } */
        /* .rating span {
            font-size: 25px;
            cursor: pointer;
            color: gainsboro;
        }
        
        .rating span.active {
            color: #ffc400;
        } */
    </style>
</head>

<body >
<ul>
        <li><a class="active" href="home.html">HOME</a></li>
        <li><a href="aboutus.html">ABOUTUS</a></li>
        <li><a href="signup.php">SIGNUP</a></li>
        <li><a href="signin.php">SIGNIN</a></li>
        <li><a href="Gallery.html">GALLERY</a></li>
        <li><a href="feedback.php">FEEDBACK</a></li>
        
</ul>
    <div class="container">
        <div style="text-align:center">
            <h1>Feedback</h1>
        </div>
        <div class="row">
            <div class="column">
                <br><br>
                <img src="con3.jpg" style="width:750px;height:400px">
            </div>
            <div class="column">
                <form action="feeback.php" method="POST">
                    <label for="name"> Name</label>
                    <input type="text" id="name" name="user_name" pattern="[a-zA-Z]+" placeholder="Your name..">
                    <label for="emailid">Email ID</label>
                    <input type="email" id="email" name="email_id" placeholder="Your email address.." style="height:40px;width:720px"><br><br>
                    <label for="phoneNumber">Phone Number</label>
                    <input type="tel" id="PhoneNum" name="PhoneNumber" pattern="[9876][0-9]{9}" placeholder="Your contact number.." style="height:40px;width:720px"><br><br>
                    <label for="feedback">Feedback</label>
                    <textarea id="feedback" name="feedback" placeholder="Write your feedback.." style="height:170px"></textarea>
                    <div class="rate">
                        <p>Ratings</p>
                        <input type="radio" id="star5" name="rates" value="5">
                        <label for="star1" title="text">5 stars</label>
                        <input type="radio" id="star4" name="rates" value="4">
                        <label for="star5" title="text">4 stars</label>
                        <input type="radio" id="star3" name="rates" value="3">
                        <label for="star4" title="text">3 stars</label>
                        <input type="radio" id="star2" name="rates" value="2">
                        <label for="star3" title="text">2 stars</label>
                        <input type="radio" id="star1" name="rates" value="1">
                        <label for="star2" title="text">1 star</label>
                        
                    </div><br><br><br><br><br> &emsp13;
                    <!-- <div class="rating">
                        Rate
                        <span onclick="processRating(this)" name="rate" id="star-1" data-index="1" value="1" data-status="0">★</span>
                        <span onclick="processRating(this)" name="rate" id="star-2" data-index="2" value="2" data-status="0">★</span>
                        <span onclick="processRating(this)" name="rate" id="star-3" data-index="3" value="3" data-status="0">★</span>
                        <span onclick="processRating(this)" name="rate" id="star-4" data-index="4" value="4" data-status="0">★</span>
                        <span onclick="processRating(this)" name="rate" id="star-5" data-index="5" value="5" data-status="0">★</span>
                    </div> -->
                    <input type="submit" id="submit" name="submit" value="Send Feedback">
                </form>

            </div>
        </div>
    </div>
</body>
<!-- <script>
    function processRating(obj) {
        let index = parseInt(obj.dataset.index);
        let status = parseInt(obj.dataset.status);
        if (status === 0) {
            for (let counter = index; counter >= 1; counter--) {
                let element = document.getElementById("star-" + counter);
                element.dataset.status = 1;
                element.classList.add("active");
            }
        } else {
            for (let counter = index; counter <= 5; counter++) {
                let element = document.getElementById("star-" + counter);
                element.dataset.status = 0;
                element.classList.remove("active");
            }
        }
        //         document.getElementById("displayRating").innerHTML = `Thank you for rating of
        // ${status == 0 ? index : index - 1}. We are keep improving.`;
    }
</script> -->

</html>

