<?php
/* Smarty version 3.1.36, created on 2021-06-11 12:46:51
  from '/home/developer/PhpstormProjects/SimplyCms/App/System/Smarty/templates/category.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_60c33f1b9ccf17_12057545',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f1b4f441d27de25bf188f3d947b474d138e9cb3c' => 
    array (
      0 => '/home/developer/PhpstormProjects/SimplyCms/App/System/Smarty/templates/category.tpl',
      1 => 1623406860,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:parts/header.tpl' => 1,
    'file:parts/footer.tpl' => 1,
  ),
),false)) {
function content_60c33f1b9ccf17_12057545 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:parts/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>"Category"), 0, false);
?>

<div class="container">
    <div class="row h-100 justify-content-center align-items-center row-my-nr1">
        <div class="list-group ">
            <a href="http://localhost:8080/index.php?page=category&id=<?php echo $_smarty_tpl->tpl_vars['category']->value->getId();?>
&admin=true"
               class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1 p-2"><?php echo $_smarty_tpl->tpl_vars['category']->value->getName();?>
</h5>
                    <small class="p-2">Category id:<?php echo $_smarty_tpl->tpl_vars['category']->value->getId();?>
</small>
                </div>
            </a>
            <form class="form-example margin-bigger" action="" method="post" id="update_form">
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-customized margin-bigger" name="delete"
                            value=<?php echo $_smarty_tpl->tpl_vars['category']->value->getId();?>
>Delete
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="row h-100 justify-content-center align-items-center row-my-nr1">
        <div class="col-10 col-md-8 col-lg-6">

            <form class="form-example margin-bigger" action="" method="post" id="update_form">>
                <h1 class="text-center">Please update category</h1>

                <div class="form-group margin-bigger">
                    <label for="productname">Category name:</label>
                    <input type="text" class="form-control password" placeholder="name..." name="categoryName">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-customized margin-bigger" name="save"
                            value=<?php echo $_smarty_tpl->tpl_vars['category']->value->getId();?>
>Update
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:parts/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>;<?php }
}
