<?php
session_start();
include"db.php";
if(isset($_POST["category"])){
	$category_query="select * from categories";
	$run_query=mysqli_query($con,$category_query);
	echo "<div class='nav nav-pills nav-stacked'>
					<li class='active'><a href='#'><h4>Categories</h4></a></li>";
	if(mysqli_num_rows($run_query)>0){
		while ($row=mysqli_fetch_array($run_query)) {
			# code...
			$cid=$row["cat_id"];
			$cat_name=$row["cat_title"];
			echo "
			<li><a href='#' class='category' cid='$cid'>$cat_name</a></li>";
		}
		echo "</div>";
	}
}

if(isset($_POST["brand"])){
	$brand_query="select * from brands";
	$run_query=mysqli_query($con,$brand_query);
	echo "<div class='nav nav-pills nav-stacked'>
					<li class='active'><a href='#'><h4>Brand</h4></a></li>";
	if(mysqli_num_rows($run_query)>0){
		while ($row=mysqli_fetch_array($run_query)) {
			# code...
			$bid=$row["brand_id"];
			$brand_name=$row["brand_title"];
			echo "
			<li><a href='#' class='selectBrand' bid='$bid'>$brand_name</a></li>
			";
		}
		echo "</div>";
	}
}

if(isset($_POST["getProduct"])){
	$product_query="select * from products ORDER BY RAND() LIMIT 0,9";
	$run_query=mysqli_query($con,$product_query);
	if (mysqli_num_rows($run_query)>0) {
		# code...
		while ($row=mysqli_fetch_array($run_query)) {
			# code...
			$pro_id=$row['product_id'];
			$pro_cat=$row['product_cat'];
			$pro_brand=$row['product_brand'];
			$pro_title=$row['product_title'];
			$pro_price=$row['product_price'];
			$pro_image=$row['product_image'];
			echo "
			 <div class='col-md-4'>
							<div class='panel panel-info'>
								<div class='panel-heading'>$pro_title</div>
								<div class='panel-body'>
									<img src='images/$pro_image' class='img-responsive' style='width:170px;height:250px;'>
									
								</div>
								<div class='panel-heading'>$.$pro_price
									<button pid='$pro_id' style='float: right;' id='product' class='btn btn-danger btn-xs'>Add To Cart</button>
								</div>
								
							</div>
						</div>";
		}
	}

}
if(isset($_POST['get_selected_category']) || isset($_POST['selectBrand']) ||isset($_POST["search"])){
	if(isset($_POST['get_selected_category'])){

	$id=$_POST['cat_id'];
	$sql="select * from products where product_cat='$id'";
}elseif (isset($_POST["selectBrand"])) {
		# code...
		$id=$_POST["brand_id"];
		$sql ="select * from products where product_brand = '$id'";
	}

else{
$keyword=$_POST["keyword"];
		$sql ="select * from products where product_keywords LIKE '%$keyword%'";
}
	$run_query=mysqli_query($con,$sql);
	while($row=mysqli_fetch_array($run_query)){
		$pro_id=$row['product_id'];
		$pro_cat=$row['product_cat'];
		$pro_brand=$row['product_brand'];
		$pro_title=$row['product_title'];
		$pro_price=$row['product_price'];
		$pro_image=$row['product_image'];
			echo "
			 <div class='col-md-4'>
							<div class='panel panel-info'>
								<div class='panel-heading'>$pro_title</div>
								<div class='panel-body'>
									<img src='images/$pro_image' class='img-responsive' style='width:170px;height:250px;'>
									
								</div>
								<div class='panel-heading'>$.$pro_price
									<button pid='$pro_id' style='float: right;' id='product' class='btn btn-danger btn-xs'>Add To Cart</button>
								</div>
								
							</div>
						</div>";
	}
}


