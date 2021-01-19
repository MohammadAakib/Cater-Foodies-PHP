<div class="w3ls-header"><!-- header-one --> 
				<div class="container">
					<div class="w3ls-header-left">
					<!--	<p>Free home delivery at your doorstep For Above $30</p> !-->
					</div>
					<div class="w3ls-header-right">
						<ul> 
							<li class="head-dpdn">
								<i class="fa fa-phone" aria-hidden="true"></i> Call us : 7874829650 
							</li> 
                                                        
                                                        
                                                      
							
                                                         
                                                                             <?php
                    if (isset($_SESSION["customerid"])) {
                        ?>
                                                                                                             <li class="head-dpdn">           <a href="logout.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Logout</a></li> 
                                                            <?php } else { ?>
                                                                                    <li class="head-dpdn">      <a href="login.php"><i class="fa fa-sign-in" aria-hidden="true"></i> LogIn</a>    </li>   
                                                                                    <li class="head-dpdn">
                                                            <a href="signup.php"><i class="fa fa-user-plus" aria-hidden="true"></i> SignUp</a>
							</li> 
                                                                                                                          <?php } ?>
						
							
<!--							 <li class="head-dpdn">
								<a href="offers.html"><i class="fa fa-gift" aria-hidden="true"></i> Offers</a>
							</li> 
							<li class="head-dpdn">
								<a href="help.html"><i class="fa fa-question-circle" aria-hidden="true"></i> Help</a>
							</li> !-->
						</ul>
					</div>
					<div class="clearfix"> </div> 
				</div>
			</div>