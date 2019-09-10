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
 * 主帐号信息查询
 */
function queryAccountInfo()
{
    // 初始化REST SDK
    global $accountSid,$accountToken,$appId,$serverIP,$serverPort,$softVersion;
    $rest = new REST($serverIP,$serverPort,$softVersion);
    $rest->setAccount($accountSid,$accountToken);
    $rest->setAppId($appId);
     
    // 调用主帐号信息查询接口
     $result = $rest->queryAccountInfo();
     if($result == NULL ) {
         echo "result error!";
         break;
     } 
     if($result->statusCode!=0) {
         echo "error code :" . $result->statusCode . "<br>";
         echo "error msg :" . $result->statusMsg . "<br>";
         //TODO 添加错误处理逻辑
     }else{
         echo "query AccountInfo success!<br/>";
         // 获取返回信息
         $account = $result->Account;
         echo "friendlyName:".$account->friendlyName."<br/>";
         echo "type:".$account->type."<br/>";
         echo "status:".$account->status."<br/>";
         echo "dateCreated:".$account->dateCreated."<br/>";
         echo "dateUpdated:".$account->dateUpdated."<br/>";
         echo "balance:".$account->balance."<br/>";
         //TODO 添加成功处理逻辑
     }
}

//Demo调用,参数填入正确后，放开注释可以调用
//queryAccountInfo();
?>
