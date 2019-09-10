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
  * 短信模板查询
  * @param templateId     模板ID
  */
function QuerySMSTemplate($templateId){
    // 初始化REST SDK
    global $accountSid,$accountToken,$appId,$serverIP,$serverPort,$softVersion;
    $rest = new REST($serverIP,$serverPort,$softVersion);
    $rest->setAccount($accountSid,$accountToken);
    $rest->setAppId($appId);
    
    // 调用短信模板查询接口
     $result = $rest->QuerySMSTemplate($templateId);
     if($result == NULL ) {
         echo "result error!";
         break;
     }
     if($result->statusCode!=0) {
        echo "error code :" . $result->statusCode . "<br>";
        echo "error msg :" . $result->statusMsg . "<br>";
        //TODO 添加错误处理逻辑
     }else{              
        $TemplateSMS = $result->TemplateSMS;
        for($i =0;$i<count($TemplateSMS);$i++){
           echo "title:".$TemplateSMS[$i]->title."<br/>";
           echo "content:".$TemplateSMS[$i]->content."<br/>";
           echo "status:".$TemplateSMS[$i]->status."<br/>";
           echo "type:".$TemplateSMS[$i]->type."<br/>";
           echo "dateCreated:".$TemplateSMS[$i]->dateCreated."<br/>";
           echo "dateUpdated:".$TemplateSMS[$i]->dateUpdated."<br/>";
           echo "id:".$TemplateSMS[$i]->id."<br/>";
           echo "<br/>";   
        }
     }     
}

//Demo调用,参数填入正确后，放开注释可以调用
//QuerySMSTemplate("模板ID");
?>
