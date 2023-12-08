<?php
/* Smarty version 4.3.4, created on 2023-12-08 07:27:00
  from 'C:\xampp\htdocs\projects\fuji-sys\assets\smarty\template\mail.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6572b734b960d4_63045712',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ccaa84485ad8258c24a35e6fdbeb3ace446d3e5f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\projects\\fuji-sys\\assets\\smarty\\template\\mail.tpl',
      1 => 1702016094,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6572b734b960d4_63045712 (Smarty_Internal_Template $_smarty_tpl) {
?>お問い合わせフォームから


【お客様情報】

名前: <?php echo $_smarty_tpl->tpl_vars['first_name']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['last_name']->value;?>


名前(ひらがな): <?php echo $_smarty_tpl->tpl_vars['first_name_gana']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['last_name_gana']->value;?>
 

電話番号: <?php echo $_smarty_tpl->tpl_vars['tel']->value;?>


メールアドレス: <?php echo $_smarty_tpl->tpl_vars['email']->value;?>



【物件情報】<?php }
}
