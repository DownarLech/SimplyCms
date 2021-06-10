<?php
/* Smarty version 3.1.36, created on 2021-05-28 14:06:21
  from '/home/developer/PhpstormProjects/SimplyCms/App/Smarty/templates/login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_60b0dcbdde5674_63438899',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '31a8c916b26a95f139b9f1ff91d7341c16676b8e' => 
    array (
      0 => '/home/developer/PhpstormProjects/SimplyCms/App/Smarty/templates/login.tpl',
      1 => 1612178345,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:parts/header.tpl' => 1,
    'file:parts/footer.tpl' => 1,
  ),
),false)) {
function content_60b0dcbdde5674_63438899 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:parts/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>"LogIn"), 0, false);
?>


<div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center row-my-nr1">
        <div class="col-10 col-md-8 col-lg-6">

            <form class="form-example margin-bigger" action="" method="post" id="update_form">>
                <h1 class="text-center">Welcome, please login</h1>

                <div class="form-group margin-bigger">
                    <label for="username">username:</label>
                    <input type="text" class="form-control username"  placeholder="username..." name="username">
                </div>
                <div class="form-group margin-bigger">
                    <label for="password">password:</label>
                    <input type="password" class="form-control password" placeholder="password..." name="password">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-customized margin-bigger" name="submitButton">Login</button>
                    <p>You need to login to access this page. Please enter your username and password and click
                        Login.</p>
                </div>
            </form>

        </div>
    </div>
</div>


<?php $_smarty_tpl->_subTemplateRender("file:parts/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>;<?php }
}
