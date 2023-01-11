<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contact</title>
    <style>
        body {
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Verdana, sans-serif;
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
            background-color: #989494;
            padding: 10px;
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

<body style="background-color: #989494;">
    <div class="container">
        <div style="text-align:center">
            <h2>Contact Us</h2>
        </div>
        <div class="row">
            <div class="column">
                <br><br>
                <img src="con3.jpg" style="width:750px;height:400px">
            </div>
            <div class="column">
                <form action="contact.php" action="POST">
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
                        <label for="star1" title="text">5 star</label>
                        <input type="radio" id="star5" name="rates" value="5">
                        <label for="star5" title="text">4 stars</label>
                        <input type="radio" id="star4" name="rates" value="4">
                        <label for="star4" title="text">3 stars</label>
                        <input type="radio" id="star3" name="rates" value="3">
                        <label for="star3" title="text">2 stars</label>
                        <input type="radio" id="star2" name="rates" value="2">
                        <label for="star2" title="text">1 stars</label>
                        <input type="radio" id="star1" name="rates" value="1">
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
    $email = $_POST['email_id'];
    $pnumber = $_POST['PhoneNumber'];
    $feedback = $_POST['feedback'];
    $rate = $_POST['rates'];
    $insert_sql ="INSERT INTO feedback(username_value,email_ID, ph_number,feedback,rating) VALUES('$uname','$email',$pnumber,'$feedback',$rate)";
  
}
 if(!mysqli_query($conn, $insert_sql)) {
    echo "Error: " . $insert_sql . "<br>" . mysqli_error($conn);
} 
 
 mysqli_close($conn);

?>
