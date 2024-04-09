<?php
/* Smarty version 4.3.4, created on 2023-12-26 17:32:12
  from '/home/mseg12/mseg.jp/public_html/nakamura/assets/smarty/template/mail.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_658a8f8c2d7353_59395433',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6126aa715d8a42d909bcae1f0d4ae1e58fbbef5f' => 
    array (
      0 => '/home/mseg12/mseg.jp/public_html/nakamura/assets/smarty/template/mail.tpl',
      1 => 1703573441,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_658a8f8c2d7353_59395433 (Smarty_Internal_Template $_smarty_tpl) {
?>ホームページのお問い合わせページから

【お客様情報】
名前: <?php echo $_smarty_tpl->tpl_vars['first_name']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['last_name']->value;?>

名前(ひらがな): <?php echo $_smarty_tpl->tpl_vars['first_name_gana']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['last_name_gana']->value;?>
 
電話番号: <?php echo $_smarty_tpl->tpl_vars['tel']->value;?>

メールアドレス: <?php echo $_smarty_tpl->tpl_vars['email']->value;?>


【物件情報】
マンション名・棟: <?php echo $_smarty_tpl->tpl_vars['manshion_name_bldg']->value;?>

部屋番号: <?php echo $_smarty_tpl->tpl_vars['room_number']->value;?>

物件所在地: <?php echo $_smarty_tpl->tpl_vars['address']->value;?>


【お問い合わせ内容】
お問い合わせ内容: <?php echo $_smarty_tpl->tpl_vars['contact_content']->value;?>

備考: <?php echo $_smarty_tpl->tpl_vars['note']->value;
}
}
