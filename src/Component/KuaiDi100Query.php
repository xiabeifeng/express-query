<?php

namespace Component;

use Component\ExpressQueryInterface;
use Curl\Curl;

class KuaiDi100Query implements ExpressQueryInterface
{
    protected $type;                // express type
    protected $postId;              // express number
    protected $id = 1;              // fixed value 
    protected $validateCode = '';   // validate code
    protected $temp;                // random value
    
    public function __construct($type, $postId)
    {
        $this->type = filter_var($type, FILTER_SANITIZE_STRING);
        $this->postId = filter_var($postId, FILTER_SANITIZE_STRING);
        $this->temp = '0.' . rand(1000000000000000, 999999999999999);
    }
    
    public function query()
    {
        $url = 'http://m.kuaidi100.com/query';
        $url .= '?type=' . $this->type . '&postid=' . $this->postId;
        $url .= '&id=' . $this->id . '&valicode=' . $this->validateCode;
        $url .= '&temp=' . $this->temp;
        $referer = 'http://m.kuaidi100.com/index_all.html';

        $curl = new Curl();
        $curl->setUserAgent($_SERVER['HTTP_USER_AGENT']);
        $curl->setReferrer($referer);
        $curl->post($url);
        if ($curl->error) {
            $response = array('errno'=>$curl->error_code, 'message'=>$curl->error_message);
        } else {
            $response = array('errno'=>0, 'data'=>json_decode($curl->response));
        }
        $curl->close();
        return $response;
    }
}
