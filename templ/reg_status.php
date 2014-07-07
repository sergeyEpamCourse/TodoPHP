<!DOCTYPE html>
<html>

    <head>
        <title>Status</title>
        <?php
        include ('templ/common_parts/css.php');
        include ('templ/common_parts/jsLibs.php');
        ?>
    </head>

    <body>
        <div class="regDone" style="color: white">
            <?php echo $msg; ?>
        </div>
        <a class="loginLink" href="login.php" style="color: white">>> Please Login!</a>
    </body>

</html>