if(isset($_POST["addToProduct"])){
	$p_id=$_POST["proId"];
	$user_id=$_SESSION["uid"];
	$sql="select * from cart where p_id='$p_id' AND user_id='$user_id'";
	$run_query=mysqli_query($con,$sql);
	$count=mysqli_num_rows($run_query);
	if($count > 0){
		
				echo"<div class='alert alert-danger'>
	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Product is already added to cart continue shopping...!</b>
	</div>";
	}else{
		$sql="select * from products where product_id='$p_id'";
		$run_query=mysqli_query($con,$sql);
		$row=mysqli_fetch_array($run_query);
			$id=$row["product_id"];
			$pro_name=$row["product_title"];
			$pro_image=$row["product_image"];
			$pro_price=$row["product_price"];
			$sql="INSERT INTO `shopping`.`cart` 
			(`id`, `p_id`, `ip_add`, `user_id`, `product_title`, `product_image`, `qty`, `price`, `total_amount`) 
			VALUES (NULL, '$p_id', '0', '$user_id', '$pro_name', 
			'$pro_image', '1', '$pro_price', '$pro_price')";
			if(mysqli_query($con,$sql)){

				echo"<div class='alert alert-success'>
	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Product is Added...!</b>
	</div>";
			}
	}


}

if(isset($_POST['get_cart_product']) || isset($_POST['cart_checkout'])){
	$uid=$_SESSION['uid'];
	$sql="select * from cart where user_id='$uid'";
	$run_query=mysqli_query($con,$sql);
	$count=mysqli_num_rows($run_query);
	if($count >0){
		$no=1;
		$total_amt=0;
		while ($row=mysqli_fetch_array($run_query)) {
			# code...
			$id=$row["id"];
			$pro_id=$row["p_id"];
			$pro_name=$row["product_title"];
			$pro_image=$row["product_image"];
			$qty=$row["qty"];
			$pro_price=$row["price"];
			$total=$row["total_amount"];
			$price_array=array($total);
			$total_sum=array_sum($price_array);
			$total_amt=$total_amt+$total_sum;
			if(isset($_POST['get_cart_product'])){
echo " <div class='row'>
                  <div class='col-md-3'>$no</div>
                  <div class='col-md-3'><img src='images/$pro_image' width='60px' height='50px'></div>
                  <div class='col-md-3'>$pro_name</div>
                  <div class='col-md-3'>$.$pro_price.00</div>
                </div>";
                $no++;
			}else{
				echo "<div class='row'>
                <div class='col-md-2'>
                  <div class='btn-group'>
                    <a href='#' remove_id='$pro_id' class='btn btn-danger remove'><span class='glyphicon glyphicon-trash'></span></a>
                    <a href='#' update_id='$pro_id' class='btn btn-primary update'><span class='glyphicon glyphicon-ok-sign'></span></a>
                    
                  </div>
                </div>
                <div class='col-md-2'><img src='images/$pro_image' width='50px' height='60px'></div>
                <div class='col-md-2'>$pro_name</div>
                <div class='col-md-2'><input type='text'  class='form-control qty' pid='$pro_id' id='qty-$pro_id' value='$qty'></div>
                <div class='col-md-2'><input type='text' class='form-control price' pid='$pro_id' id='price-$pro_id' value='$pro_price' disabled></div>
                <div class='col-md-2'><input type='text' class='form-control total' pid='$pro_id' id='total-$pro_id' value='$total' disabled></div>
              </div>";

			}

			


		}
		if(isset($_POST['cart_checkout'])){
			echo "<div class='row'>
                <div class='col-md-8'></div>
                <div class='col-md-4'>
                  <b> Total $.$total_amt</b>
                  
                </div>
                
              </div>";
		}
	}
}

if(isset($_POST['removeFromCart'])){
	$pid=$_POST['removeId'];
	$uid=$_SESSION['uid'];
	$sql="delete from cart where user_id='$uid' and p_id='$pid'";
	$run_query=mysqli_query($con,$sql);
	if($run_query){

				echo"<div class='alert alert-success'>
	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Product is Removed From Cart...!</b>
	</div>";
	}
}

if(isset($_POST['updateProduct'])){
	$uid=$_SESSION['uid'];
	$pid=$_POST['updateId'];
	$qty=$_POST['qty'];
	$price=$_POST['price'];
	$total=$_POST['total'];
	$sql="update cart set qty='$qty',price='$price',total_amount='$total' where user_id='$uid' and p_id='$pid'";
	$run_query=mysqli_query($con,$sql);
	if($run_query){
		echo"<div class='alert alert-success'>
	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Product is Updated Continue to Shopping...!</b>
	</div>";
	}
}



?>