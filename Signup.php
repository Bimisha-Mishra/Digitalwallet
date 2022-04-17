
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Scss/login.css">
    <link rel="stylesheet" href="Scss/navigationBar.css">
    <title>Login</title>
    <style>
        .main {
            margin-top: 8vh;
        }
    </style>
</head>
<body>
    <section>
        <nav>
            <img src="logo.png" alt="logo">
            <ul class="menuItems">
            <li><a href='home.html' data-item='Home'>Home</a></li>
            <li><a href='About.html' data-item='About'>About</a></li>
            <li><a href='#' data-item='Services'>Services</a></li>
            <li><a href='#' data-item='Contact'>Contact</a></li>
            <li><a href='index.html' data-item='Login'>Login</a></li>
          </ul>
        </nav>
    </section>
    <main class="main">
        <a class="button-twitter" href="#" target="_blank"></a>
        <form class="login" action = "insert_data.php" method = "POST">
          <svg class="login-sides">
            <line class="top-right first" x1="50%" x2="100%" y1="0" y2="0"/>
            <line class="top-left first" x1="50%" x2="0" y1="0" y2="0"/>
            <line class="right second" x1="100%" x2="100%" y1="0" y2="100%"/>
            <line class="left second" x1="0" x2="0" y1="0" y2="100%"/> 
            <line class="bottom-left third" x1="0" x2="50%" y1="100%" y2="100%"/>
            <line class="bottom-right third" x1="100%" x2="50%" y1="100%" y2="100%"/>
          </svg>
          <fieldset class="login-fieldset">
            <input type="text" placeholder="Full Name" class="login-fieldset-field" name = "Full_name"required>  
            <input type="number" placeholder="Phone Number" class="login-fieldset-field" name = "Number" required>
            <input type="text" placeholder="Email" class="login-fieldset-field" name = "Email"  required>
            <input type="password" placeholder="Password" class="login-fieldset-field" name = "Password" required>
            <input type="password" placeholder="confirm Password" class="login-fieldset-field" required>
            <button type="submit" class="login-fieldset-submit">
              Login
            </button>
          </fieldset>
        </form>
      </main>
</body>
</html>na,