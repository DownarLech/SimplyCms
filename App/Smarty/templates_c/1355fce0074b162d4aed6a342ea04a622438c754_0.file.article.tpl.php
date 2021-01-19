<?php
/* Smarty version 3.1.36, created on 2021-01-19 10:05:47
  from '/home/developer/PhpstormProjects/SimplyCms/App/Smarty/templates/article.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_6006a0eb8a23b3_71188355',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1355fce0074b162d4aed6a342ea04a622438c754' => 
    array (
      0 => '/home/developer/PhpstormProjects/SimplyCms/App/Smarty/templates/article.tpl',
      1 => 1611047140,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:parts/header.tpl' => 1,
    'file:parts/footer.tpl' => 1,
  ),
),false)) {
function content_6006a0eb8a23b3_71188355 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:parts/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>"Article"), 0, false);
?>

<h1>Article</h1>
Hello, <?php echo $_smarty_tpl->tpl_vars['name']->value;?>
!

<?php $_smarty_tpl->_subTemplateRender("file:parts/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>;<?php }
}
