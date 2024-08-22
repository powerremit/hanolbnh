<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function alert($msg) {
	echo "<script type='text/javascript'>alert('".$msg."');</script>";
}

function alert_back($msg) {
	echo "<script type='text/javascript'>alert('".$msg."');history.back();</script>";
}

function siteURL() {
	$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
	$domainName = $_SERVER['HTTP_HOST'] . '/';
	return $protocol . $domainName;
}

function getProtocol() {
	return (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
}

function check_ajax(){
	$is_ajax = "0";

	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
		strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
		$is_ajax = "1";
	}else {
		$is_ajax = "0";
	}

	return $is_ajax;
}

function getRandStr($length = 6) {
	$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
}

function format_phone($phone){
	$phone = preg_replace("/[^0-9]/", "", $phone);
	$length = strlen($phone);

	switch($length){
		case 11 :
			return preg_replace("/([0-9]{3})([0-9]{4})([0-9]{4})/", "$1-$2-$3", $phone);
			break;
		case 10:
			return preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "$1-$2-$3", $phone);
			break;
		default :
			return false;
			break;
	}
}

function is($var,$init = "" )
{
	if (isset($_POST[$var]) && $_POST[$var] != "")
	{
		return $_POST[$var];
	}
	else if (isset($_GET[$var]) && $_GET[$var] != "")
	{
		return $_GET[$var];
	}
	else
	{
		return $init;
	}
}

function passing_time($datetime) {
	$time_lag = time() - strtotime($datetime);

	if($time_lag < 60) {
		$posting_time = "Just before";
	} elseif($time_lag >= 60 and $time_lag < 3600) {
		$posting_time = floor($time_lag/60)."minutes ago";
	} elseif($time_lag >= 3600 and $time_lag < 86400) {
		$posting_time = floor($time_lag/3600)."hours ago";
	} elseif($time_lag >= 86400 and $time_lag < 2419200) {
		$posting_time = floor($time_lag/86400)."days ago";
	} else {
		$posting_time = date("y-m-d", strtotime($datetime));
	}

	return $posting_time;
}

function getRealClientIp() {

	$ipaddress = '';

	if (getenv('HTTP_CLIENT_IP')) {
		$ipaddress = getenv('HTTP_CLIENT_IP');
	} else if(getenv('HTTP_X_FORWARDED_FOR')) {
		$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
	} else if(getenv('HTTP_X_FORWARDED')) {
		$ipaddress = getenv('HTTP_X_FORWARDED');
	} else if(getenv('HTTP_FORWARDED_FOR')) {
		$ipaddress = getenv('HTTP_FORWARDED_FOR');
	} else if(getenv('HTTP_FORWARDED')) {
		$ipaddress = getenv('HTTP_FORWARDED');
	} else if(getenv('REMOTE_ADDR')) {
		$ipaddress = getenv('REMOTE_ADDR');
	} else {
		$ipaddress = '알수없음';
	}
	return $ipaddress;
}

function setLanguage(){
	$CI =& get_instance();
	if(!array_key_exists('lang', $_COOKIE)) {
		$CI->config->set_item('language', 'korean');
	}else{
		$CI->config->set_item('language', $_COOKIE['lang']);
	}
}

function sessionCheck(){
	if(!element('email', $_SESSION)){
		redirect('/');
	}
}

function getLangType($language){
	switch ($language)
	{
		case 'korean' :
			return 'ko';
		case 'english' :
			return 'en';
		case 'vietnam' :
			return 'vn';
		default :
			return 'en';
	}
}

function getPaginationStr($ci_pagination_create_links){
	$pagination = str_replace('>First', ' class="start"><span class="sr-only">처음</span>', $ci_pagination_create_links);
	$pagination = str_replace('rel="prev">', 'rel="prev" class="before"><span class="sr-only"이전</span>', $pagination);
	$pagination = str_replace('rel="next">', 'rel="next" class="next"><span class="sr-only"다음</span>', $pagination);
	$pagination = str_replace('>Last', ' class="end"><span class="sr-only">마지막</span>', $pagination);
	$pagination = str_replace('href="', 'href="javascript:void(0);" data-cond="', $pagination);
	$pagination = str_replace('<strong>', '<a href="javascript:;" class="active">', $pagination);
	$pagination = str_replace('</strong>', '</a>', $pagination);

	return $pagination;
}

function galleryCheck(){
	// 로그인 했는데 np가 없는 경우
	if(!isset($_SESSION['gallery_idx']) || !isset($_SESSION['gallery_name'])) {
		redirect('/gallery/create');
	}

}

