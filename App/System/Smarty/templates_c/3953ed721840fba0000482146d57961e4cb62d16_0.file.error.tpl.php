<?php
/* Smarty version 3.1.36, created on 2021-01-20 07:16:10
  from '/home/developer/PhpstormProjects/SimplyCms/App/Smarty/templates/error.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_6007caaa07c441_54736312',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3953ed721840fba0000482146d57961e4cb62d16' => 
    array (
      0 => '/home/developer/PhpstormProjects/SimplyCms/App/Smarty/templates/error.tpl',
      1 => 1611123256,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:parts/header.tpl' => 1,
    'file:parts/footer.tpl' => 1,
  ),
),false)) {
function content_6007caaa07c441_54736312 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:parts/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>"Error"), 0, false);
?>

<h1>404 Not Found</h1>
<p>The page that you have requested could not be found.</p>

<?php $_smarty_tpl->_subTemplateRender("file:parts/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
