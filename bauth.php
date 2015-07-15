if (!isset($_SERVER['PHP_AUTH_USER']) || !pc_validate($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW'])) {
    header('WWW-Authenticate: Basic realm="Restricted Area"');
    header('HTTP/1.0 401 Unauthorized');
    echo "You need to enter a valid username and password.";
    exit;
}
function pc_validate($user,$pass) {
    /* replace with appropriate username and password checking,
       such as checking a database */
    $users = array(
        'clin' => '7b84e255fbd2727e2034b72f020badf3',
        'nkim'  => '86a375aacb17606c185d31c8d3e320ce',
        'tbuser' => 'ccfd16633f8033d2d2cdee9f44bbe273'
    );
    if (isset($users[$user]) && ($users[$user] == md5($pass) )) {
        return true;
    } else {
        return false;
    }
}
