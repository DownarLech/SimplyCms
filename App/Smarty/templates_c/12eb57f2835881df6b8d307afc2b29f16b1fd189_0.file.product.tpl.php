<?php
/* Smarty version 3.1.36, created on 2021-01-26 07:27:21
  from '/home/developer/PhpstormProjects/SimplyCms/App/Smarty/templates/product.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_600fb6491bb439_86889680',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '12eb57f2835881df6b8d307afc2b29f16b1fd189' => 
    array (
      0 => '/home/developer/PhpstormProjects/SimplyCms/App/Smarty/templates/product.tpl',
      1 => 1611609242,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:parts/header.tpl' => 1,
    'file:parts/footer.tpl' => 1,
  ),
),false)) {
function content_600fb6491bb439_86889680 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:parts/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>"ProductDataTransferObject"), 0, false);
?>

<h1>Product</h1>
Hello, <?php echo $_smarty_tpl->tpl_vars['name']->value;?>
!
<br><br>

<ul>
    <li><?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
</li>
    <li><?php echo $_smarty_tpl->tpl_vars['product']->value->getName();?>
</li>
    <li><?php echo $_smarty_tpl->tpl_vars['product']->value->getDescription();?>
</li>
</ul>

<?php $_smarty_tpl->_subTemplateRender("file:parts/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>;<?php }
}
