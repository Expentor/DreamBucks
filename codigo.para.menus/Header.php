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
</html>