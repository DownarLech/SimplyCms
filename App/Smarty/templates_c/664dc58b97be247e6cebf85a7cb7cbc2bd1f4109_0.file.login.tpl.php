<?php
/* Smarty version 3.1.36, created on 2021-01-28 14:04:28
  from '/home/developer/PhpstormProjects/SimplyCms/App/Smarty/templates/login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_6012b65cc9e559_31225213',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '664dc58b97be247e6cebf85a7cb7cbc2bd1f4109' => 
    array (
      0 => '/home/developer/PhpstormProjects/SimplyCms/App/Smarty/templates/login.tpl',
      1 => 1611838627,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:parts/header.tpl' => 1,
    'file:parts/footer.tpl' => 1,
  ),
),false)) {
function content_6012b65cc9e559_31225213 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:parts/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>"LogIn"), 0, false);
?>

<h1>LogIn</h1>
Hello, <?php echo $_smarty_tpl->tpl_vars['name']->value;?>
!
<br><br>

<form action = "" method = "post">
    <label for="username">Username:</label>
    <input type = "text" name = "username" required></br>
    <label for="password">Password:</label>
    <input type = "password" name = "password" required>
    <button type = "submit" name = "login">Login</button>
</form>

<?php $_smarty_tpl->_subTemplateRender("file:parts/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>;<?php }
}
