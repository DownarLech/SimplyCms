<?php
/* Smarty version 3.1.36, created on 2021-01-31 22:31:54
  from '/home/developer/PhpstormProjects/SimplyCms/App/Smarty/templates/parts/navi.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_601721ca8eba32_26409115',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '72c6ae28267ae610581e4bd42cef12af68dde1de' => 
    array (
      0 => '/home/developer/PhpstormProjects/SimplyCms/App/Smarty/templates/parts/navi.tpl',
      1 => 1612128708,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_601721ca8eba32_26409115 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">New Super Shop</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="http://localhost:8080/index.php?page=home">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost:8080/index.php?page=login&admin=true">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost:8080/index.php?page=category&admin=true">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost:8080/index.php?page=index">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav><?php }
}
