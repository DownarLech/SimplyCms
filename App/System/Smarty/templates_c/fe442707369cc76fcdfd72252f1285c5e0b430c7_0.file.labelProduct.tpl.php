<?php
/* Smarty version 3.1.36, created on 2021-02-22 12:17:03
  from '/home/developer/PhpstormProjects/SimplyCms/App/Smarty/templates/labelProduct.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_603392af0bd548_31276702',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fe442707369cc76fcdfd72252f1285c5e0b430c7' => 
    array (
      0 => '/home/developer/PhpstormProjects/SimplyCms/App/Smarty/templates/labelProduct.tpl',
      1 => 1613992617,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:parts/header.tpl' => 1,
    'file:parts/footer.tpl' => 1,
  ),
),false)) {
function content_603392af0bd548_31276702 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:parts/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>"Label Product"), 0, false);
?>


<div class="container">
    <div class="row h-100 justify-content-center align-items-center row-my-nr1">
        <div class="list-group ">
            <a href="http://localhost:8080/index.php?page=labelProduct&id=<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
"
               class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1 p-2"><?php echo $_smarty_tpl->tpl_vars['product']->value->getName();?>
</h5>
                    <small class="p-2">Product id:<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
</small>
                </div>
                <p class="mb-1 p-2"><?php echo $_smarty_tpl->tpl_vars['product']->value->getDescription();?>
</p>
            </a>
        </div>
    </div>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:parts/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>;<?php }
}
