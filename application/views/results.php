<div class="container" style="margin-top:70px;">
<div class="row">
<div class="col-sm-12">

<div align="center">
	<?php
	foreach($logs as $results){

		echo "<img src='https://graph.facebook.com/".$results['p_dp']."/picture?type=large'>";

		echo "<h1 style='text-align:center;'> Best thing that will describe " . $results['p_username']." </h1>";

		echo "<p style='text-align:center;'>''<i>".str_replace("<name>",$results['p_username'],$results['pt_DESC'])." ''</i></p>";

		echo "<a href='".base_url('')."' class='btn btn-success btn-sm'> GET YOURS! </a>";
	}

	?>
</div>
</div>
</div>
</div>