function getImagePath($image_path, $image_enc, $type=0){//$type = 0 이면 리사이즈경로, 1이면 원본
	$host = PIKI_DOMAIN;

	$path_res = null;

	if($type == 0){
		$path_res = $host . '/data/' . $image_path . '/' . $image_enc;
	}
	else if($type == 1){
		$enc_name = explode('_resize', $image_enc);
		$path_res = $host . '/data/' . $image_path . '/' . $enc_name[0].$enc_name[1];
	}

	return $path_res;
}

function getImagePath2($path){
	$host = PIKI_DOMAIN;

	$path_res = $host . '/data/' . $path;

	return $path_res;
}

function getVideoPath($video_path, $timeout){// $video_path는 tbl_video_transcoder 의 to 인자를 받아야함, $timeout은 재생시간을 뜻함. 소유권이 있으면 -1 없으면 미리보기시간
	if(ENVIRONMENT === 'prod'){
		$url = 'https://play.pikit.space/path';
	}
	else if(ENVIRONMENT === 'dev'){
		$url = 'https://play.pikit.space/path';
	}
	else{
		$url = 'https://play.pikit.space/path';
	}

	$input_param = array(
		'name' => 'piki/'.$video_path,
		'timeout' => $timeout
	);

	$res = request_curl($url, 'post' , true , $input_param);
	$encode_res = json_decode($res);

	return $encode_res->path;
}

function getImagePathPlace($image_path, $type=0){//$type = 0 이면 리사이즈경로, 1이면 원본
	$host = PIKI_DOMAIN;

	$path_res = null;

	$path_res = $host . '/data/' . $image_path;

	return $path_res;
}

function check_image_extension($file_path){
	$extension = image_type_to_mime_type(exif_imagetype($file_path));
	if($extension == 'image/jpg' || $extension == 'image/jpeg' || $extension == 'image/png' || $extension == 'image/gif'){
		return true;
	}
	else{
		return false;
	}
}

function upload_file($fileName, $folder, $path_type='1'){

	/* 업로드 경로가 프로젝트 보다 상위에 있을 때 */
	if($path_type=='2') {

		$uploaddir = $folder;

		if ( !is_dir($uploaddir))
		{
			mkdir($uploaddir, 0755, TRUE);
		}
	}else {

		$uploaddir = '/uploads/'.$folder.'/';

		if ( !is_dir(".".$uploaddir))
		{
			mkdir(".".$uploaddir, 0755, TRUE);
		}
	}

	$file = null;
	$imageDataArr = array();
	$image = null;

	if(isset($_FILES[$fileName]) && $_FILES[$fileName]['name']!='') {

		$ext = substr(strrchr($_FILES[$fileName]['name'], '.'), 1);
		$name = uniqid() . '.' . $ext;    // $_FILES['filename']['name'];
		$uploadfile = $uploaddir . $name;

		if($path_type=='2') {
			$file = move_uploaded_file($_FILES[$fileName]['tmp_name'], $uploadfile);
		}else {
			$file = move_uploaded_file($_FILES[$fileName]['tmp_name'], ".".$uploadfile);
		}

		$imageDataArr['type'] = $fileName;
		$imageDataArr['ext'] = $ext;
		$imageDataArr['name'] = $name;
		$imageDataArr['name_origin'] = $_FILES[$fileName]['name'];
		$imageDataArr['directory'] = $uploadfile;
		$imageDataArr['size'] = $_FILES[$fileName]['size'];
	}

	return $imageDataArr;
}

/* path_type : 1은 프로젝트 내부, 2는 외부(서버상단접근) */
function multi_upload_file($fileName, $path, $path_type='1'){

	$uploaddir = $path;

	/* 업로드 경로가 프로젝트 보다 상위에 있을 때 */
	if($path_type=='2') {
		if ( !is_dir($uploaddir))
		{
			mkdir($uploaddir, 0755, TRUE);
		}
	}else {
		if ( !is_dir(".".$uploaddir))
		{
			mkdir(".".$uploaddir, 0755, TRUE);
		}
	}

	$file = null;
	$imageDataArr = array();
	$image = null;

	for($i=0;$i<count($_FILES[$fileName]['name']);$i++) {
		if(isset($_FILES[$fileName]) && $_FILES[$fileName]['name'][$i]!='') {
			$ext = substr(strrchr($_FILES[$fileName]['name'][$i], '.'), 1);
			$name = uniqid() . '.' . $ext;    // $_FILES['filename']['name'];
			$uploadfile = $uploaddir . $name;

			if($path_type=='2') {
				$file = move_uploaded_file($_FILES[$fileName]['tmp_name'][$i], $uploadfile);
			}else {
				$file = move_uploaded_file($_FILES[$fileName]['tmp_name'][$i], ".".$uploadfile);
			}

			$imageDataArr[$i]['type'] = $fileName;
			$imageDataArr[$i]['ext'] = $ext;
			$imageDataArr[$i]['name'] = $name;
			$imageDataArr[$i]['name_origin'] = $_FILES[$fileName]['name'][$i];
			$imageDataArr[$i]['directory'] = $uploadfile;
			$imageDataArr[$i]['size'] = $_FILES[$fileName]['size'][$i];
			$imageDataArr[$i]['sort'] = $i+1;  // 추후 정렬 순서 변경예정
		}
	}

	return $imageDataArr;
}

