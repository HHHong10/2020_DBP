<?php
    $link = mysqli_connect("localhost", "admin", "admin", "googleps");
    if(mysqli_connect_errno()){
        echo "Failed to connect to MariaDB: " . mysqli_connect_error();
        exit();
    }    

    settype($_GET['age'], 'integer');
    $filtered_age = mysqli_real_escape_string($link, $_GET['age']);
    
    $query = "SELECT * FROM gps WHERE content_rating=0 OR content_rating <= ".$filtered_age;
    $result = mysqli_query($link, $query);

    $app_info = '';
    while($row = mysqli_fetch_array($result)) {
        $app_info .= '<tr>';
        $app_info .= '<td>'.$row['app'].'</td>'; 
        $app_info .= '<td>'.$row['category'].'</td>'; 
        $app_info .= '<td>'.$row['rating'].'</td>'; 
        $app_info .= '<td>'.$row['review'].'</td>'; 
        $app_info .= '<td>'.$row['price'].'</td>'; 
        $app_info .= '<td>'.$row['content_rating'].'</td>'; 
        $app_info .= '<tr>';
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>  </title>
        <style>
            body{
                font-family: Consolas, monospace;
                font-family: 12px;
            }
            table{
                width: 100%;
            }
            th, td{
                padding: 10px;
                border-bottom: 1px solid #dadada;
            }
        </style>
</head>

<body>
    <h2><a href="googleplaystore.php">구글 플레이 스토어 앱 추천기</a> | Content Rating </h2>
        <table border="1">
        <tr>
            <th>APP NAME</th>
            <th>CATEGORY</th>
            <th>RATING</th>
            <th>REVIEW</th>
            <th>PRICE($)</th>
            <th>CONTENT RATING<br>
        </tr>
        <?=$app_info?>
    </table>
</body>
</html>
