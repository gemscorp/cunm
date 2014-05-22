<?php /* Smarty version Smarty-3.1-DEV, created on 2014-03-19 11:56:48
         compiled from "templates/users.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15071896575329239075a9b3-74509573%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '717e9137b0433086f670dd6c095b59e876f70365' => 
    array (
      0 => 'templates/users.tpl',
      1 => 1395204116,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15071896575329239075a9b3-74509573',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'users' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_5329239076c960_49795739',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5329239076c960_49795739')) {function content_5329239076c960_49795739($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<table class='table table-striped table-bordered'>
	<tr>
		<td>Id</td>
		<td>Username</td>
		<td>Last Login</td>
	</tr>
	<?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['users']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value){
$_smarty_tpl->tpl_vars['user']->_loop = true;
?>
		<tr>
			<td><?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['user']->value['lastlogin'];?>
</td>
		</tr>
	<?php } ?>
</table>

<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>