function upload_file_date($fileName, $folder){
	$date = Date('Ymd');
	$uploaddir = '/uploads/'.$folder.'/'.$date.'/origin/';

	if ( !is_dir(".".$uploaddir))
	{
		mkdir(".".$uploaddir, 0777, TRUE);
	}

	$file = null;
	$imageDataArr = array();
	$image = null;

	if(isset($_FILES[$fileName]) && $_FILES[$fileName]['name']!='') {

		$ext = substr(strrchr($_FILES[$fileName]['name'], '.'), 1);
		$name = uniqid() . '.' . $ext;    // $_FILES['filename']['name'];
		$uploadfile = $uploaddir . $name;

		$file = move_uploaded_file($_FILES[$fileName]['tmp_name'], ".".$uploadfile);

		$imageDataArr['type'] = $fileName;
		$imageDataArr['ext'] = $ext;
		$imageDataArr['name'] = $name;
		$imageDataArr['name_origin'] = $_FILES[$fileName]['name'];
		$imageDataArr['directory'] = $uploadfile;
		$imageDataArr['size'] = $_FILES[$fileName]['size'];
	}

	return $imageDataArr;
}

function phpTohtml($string){
	return str_replace(array("\r\n", "\r"," \n"), " </br>", htmlspecialchars_decode($string,ENT_QUOTES));
}

function get_today_from_date($date) {
	$start_data = new DateTime($date);
	$end_date = new DateTime();
	$diff_days = date_diff($start_data, $end_date);

	return $diff_days->days;
}

function evpKDF($password, $salt, $keySize = 8, $ivSize = 4, $iterations = 1, $hashAlgorithm = "md5") {
	$targetKeySize = $keySize + $ivSize;
	$derivedBytes = "";
	$numberOfDerivedWords = 0;
	$block = NULL;
	$hasher = hash_init($hashAlgorithm);
	while ($numberOfDerivedWords < $targetKeySize) {
		if ($block != NULL) {
			hash_update($hasher, $block);
		}
		hash_update($hasher, $password);
		hash_update($hasher, $salt);
		$block = hash_final($hasher, TRUE);
		$hasher = hash_init($hashAlgorithm);
		// Iterations
		for ($i = 1; $i < $iterations; $i++) {
			hash_update($hasher, $block);
			$block = hash_final($hasher, TRUE);
			$hasher = hash_init($hashAlgorithm);
		}
		$derivedBytes .= substr($block, 0, min(strlen($block), ($targetKeySize - $numberOfDerivedWords) * 4));
		$numberOfDerivedWords += strlen($block)/4;
	}
	return array(
		"key" => substr($derivedBytes, 0, $keySize * 4),
		"iv"  => substr($derivedBytes, $keySize * 4, $ivSize * 4)
	);
}

function cryptoJSdecrypt($ciphertext, $password) {
	$ciphertext = base64_decode($ciphertext);
	if (substr($ciphertext, 0, 8) != "Salted__") {
		return false;
	}
	$salt = substr($ciphertext, 8, 8);
	$keyAndIV = evpKDF($password, $salt);
	$decryptPassword = openssl_decrypt(
		substr($ciphertext, 16),
		"aes-256-cbc",
		$keyAndIV["key"],
		OPENSSL_RAW_DATA, // base64 was already decoded
		$keyAndIV["iv"]);
	return $decryptPassword;
}

function getUsDateStr($date,$type=0){
	$str_month = array('Jan','Feb','Mar','Apr','May','June','July','Aug','Sep','Oct','Nov','Dec');
	$date_time = strtotime($date);
	if($type==1){
		$date_time = $date;
	}
	$day = date('d',$date_time);
	$month = date('m',$date_time) - 1;
	$year = date('Y',$date_time);
	$str = $str_month[(int)$month].' '.$day.', '.$year;

	return $str;
}

