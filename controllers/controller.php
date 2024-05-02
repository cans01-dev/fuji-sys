<?php

use PHPMailer\PHPMailer\PHPMailer;

function index()
{
  global $MyPDO;

  $mansions = $MyPDO->getMansions(null, null, 'random', 6);
  $posts = $MyPDO->getPosts(limit: 3);

  setPageTitle('トップ');
  require_once 'pages/top.php';
}

function contact_get()
{
  setPageTitle('お問い合わせ');
  require_once 'pages/contact.php';
}

function contact_post()
{
  $smarty = new Smarty();
  $smarty->setTemplateDir('assets/smarty/template/');
  $smarty->setCompileDir('assets/smarty/template_c/');
  $smarty->assign($_POST);
  $body = $smarty->fetch('mail.tpl');

  mb_language('uni');
  mb_internal_encoding('UTF-8');

  try {
    // SMTPサーバの設定(https://mailtrap.io/inboxes/2532978/messages/3922085816)を利用
    $phpmailer = new PHPMailer();
    $phpmailer->CharSet = 'utf-8';
    $phpmailer->isSMTP();
    $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = 2525;
    $phpmailer->Username = 'd0bf735109c1e1';
    $phpmailer->Password = 'b110fa3073c215';

    // 送受信先設定（第二引数は省略可）
    $phpmailer->setFrom('info@mseg.jp', '差出人名'); // 送信者
    $phpmailer->addAddress('o.yamaneko0331@gmail.com', '受信者名');   // 宛先
    $phpmailer->addReplyTo('info@mseg.jp', 'お問い合わせ'); // 返信先
    $phpmailer->Sender = 'info@mseg.jp'; // Return-path

    // 送信内容設定
    $phpmailer->Subject = '件名';
    $phpmailer->Body    = $body;

    // 送信
    $phpmailer->send();
  } catch (Exception $e) {
    // エラーの場合
    echo "Message could not be sent. Mailer Error: {$phpmailer->ErrorInfo}";
  }
  exit;

  setPageTitle('お問い合わせ（完了）');
  require_once 'pages/thanks.php';
}

function form_get()
{
  setPageTitle('無料詳細査定');
  require_once 'pages/form.php';
}

function survey_get()
{
  setPageTitle('アンケート');
  require_once 'pages/survey.php';
}

function privacy_policy()
{
  setPageTitle('プライバシーポリシー');
  require_once 'pages/privacy_policy.php';
}
