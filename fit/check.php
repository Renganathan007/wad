
<?php

echo "hello";

    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "fitness";

    $conn = mysqli_connect($servername, $username, $password, $db);

    if(!$conn){
        die("Connection failed: ".mysqli_connect_error());
    }



    $extract_sql = "SELECT * FROM register";

    
    $extract_sql1 = "SELECT * FROM bmi";

    $result = mysqli_query($conn, $extract_sql);
    print_r( $result);
    $result1 = mysqli_query($conn, $extract_sql1);
    print_r( $result1);


    echo "hello";

    print_r($result1);

        ?>
