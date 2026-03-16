<?php include("config.php"); ?>
<!DOCTYPE html>
<html>
<head>
<title>Online Book Shop</title>

<style>
body{
font-family: Arial, sans-serif;
background:#f5f5f5;
margin:0;
text-align:center;
}

h1{
background:#2c3e50;
color:white;
padding:20px;
margin:0;
}

.nav{
margin:20px;
}

.nav a{
text-decoration:none;
margin:10px;
color:#2c3e50;
font-weight:bold;
}

.container{
display:flex;
justify-content:center;
gap:30px;
margin-top:30px;
}

.book{
background:white;
width:220px;
padding:15px;
border-radius:8px;
box-shadow:0px 4px 10px rgba(0,0,0,0.1);
}

.book img{
width:180px;
height:120px;
border-radius:5px;
}

button{
background:#27ae60;
color:white;
border:none;
padding:8px 15px;
border-radius:5px;
cursor:pointer;
}

button:hover{
background:#1e8449;
}
</style>
</head>

<body>

<h1>Online Book Shopping</h1>

<a href="index.php">Home</a>|
<a href="login.php">Login</a>|
<a href="cart.php">
    <button>View Cart</button>
</a>


<hr>

<?php
$result = mysqli_query($conn,"SELECT * FROM books");

while($row = mysqli_fetch_assoc($result)){
?>

<div style="border:1px solid gray;width:200px;padding:10px;margin:10px;display:inline-block">

<img src="images/<?php echo $row['image']; ?>" width="150">

<h3><?php echo $row['title']; ?></h3>
<p>Author: <?php echo $row['author']; ?></p>
<p>Price: ₹<?php echo $row['price']; ?></p>

<form action="cart.php" method="post">
<input type="hidden" name="title" value="<?php echo $row['title']; ?>">
<input type="hidden" name="price" value="<?php echo $row['price']; ?>">
<button type="submit">Add to Cart</button>
</form>

</div>

<?php } ?>

</body>
</html>
