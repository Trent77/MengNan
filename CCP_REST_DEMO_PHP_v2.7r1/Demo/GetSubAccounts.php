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
  * 获取子帐号
  * @param startNo 开始的序号，默认从0开始
  * @param offset 一次查询的最大条数，最小是1条，最大是100条
  */
function getSubAccounts($startNo,$offset)
{
    // 初始化REST SDK
    global $accountSid,$accountToken,$appId,$serverIP,$serverPort,$softVersion;
    $rest = new REST($serverIP,$serverPort,$softVersion);
    $rest->setAccount($accountSid,$accountToken);
    $rest->setAppId($appId);
    
    // 调用云通讯平台的获取子帐号接口
    echo "Try to get subaccount list<br/>";
    $result = $rest->getSubAccounts($startNo,$offset);
    if($result == NULL ) {
        echo "result error!";
        break;
    }
    if($result->statusCode!=0) {
        echo "error code :" . $result->statusCode . "<br/>";
        echo "error msg :" . $result->statusMsg . "<br>";
        //TODO 添加错误处理逻辑
    }else {
        echo "get SubbAccount list success<br/>";
        // 获取返回信息
        $subaccount = $result->SubAccount;
        for($i =0;$i<count($subaccount);$i++){
           echo "subAccountid:".$subaccount[$i]->subAccountSid."<br/>";
           echo "subToken:".$subaccount[$i]->subToken."<br/>";
           echo "dateCreated:".$subaccount[$i]->dateCreated."<br/>";
           echo "voipAccount:".$subaccount[$i]->voipAccount."<br/>";
           echo "voipPwd:".$subaccount[$i]->voipPwd."<br/>";
           echo "friendlyName:".$subaccount[$i]->friendlyName."<br/>";
           echo "<br/>";   
        }
        //TODO 把云平台子帐号信息存储在您的服务器上.
        //TODO 添加成功处理逻辑 
    }          
}

//Demo调用,参数填入正确后，放开注释可以调用
//getSubAccounts("开始的序号","一次查询的最大条数"); 
?>
