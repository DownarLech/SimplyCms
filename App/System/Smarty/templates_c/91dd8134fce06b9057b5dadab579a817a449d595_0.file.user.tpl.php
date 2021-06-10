<?php
/* Smarty version 3.1.36, created on 2021-02-25 13:24:52
  from '/home/developer/PhpstormProjects/SimplyCms/App/Smarty/templates/user.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_60379714c02860_56426244',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '91dd8134fce06b9057b5dadab579a817a449d595' => 
    array (
      0 => '/home/developer/PhpstormProjects/SimplyCms/App/Smarty/templates/user.tpl',
      1 => 1614255886,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:parts/header.tpl' => 1,
    'file:parts/footer.tpl' => 1,
  ),
),false)) {
function content_60379714c02860_56426244 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:parts/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>"Product"), 0, false);
?>

<div class="container">
    <div class="row h-100 justify-content-center align-items-center row-my-nr1">
        <div class="list-group col-sm-4">
            <a href="http://localhost:8080/index.php?page=user&id=<?php echo $_smarty_tpl->tpl_vars['user']->value->getId();?>
&admin=true"
               class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1 p-2"><?php echo $_smarty_tpl->tpl_vars['user']->value->getUserName();?>
</h5>
                    <small class="p-2">User id:<?php echo $_smarty_tpl->tpl_vars['user']->value->getId();?>
</small>
                </div>
                <p class="mb-1 p-2"><?php echo $_smarty_tpl->tpl_vars['user']->value->getUserRole();?>
</p>
                <p class="mb-1 p-2"><?php echo $_smarty_tpl->tpl_vars['user']->value->getPassword();?>
</p>
            </a>
            <form class="form-example margin-bigger" action="" method="post" id="update_form">
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-customized margin-bigger" name="delete"
                            value=<?php echo $_smarty_tpl->tpl_vars['user']->value->getId();?>
>Delete
                    </button>
                </div>
            </form>
        </div>

    </div>

    <div class="row h-100 justify-content-center align-items-center row-my-nr1">
        <div class="col-10 col-md-8 col-lg-6">

            <form class="form-example margin-bigger" action="" method="post" id="update_form">
                <h1 class="text-center">Please update user</h1>

                <div class="form-group margin-bigger">
                    <label for="username">User name:</label>
                    <input type="text" class="form-control password" placeholder="name..." name="username">
                </div>
                <div class="form-group margin-bigger">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control password" placeholder="password..." name="password">
                </div>
                <div class="form-group margin-bigger">
                    <label for="userrole">User role:</label>
                    <select id="cars" name="userrole">
                        <option value="Admin">Admin</option>
                        <option value="Costumer">Costumer</option>
                    </select>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-customized margin-bigger" name="save"
                            value=<?php echo $_smarty_tpl->tpl_vars['user']->value->getId();?>
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
