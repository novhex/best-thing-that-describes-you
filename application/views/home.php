<div class="container" style="margin-top: 70px;">
	<div class="row">
			<div class="col-sm-12">


			<h1 style="text-align:center; font-weight: bold; "> Best thing that describes you! </h1>
				
				<div style="text-align:center;">
				<p> In order to take the test , you are required to login with your facebook account. </p>
				<p> <i> We will not post anything in your facebook account without your authorization. (Allow the app to access your basic info)</i> </p>

				
				<?php
				if($this->session->userdata('current_user')!=''){?>

				<img alt="SITE-USER" class="img-thumbnail" data-src="holder.js/140x140" alt="140x140" src="https://graph.facebook.com/<?=$this->session->userdata('dp')?>/picture?type=large" style="width: 140px; height: 140px;">
					
				<button type="button" id="start_test" class="btn btn-info btn-lg"><i class="fa fa-info-circle"></i> Start Exam </button>
				
				<?php }else{?>
				 

				<a href="<?php echo $login_url; ?>" id="fblogin" class="btn btn-lg btn-info" style="background-color:#3b5998;">Login with Facebook</a>
				

				<?php }?>
				<div id="loader" style="text-align:center;">
					<p style="color:blue;"> Calculating Result. Please wait..</p>
					<i class="fa fa-spinner fa-spin fa-5x"></i>
				</div>

				<div id="personalitycheck" style="text-align:center; color:green; margin-top:20px;">

				</div>

				</div> 

			</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		
		$("#loader").hide();
		$("#personalitycheck").hide();

		$('#start_test').click(function(){
			$("#loader").show();
			$(this).hide();
			$(start_test());


		});

	
	function start_test(){
		
		setTimeout(
		  function() 
		  {


		    $.ajax({
				url: "<?php echo base_url('home/show_rand_personality');?>",
				data: "run=true",
				type: "POST",
				success:function(response){
					$('#personalitycheck').html(response);
					$('#personalitycheck').show();
					$('#loader').hide();

				}
			});


		  },10000);
		}


	});
</script>