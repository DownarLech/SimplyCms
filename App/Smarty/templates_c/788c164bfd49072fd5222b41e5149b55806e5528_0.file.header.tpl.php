<?php
/* Smarty version 3.1.36, created on 2021-01-29 12:51:17
  from '/home/developer/PhpstormProjects/SimplyCms/App/Smarty/templates/parts/header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_6013f6b5615eb2_25167374',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '788c164bfd49072fd5222b41e5149b55806e5528' => 
    array (
      0 => '/home/developer/PhpstormProjects/SimplyCms/App/Smarty/templates/parts/header.tpl',
      1 => 1611921072,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:parts/navi.tpl' => 1,
  ),
),false)) {
function content_6013f6b5615eb2_25167374 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo (($tmp = @$_smarty_tpl->tpl_vars['title']->value)===null||$tmp==='' ? "Default Page Title" : $tmp);?>
</title>

    <!-- Bootstrap core CSS -->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/shop-homepage.css" rel="stylesheet">

</head>

<body>

<?php $_smarty_tpl->_subTemplateRender("file:parts/navi.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>"navi"), 0, false);
}
}
