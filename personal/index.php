<?php
header("Content-type: text/html; charset=utf-8");
  require_once "email.class.php";
  //******************** 配置信息 ********************************
  $smtpserver = "ssl://smtp.qq.com";//SMTP服务器
//ssl://smtp.qq.com:465
  $smtpserverport =465;//SMTP服务器端口
  $smtpusermail = "1241485238@qq.com";//SMTP服务器的用户邮箱
  $smtpemailto = "1280258420@qq.com";//发送给谁
  $smtpuser = "1241485238";//SMTP服务器的用户帐号
  $smtppass = "jnpopprydtksheia";//SMTP服务器的用户密码
  $mailtitle = $_POST['title'];//邮件主题
  $mailcontent = "<h1>".$_POST['body']."</h1>";//邮件内容
  $mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件
  //************************ 配置信息 ****************************
  $smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证.
  $smtp->debug = true;//是否显示发送的调试信息
  $state = $smtp->sendmail($smtpemailto, $smtpusermail, $mailtitle, $mailcontent, $mailtype);

  echo "<div style='width:300px; margin:36px auto;'>";
  if($state==""){
    echo "对不起，邮件发送失败！请检查邮箱填写是否有误。";
    echo "<a href='index.html'>点此返回</a>";
    exit();
  }
  echo "恭喜！邮件发送成功！！";
  echo "<a href='index.html'>点此返回</a>";
  echo "</div>";
