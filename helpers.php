<?php

use Pecee\SimpleRouter\SimpleRouter as Router;
use Pecee\Http\Url;
use Pecee\Http\Response;
use Pecee\Http\Request;
define('DEVELOPER_URL', 'https://westheme.com');
/**
 * Get url for a route by using either name/alias, class or method name.
 *
 * The name parameter supports the following values:
 * - Route name
 * - Controller/resource name (with or without method)
 * - Controller class name
 *
 * When searching for controllers/resource by name, you can use this syntax "route.name@method".
 * You can also use the same syntax when searching for a specific controllers-class "MyController@home".
 * If no arguments is specified, it will return the url for the current loaded route.
 *
 * @param string|null $name
 * @param string|array|null $parameters
 * @param array|null $getParams
 * @return \Pecee\Http\Url
 * @throws \InvalidArgumentException
 */
function url(?string $name = null, $parameters = null, ?array $getParams = null): Url
{
    return Router::getUrl($name, $parameters, $getParams);
}

/**
 * @return \Pecee\Http\Response
 */
function response(): Response
{
    return Router::response();
}

/**
 * @return \Pecee\Http\Request
 */
function request(): Request
{
    return Router::request();
}

/**
 * Get input class
 * @param string|null $index Parameter index name
 * @param string|null $defaultValue Default return value
 * @param array ...$methods Default methods
 * @return \Pecee\Http\Input\InputHandler|array|string|null
 */
function input($index = null, $defaultValue = null, ...$methods)
{
    if ($index !== null) {
        return request()->getInputHandler()->value($index, $defaultValue, ...$methods);
    }

    return request()->getInputHandler();
}

/**
 * @param string $url
 * @param int|null $code
 */
function redirect(string $url, ?int $code = null): void
{
    if ($code !== null) {
        response()->httpCode($code);
    }

    response()->redirect($url);
}

/**
 * Get current csrf-token
 * @return string|null
 */
function csrf_token(): ?string
{
    $baseVerifier = Router::router()->getCsrfVerifier();
    if ($baseVerifier !== null) {
        return $baseVerifier->getTokenProvider()->getToken();
    }

    return null;
}
function rndText($max = 10){
    $text = "1234567890qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM_";
    $lenght = strlen($text);
    $result = "1";
    $start = rand(0, $lenght);
    for($i = 0; $i < $max; $i++){
        $start = rand(0, $lenght);
        $result .= substr($text, $start, 1);
    }
    return $result;

}

function getID($url){
    if(preg_match('/file/', $url)){
        $id = explode("/", explode("file/d/", $url)[1])[0];
    } elseif (preg_match('/id=/', $url)){
        $id = explode("&", explode("id=", $url)[1])[0];
    } else {
        $id = "check your Google Drive Link";
    }
    return $id;
}

function edand($action, $string) {
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $secret_key = 'Ini kunci secret';
    $secret_iv = 'ini adalah kunci';
    // hash
    $key = hash('sha256', $secret_key);

    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);
    if ( $action == 'e' ) {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    } else if( $action == 'd' ) {
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }
    return $output;
}



