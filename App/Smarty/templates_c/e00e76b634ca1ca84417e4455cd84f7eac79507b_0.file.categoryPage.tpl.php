<?php
/* Smarty version 3.1.36, created on 2021-01-31 21:59:10
  from '/home/developer/PhpstormProjects/SimplyCms/App/Smarty/templates/categoryPage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_60171a1ea162f4_98958991',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e00e76b634ca1ca84417e4455cd84f7eac79507b' => 
    array (
      0 => '/home/developer/PhpstormProjects/SimplyCms/App/Smarty/templates/categoryPage.tpl',
      1 => 1612126659,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:parts/header.tpl' => 1,
    'file:parts/footer.tpl' => 1,
  ),
),false)) {
function content_60171a1ea162f4_98958991 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:parts/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>"Category page"), 0, false);
?>



<div class="container">
    <div class="row justify-content-center align-items-center row-my-nr1">
        <div class="list-group">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['productList']->value, 'product');
$_smarty_tpl->tpl_vars['product']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->do_else = false;
?>
            <a href="http://localhost:8080/index.php?page=product&id=<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
&admin=true"
               class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1"><?php echo $_smarty_tpl->tpl_vars['product']->value->getName();?>
</h5>
                    <small>Product id:<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
</small>
                </div>
                <p class="mb-1"><?php echo $_smarty_tpl->tpl_vars['product']->value->getDescription();?>
</p>
            </a>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>

    </div>
</div>





<?php $_smarty_tpl->_subTemplateRender("file:parts/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
