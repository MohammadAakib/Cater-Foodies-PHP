<?php
include 'class/myclass.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php
include 'head.php';
?>
<body> 
	<!-- banner -->
	<div class="banner about-w3bnr">
		<!-- header -->
		<div class="header">
			<!-- //header-one -->  
                        <?php
                            include 'header_one.php';
                        ?>
			<!-- //header-one -->    
			<!-- navigation -->
			<?php
                            include 'navbar.php';
                        ?>
			<!-- //navigation --> 
		</div>
		<!-- //header-end --> 
		<!-- banner-text -->
		<div class="banner-text">	
			<div class="container">
				<h2>Delicious food from the <br> <span>Best Chefs For you.</span></h2> 
			</div>
		</div>
	</div>
	<!-- //banner -->    
	<!-- breadcrumb -->  
	<div class="container">	
		<ol class="breadcrumb w3l-crumbs">
			<li><a href="#"><i class="fa fa-home"></i> Home</a></li> 
			<li class="active">About</li>
		</ol>
	</div>
	<!-- //breadcrumb -->
	<!--  about-page -->
	<div class="about">
		<div class="container"> 
			<h3 class="w3ls-title w3ls-title1">About Us</h3>
			<div class="about-text">	
                            <p align="justify">
                                      Ramdevji caterers has been promoted by Hirabhai by his own experience who is engaged in the food and outdoor catering business since many years. Ramdevji caterers has created his own empire in the outdoor catering field by his own efforts without any help of generation at the age of 10.He has gain many achievements and experience any a creator of new items. Ramdevji caterers is the company who sets every occasions according to budget and mind of the party.
                                   Ramdevji caterers is managed by qualified and experienced persons having a proven track record in this field.the company is managed in a professional way with adequate organization.the employees of the organization are trained. Ramdevji caterers is engaged in the business of delicious food processing and catering business. It manufatures more than 500 items comprising of Juice,Mocktails,Starters,
                                   Bittings,Soups,Chaat,Salads,North Indian(Punjabi),Chinese,Mexican,Rajasthani, Gujarati,Sweets,Deserts,Snacks,Continental,Mexican,Italian,Thai,Muglai,Etc.All theses food items are prepared as per our own traditional customs and procedures.
                            </p>
                            <p align="justify">
                                <br> Ramdevji cateres is known for its professional catering service with latest infrastructure,delicious and quality food prepared with utmost care in hygienic conditions. Ramdevji caterers has specialized in outdoor catering for weeding and other occasions.
                            </p>
                            <div class="clearfix"> </div>
			</div>
			
		</div>
	</div>
	<!-- //about-page --> 
	<!-- subscribe -->
	<?php
                        include 'subscrib.php';
        ?>
	<!-- //subscribe --> 
	<!-- footer -->
	<?php
        include 'footer.php';
        ?>
	<!-- //footer -->
        
	<!-- //Java-Script -->
        <?php
        include 'script.php';
        ?>
        <!-- //Java-Script --> 
</body>
</html>