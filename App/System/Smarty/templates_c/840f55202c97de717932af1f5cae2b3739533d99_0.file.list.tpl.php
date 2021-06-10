<?php
/* Smarty version 3.1.36, created on 2021-02-22 12:09:31
  from '/home/developer/PhpstormProjects/SimplyCms/App/Smarty/templates/list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_603390ebacc3b1_19050231',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '840f55202c97de717932af1f5cae2b3739533d99' => 
    array (
      0 => '/home/developer/PhpstormProjects/SimplyCms/App/Smarty/templates/list.tpl',
      1 => 1613992134,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:parts/header.tpl' => 1,
    'file:parts/footer.tpl' => 1,
  ),
),false)) {
function content_603390ebacc3b1_19050231 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:parts/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>"List of Products"), 0, false);
?>


<div class="container">
    <div class="row justify-content-center align-items-center row-my-nr1">
        <div class="list-group">
            <h5>Products List</h5>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['productList']->value, 'product');
$_smarty_tpl->tpl_vars['product']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->do_else = false;
?>
                <a href="http://localhost:8080/index.php?page=labelProduct&id=<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
"
                   class="list-group-item list-group-item-action flex-column align-items-start" id="link">
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
