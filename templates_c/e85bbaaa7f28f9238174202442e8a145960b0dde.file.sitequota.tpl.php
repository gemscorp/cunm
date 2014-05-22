<?php /* Smarty version Smarty-3.1-DEV, created on 2014-03-19 16:18:06
         compiled from "templates/sitequota.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1709858435532960ce4b07d0-03621853%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e85bbaaa7f28f9238174202442e8a145960b0dde' => 
    array (
      0 => 'templates/sitequota.tpl',
      1 => 1395220540,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1709858435532960ce4b07d0-03621853',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'success' => 0,
    'sites' => 0,
    'site' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_532960ce4d88b2_83465999',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532960ce4d88b2_83465999')) {function content_532960ce4d88b2_83465999($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<h3>Set Site Quota</h3>

<?php if ($_smarty_tpl->tpl_vars['success']->value!=''){?>
	<div class="alert alert-success"><?php echo $_smarty_tpl->tpl_vars['success']->value;?>
</div>
<?php }?>

<form method='post' action='sitequota'>
<table class='table table-striped table-bordered'>
	<tr>
		<td>Site</td>
		<td>Required</td>
		<td>Update</td>
	</tr>
	<?php  $_smarty_tpl->tpl_vars['site'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['site']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['sites']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['site']->key => $_smarty_tpl->tpl_vars['site']->value){
$_smarty_tpl->tpl_vars['site']->_loop = true;
?>
		<tr>
		<td><?php echo $_smarty_tpl->tpl_vars['site']->value['name'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['site']->value['profile_req'];?>
</td>
		<td><input type='text' size='5' name='site[<?php echo $_smarty_tpl->tpl_vars['site']->value['id'];?>
]' value='<?php echo $_smarty_tpl->tpl_vars['site']->value['profile_req'];?>
' /></td>
	</tr>
	<?php } ?>
</table>

<input type='submit' value='Save Site Quota' />

</form>

<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>