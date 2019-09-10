<?php
/*
 *  Copyright (c) 2014 The CCP project authors. All Rights Reserved.
 *
 *  Use of this source code is governed by a Beijing Speedtong Information Technology Co.,Ltd license
 *  that can be found in the LICENSE file in the root of the web site.
 *
 *   http://www.yuntongxun.com
 *
 *  An additional intellectual property rights grant can be found
 *  in the file PATENTS.  All contributing project authors may
 *  be found in the AUTHORS file in the root of the source tree.
 */

include_once("../SDK/CCPRestSDK.php");

//主帐号
$accountSid= '';

//主帐号Token
$accountToken= '';

//应用Id
$appId='';

//请求地址，格式如下，不需要写https://  ,只支持在生产环境用
$serverIP='app.cloopen.com';

//请求端口 
$serverPort='8883';

//REST版本号
$softVersion='2013-12-26';

      /**
    * 语音文件上传
    * @param filename     文件名
    * @param path   文件所在路径
    */
function MediaFileUpload($filename,$path){
    // 初始化REST SDK
    global $accountSid,$accountToken,$appId,$serverIP,$serverPort,$softVersion;
    $rest = new REST($serverIP,$serverPort,$softVersion);
    $rest->setAccount($accountSid,$accountToken);
    $rest->setAppId($appId);
            
    $filePath = $path;                           
    $fh = fopen($filePath, "rb");
    $body = fread($fh, filesize($filePath));
    fclose($fh);
    
    // 调用语音文件上传接口
     $result = $rest->MediaFileUpload($filename,$body);
     if($result == NULL ) {
         echo "result error!";
         break;
     }
     if($result->statusCode!=0) {
        echo "error code :" . $result->statusCode . "<br>";
        echo "error msg :" . $result->statusMsg . "<br>";
        //TODO 添加错误处理逻辑
     }else{
        echo "MediaFileUpload success!<br/>";
        //TODO 添加成功处理逻辑
     }     
}

//Demo调用,参数填入正确后，放开注释可以调用
//MediaFileUpload("文件名","文件二进制数据");
?>
