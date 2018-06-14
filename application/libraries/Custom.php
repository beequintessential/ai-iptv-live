<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 *
 * @package     CodeIgniter
 * @subpackage          Libraries
 * @author      Manu Mahesh
 */
class Custom {

    var $CI;

    function is_admin() {

        $this->CI = & get_instance();
        $this->CI->load->library('session');
        $userInfo = $this->CI->session->userdata('userInfo');
        if ($userInfo !== NULL && ($userInfo['user_type'] == 'Admin')) {
            return true;
        }
        return false;
    }
    function is_user() {

        $this->CI = & get_instance();
        $this->CI->load->library('session');
        $userInfo = $this->CI->session->userdata('userInfo');
        if ($userInfo !== NULL && ($userInfo['user_type'] == 'User')) {
            return true;
        }
        return false;
    }

    function is_pro() {

        $this->CI = & get_instance();
        $this->CI->load->library('session');
        $userInfo = $this->CI->session->userdata('userInfo');
        if ($userInfo !== NULL && $userInfo['user_type'] == 'Pro') {
            return true;
        }
        return false;
    }

    function is_customer() {

        $this->CI = & get_instance();
        $this->CI->load->library('session');
        $userInfo = $this->CI->session->userdata('userInfo');
        if ($userInfo !== NULL && $userInfo['user_type'] == 'Customer') {
            return true;
        }
        return false;
    }

    function is_logged_in() {

        $this->CI = & get_instance();
        $this->CI->load->library('session');
        $userInfo = $this->CI->session->userdata('userInfo');
        if ($userInfo !== NULL) {
            return true;
        }
        return false;
    }

    /*
     * Print array inside pre tag
     */

    function pre($array, $die = false) {
        echo '<pre>';
        print_r($array);
        echo '</pre>';
        if ($die === true) {
            die;
        }
    }

    /*
     * Get random alphanumaric string 
     */

    function rand_alph_str($lenth) {
        $ramdomStr = md5(date('YmdHis') . rand());
        $lenth = ($lenth > 32) ? 32 : $lenth;
        return substr($ramdomStr, rand(0, (strlen($ramdomStr) - $lenth)), $lenth);
    }

    /*
     * Get elapsed time
     */

    function time_elapsed_string($ptime, $show_mins = true) {

        $diff = strtotime('now') - $ptime;

        $date1 = date_create(date('Y-m-d H:i:s'));
        $date2 = date_create(date('Y-m-d H:i:s', $ptime));
        $diff = date_diff($date1, $date2);
        if ($show_mins == true) {
            return $diff->format("%a days %h hours %i minutes");
        }
        return $diff->format("%a days %h hours");
    }

    /*
     * Create slug
     */

    function slugify($slug) {
        $slug = preg_replace('~[^\pL\d]+~u', '-', $slug);
        $slug = iconv('utf-8', 'us-ascii//TRANSLIT', $slug);
        $slug = preg_replace('~[^-\w]+~', '', $slug);
        $slug = trim($slug, '-');
        $slug = preg_replace('~-+~', '-', $slug);
        $slug = strtolower($slug);
        if (empty($slug)) {
            return false;
        }
        return $slug;
    }

    /*
     * Get lat lng from zipcode
     */

    function getlatlong($address) {
        $url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . urlencode($address) . "&key=AIzaSyAVtuAfElwIisqH4D1GzbndV3BBz9zuZjA";
        $ch = curl_init();
        $curlConfig = array(
            CURLOPT_URL => $url,
            CURLOPT_POST => false,
            CURLOPT_RETURNTRANSFER => true
        );
        curl_setopt_array($ch, $curlConfig);
        $result = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($result, true);

        $result['results'][0]['geometry']['location']['lat'];
        $lat = ($result['results'][0]['geometry']['location']['lat'] == '') ? '0' : $result['results'][0]['geometry']['location']['lat'];
        $lng = ($result['results'][0]['geometry']['location']['lng'] == '') ? '0' : $result['results'][0]['geometry']['location']['lng'];
        return array('lat' => $lat, 'lng' => $lng);
    }

    function get_distance_address($orgin, $destination) {
        $url = "https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=" . urlencode($orgin) . "&destinations=" . urlencode($destination) . "&key=AIzaSyAVtuAfElwIisqH4D1GzbndV3BBz9zuZjA";
        $ch = curl_init();
        $curlConfig = array(
            CURLOPT_URL => $url,
            CURLOPT_POST => false,
            CURLOPT_RETURNTRANSFER => true
        );
        curl_setopt_array($ch, $curlConfig);
        $result = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($result, true);
       $distance = ($result['rows'][0]['elements'][0]['distance']['text'] == '')?'0':$result['rows'][0]['elements'][0]['distance']['text'];
      $distance= explode(" ",$distance);
       return $distance[0];
       // echo $result['rows'][0]['elements'][0]['distance']['text'];
    }

//    
//    function distance($lat1, $lng1, $lat2, $lng2){
//    $pi80 = M_PI / 180;
//    $lat1 *= $pi80;
//    $lng1 *= $pi80;
//    $lat2 *= $pi80;
//    $lng2 *= $pi80;
//    $r = 6372.797; // mean radius of Earth in km
//    $dlat = $lat2 - $lat1;
//    $dlng = $lng2 - $lng1;
//    $a = sin($dlat / 2) * sin($dlat / 2) + cos($lat1) * cos($lat2) * sin($dlng / 2) * sin($dlng / 2);
//    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
//    $km = $r * $c;
//   return floor($km * 0.621371192);
//}
}
