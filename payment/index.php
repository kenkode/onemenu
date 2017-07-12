<?php
require_once 'init.php';
?>

<?php if($user['booking']): ?>
<p style="font-size:14px; margin-top:100px;">You have successfully booked body!! Please check your email for confirmation</p>
<?php header("refresh:3;../index.php")?>
<?php else:
header('location:premium.php?bid='.$user['corpse_id']);
?>
<?php endif; ?>
 </div>
        </div>
		<footer>joegich&copy;2015. All rights preserved</footer>
</div>
</body>
</html>
