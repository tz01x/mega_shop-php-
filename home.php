<!DOCTYPE html>
<?php
session_start();
require("config/database.php");
// function to check if the session variable member_id is on set
require 'config/h.php';
confirm_logged_in();
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <?php include'index_header.html' ?>
    <title></title>
    <?php include'nav.php' ?>

  </head>

  <body>
<div class=" container mtg_t">

  <h2>Welcome,
  <?php echo $_SESSION['first_name']." ".$_SESSION['last_name']?>
</h2>
<div class="col-md">

<hr>

	<h3>Your last 10 orders</h3>

	<table class="table   table-hover">
	<thead class="thead-dark">

	<tr>
	<th>order id </th>
	<th>total_amount</th>
	<th>created</th>
	<th></th>
	</tr>
	</thead>
	<tbody>

		<?php
		// require 'cart.php';
		function fetch_custom($sql) {
			$result = $GLOBALS['conn']->query($sql);
			if ($result->num_rows > 0) {
					$data = mysqli_fetch_all($result,MYSQLI_ASSOC);
					return $data;
			}else{
				return  array( );
			}
		}

		$sql='select id,total_amount,	created from orders where user_id='.$_SESSION['user_id'].'  order by created desc limit 10';
		$user_orders=fetch_custom($sql);


			foreach ($user_orders as $key => $order) {
				// echo $c->get_name($key);
				echo '
				<tr>

				<td>'.$order['id'].'</td>
				<td>'.$order['total_amount'].'</td>
				<td>'.$order['created'].'</td>
				<td>
				<a href="./order_details.php?id='.$order['id'].'">view details</a>

				</td>



				</tr>
				';
			}
			// echo $c->get_total_price();

		// }



		 ?>

	 </tbody>

 </table>
	<div class="">

	</div>
</div>
</div>

  </body>
</html>
<!-- user_id
first_name
last_name -->
