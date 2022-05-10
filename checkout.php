<!DOCTYPE html>
<html lang="en">
<head>
	<title>Checkout</title>

<?php
	include 'include/common.php';
	include_once 'include/header.php';
	$total = $_GET['total'];
?>
	<!-- Content page -->
	<section class="bg0 p-t-104 p-b-116">
		<div class="container">
			<div class="flex-w flex-tr">
				<h4 class="mtext-105 cl2 txt-center p-b-30">
					Checkout
				</h4>
						<!-- paypal start -->

						<div id="paypal-button-container"></div>

						<!-- paypal end -->
				</div>
			</div>
		</section>

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

	<script>
		$(".paypal-button-label-container").click(function(event)
		{
			alert("done");
			event.stopPropagation();
		});
	</script>
<!--===============================================================================================-->

	<script src="js/main.js"></script>

		<!-- paypal -->

	<script
    src="https://www.paypal.com/sdk/js?client-id=AUMc-LeX7mLGIeV3E3dKh74b-6dq9Oxx7AQDz9_b8GFeiIhmOqGoDQ9j4XPfF9S4kgVP0isOzRDSwPGL&disable-funding=credit,card"> 
    // Required. Replace YOUR_CLIENT_ID with your sandbox client ID.
  </script>
  <script>
  paypal.Buttons({
    createOrder: function(data, actions) {
      // This function sets up the details of the transaction, including the amount and line item details.
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: <?php echo $total;?>
          }
        }]
      });
    },
    onApprove: function(data, actions) {
      // This function captures the funds from the transaction.
      return actions.order.capture().then(function(details) {
        // This function shows a transaction success message to your buyer.
        //alert('Transaction completed by ' + details.payer.name.given_name);
        window.location.replace("con_orderupdate.php");
      });
    }
  }).render('#paypal-button-container');
  //This function displays Smart Payment Buttons on your web page.
</script>

</body>
</html>