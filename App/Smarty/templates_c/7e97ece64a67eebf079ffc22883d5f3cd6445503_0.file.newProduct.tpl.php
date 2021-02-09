<?php
/* Smarty version 3.1.36, created on 2021-02-08 07:48:04
  from '/home/developer/PhpstormProjects/SimplyCms/App/Smarty/templates/newProduct.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_6020dea4918642_46359183',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7e97ece64a67eebf079ffc22883d5f3cd6445503' => 
    array (
      0 => '/home/developer/PhpstormProjects/SimplyCms/App/Smarty/templates/newProduct.tpl',
      1 => 1612766656,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:parts/header.tpl' => 1,
    'file:parts/footer.tpl' => 1,
  ),
),false)) {
function content_6020dea4918642_46359183 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:parts/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>"New ProductDataTransferObject"), 0, false);
?>

<h1>Make new product</h1>
Hello, <?php echo $_smarty_tpl->tpl_vars['name']->value;?>
!

<div class="container">
    <form method="post" action="">

        <label for="productId">Product name:</label>
        <input type="text" name="productId">

        <label for="productname">Product name:</label>
        <input type="text" name="productname">

        <label for="description">Description:</label>
        <input type="text" name="description">

        <input type="submit" name="save" value="submit">
    </form>
</div>


<?php $_smarty_tpl->_subTemplateRender("file:parts/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>;<?php }
}
