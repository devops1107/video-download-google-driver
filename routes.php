<?php




use Pecee\SimpleRouter\SimpleRouter;
use Pecee\Http\Request;
SimpleRouter::get('/', function() {
    require "views/home.php";
});
SimpleRouter::form('/login', function() {
    require "views/login.php";
});
//SimpleRouter::put('/login', function(Request $request) {
//    $data = $request->getBody();
//    require 'includes/actions.php';
//    return  header('Location: ' . $request->httpReferer);
//});

//Register
SimpleRouter::form('/register', function() {
    require "views/register.php";
});
SimpleRouter::post('/action', function() {
    global $conn;
  require "includes/actions.php";
});

//logout
SimpleRouter::get('/logout', function() {
    session_destroy();
    header('Location: /');
});

SimpleRouter::get('/dashboard/tools', function() {
    global $conn;
    require "views/tools.php";
});
SimpleRouter::get('/dashboard/settings', function() {
    global $conn;
    require "views/setting.php";
});
global $settings;
use Pecee\SimpleRouter\SimpleRouter as Routernya;
if($settings->status == 1){
    Routernya::get('/v/{id}', function($id) {
        global $conn;
        require "views/player.php";
    });
    Routernya::get('/d/{id}', function($id) {
        global $conn;
        require "views/download.php";
    });
    Routernya::get('/script/{id}', function($id) {
        global $conn;
        require "includes/script.php";
    });
    Routernya::get('/f/{gid}/{res}', function($gid, $res) {
        $id = str_rot13(str_replace('1_1_1', '-', $gid));
        if($id == true){
            // Init
            $s = new WDrive();
// get Resolution List
//print_r($s->getResolution());
// set new ID df
            $s->setID($id);
// set Resolution
            $s->setResolution($res);
// download Link
            $s->setDownload(true);
// Start Stream
            $s->stream();
        }
    });

    Routernya::get('/api/{user}', function($user) {
        global $conn;
        require 'views/api.php';
    });
    //dashboard
    Routernya::get('/dashboard', function() {
        global $conn;
        require "views/dashboard.php";
    });
    Routernya::get('/dashboard/page/{page}', function($page) {
        global $conn;
        require "views/dashboard.php";
    });
    Routernya::get('/dashboard/add', function() {
        global $conn;
        require "views/add_link.php";
    });
}