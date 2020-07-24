<?php
    $host = "local_url";
    $user = "local_usr";
    $password = "sql_pass";
    $database = "db_name";

    if (isset($_GET['pageno'])) {
        $pageno = $_GET['pageno'];
    } else {
        $pageno = 1;
    }

    $no_of_records_per_page = 2;
    $offset = ($pageno-1) * $no_of_records_per_page;

    $conn=mysqli_connect($host,$user,$password,$database);

    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        die();
    }

    $total_pages_sql = "SELECT COUNT(*) FROM games";
    $result = mysqli_query($conn,$total_pages_sql);
    $total_rows = mysqli_fetch_array($result)[0];
    $total_pages = ceil($total_rows / $no_of_records_per_page);

    if ($total_pages < 1) {
        $total_pages = 5;
    }
        
    $sql = "SELECT * FROM games LIMIT $offset, $no_of_records_per_page";
    $res_data = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($res_data)){
        //DATA GOES HERE(?)
    }
    mysqli_close($conn);
?>
