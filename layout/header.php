<?php require "../layout/head.php" ?>
<header>
    <div class="navWrap">
        <img src="../images/eStoreLogo10.png" alt="logo" class="logo" >
        <nav>
            <ul>
                <?php if(isset($_SESSION['userID']))
                {
                    echo '
                    <li><a href="#">Home</a></li>
                    <li><a href="products.php">Products</a></li>

                    <li><a href="cart.php">Cart</a></li>
                    <li><a href="order.php">Orders History</a></li>
                    <li><a href="profile.php">My Account</a></li>
                    <li><a href="logout.php">Logout</a></li>';
                } else {
                    echo '
                    <li><a href="#">Home</a></li>
                    <li><a href="products.php">Products</a></li>
                    <li><a href="cart.php">Cart</a></li>
  
                    <li style="cursor: pointer"
                        id="dropdownMenuButton" data-toggle="dropdown" 
                        aria-haspopup="true" aria-expanded="false">
                        <a>
                            My Account<i class="fa fa-caret-down" style="position: absolute; margin-left: 3px"></i>
                        </a>
                    </li>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item drop" href="login.php">Login</a>
                        <a class="dropdown-item drop" href="register.php">Register</a>
                    </div>
                    
                    
                    ';

    } ?>
            </ul>
        </nav>
    </div>
</header>


