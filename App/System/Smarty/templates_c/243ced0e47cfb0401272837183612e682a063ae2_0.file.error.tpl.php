<?php
/* Smarty version 3.1.36, created on 2021-06-08 11:17:40
  from '/home/developer/PhpstormProjects/SimplyCms/App/System/Smarty/templates/error.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.36',
  'unifunc' => 'content_60bf35b4153814_45546488',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '243ced0e47cfb0401272837183612e682a063ae2' => 
    array (
      0 => '/home/developer/PhpstormProjects/SimplyCms/App/System/Smarty/templates/error.tpl',
      1 => 1611123256,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:parts/header.tpl' => 1,
    'file:parts/footer.tpl' => 1,
  ),
),false)) {
function content_60bf35b4153814_45546488 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:parts/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>"Error"), 0, false);
?>

<h1>404 Not Found</h1>
<p>The page that you have requested could not be found.</p>

<?php $_smarty_tpl->_subTemplateRender("file:parts/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
