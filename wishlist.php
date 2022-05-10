<!DOCTYPE html>
<html lang="en">
<head>
	<title>Wishlist</title>
	<style>
		.p-t-75, .p-tb-85, .p-all-85{
			padding-top: 100px;
		}
	</style>

<?php
	include_once 'include/common.php';
	include_once 'include/header.php';
?>

	
	<!-- wishlist -->
	<form class="bg0 p-t-75 p-b-85">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-10 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--20 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Product</th>
									<th class="column-2"></th>
									<th class="column-3">Price</th>
								</tr>
								<?php
									$User_ID = $_SESSION['User_ID'];
									include_once 'include/db_connection.php';
									$select = "SELECT * FROM wishlist WHERE User_ID = $User_ID";
									$result = mysqli_query($connection,$select) or die(mysqli_error($connection));
									$row = mysqli_fetch_assoc($result);
									foreach($result as $row)
									{
								?>

								<tr class="table_row">
									<td class="column-1">
										<div class="how-itemcart1">
											<img src="admin/product/<?php echo $row['Product'];?>" alt="IMG">
										</div>
									</td>
									<td class="column-2"><?php echo $row['Product_Name'];?></td>
									<td class="column-3">
										<?php echo $row['Product_Price'];?>
									</td>
									<td class="column-4">
										<div class="block2-txt-child2 flex-col-1">
											<a href="con_wishlisttocart.php?<?php echo 'Product_ID='. $row['Product_ID'];?>">
												<i class="fa fa-shopping-cart" style="font-size:20px;color:blue;"></i>
											</a>
										</div>
									</td>

									<td class="column-5">
										<div class="block2-txt-child2 flex-col-1">
											<a href="con_wishlistdelete.php?<?php echo 'Product_ID='. $row['Product_ID'];?>">
												<i class="fa fa-trash" style="font-size:20px;color:red;"></i>
											</a>
										</div>
									</td>
								</tr>
								<?php
									}
								?>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
		

	<?php
		include_once 'include/footer.php';
	?>

	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

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
	<script src="js/main.js"></script>

</body>
</html>