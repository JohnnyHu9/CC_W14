<html>
<head>
    <meta name="robots" content="noindex">
    <meta name="googlebot" content="noindex">
    <!--
        File name : business_contact.php
        Author's name : Zhixiang Hu
        Web site name : Zhixiang Hu Tech Space
        This is business contact page of the web site
    -->


    <title>Zhixiang Hu Tech Space</title>
    <!--User javascript file-->
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css">

    <!--Font Icons http://fortawesome.github.io/Font-Awesome/icons/  -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

    <!--jQuery on CND-->
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

    <!--User javascript file-->
    <script type="text/javascript" src="js/main.js"></script>
</head>    

<body>
    <div id="container">
        <div id='header'>
            <!--Logo and Title-->
            <img id="logo" src="index/images/logo.png" />
            <h2 id="my_title">Zhixiang Hu's Tech Space</h2>

            <!--site map-->
            <div id="sitemap"><a href="sitemap.html">[+]Site Map</a></div>

            <!--navigation bar-->
            <div id='topnav'>
                <my_menu><a class="m_normal" href='index.html'><i class="fa fa-home fa-lg"></i>Home</a></my_menu>
                <my_menu><a class="m_normal" href='aboutme.html'><i class="fa fa-comment-o"></i>About Me</a></my_menu>
                <my_menu><a class="m_normal" href='projects.html'><i class="fa fa-laptop"></i>Projects</a></my_menu>
                <my_menu><a class="m_normal" href='services.html'><i class="fa fa-shopping-cart"></i>Services</a></my_menu>
                <my_menu><a class="m_normal" href='https://github.com/JohnnyHu9/CC_W14' target="_blank"><i class="fa fa-cloud-download"></i>GitHub</a></my_menu>
                <my_menu><a class="m_normal" href='contactme.html'><i class="fa fa-edit"></i>Contact Me</a></my_menu>
                <my_menu1><a class="m_active" href='business_contact.php'><i class="fa fa-edit"></i>Business Contact</a></my_menu>
            </div>
            <!--bread crumbs-->
            <div id="crumbs">
                You are here: <a href="index.html">HOME</a> ->
                <a href="business_contact.php">Business Contact</a>
            </div>
        </div>

        <div id='mainbox'>
            <h2>Tech Space's Business Contact</h2>

            <?php
            session_start();
            if(isset($_POST["username"]))
            {
                //echo $_POST["username"];echo $_POST["password"];
                
                $dsn = 'mysql:host=127.0.0.1;dbname=test';
                $username = 'player';
                $password = 'password';
                $db = new PDO($dsn, $username, $password);  // set database object
                $salt = "123456789";
                $pepper = "abcdefgh";
                
                $password = sha1($salt) . $_POST["password"] . sha1($pepper);
                //echo $password."<br>";
                $password = sha1($password);    // hash password with salt and pepper
                //echo $password."<br>";
                
                $query="select password from admin_table where UName='" . $_POST["username"] . "'";
                $records = $db->query($query);  // query hash code from database
                $result = $records->fetch();    // fetch query result
                if ($result[0] == $password)    // compare with user input password
                {
                    $_SESSION["isloggedin"] = true; // set session login flag to true
                    $_SESSION["username"] = $_POST["username"]; // set session variable username
                }
                else{
                    echo "Authentication Failed. Please Try Again.";
                    $_SESSION["isloggedin"] = false;    // set session login flag to false
                    $_SESSION["username"] = "";     // clear session username
                }
            }
            else{
                echo "post not found";
                $_SESSION["username"];
                $_SESSION["isloggedin"] = false;
            }
            
            if(isset($_SESSION["isloggedin"])){
                if($_SESSION["isloggedin"])
                {
                        echo "welcome " . $_SESSION["username"];    // login succeed
                }
                else    // display login input form
                {?> Login Required. Only Authorized User Can See Contact.
                    <form action="business_contact.php" method="post">
                    Username: <input type="text" name="username">
                    Password: <input type="password" name="password">
                    <input type="submit" value="Login">
                    </form>
                <?php
                }
            }
            else    // display login input form
            {?> Login Required. Only Authorized User Can See Contact.
                <form action="business_contact.php" method="post">
        	Username: <input type="text" name="username">
        	Password: <input type="password" name="password">
        	<input type="submit" value="Login">
                </form>
            <?php
            }
            ?>

            
            
        </div>


        <!--terms of use, privacy policy and copy right-->
        <div id='foot'>
            <a href="term.html">Terms of Use</a> |
            <a href="privacy.html">Privacy Policy</a> |
            Copyright 2014 by Zhixiang Hu. All Rights Reserved.
        </div>

    </div>
</body>


</html>