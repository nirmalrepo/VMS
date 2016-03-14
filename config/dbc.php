<?php

$baseURL = 'http://localhost/VMS';
$user_registration = 1;  // set 0 or 1

class MainConfig {

    public static function connectDB() {
        $link = mysql_connect('192.168.1.2', 'mdccuser', 'mdccuser') or die("Couldn't make connection.");
//        $link = mysql_connect('localhost', 'root', '') or die("Couldn't make connection.");
        mysql_set_charset('utf8', $link);
        date_default_timezone_set('Asia/Colombo');
        $db = mysql_select_db('vhmngsys', $link) or die("Couldn't select database");
//       $db = mysql_select_db('vms', $link) or die("Couldn't select database");
//		$db = mysql_select_db('account_new', $link) or die("Couldn't select database");
    }

    // public static function connectDB() {
    // $link = mysql_connect('localhost', 'root', '') or die("Couldn't make connection.");
    // mysql_set_charset('utf8', $link);
    // $db = mysql_select_db('accountsystem', $link) or die("Couldn't select database");
    // }

    public static function closeDB() {
        mysql_close();
    }

    function EncodeURL($url) {
        $new = strtolower(ereg_replace(' ', '_', $url));
        return($new);
    }

    function DecodeURL($url) {
        $new = ucwords(ereg_replace('_', ' ', $url));
        return($new);
    }

    function ChopStr($str, $len) {
        if (strlen($str) < $len)
            return $str;

        $str = substr($str, 0, $len);
        if ($spc_pos = strrpos($str, " "))
            $str = substr($str, 0, $spc_pos);

        return $str . "...";
    }

    function isEmail($email) {
        return preg_match('/^\S+@[\w\d.-]{2,}\.[\w]{2,6}$/iU', $email) ? TRUE : FALSE;
    }

    function isUserID($username) {
        if (preg_match('/^[a-z\d_]{5,20}$/i', $username)) {
            return true;
        } else {
            return false;
        }
    }

    function isURL($url) {
        if (preg_match('/^(http|https|ftp):\/\/([A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?/i', $url)) {
            return true;
        } else {
            return false;
        }
    }

    function checkPwd($x, $y) {
        if (empty($x) || empty($y)) {
            return false;
        }
        if (strlen($x) < 4 || strlen($y) < 4) {
            return false;
        }

        if (strcmp($x, $y) != 0) {
            return false;
        }
        return true;
    }

}

?>