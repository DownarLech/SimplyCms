<?php
/* Smarty version 3.1.36, created on 2021-06-15 13:48:54
  from '/home/developer/PhpstormProjects/SimplyCms/App/System/Smarty/templates/productList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_60c893a6092f78_69818782',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '70f4f3fce22366d8279e916aa3c414dd0ebf3138' => 
    array (
      0 => '/home/developer/PhpstormProjects/SimplyCms/App/System/Smarty/templates/productList.tpl',
      1 => 1623757732,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:parts/header.tpl' => 1,
    'file:parts/footer.tpl' => 1,
  ),
),false)) {
function content_60c893a6092f78_69818782 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:parts/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>"Product List"), 0, false);
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
                <a href="http://localhost:8080/index.php?page=product&id=<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
&admin=true"
                   class="list-group-item list-group-item-action flex-column align-items-start" id="link">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1"><?php echo $_smarty_tpl->tpl_vars['product']->value->getName();?>
</h5>
                        <small>Product id:<?php echo $_smarty_tpl->tpl_vars['product']->value->getId();?>
</small>
                    </div>
                    <p class="mb-1"><?php echo $_smarty_tpl->tpl_vars['product']->value->getDescription();?>
</p>

                    <p class="mb-1 p-2"><?php echo $_smarty_tpl->tpl_vars['product']->value->getCategory()->getName();?>
</p>
                </a>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>

    </div>
    <div class="row justify-content-center align-items-center row-my-nr1">
        <div class="col-10 col-md-8 col-lg-6">

            <form class="form-example margin-bigger" action="http://localhost:8080/index.php?page=product&id=0&admin=true" method="post" id="update_form">>
                <h1 class="text-center">Please add new product</h1>

                <div class="form-group margin-bigger">
                    <label for="productname">Product name:</label>
                    <input type="text" class="form-control password" placeholder="name..." name="productname">
                </div>
                <div class="form-group margin-bigger">
                    <label for="description">Description:</label>
                    <input type="text" class="form-control password" placeholder="description..." name="description">
                </div>
                <div class="form-group margin-bigger">
                    <label for="categoryName">Category:</label>
                    <input type="text" class="form-control password" placeholder="category..." name="categoryName">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-customized margin-bigger" name="save"
                            value="0">Save
                    </button>
                </div>
            </form>

        </div>

    </div>

</div>


<?php $_smarty_tpl->_subTemplateRender("file:parts/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
