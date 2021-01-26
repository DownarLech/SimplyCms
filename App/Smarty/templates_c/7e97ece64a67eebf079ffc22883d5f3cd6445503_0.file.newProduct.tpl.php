<?php
/* Smarty version 3.1.36, created on 2021-01-26 22:39:46
  from '/home/developer/PhpstormProjects/SimplyCms/App/Smarty/templates/newProduct.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_60108c22512157_85485375',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7e97ece64a67eebf079ffc22883d5f3cd6445503' => 
    array (
      0 => '/home/developer/PhpstormProjects/SimplyCms/App/Smarty/templates/newProduct.tpl',
      1 => 1611696161,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:parts/header.tpl' => 1,
    'file:parts/footer.tpl' => 1,
  ),
),false)) {
function content_60108c22512157_85485375 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:parts/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>"New ProductDataTransferObject"), 0, false);
?>

<h1>Make new product</h1>
Hello, <?php echo $_smarty_tpl->tpl_vars['name']->value;?>
!

<?php $_smarty_tpl->_subTemplateRender("file:parts/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>;<?php }
}
