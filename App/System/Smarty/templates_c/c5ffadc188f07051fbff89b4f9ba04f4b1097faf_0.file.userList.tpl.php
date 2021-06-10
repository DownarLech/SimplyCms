<?php
/* Smarty version 3.1.36, created on 2021-05-28 14:06:21
  from '/home/developer/PhpstormProjects/SimplyCms/App/Smarty/templates/userList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_60b0dcbddbf574_65823421',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c5ffadc188f07051fbff89b4f9ba04f4b1097faf' => 
    array (
      0 => '/home/developer/PhpstormProjects/SimplyCms/App/Smarty/templates/userList.tpl',
      1 => 1614321208,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:parts/header.tpl' => 1,
    'file:parts/footer.tpl' => 1,
  ),
),false)) {
function content_60b0dcbddbf574_65823421 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:parts/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>"Category page"), 0, false);
?>


<div class="container">
    <div class="row justify-content-center align-items-center row-my-nr1">
        <div class="list-group col-sm-4">
            <h5>User List</h5>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['userList']->value, 'user');
$_smarty_tpl->tpl_vars['user']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->do_else = false;
?>
                <a href="http://localhost:8080/index.php?page=user&id=<?php echo $_smarty_tpl->tpl_vars['user']->value->getId();?>
&admin=true"
                   class="list-group-item list-group-item-action flex-column align-items-start" id="link">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1"><?php echo $_smarty_tpl->tpl_vars['user']->value->getUserName();?>
</h5>
                        <small>User id:<?php echo $_smarty_tpl->tpl_vars['user']->value->getId();?>
</small>
                    </div>
                    <p class="mb-1 p-2"><?php echo $_smarty_tpl->tpl_vars['user']->value->getUserRole();?>
</p>
                    <p class="mb-1"><?php echo $_smarty_tpl->tpl_vars['user']->value->getPassword();?>
</p>
                </a>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>

    </div>
    <div class="row justify-content-center align-items-center row-my-nr1">
        <div class="col-10 col-md-8 col-lg-6">

            <form class="form-example margin-bigger"
                  action="http://localhost:8080/index.php?page=user&id=0&admin=true" method="post" id="update_form">>
                <h1 class="text-center">Please add new user</h1>

                <div class="form-group margin-bigger">
                    <label for="username">User name:</label>
                    <input type="text" class="form-control password" placeholder="name..." name="username">
                </div>
                <div class="form-group margin-bigger">
                    <label for="password">Password:</label>
                    <input type="text" class="form-control password" placeholder="password..." name="password">
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
