<?php 

function contact_send() {
  $my_POST = json_decode(file_get_contents('php://input'), true);
  
  mb_language("Japanese");
  mb_internal_encoding("UTF-8");

  $to = "o.yamaneko0331@gmail.com";
  $subject = "TEST";
  $headers = "Content-Type: text/plain; charset=utf-8 \n";
  $headers .= "Content-Transfer-Encoding: BASE64 \n";
  $smarty = new Smarty();
  $smarty->setTemplateDir('assets/smarty/template/');
  $smarty->setCompileDir('assets/smarty/template_c/');
  $smarty->assign($my_POST);

  $body = $smarty->fetch('mail.tpl');
  
  // return $body;
  return mb_send_mail($to, $subject, $body, $headers);
}

?>