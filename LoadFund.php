<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="Scss/LoadFund.css">
    <link rel="stylesheet" href="Scss/home.css"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="Scss/home.css">
    <link rel="stylesheet" href="Scss/slidingmenu.css">
    <link rel="stylesheet" href="Scss/LoadFund.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
</head>
<body>
    <!--nav section-->
    <section>
    <section>
        <nav>
            <div class="logo-container">
                <img src="logo.png" alt="logo">
            </div>
            <div class="search-container">
                <input id= "search-bar" type="text" placeholder="Search">   
                <a href="#" class="search-icon">
                    <img src="Images/search.png">
                </a>             
            </div>
            <div class="icon-container">
                <i class="fas fa-solid fa-bell"></i>
                <i class="fa-solid fa-gear"  onClick="showMenu(true,'#menu__panel1')"></i>
                <i class="fa fa-bars"  onClick="showMenu(true,'#menu__panel2')"></i>
            </div>
        </nav>
    </section>
    <!--nav section ends-->
    <!---->
    <section>
        <div id="menu__panel1">
            <i class="menu__close fa fa-angle-left fa-2x" onClick="showMenu(false,'#menu__panel1')"></i>
            <ul>
                <li class="menu-item"><a href="#"><i class="fa-solid fa-house"></i>Profile</a></li>
                <li class="menu-item"><a href="#"><i class="fa-solid fa-coins"></i>Logout</a></li>
            </ul>
        </div>
        <div id="menu__panel2">
            <i class="menu__close fa fa-angle-left fa-2x" onClick="showMenu(false,'#menu__panel2')"></i>
            <ul>
                <li class="menu-item"><a href="#"><i class="fa-solid fa-house"></i>Home</a></li>
                <li class="menu-item"><a href="#"><i class="fa-solid fa-coins"></i>Services</a></li>
                <li class="menu-item"><a href="#"><i class="fa-solid fa-calendar-check"></i>Bookings</a></li>
                <li class="menu-item"><a href='#'><i class="fa-solid fa-user"></i>Account</a></li>
                <li class="menu-item"><a href='#'><i class="fa-solid fa-wallet"></i>Wallet</a></li>
                <li class="menu-item"><a href='#'><i class="fa-solid fa-building-columns"></i>Bank Link</a></li>
                <li class="menu-item"><a href='#'><i class="fa-solid fa-clock"></i>Transaction History</a></li>
                <li class="menu-item"><a href='#'><i class="fa-solid fa-gift"></i>Coupon</a></li>
                <li class="menu-item"><a href='#'><i class="fa-solid fa-hand-holding-dollar"></i>Loyalty</a></li>
            </ul>
        </div>
                  
        <!--main section-->
        <div class="services-section">
            <div class="inner-width">
                <h1 class="section-title">Load Fund Services</h1>
                <div class="border"></div>
                <div class="services-container">
                    <div class="service-box" >
                        <a class="service-icon" href="#">
                            <i class="fas fa-piggy-bank"></i>
                        </a>
                        <div class="service-title">Linked Bank Account</div>
                        <div class="service-desc">
                            Load fund through banks directly onto your wallet.
                        </div>
                    </div>
                    <div class="service-box">
                        <a class="service-icon" href="RecargeCard.php">
                            <i class="fas fa-money-check"></i>
                        </a>
                        <div class="service-title">Recharge card</div>
                        <div class="service-desc">
                            Top-up your wallet balance from recharge card.
                        </div>
                    </div>
                    <div class="service-box">
                        <a class="service-icon">
                            <i class="fas fa-money-check"></i>
                        </a>
                        <div class="service-title">Easy points</div>
                        <div class="service-desc">
                            Use your collected easy funds to load your wallet
                        </div>
                    </div>
                    <div class="service-box">
                        <a class="service-icon">
                            <i class="fas fa-money-check"></i>
                        </a>
                        <div class="service-title">Card</div>
                        <div class="service-desc">
                            Use your collected easy funds to load your wallet
                        </div>
                    </div>
                    <div class="service-box">
                        <a class="service-icon">
                            <i class="fas fa-money-check"></i>
                        </a>
                        <div class="service-title">Mobile Banking</div>
                        <div class="service-desc">
                            Use your collected easy funds to load your wallet
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--info-panal-->
    </section> <!--main-service section-->
    <script src = "script/slidingmenu.js"></script>
    <script src="https://kit.fontawesome.com/91d850ff13.js" crossorigin="anonymous"></script>
</body>
</html>
