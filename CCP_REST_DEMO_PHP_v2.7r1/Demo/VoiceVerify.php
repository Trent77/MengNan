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
    * 语音验证码
    * @param verifyCode 验证码内容，为数字和英文字母，不区分大小写，长度4-8位
    * @param playTimes 播放次数，1－3次
    * @param to 接收号码
    * @param displayNum 显示的主叫号码
    * @param respUrl 语音验证码状态通知回调地址，云通讯平台将向该Url地址发送呼叫结果通知
    * @param lang 语言类型。取值en（英文）、zh（中文），默认值zh。
    * @param userData 第三方私有数据
    */
  function voiceVerify($verifyCode,$playTimes,$to,$displayNum,$respUrl,$lang,$userData)
  {
        // 初始化REST SDK
        global $accountSid,$accountToken,$appId,$serverIP,$serverPort,$softVersion;
        $rest = new REST($serverIP,$serverPort,$softVersion);
        $rest->setAccount($accountSid,$accountToken);
        $rest->setAppId($appId);

        //调用语音验证码接口
        echo "Try to make a voiceverify,called is $to <br/>";
        $result = $rest->voiceVerify($verifyCode,$playTimes,$to,$displayNum,$respUrl,$lang,$userData);
         if($result == NULL ) {
            echo "result error!";
            break;
        }

        if($result->statusCode!=0) {
            echo "error code :" . $result->statusCode . "<br>";
            echo "error msg :" . $result->statusMsg . "<br>";
            //TODO 添加错误处理逻辑
        } else{
            echo "voiceverify success!<br>";
            // 获取返回信息
            $voiceVerify = $result->VoiceVerify;
            echo "callSid:".$voiceVerify->callSid."<br/>";
            echo "dateCreated:".$voiceVerify->dateCreated."<br/>";
           //TODO 添加成功处理逻辑
        }
}

//Demo调用,参数填入正确后，放开注释可以调用
//voiceVerify("验证码内容","循环播放次数","接收号码","显示的主叫号码","营销外呼状态通知回调地址",'语言类型','第三方私有数据');
?>
