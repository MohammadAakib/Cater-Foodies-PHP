			<div class="header-right">
				<div class="profile_details_left">
					<div class="clearfix"> </div>
				</div>
				<!--notification menu end -->
				<div class="profile_details">		
					<ul>
						<li class="dropdown profile_details_drop">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
								<div class="profile_img">	
                                                                    <span class="prfil-img"><img src="images/a_1.png.png" alt=""> </span> 
									<div class="user-name">
										<p>
                                                                                    <?php
                                                                                        echo $_SESSION['adminname'];
                                                                                    ?>
                                                                                </p>
										<span>Administrator</span>
									</div>
									<i class="fa fa-angle-down lnr"></i>
									<i class="fa fa-angle-up lnr"></i>
									<div class="clearfix"></div>	
								</div>	
							</a>
                                                    <ul class="dropdown-menu drp-mnu">
                                                        <li> <a href="logout.php"><i class="fa fa-sign-out"></i> Log Out</a> </li>
                                                    </ul>
						
						</li>
					</ul>
				</div>	
				<div class="clearfix"> </div>	
			</div>
