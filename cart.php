<!DOCTYPE html>
<html lang="en">
<head>
	<title>Cart</title>
	<meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Ensures optimal rendering on mobile devices. -->
  	<meta http-equiv="X-UA-Compatible" content="IE=edge" /> <!-- Optimal Internet Explorer compatibility -->

<?php

	include_once 'include/common.php';
	include_once 'include/header.php';
?>



	<!-- Shoping Cart -->
	<form class="bg0 p-t-75 p-b-85" method="POST" action="con_orderinsert.php">
		<div class="container">
			<div class="row">
				<div class=" col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--60 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<div class = "table-responsive"> 	
								<table class="table-shopping-cart">
									<tr class="table_head">
										<th class="column-1">Product</th>
										<th class="column-2"></th>
										<th class="column-3">Price</th>
										<th class="column-4">Quantity</th>
										<th class="column-5">Total</th>
									</tr>
									<?php
										$User_ID = $_SESSION['User_ID'];
										include_once 'include/db_connection.php';
										$cartTotal = 0;
										$select = "SELECT * FROM cart WHERE User_ID = $User_ID";
										$result = mysqli_query($connection,$select) or die(mysqli_error($connection));
										$row = mysqli_fetch_assoc($result);
										foreach($result as $row)
										{
											$cartTotal += $row['Product_Price'];
											

									?>
									<tr class="table_row">
										<td class="column-1">
											<div class="how-itemcart1">
												<img src="Admin/product/<?php echo $row['Product'];?>" alt="IMG">
											</div>
										</td>
										<td class="column-2">
											<p><?php echo $row['Product_Name'];?></p>
										</td>
										<td class="column-3">
											<p class ="product_price<?php echo($row['Number']); ?>"><?php echo $row['Product_Price'];?></p>
										</td>

										<td class="column-4">
											<div class="wrap-num-product flex-w m-l-auto m-r-0">
												<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m minus-button" value="<?php echo($row['Number']); ?>">
													<i class="fs-16 zmdi zmdi-minus"></i> 
												</div>

												<input class="mtext-104 cl3 txt-center num-product total_product<?php echo($row['Number']); ?>" type="number" value="1">

												<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m plus-button" value="<?php echo($row['Number']); ?>">
													<i class="fs-16 zmdi zmdi-plus"></i>
												</div>
											</div>
										</td>


										<td class="column-5 subtotal_price<?php echo($row['Number']); ?>"> 
										</td>
									
									<td class="column-4">
											<div class="block2-txt-child2 flex-col-1">
												<a href="con_carttowishlist.php?<?php echo 'Product_ID='. $row['Product_ID'];?>">
													<i class="fa fa-heart-o" style="font-size:20px;color:blue"></i>
												</a>
											</div>
										</td>

										<td class="column-5">
											<div class="block2-txt-child2 flex-col-1">
												<a href="con_cartdelete.php?<?php echo 'Product_ID='. $row['Product_ID'];?>">
													<i class="fa fa-trash" style="font-size:20px;color:red;"></i>
												</a>
											</div>
										</td>
									<?php
									}
									?>
								</table>
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Cart Total
						</h4>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="cart_total">
									Total: <b><span id="cart-total"><?php echo $cartTotal;?></span></b>

								</span>
							</div>
						</div>

						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span>
									Shipping Charges :
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								<span>
									$0
								</span>
								
								<div class="p-t-15">
									<span class="stext-112 cl8">
										Shipping Address
									</span>

									<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="country" placeholder="Country">
									</div>

									<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="state" placeholder="State">
									</div>

									<div class="bor8 bg0 m-b-22">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="postcode" placeholder="Postcode / Zip">
									</div>

									<div class="bor8 bg0 m-b-22">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="hidden" name="cart_total_input">
									</div>

									<div>
										<input class = "btn btn-primary" type="submit" name="submit">
									</div>
								</div>
							</div>
						</div>

						<!-- paypal start -->

						<div id="paypal-button-container"></div>

						<!-- paypal end -->
					</div>
				</div>
			</div>
		</div>
	</form>
	<?php
		include_once 'include/footer.php';
	?>
	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	
	<script>
		
		var cartTotal = <?php echo $cartTotal; ?>;
	

		$('.plus-button').click(function() {
			id = $(this).attr('value');
		  var val1 = $(".total_product"+id).val();
		  var val2 = $(".product_price"+id).text();
		  var subtotal = (parseInt(val1)+1)*parseFloat(val2);
		  $(".subtotal_price"+id).empty(subtotal);
			$(".subtotal_price"+id).append(subtotal);
			cartTotal = parseInt(cartTotal) + parseInt(val2);
			$("#cart-total").empty();
			$("#cart-total").append(cartTotal);
			$("input[name=cart_total_input]").attr("value",cartTotal);
			$("#checkout-button").attr("href","checkout.php?total="+cartTotal);
			
		});

		$('.minus-button').click(function() {	
			id = $(this).attr('value');
			var val1 = $(".total_product"+id).val();
			var val2 = $(".product_price"+id).text();
			var subtotal = (parseInt(val1)-1)*parseFloat(val2);
			$(".subtotal_price"+id).empty(subtotal);
			$(".subtotal_price"+id).append(subtotal);  
			cartTotal = parseInt(cartTotal) - parseInt(val2);
			$("#cart-total").empty();
			$("#cart-total").append (cartTotal);
			$("input[name=cart_total_input]").attr("value",cartTotal);
			$("#checkout-button").attr("href","checkout.php?total="+cartTotal);
			    
		});

	</script>

	<script src="js/main.js"></script>
</body>
</html>