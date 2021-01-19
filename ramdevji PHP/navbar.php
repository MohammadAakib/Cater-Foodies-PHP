<div class="navigation agiletop-nav">
    <div class="container">
        <nav class="navbar navbar-default">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header w3l_logo">
                <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>  
                <h1><a href="home.php">Ramdevji Catres<span>Best Food Collection</span></a></h1>
            </div> 
            <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="home.php" class="active">Home</a></li>
                    <li><a href="products.php">Gallery</a></li>
                    <li><a href="menu.php">Menu</a></li>
                    <li><a href="about.php">About</a></li> 
                    <?php
                    if (isset($_SESSION["customerid"])) {
                        ?>

                        <li class="w3pages"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Orders <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="order.php">Food </a></li>
                                <li><a href="package-order.php">Package </a></li>
                                <li><a href="utensil-order.php">Utensil </a></li>
                                <li><a href="employee-order.php">Employee </a></li>
                            </ul>
                        </li>  
                    <?php } ?>
                    <li><a href="contact.php">Contact Us</a></li>
                </ul>
            </div>
            <div class="cart cart box_1"> 
          <!--  <form action="#" method="post" class="last"> 
                    <input type="hidden" name="cmd" value="_cart" />
                    <input type="hidden" name="display" value="1" />
                    <button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
                </form>   -->
                <a class="w3view-cart" href="cart.php"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></a>
            </div> 
        </nav>
    </div>
</div>