<?php
/**
 * Custom Plugin Template
 * File: my-custom-page.php
 *
 */
use App\API\ApiCall;

       

$res = new ApiCall();        

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php

		$api_resp = json_decode($res->apiCall());


		echo "<table><th>ID</th><th>Name</th><th>Username</th>";
		for ($i=0; $i <count($api_resp) ; $i++) { 
		
			echo "<tr>";
			echo '<td><a href="#">'.$api_resp[$i]->id."</a></td>";
			echo '<td><a href="#">'.$api_resp[$i]->name."</a></td>";
			echo '<td><a href="#">'.$api_resp[$i]->username."</a></td>";
			echo "</tr>";
		}
		echo "</table>";
	
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();