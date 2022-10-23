<<<<<<< HEAD
<!DOCTYPE html>
<html>

<header>
    <?php
            session_start();
            if(isset($_SESSION["name_A"])){
                include("MenuRegistered.php");

            }else{

                include("MenuVisitor.php");
            }
            ?>
</header>
=======
<!DOCTYPE html>
<html>

<header>
    <?php
            session_start();
            if(isset($_SESSION["name_A"])){
                include("MenuRegistered.php");

            }else{

                include("MenuVisitor.php");
            }
            ?>
</header>
>>>>>>> 489a8dd2e8326661ba09819801aaab03f573da98
</html>