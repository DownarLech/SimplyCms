<?php
/* Smarty version 3.1.36, created on 2021-01-26 08:00:42
  from '/home/developer/PhpstormProjects/SimplyCms/App/Smarty/templates/categoryPage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_600fbe1aad2687_43352702',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e00e76b634ca1ca84417e4455cd84f7eac79507b' => 
    array (
      0 => '/home/developer/PhpstormProjects/SimplyCms/App/Smarty/templates/categoryPage.tpl',
      1 => 1611642603,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:parts/header.tpl' => 1,
    'file:parts/footer.tpl' => 1,
  ),
),false)) {
function content_600fbe1aad2687_43352702 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:parts/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>"Category page"), 0, false);
?>

<h1>Product List</h1>
Hello, <?php echo $_smarty_tpl->tpl_vars['name']->value;?>
!
<br><br>


<ul>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['productList']->value, 'product');
$_smarty_tpl->tpl_vars['product']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->do_else = false;
?>
        <br>
        <li><a href="http://localhost:8080/index.php?page=product&id=<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
"><?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
</a></li>
        <li><?php echo $_smarty_tpl->tpl_vars['product']->value->getName();?>
</li>
        <li><?php echo $_smarty_tpl->tpl_vars['product']->value->getDescription();?>
</li>
        <br>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</ul>


<?php $_smarty_tpl->_subTemplateRender("file:parts/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
