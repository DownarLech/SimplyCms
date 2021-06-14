<?php
/* Smarty version 3.1.36, created on 2021-06-11 12:46:43
  from '/home/developer/PhpstormProjects/SimplyCms/App/System/Smarty/templates/categoryList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_60c33f13097517_28243796',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9491da3ea8e5dbb5a95933074e9f9a8220319de7' => 
    array (
      0 => '/home/developer/PhpstormProjects/SimplyCms/App/System/Smarty/templates/categoryList.tpl',
      1 => 1623408129,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:parts/header.tpl' => 1,
    'file:parts/footer.tpl' => 1,
  ),
),false)) {
function content_60c33f13097517_28243796 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:parts/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>"Category List"), 0, false);
?>


<div class="container">
    <div class="row justify-content-center align-items-center row-my-nr1">
        <div class="list-group">
            <h5>Category List</h5>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categoryList']->value, 'category');
$_smarty_tpl->tpl_vars['category']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->do_else = false;
?>
                <a href="http://localhost:8080/index.php?page=category&id=<?php echo $_smarty_tpl->tpl_vars['category']->value->getId();?>
&admin=true"
                   class="list-group-item list-group-item-action flex-column align-items-start" id="link">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1"><?php echo $_smarty_tpl->tpl_vars['category']->value->getName();?>
</h5>
                        <small>Category id:<?php echo $_smarty_tpl->tpl_vars['category']->value->getId();?>
</small>
                    </div>
                </a>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>

    </div>
    <div class="row justify-content-center align-items-center row-my-nr1">
        <div class="col-10 col-md-8 col-lg-6">

            <form class="form-example margin-bigger" action="http://localhost:8080/index.php?page=category&id=0&admin=true" method="post" id="update_form">>
                <h1 class="text-center">Please add new category</h1>

                <div class="form-group margin-bigger">
                    <label for="categoryName">Category name:</label>
                    <input type="text" class="form-control password" placeholder="name..." name="categoryName">
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
