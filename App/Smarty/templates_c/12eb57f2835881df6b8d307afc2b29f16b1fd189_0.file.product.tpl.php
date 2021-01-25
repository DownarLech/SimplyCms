<?php
/* Smarty version 3.1.36, created on 2021-01-24 22:30:25
  from '/home/developer/PhpstormProjects/SimplyCms/App/Smarty/templates/product.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_600de6f1a4ee80_21276461',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '12eb57f2835881df6b8d307afc2b29f16b1fd189' => 
    array (
      0 => '/home/developer/PhpstormProjects/SimplyCms/App/Smarty/templates/product.tpl',
      1 => 1611523821,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:parts/header.tpl' => 1,
    'file:parts/footer.tpl' => 1,
  ),
),false)) {
function content_600de6f1a4ee80_21276461 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:parts/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>"Product"), 0, false);
?>

<h1>Article</h1>
Hello, <?php echo $_smarty_tpl->tpl_vars['name']->value;?>
!
<br><br>



<?php if ((isset($_smarty_tpl->tpl_vars['_POST']->value['submit']))) {?>
    <?php if (!empty($_smarty_tpl->tpl_vars['_POST']->value['productList2'])) {?>
        <?php $_smarty_tpl->_assignInScope('selected', $_smarty_tpl->tpl_vars['_POST']->value['productList2']);?>
        You have chosen: <?php echo $_smarty_tpl->tpl_vars['selected']->value;?>

        <?php } else { ?>
        Please select the value.
    <?php }
}?>


<?php $_smarty_tpl->_subTemplateRender("file:parts/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>;<?php }
}
