<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OSS\OssClient;

class OssController extends Controller
{
    protected $AccessKeyId='LTAIQCB8iUUAb7qN';
    protected $AccessKeySecret='6g2bbbdIibTrclWQBBeD2tlReYtkkr';
    protected $username='oss-cn-beijing.aliyuncs.com';
    protected $bucket='bucket1809a';

    public function index(){
        $ossClient = new OssClient($this->AccessKeyId, $this->AccessKeySecret, $this->username);
        $content = $ossClient->putObject($this->bucket, 'b.txt','rebots.txt');
//        $content = $ossClient->putObject($this->bucket, 'b.jpg','qq.jpg');
        print_r($content);
    }

    public function videoindex(){
        $Client= new OssClient($this->AccessKeyID,$this->AccessKeySecret,env('USERNAME'));
        $file_name1=rand(1,10).mt_rand(1,9999999).'.jpg';
        $file_name2='b.jpg';
        $response=$Client->uploadFile($this->bucket_name,$file_name1,$file_name2);
        var_dump($response);
    }
}
