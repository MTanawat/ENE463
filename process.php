<?php include 'connect.php'; ?>
<?php
    $country = $_POST['Country'];
    $city = $_POST['City'];
    $content = $_POST['Content'];
    $file = $_POST['image'];

    

    mysqli_query($connect, "INSERT INTO travel (Country,City,Content,image_file)
                            VALUES('$country','$city','$content','$file')");

    if (mysqli_affected_rows($connect)>0){
        echo '<p>data added</p>';
        echo '<a href ="index.php">Back to home</a>';
    }else{
        echo 'No data added';
        echo mysqli_error($connect);
    }
?>