function getViews($views)
{
	if($views == null){
		return 0;
	}
	else if($views < 1000){
		return $views;
	}
	else if($views >= 1000 && $views < 1000000){
		return floor($views/100)/10 + 'K';
	}
	else if($views >= 1000000 && $views < 1000000000){
		return floor($views/100000)/10 + 'M';
	}
	else if($views >= 1000000000 && $views < 1000000000000){
		return floor($views/100000000)/10 + 'G';
	}
	else if($views >= 1000000000000 && $views < 1000000000000000){
		return floor($views/100000000000)/10 + 'T';
	}
	else{
		return 'countless';
	}
}

function format_price($price) {
	$price_array = explode('.',$price);
	$price_int = $price_array[0];

	if(isset($price_array[1])){
		$price_des = $price_array[1];
	}
	$price_result = '';

	for($i=0 ; $i < strlen($price_int) ; $i++){
		if($i % 3 == 0 && $i != 0){
			$price_result = ','.$price_result;
		}
		$price_result = substr($price_int,-($i+1),1).$price_result;
	}

	if(isset($price_array[1])) {
		$price_result .= '.'.$price_des;
	}

	return $price_result;
}

function send_directsend_mail($_subject, $_body, $_recipients){

	$ch = curl_init();
	$subject = $_subject;   //필수입력(템플릿 미사용시), 템플릿 사용시 공백을 입력 하시기 바랍니다.
	$body = $_body;
//		$sender = "no-reply@n-bus.net";
//		$sender_name = "n-bus";
	$sender = "no-reply@piki.market";
	$sender_name = "piki market";
//		$username = "bos12345";
//		$key = "FtCSXOlYFPNtREp";
	$username = "sigmachain";
	$key = "OdsQMko2mcMRZOb";
	$receiver = '{"email":"'.$_recipients.'"}'
	;
	$receiver = '['.$receiver.']';      //JSON 데이터

	$postvars = '"subject":"'.$subject.'"';
	$postvars = $postvars.', "body":"'.$body.'"';
	$postvars = $postvars.', "sender":"'.$sender.'"';
	$postvars = $postvars.', "sender_name":"'.$sender_name.'"';
	$postvars = $postvars.', "username":"'.$username.'"';
	$postvars = $postvars.', "receiver":'.$receiver;

	$postvars = $postvars.', "key":"'.$key.'"';
	$postvars = '{'.$postvars.'}';      //JSON 데이터

	$url = "https://directsend.co.kr/index.php/api_v2/mail_change_word";
	$headers = array(
		"cache-control: no-cache",
		"content-type: application/json; charset=utf-8"
	);

	curl_setopt($ch,CURLOPT_URL, $url);
	curl_setopt($ch,CURLOPT_POST, true);
	curl_setopt($ch,CURLOPT_POSTFIELDS, $postvars);		//JSON 데이터
	curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch,CURLOPT_CONNECTTIMEOUT ,3);
	curl_setopt($ch,CURLOPT_TIMEOUT, 60);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	$response = curl_exec($ch);
	//SSL certificate problem: unable to get local issuer certificate
	$status = json_decode($response)->status;


	if(curl_errno($ch)){
		$res_data['status'] = 'fail';
		$res_data['msg'] = $status;
		log_message("info", 'Curl error: ' . curl_error($ch));
		log_message("info", 'error msg : ' . $status);
	}else{
		$res_data['status'] = 'success';
		$res_data['msg'] = '';
		log_message("info","mail send success to ".$_recipients ."\nresponse : ".$response);
	}

	curl_close ($ch);

	return $res_data;
}

//	function recaptcha_validate(){
//		$captcha_response 		= htmlspecialchars($this->input->post('response', true));
//
//		$curl = curl_init();
//		$captcha_verify_url = "https://www.google.com/recaptcha/api/siteverify";
//		log_message("info","secret=".$this->config->item('recaptcha_secret_key')."&response=".$captcha_response);
//		curl_setopt($curl, CURLOPT_URL,$captcha_verify_url);
//		curl_setopt($curl, CURLOPT_POST, true);
//		curl_setopt($curl, CURLOPT_POSTFIELDS, "secret=".$this->config->item('recaptcha_secret_key')."&response=".$captcha_response);
//		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
//		$captcha_output = curl_exec ($curl);
//		curl_close ($curl);
//		$encoded_output = json_encode($captcha_output);
//
////		echo $encoded_output;
//		return $captcha_output;
//	}
?>
