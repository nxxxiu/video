<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use OSS\Core\OssException;
use OSS\OssClient;

class VideoController extends Controller
{
    protected $AccessKeyId='LTAIQCB8iUUAb7qN';
    protected $AccessKeySecret='6g2bbbdIibTrclWQBBeD2tlReYtkkr';
    protected $username='oss-cn-beijing.aliyuncs.com';
    protected $bucket='bucket1809a';

    //转移视频文件到oss
    public function saveToOss()
    {
        //视频转移后 删除本地文件
        $ossClient = new OssClient($this->AccessKeyId, $this->AccessKeySecret, $this->username);
        //获取目录中的文件
        $file_path=storage_path('app/public/files');
        $file_list=scandir($file_path);
//        echo "<pre>";print_r($file_list);echo "</pre>";
        foreach ($file_list as $k=>$v){
            if ($v=='.' || $v=='..'){
                continue;
            }
            $file_name=Str::random(5).'.jpg';
            $local_file=$file_path.'/'.$v;
            echo $local_file;
            try{
                $ossClient->uploadFile($this->bucket,$file_name,$local_file);
            } catch (OssException $e){
                printf(__FUNCTION__);
                printf($e->getErrorMessage());
                return;
            }

            //上传成功后删除本地文件
            echo $local_file.'上传成功';echo '<br>';
//            unlink($local_file);
        }

    }

    //详情页面
    public function detail()
    {
        $vid=$_GET['vid'];
        $data=Video::where(['vid'=>$vid])->first()->toArray();
//        echo "<pre>";print_r($data);echo "</pre>";
        return view('video.detail',compact('data'));
    }
}
