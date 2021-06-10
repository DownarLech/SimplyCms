<?php
/* Smarty version 3.1.36, created on 2021-01-19 10:08:25
  from '/home/developer/PhpstormProjects/SimplyCms/App/Smarty/templates/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_6006a189ddf337_65501013',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'eb16cdfc6f100a34a5d4c6010cb9d7c5980d7c6c' => 
    array (
      0 => '/home/developer/PhpstormProjects/SimplyCms/App/Smarty/templates/index.tpl',
      1 => 1611047252,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:parts/header.tpl' => 1,
    'file:parts/footer.tpl' => 1,
  ),
),false)) {
function content_6006a189ddf337_65501013 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:parts/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>"Index"), 0, false);
?>

<h1>Index</h1>
Hello, <?php echo $_smarty_tpl->tpl_vars['name']->value;?>
!

<?php $_smarty_tpl->_subTemplateRender("file:parts/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
