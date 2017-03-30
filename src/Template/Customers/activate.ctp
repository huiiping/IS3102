<style>
	#main {
		background-image: url(/IS3102_Final/img/retailerLogin.jpg); 

		background-size: cover;

	}
	#box {
		border-radius: 15px ;  
		background-color: rgba(255,255,255,.7); 
		overflow: hidden;
	}
	#form_box {
		padding: 0;
		border-radius:10px;
		overflow: hidden;
	}
	.modal-content{
		border-radius:10px;
		overflow:hidden;
	}
	#login_form, #resetPass_form{
		padding: 15px;
	}
	.input-group{
		padding-bottom: 8px;
	}
	.registerInfo{
		font-size:10px;
	}
	div:empty {
   display: none;
}
</style>

<script type="text/javascript">
	$(document).ready(function(){
		$("#myModal").modal('show');
	});
</script>


<?= $this->Html->css(captcha_layout_stylesheet_url(), ['inline' => false]) ?>


				<div id="myModal" class="modal fade">
					<div class="modal-dialog">
						<div class="modal-content">
							<div id="modalHeader" class="modal-header bg-primary text-white">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
								<h4 class="modal-title">Welcome to CLRMS <?= $name ?>, </h4>
							</div>
							<div class="modal-body">
								<p>Please enter your desired password</p>
								<form id="setPass"method="post" accept-charset="utf-8" action="/IS3102_Final/customers/setPassword" onsubmit="return validateForm()">
									<div class = "row">
										<div class="col-md-10 col-xs-10">
											<div class="input-group">
												<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
												<input id="txtNewPassword" onkeyup="checkPasswordMatch();validatePass();" type="password" class="form-control" placeholder="Password" required="required" name="password">
											</div>
										</div>
										<div class="checkIcons" >
											<span id="validatePassword" class="fa fa-check" style="display:none; font-size: 24px"></span>
										</div>
									</div>
									<p class="registerInfo">*Password can only be alphanumeric and at least 8 characters long</p>
									<div class = "row">
										<div class="col-md-10 col-xs-10">
											<div class=" input-group">
												<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
												<input id="txtConfirmPassword" onkeyup="checkPasswordMatch();" type="password" class="form-control" placeholder="Confirm Password" required="required">
											</div>
										</div>
										<div class="checkIcons" >
											<span id="checkPasswordMatch" class="fa fa-check" style="display:none; font-size: 24px"></span>
										</div>
									</div>
									<div  style="color:red;" class="col-md-10 col-xs-10" id=validateMessage></div>
									<input type='hidden' name='employeeId' value='<?php echo "$employeeId";?>'/>
									<input type='hidden' name='token' value='<?php echo "$token";?>'/>
									<input type='hidden' name='dbname' value='<?php echo "$dbname";?>'/>
									
										<div class = "row">
										
											<button type="submit" class="btn btn-primary pull-right" style="margin:15px">Confirm</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>



		<script>

			function checkPasswordMatch() {
				var password = $("#txtNewPassword").val();
				var confirmPassword = $("#txtConfirmPassword").val();

				if (password != confirmPassword){
					
					document.getElementById('checkPasswordMatch').className = "fa fa-close";
					document.getElementById("checkPasswordMatch").style.color = "red";
					$("#checkPasswordMatch").show();
					return false;
				}
				else{
					
					document.getElementById('checkPasswordMatch').className = "fa fa-check";
					document.getElementById('checkPasswordMatch').style.color = "#00a65a";
					$("#checkPasswordMatch").show();
					return true;
				}
			}

			function validatePass(){
				var TCode = document.getElementById('txtNewPassword').value;
				
				if( /[^a-zA-Z0-9]/.test( TCode ) || TCode.length<8) {
					document.getElementById('validatePassword').className = "fa fa-close";
					document.getElementById('validatePassword').style.color = "red";
					$("#validatePassword").show();
					return false;
				}
				else{
					document.getElementById('validatePassword').className = "fa fa-check";
					document.getElementById('validatePassword').style.color = "#00a65a";
					$("#validatePassword").show();
					return true;
				}
			}

			function validateForm(){
				/*var retailer=document.forms["setPass"]["retailer"].value*/
				if (!validatePass()){
					document.getElementById('validateMessage').innerHTML = "*Password does not meet the requirements";
					return false;
				}
				if (!checkPasswordMatch()){
					document.getElementById('validateMessage').innerHTML = "*Passwords do not match";
					return false;
				}
				/*if (!isNaN(retailer)){
					document.getElementById('validateMessage').innerHTML = "Please Select the retailer you are under";
					return false;
				}*/
				return true;
			}

		</script>


