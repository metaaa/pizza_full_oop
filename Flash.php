<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 5/7/19
 * Time: 2:14 PM
 */

class Flash
{

}

/*
sessionbe raksz notikat
van egy index.php-d, vagy hát valamid, ami ugye minden oldalbetöltéskor fut
és oda egy olyat kell rakni, ami minden oldalbetöltéskor ellenőrzi, hogy van-e a sessionben valami.
if (isset($_SESSION['success'])) {
   echo "<div class="success">$_SESSION['success'] </div> "
}
if (isset($S_SESSION['error'])) {
    echo $_SESSION[error]
}
ezekután
bárhol hozzáadhatsz sikeres vagy épp error üzit

Márton Balogh [2:11 PM]
ja, eddig vágom

Tamás Kelemen [2:11 PM]
bármelyik class-ban
van ugye autoloadered
csinálsz egy classt, hogy pl Flash
abban két method
public static function success($message) {
    $_SESSION['success'] = $message;
}

public static function flush(){
   unset($_SESSION['success'])  ;
   unset($_SESSION['Error']);
}


ja és kiiratásnál
kiiratás után
dropold
de hát
Flash::flush()
és akkor a flush-ben meg kiüríted az összeset
public static function flush(){
   unset($_SESSION['success'])  ;
   unset($_SESSION['Error']);
}

*/