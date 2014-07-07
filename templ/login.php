<!DOCTYPE html>
<html>

    <head>
        <title>Login</title>
        <?php
        include ('templ/common_parts/css.php');
        include ('templ/common_parts/jsLibs.php');
        ?>
        <script src="js/loginJs.js"></script>
    </head>

    <body>
        <div id="todoApp">
            <div class="links">
                <div id="navLinks">
                    <?php
                    include ('/templ/common_parts/links.php');
                    ?>
                </div>
            </div>
            <input type="text" id="login" style="width:100%;" autofocus placeholder="Login"/>
            <input type="password" id="password" style="width:100%;" placeholder="Password"/>
            <div id="enter">
                <span id="loginButton">Login</span>
            </div>
        </div>
    </body>

</html>