function get_header(){
    include HOME_DIR . "/header.php";
    return;
}
function get_footer(){
    include HOME_DIR . "/footer.php";
    return;
}
function Hidupkan($key){
        $api_params = array(
            'slm_action' => 'slm_activate',
            'secret_key' => '5e992a5575e302.22941107',
            'license_key' => $key,
            'registered_domain' => $_SERVER['SERVER_NAME'],
            'item_reference' => 'WDrive',

        );
// Send query to the license manager server
        $query = http_build_query($api_params);
        $response = file_get_contents(DEVELOPER_URL . "/?" . $query);
        $license_data = json_decode($response);
        if($license_data->result == 'success'){
            update_option('status', '1');
            update_option('license_key', $key);
        } else {
            update_option('status', '0');
        }
        $_SESSION['status'] =  $license_data->status;
         $_SESSION['message'] =  $license_data->message;
}
function Matikan($key){
    $api_params = array(
        'slm_action' => 'slm_deactivate',
        'secret_key' => '5e992a5575e302.22941107',
        'license_key' => $key,
        'registered_domain' => $_SERVER['SERVER_NAME'],
        'item_reference' => 'WDrive',

    );
// Send query to the license manager server
    $query = http_build_query($api_params);
    $response = file_get_contents(DEVELOPER_URL . "/?" . $query);
    $license_data = json_decode($response);
    if($license_data->result == 'success'){
        update_option('status', '0');
    } else {
        update_option('status', '1');
    }
    $_SESSION['status'] =  $license_data->status;
    $_SESSION['message'] =  $license_data->message;
}
function Ngecek($key){
    $api_params = array(
        'slm_action' => 'slm_check',
        'secret_key' => '5e992a5575e302.22941107',
        'license_key' => $key,
    );
// Send query to the license manager server
    $query = http_build_query($api_params);
    $response = file_get_contents(DEVELOPER_URL . "/?" . $query);
    $license_data = json_decode($response);
    return $license_data;
}
function searcharray($value, $key, $array) {
    if($array){
        foreach ($array as $k => $vals) {
            if ($vals->$key == $value) {
                return true;
            } else{
                return false;
            }
        }
    }
}
function update_option($key, $value){
    global $conn;
    $sql = "insert into settings (westheme_key, westheme_value) VALUE ('$key', '$value') ON DUPLICATE KEY UPDATE westheme_value = '$value'";
    $conn->query($sql);
}
global $settings;
if($settings->status == 1){
    define('WDrive_DEFAULT_RESOLUTION', 360);
    define('WDrive_DEFAULT_ID'        , "0BwhgNh_t-XGFXy1mSV9kc0s1TjA");

    class WDrive {
        # Dont Edit this class variable
        private $gdid;
        private $v_code;
        private $v_res;
        private $cookie;
        private $link;
        private $title;
        private $downloadThis;
        function __construct($d = WDrive_DEFAULT_ID){
            is_dir("play_cache") || mkdir("play_cache",0777);
            $this->gdid = $d;
        }
        private function _getCode($in = 360){
            switch ($in){
                case "sd":
                case "480":
                    $this->v_code = 59;
                    $this->v_res = 480;
                    break;
                case "hd":
                case "720":
                    $this->v_code = 22;
                    $this->v_res = 720;
                    break;
                case "fhd":
                case "1080":
                    $this->v_code = 37;
                    $this->v_res = 1080;
                    break;
                default:
                    $this->v_code = 18;
                    $this->v_res = 360;
                    break;

            }
        }
        private function _getCache($a,$b = null){
            $cachefile = "play_cache/"."PLAY_".md5($a);
            $cachetime = 3600 * 4;
            if($b){
                $fp = fopen($cachefile, 'w');
                fwrite($fp, $b);
                fclose($fp);
                return $b;
            }
            if (file_exists($cachefile) && time() - $cachetime < filemtime($cachefile)){
                return file_get_contents($cachefile);
            }
            return;
        }
        private function _setHeader($cookies){
            if (!empty($cookies)) {
                $headers = array('Cookie: ' . $cookies);
            }
            else {
                $headers = array();
            }
            if (isset($_SERVER['HTTP_RANGE'])) {
                $headers[] = 'Range: ' . $_SERVER['HTTP_RANGE'];
            }
            return $headers;
        }
        private function _getContent($url,$cookie = false){
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HEADER, $cookie);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 15);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
            $result = curl_exec($ch);
            $info = curl_getinfo($ch);
            if ($cookie === true) {
                $header = substr($result, 0, $info['header_size']);
                //$result = substr($result, $info['header_size']);
                $data = preg_replace("/[\\n\\r]+/", "", $result);
                $data = str_replace("\u003d", "%3D", $data);
                $data = str_replace("\u0026", "%26", $data);
                $data = str_replace("/", "%2F", $data);
                $data = str_replace(":", "%3A", $data);
                $data = str_replace("|", "%7C", $data);
                $data = str_replace("?", "%3F", $data);
                $saus = explode('"]]],', explode('",[[["', $data)[1])[0];
                // $saus = str_replace('"','', $saus);
                // $saus = str_replace('],[', '&', $saus);
                // $result = str_replace(',', '=', $saus);

                $qwe = explode('"],["', $saus);
                foreach($qwe as $querys){
                    $asd = explode('","', $querys);
                    $zxc[] .= $asd[0] . "=" . str_replace('%2C','%252C',($asd[1]));

                }
                $result = implode( '&', $zxc );
                preg_match_all('/^Set-Cookie:\\s*([^=]+)=([^;]+)/mi', $header, $cookie);

                foreach ($cookie[1] as $i => $val) {
                    $cookies[] = $val . '=' . trim($cookie[2][$i], ' ' . "\n\r\t" . '' . "\0" . '' . "\xb");
                }
            }
            return array("cookie"=> $cookies, "source" => $result);
        }
        private function _getVideoData(){
            if(!$this->gdid) die("Please set Google Drive ID");
            $url = 'https://drive.google.com/e/get_video_info?docid=' . $this->gdid ;
            $saus = "https://drive.google.com/file/d/".$this->gdid;
            $checker = $this->_getCache($this->gdid);
            if($checker){
                $gd = json_decode($checker,1);
            }else{
                $gd = $this->_getContent($saus,true);
                $this->_getCache($this->gdid,json_encode($gd));
            }
            $p = $gd["source"];
            $p = urldecode(explode("&",explode("&fmt_stream_map=",$p)[1])[0]);
            $p = explode(",",$p);
            foreach($p as $w){
                $r = explode("|",$w);
                $link[$r[0]] = $r[1];
            }
            $this->title =  pathinfo(urldecode(explode("&",explode("&title=",$gd["source"])[1])[0]), PATHINFO_FILENAME);
            $this->cookie = implode('; ', $gd["cookie"]);
            $this->link = $link;
        }
        public function setID($d){
            $this->gdid = $d;
        }
        public function setResolution($res = WDrive_DEFAULT_RESOLUTION){
            $this->_getCode($res);
        }
        public function getResolution(){
            $this->_getVideoData();
            foreach ($this->link as $a => $b){
                switch($a){
                    case 18:
                        $c[] = "360p";
                        break;
                    case 59:
                        $c[] = "480p";
                        break;
                    case 22:
                        $c[] = "720p";
                        break;
                    case 37:
                        $c[] = "1080p";
                        break;
                }

            }
            return $c;
        }
        public function setDownload($s = true){
            $this->downloadThis = $s;
        }
        public function stream(){
            if(!$this->v_code) $this->setResolution();
            $this->_getVideoData();
            $options = array(
                'http' => array('header' => $this->_setHeader($this->cookie))
            );
            stream_context_set_default($options);
            if(!$this->link[$this->v_code]) die("404");
            $headers = @json_decode($this->_getCache(md5($this->gdid.$this->v_code)),1);
            if(!count($headers)){
                $headers =  get_headers($this->link[$this->v_code], true);
                if (isset($headers['Location'])) {
                    if (is_array($headers['Location'])) {
                        $headers['Location'] = end($headers['Location']);
                    }
                    $this->link[$this->v_code] = $headers['Location'];
                    $headers = get_headers($this->link[$this->v_code], true);
                    $this->_getCache(md5($this->gdid.$this->v_code),json_encode($headers));
                }
            }

            $status_code = substr($headers[0], 9, 3);
            $source["link"] = $this->link[$this->v_code];
            if(!$source["link"]) die("404");
            header($headers[0]);
            # NOTE : Please dont Remove this Line
            header('Developed-By: Westheme.com');

            if (http_response_code() != '403') {
                if ($this->downloadThis) {
                    header('Pragma: public');
                    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
                    header('Content-Disposition: attachment; filename="'.$this->title.' [' . $this->v_res . 'p].mp4"');
                }
                if (isset($headers['Content-Type'])) {
                    header('Content-Type: ' . $headers['Content-Type']);
                }
                if (isset($headers['Content-Length'])) {
                    header('Content-Length: ' . $headers['Content-Length']);
                }
                if (isset($headers['Accept-Ranges'])) {
                    header('Accept-Ranges: ' . $headers['Accept-Ranges']);
                }
                if (isset($headers['Content-Range'])) {
                    header('Content-Range: ' . $headers['Content-Range']);
                }
                $fp = fopen($source['link'], 'rb');
                while (!feof($fp)) {
                    echo fread($fp, 1024 * 1024 * 7);
                    flush();
                    ob_flush();
                }

                fclose($fp);
            }
            else {
                die("404");
            }
        }
    }
}
