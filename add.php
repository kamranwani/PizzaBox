<?php
$email=$pizzaType=$ingredients='';
$errors=array("email"=>'',"pizzaType"=>'',"ingredients"=>'');
if(isset($_POST['submit'])){
    if(empty($_POST['email'])){
        $errors['email'] ="Enter Email";
    }else{
        $email= htmlspecialchars($_POST['email']);
    }   
    if(empty($_POST['pizza'])){
        echo "Enter Pizza Type";
    }else{
        $pizzaType= htmlspecialchars($_POST['pizza']);
        if(!preg_match('/^[a-zA-Z]+$/',$pizzaType)){
            $errors['pizzaType']= "Enter a Valid Pizza Title";
        };
    } 
    if(empty($_POST['ingredients'])){
        echo "Enter Ingredients";
    }else{
        $ingredients= htmlspecialchars($_POST['ingredients']);
         if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/',$ingredients)){
            $errors['ingredients']= "Enter Valid Ingredients";
        };
    }  
    if(array_filter($errors)){
        echo 'There are Errors in the form';
    }  else{
        header('Location: index.php');
    } 
}
?>

<!DOCTYPE html>
<html lang="en">

    <?php include'Templates/header.php';?>

    <section class="formContainer">
        <h2>Add a Pizza</h2>
        <form action="add.php" method="POST">
            <label>Enter Email</label>
            <input type="email"  name="email" required value='<?php echo $email;?>'>
            <div class="errMsg"><?php echo $errors['email'];?></div>
            <label>Pizza Tittle</label>
            <input type="text"  name="pizza" required value='<?php echo $pizzaType;?>'>
            <div class="errMsg"><?php echo $errors['pizzaType'];?></div>
            <label>Enter Ingredients</label>
            <input type="text"  name="ingredients" required value='<?php echo $ingredients;?>'>
            <div class="errMsg"><?php echo $errors['ingredients'];?></div>
            <div class="submit">
                <input type="submit" name="submit" value="SUBMIT"/>
            </div>
        </form>
    </section>

    <?php include'Templates/footer.php';?>

</html>