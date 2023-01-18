<?php
include'config/db_connect.php';

//writing queries for data in the table
$sql= 'SELECT id, title, ingredients, email FROM pizzas ORDER BY created_at';

//fetching result 
$result=mysqli_query($connect,$sql);

//fetching data from result & transforming resut into array
$pizzas=mysqli_fetch_all($result, MYSQLI_ASSOC);

    // print_r($pizzas);

//freeing memory result
mysqli_free_result($result);

//close conn

mysqli_close($connect);

?>

<!DOCTYPE html>
<html lang="en">
    <?php include'Templates/header.php';?>

    <div class="wrapper">


    <!-- <pre>
    <?php // print_r($pizzas);die; ?>
</pre> -->
        <?php foreach($pizzas as $pizza):?>
            <div class="pizzaCard">
                <div class="pizzaCardCon">
                    <h2><?php echo $pizza['title'];?></h2>
                    <ul class='pizza_LI'>   
                        <?php foreach(explode(',', $pizza['ingredients']) as $ing): ?>
                             <li><?php echo $ing;?></li>
                         <?php endforeach; ?>  
                    </ul>
                </div>
                <div class="moreInfo">
                    <a class='moreInfo' href="details.php?id=<?php echo $pizza['id']?>">More Info</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <?php include'Templates/footer.php';?>
</html>