<?php

/**
 * Description of account
 *
 * @author cir8
 */
include 'bootstrap.php';
run();
include $application->getDirConfig('controllers') . 'ApplicationWebBody.php';
include $application->getDirConfig('controllers') . 'ApplicationWebPage.php';

class account {

    private $app;
    
    public function __construct($application){
        $this->app = $application;        
    }
    
    public function userpage() {
        $links = array('account.php?logout' => 'Logout', 'account.php?settings' => 'My Settings');
        $currentLocation = array('account.php' => 'My Account');
        $bodyContent = 'Welcome: ' . $this->app->getUserConfig('name');

        $body = new ApplicationWebBody($this->app,'My Account', $bodyContent);
        $body->setCurrentBranch('account');
        $body->setbreadArray($currentLocation);
        $body->setRightContentLinks($links);

        $page = new ApplicationWebPage($this->app);
        echo $page->head('My Account');
        echo $page->body($body);
        echo $page->footer();
    }
}

$a = new Account($application);
$acc = new AccountFunctions($application);
if ($acc->checkIfUserSet()) {
    $a->userpage();
} else {
    header('Location: login.php');
}
?>
