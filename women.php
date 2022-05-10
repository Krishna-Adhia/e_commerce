<!DOCTYPE html>
<html lang="en">
<head>
	<title>Women Shop</title>
	<?php
		include_once 'include/header.php';
		include_once 'include/db_connection.php';
	?>


	
	<!-- Product -->
	<div class="bg0 p-t-75 p-b-85">
		<div class="container">
			<div class="row">
				<div class="flex-w flex-sb-m p-b-52">
					<div class="flex-w flex-l-m filter-tope-group m-tb-10">
						<a href="product.php" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter="*">
							All Products
						</a>

						<a href="women.php" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter="*">
							Women
						</a>

						<a href="men.php" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter="*">
							Men
						</a>
					</div>
				</div>
			</div>
		</div>

		<div class = "container">
			<div class="row">
			<?php
				$select_product = "SELECT * FROM product WHERE Product_Gender = 'Female'";
				$result = mysqli_query($connection,$select_product) or mysqli_error($connection);
				$row = mysqli_fetch_assoc($result);
				foreach($result as $row)
        		{
			?>
				
					<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
							<!-- Block2 -->
							<div class="block2">
								<div class="block2-pic hov-img0">
									<img src="Admin/product/<?php echo($row['Product']);?>" alt="IMG-PRODUCT">
								</div>

								<div class="block2-txt flex-w flex-t p-t-14">
									<div class="block2-txt-child1 flex-col-l ">
										<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
											<?php echo $row['Product_Name'];?>
										</a>

										<span class="stext-105 cl3">
											<?php echo '$'. $row['Product_Price'];?>
										</span>
									</div>

									<div class="block2-txt-child2 flex-col-1">
										<a href="con_wishlistinsert.php?<?php echo 'ID='.$row['Product_ID']?>">
											<i class="fa fa-heart-o" style="font-size:20px;color:red"></i>
										</a>
										<a href="con_cartinsert.php?<?php echo 'ID='.$row['Product_ID']?>">
											<i class="fa fa-shopping-cart" style="font-size:20px;color:gray;"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					
			<?php
				}
			?>
			</div>
		</div>
	</div>
		

	<!-- Footer -->
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
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/slick/slick.min.js"></script>
	<script src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script src="vendor/parallax100/parallax100.js"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/sweetalert/sweetalert.min.js"></script>
	<script>
		$('.js-addwish-b2, .js-addwish-detail').on('click', function(e){
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function(){
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});
	
	</script>
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