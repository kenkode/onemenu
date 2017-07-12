<?php
require_once'init.php';

if($user['booking']){
header('location: index.php');
exit();
}

?>
<p style="font-size:14px; margin-top:100px;">You are about to book body.</p>
<form action="premium_charge.php?bid=<?php echo $user['corpse_id'];?>" method="POST">
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="<?php echo $stripe['publishable']; ?>"
    data-image="/square-image.png"
    data-name="credit"
    data-description="Booking corpse"
	data-currency="kes"
	data-email="<?php echo $user['email']; ?>"
    data-amount="<?php echo $user['cost']*100; ?>">
  </script>
</form>
 </div>
        </div>
		<footer>joegich&copy;2015. All rights preserved</footer>
</div>

</body>
</html>
