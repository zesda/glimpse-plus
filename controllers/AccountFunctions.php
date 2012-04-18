<?php

/**
 * Description of AccountFunctions
 *
 * @author RIF01
 */
class AccountFunctions {

    public $user = '';
    private $app;
    
    public function __construct($application){
        $this->app = $application;
    }

    public static function checkIfUserSet() {
        if (isset($_GET['user']) == 1) {
            return true;
        } else {
            return false;
        }
    }

    public static function displayUser() {
        $user = '';
        if (isset($_SESSION['user'])) {
            $user .= '<span class="right">Welcome<a href="account.php">' . $_SESSION['user'] . '</a>
                | <a href="account.php?logout">Logout</a>';
        } else {
            $user .= '<span class="right"><a href="login.php">Login</a>
                &nbsp;&nbsp;<a href="register.php">Register</a></span>';
        }

        return $user;
    }

}

?>