<?php /* Smarty version Smarty-3.1-DEV, created on 2014-03-19 12:51:23
         compiled from "templates/edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10171687655329305bda5f44-14555429%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '87c29b8fd06db80504ce756cfc5f14b4d0eee4be' => 
    array (
      0 => 'templates/edit.tpl',
      1 => 1395202580,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10171687655329305bda5f44-14555429',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'profiles' => 0,
    'profile' => 0,
    'sites' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_5329305bdb81f0_07868064',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5329305bdb81f0_07868064')) {function content_5329305bdb81f0_07868064($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<table class='table table-striped table-bordered'>
	<tr>
		<td>Site</td>
		<td>Username</td>
		<td>Password</td>
		<td>Sex</td>
		<td>Delete</td>
	</tr>
	<?php  $_smarty_tpl->tpl_vars['profile'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['profile']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['profiles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['profile']->key => $_smarty_tpl->tpl_vars['profile']->value){
$_smarty_tpl->tpl_vars['profile']->_loop = true;
?>
		<tr>
			<td><a href='edit/<?php echo $_smarty_tpl->tpl_vars['profile']->value['id'];?>
'><?php echo $_smarty_tpl->tpl_vars['sites']->value[$_smarty_tpl->tpl_vars['profile']->value['site_id']];?>
</a></td>
			<td><?php echo $_smarty_tpl->tpl_vars['profile']->value['username'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['profile']->value['password'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['profile']->value['sex'];?>
</td>
			<td><a href='delete/<?php echo $_smarty_tpl->tpl_vars['profile']->value['id'];?>
'>Delete</a></td>
		</tr>
	<?php } ?>
</table>

<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>