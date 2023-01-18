<?php
include('config/db_connect.php');

if(isset($_POST['delete'])){
    $Del_id=mysqli_real_escape_string($connect,$_POST['Del_id']);
    $sql="DELETE FROM pizzas WHERE id =$Del_id";

    if(mysqli_query($connect,$sql)){
        header("Location:index.php");
    }else{
        echo 'query error' . mysqli_error($connect);
    }
}

if(isset($_GET['id'])){
    $id=mysqli_real_escape_string($connect,$_GET['id']);

    $sql="SELECT * FROM pizzas WHERE id=$id";

    $result=mysqli_query($connect,$sql);

    $pizza=mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    mysqli_close($connect);
}

?>

<!DOCTYPE html>
<html lang="en">

<?php include'Templates/header.php';?>
<div class="singlePizzaCard">
    <h2><?php echo $pizza['title']?></h2>
    <ul>
       <?php foreach(explode(',', $pizza['ingredients']) as $ing): ?>
            <li><?php echo $ing;?></li>
        <?php endforeach; ?>
    <ul>
    <p><?php echo $pizza['email']?></p>
    <p>Card was created at: s<?php echo $pizza['created_at']?></p>

    <form action="details.php" method="POST">
        <input type="hidden" name="Del_id" value="<?php echo $pizza['id'];?>">
        <input type="submit" name="delete" value="DELETE">
    </form>
</div>
<?php include'Templates/footer.php';?>

</html>