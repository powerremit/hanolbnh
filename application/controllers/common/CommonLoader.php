<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CommonLoader extends CI_Controller
{

    public $data;

    public function __construct()
    {
        parent::__construct();
    }

    public function check_method()
    {
        $method = $this->input->method();
        if ($method == "post") {
            return true;
        } else {
            echo json_encode(array(
                'status' => 'fail'
            , 'msg' => 'method Not valid'
            ));

            exit;
        }

    }

    /*session data를 data 배열에 자동삽입하여 controller에서 사용하고 자동으로 view에 전달 */
    private function set_session_data()
    {

        $all_session = $this->session->all_userdata();
        foreach ($all_session as $key => $value) {
            $this->data[$key] = $value;
        }
    }

//	웹전용
    public function ajax_error_form($msg)
    {
        $res_data = array();
        $res_data['status'] = 'fail';
        $res_data['msg'] = $msg;
        $res_data['token'] = $this->security->get_csrf_hash();
        return json_encode($res_data);
    }

    public function ajax_success_form($result)
    {
        $res_data = array();
        $res_data['status'] = 'success';
        $res_data['result'] = $result;
        $res_data['token'] = $this->security->get_csrf_hash();
        return json_encode($res_data);
    }

//  앱전용. exit; 로직으로 사용요망
//	public function api_error($msg)
//	{
//		$res_data = array();
//		$res_data['status'] = 'fail';
//		$res_data['msg'] = $msg;
//		$res_data['token'] = $this->security->get_csrf_hash();
//		echo json_encode($res_data);
//		exit;
//	}
//
//	public function api_success($result)
//	{
//		$res_data = array();
//		$res_data['status'] = 'success';
//		$res_data['result'] = $result;
//
//		$res_data['token'] = $this->security->get_csrf_hash();
//		echo json_encode($res_data);
//		exit;
//	}

    public function checkLogin()
    {
        if (empty($_SESSION['email'])) {
            goto_url("/");
            exit;
        }
    }

    public function decryptRSA($txt)
    {
        $private_key = "-----BEGIN PRIVATE KEY-----\nMIICdgIBADANBgkqhkiG9w0BAQEFAASCAmAwggJcAgEAAoGBAKTVEL1vmPZroFlOy0SGIUHA7f5vIrHWeo1B++yXLTKggQXQywY6fAJY93WBulqhnk1TuDqB5SQY0UfRykpOWbUeWTvPUptZC8MNU73mD1Ac6QmLFFDlWqKtVUDLLNTk7AOqyf/jSzIlLt9734cHGA0eckDXu0xLkd3nznZMrMDNAgMBAAECgYAFLUqc+IVQWqmq7xDunQaBtIKFDDkwZrEWAK2IjRL2qm3YSz96eZnCz8fYi/ODZzIRRwDb7Y/PJhcPRLqFbO00+HlWv/UQq3V/qCwALKUAGgavcs8th6JsGzfan5sh3EkCKmfsHbLTrdXEjy/5CLQTiN068+ohpcgFEfmYD79lwQJBANTWtGrNmsnzsaY5hypbdWc5iM4Qg81pjMQ8AC/IIeoCTgBr4/5xV/msf79lH3cZQconscaFW+bgEf0GnfO/pVECQQDGQii1V9witARCnvWF87Bg2TumbO/Ge9WnmcpQIw4tF8EZAbfc21bVTham+nsL20br45npPDZNMCLQCnZ3F3S9AkA70IMvqMyhiN0aK/yyiLV75w1ta/K+nbUzyPD8fLAbRb6KG8gdT9k7j6DvNwoavHxixbkOY5gqUDp984gcYnWhAkEAvr2wBKg+9nRTFPVyKinFq6fUJ83u8fr6F4Fyj57qaJ/N+40Xo7iy1g2G5ade8o1IsnILBcYUSDbjh1xJlVJP0QJAWPB3Vzy9PdrPhFbooGINvwbMXg3+vh7WLsrFe/TuYbyUFjmeB7+i+wPJ+nPqlRb36BQW016zMlgGM51UCzBgnA==\n-----END PRIVATE KEY-----";

        openssl_private_decrypt(base64_decode($txt), $decrypted, $private_key);

        return base64_decode($decrypted);//(str_replace("=", "", $decrypted));
    }

    public function encryptRSA($data)
    {
        $rsa_public_key = "-----BEGIN PUBLIC KEY-----\nMIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCk1RC9b5j2a6BZTstEhiFBwO3+byKx1nqNQfvsly0yoIEF0MsGOnwCWPd1gbpaoZ5NU7g6geUkGNFH0cpKTlm1Hlk7z1KbWQvDDVO95g9QHOkJixRQ5VqirVVAyyzU5OwDqsn/40syJS7fe9+HBxgNHnJA17tMS5Hd5852TKzAzQIDAQAB\n-----END PUBLIC KEY-----";

        return $this->rsa_encrypt($rsa_public_key, base64_encode($data));
    }

    private function rsa_encrypt($public_key, $plaintext)
    {
        if (openssl_public_encrypt($plaintext, $encrypted, $public_key)) {
            return base64_encode($encrypted);
        } else {
            return false;
        }
    }

    public function getDecimalString($dec)
    {
        $amount = explode(' ', $dec);
        $a = rtrim($amount[0], "0");

        $temp = explode(".", $a);
        $temp2 = number_format($temp[0]);
        if (count($temp) > 1) {
            $a = $temp2 . "." . $temp[1];
        } else {
            $a = temp2;
        }
        $a = rtrim($a, ".");

        $ret = array(
            'number' => $a,
            'symbol' => $amount[1]
        );

        return $ret;
    }

    function checkRegion()
    {
        $ip = element('HTTP_CF_CONNECTING_IP', $_SERVER, false) ? $_SERVER["HTTP_CF_CONNECTING_IP"] : $_SERVER["REMOTE_ADDR"];;
        $url = "http://ip-api.com/json/{$ip}";
        $response = file_get_contents($url);
        $data = json_decode($response);

        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR', 'HTTP_CF_CONNECTING_IP',) as $key) {
            if (array_key_exists($key, $_SERVER) === true) {
                foreach (array_map('trim', explode(',', $_SERVER[$key])) as $_ip) {
                    if (filter_var($_ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false) {
                        $ip = $_ip;
                    }
                }
            }
        }

        if ($data && $data->status == 'success') {
            return array(
                'region' => strtolower($data->countryCode),
                'ip' => $ip,
            );
        }

        return array(
            'region' => NULL,
            'ip' => $ip,
        );
    }

    public function resize($srcPath, $dscPath, $name, $width, $height)
    {
        $size = getimagesize($srcPath);
        $exif = @exif_read_data($srcPath);
        $imgWidth = $size[0];
        $imgHeight = $size[1];

        if (!is_dir('.' . $dscPath)) {
            mkdir('.' . $dscPath, 0777, TRUE);
        }

        $resize_config['image_library'] = 'GD2';
        $resize_config['source_image'] = $srcPath;
        //$resize_config['thumb_marker'] = '_thumb';
        $resize_config['new_image'] = '.' . $dscPath . $name;
        $resize_config['create_thumb'] = false;
        $resize_config['maintain_ratio'] = true;
        $resize_config['width'] = $width;
        $resize_config['height'] = $height;

        //GIF resize 예외처리
        $filename_arr = explode('.', $name);
        if ($filename_arr[1] === 'gif') {
            copy($resize_config['source_image'], $resize_config['new_image']);
            return;
        }

        if ($imgWidth > $imgHeight) {
            $resize_config['master_dim'] = 'height';
        } else {
            $resize_config['master_dim'] = 'width';
        }

        $this->load->library('image_lib');
        $this->image_lib->clear();
        $this->image_lib->initialize($resize_config);

        $result = $this->image_lib->resize();
        if ($result && isset($exif['Orientation'])) {
            if ($exif['Orientation'] == 6) {
                $degree = 270;
            } // 반시계방향으로 90도 돌려줘야 정상
            else if ($exif['Orientation'] == 8) {
                $degree = 90;
            } else if ($exif['Orientation'] == 3) {
                $degree = 180;
            }

            if (isset($degree)) {
                $dsc = '.' . $dscPath . $name;
                if ($exif['FileType'] == 1) {
                    $source = imagecreatefromgif($dsc);
                    $source = imagerotate($source, $degree, 0);
                    imagegif($source, $dsc);
                } else if ($exif['FileType'] == 2) {
                    $source = imagecreatefromjpeg($dsc);
                    $source = imagerotate($source, $degree, 0);
                    imagejpeg($source, $dsc);
                } else if ($exif['FileType'] == 3) {
                    $source = imagecreatefrompng($dsc);
                    $source = imagerotate($source, $degree, 0);
                    imagepng($source, $dsc);
                }

                imagedestroy($source);
            }
        }

        return $result;
    }

}
