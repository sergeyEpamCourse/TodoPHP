<!DOCTYPE html>
<html>

    <head>
        <title>Registration</title>
        <?php
        include ('templ/common_parts/css.php');
        include ('templ/common_parts/jsLibs.php');
        ?>
        <script src="js/regJs.js"></script>
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
                <span id="regButton">Registration</span>
            </div>
        </div>
    </body>

</html>