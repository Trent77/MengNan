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
  * 话单下载
  * @param date     day 代表前一天的数据（从00:00 – 23:59）
  * @param keywords   客户的查询条件，由客户自行定义并提供给云通讯平台。默认不填忽略此参数
  */
function billRecords($date,$keywords){
    // 初始化REST SDK
    global $accountSid,$accountToken,$appId,$serverIP,$serverPort,$softVersion;
    $rest = new REST($serverIP,$serverPort,$softVersion);
    $rest->setAccount($accountSid,$accountToken);
    $rest->setAppId($appId);
    
    // 调用话单下载接口
     $result = $rest->billRecords($date,$keywords);
     if($result == NULL ) {
         echo "result error!";
         break;
     }
     if($result->statusCode!=0) {
        echo "error code :" . $result->statusCode . "<br>";
        echo "error msg :" . $result->statusMsg . "<br>";
        //TODO 添加错误处理逻辑
     }else{
        echo "BillRecords success!<br/>";
        // 获取返回信息
        echo "downUrl:".$result->downUrl."<br/>";
        echo "token:".$result->token."<br/>";
        //TODO 添加成功处理逻辑
     }     
}

//Demo调用,参数填入正确后，放开注释可以调用
//billRecords("话单规则","客户的查询条件");
?>
