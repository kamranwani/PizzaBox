<?php
//connecting DB
$connect = mysqli_connect('localhost','Kamran','test123','pizza_box');

//checking DB connection
if(!$connect){
    echo 'connection unstable' . mysqli_connect_error();
}

//writing queries for data in the table
$sql= 'SELECT title, ingredients, email FROM pizzas ORDER BY created_at';

//fetching result 
$result=mysqli_query($connect,$sql);

//fetching data from result & transforming resut into array
$pizzas=mysqli_fetch_all($result, MYSQLI_ASSOC);

//freeing memory result
mysqli_free_result($result);

//cclose conn

mysqli_close($connect);


?>

<!DOCTYPE html>
<html lang="en">
    <?php include'Templates/header.php';?>

    <div class="wrapper">
        <?php foreach($pizzas as $pizza){ ?>
            <div class="pizzaCard">
                <div class="pizzaCardCon">
                    <h2><?php echo $pizza['title'];?></h2>
                    <p><?php echo $pizza['ingredients'];?></p>
                </div>

                <div class="moreInfo">
                    <input type="button" value='MORE INFO'>
                </div>
            </div>
        <?php } ?>
    </div>

    <?php include'Templates/footer.php';?>
</html>