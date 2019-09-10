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

//请求地址，格式如下，不需要写https://
$serverIP='app.cloopen.com';

//请求端口 
$serverPort='8883';

//REST版本号
$softVersion='2013-12-26';

/**
  * IVR外呼
  * @param number   待呼叫号码，为Dial节点的属性
  * @param userdata 用户数据，在<startservice>通知中返回，只允许填写数字字符，为Dial节点的属性
  * @param record   是否录音，可填项为true和false，默认值为false不录音，为Dial节点的属性
  */
function ivrDial($number,$userdata,$record)
{
    // 初始化REST SDK
    global $accountSid,$accountToken,$appId,$serverIP,$serverPort,$softVersion;
    $rest = new REST($serverIP,$serverPort,$softVersion);
    $rest->setAccount($accountSid,$accountToken);
    $rest->setAppId($appId);
    
    // 调用IVR外呼接口
     $result = $rest->ivrDial($number,$userdata,$record);
     if($result == NULL ) {
         echo "result error!";
         break;
     }
     if($result->statusCode!=0) {
        echo "error code :" . $result->statusCode . "<br>";
        echo "error msg :" . $result->statusMsg . "<br>";
        //TODO 添加错误处理逻辑
     }else{
        echo "ivrDial success!<br/>";
        //获取返回信息
        echo "callSid:".$result->callSid."<br/>";
        //TODO 添加成功处理逻辑
     }     
}

//Demo调用,参数填入正确后，放开注释可以调用 
//ivrDial("待呼叫号码","用户数据","是否录音");
?>
