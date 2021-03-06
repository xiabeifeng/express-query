<?php

namespace Xiabeifeng\ExpressQuery;

class KuaiDi100 implements ExpressQueryInterface
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

        $curl = new \Curl\Curl();
        $curl->setUserAgent($_SERVER['HTTP_USER_AGENT']);
        $curl->setReferrer($referer);
        $curl->setOpt(CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
        $curl->post($url);
        if ($curl->error) {
            $response = array('errno'=>$curl->error_code, 'message'=>$curl->error_message);
        } else {
            $data = json_decode($curl->response);
            if ($data->status == 200) {
                $response = array('errno'=>0, 'data'=>$data);                
            } else {
                throw new \Exception($data->message, $data->status);
            }
        }
        $curl->close();
        return $response;
    }
}
