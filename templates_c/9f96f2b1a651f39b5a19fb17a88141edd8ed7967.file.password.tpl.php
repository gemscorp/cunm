<?php /* Smarty version Smarty-3.1-DEV, created on 2014-05-22 16:07:32
         compiled from "templates/password.tpl" */ ?>
<?php /*%%SmartyHeaderCode:46144357353292eeed153b0-79404111%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9f96f2b1a651f39b5a19fb17a88141edd8ed7967' => 
    array (
      0 => 'templates/password.tpl',
      1 => 1400749648,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '46144357353292eeed153b0-79404111',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_53292eeed25194_12875237',
  'variables' => 
  array (
    'error' => 0,
    'success' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53292eeed25194_12875237')) {function content_53292eeed25194_12875237($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<?php if ($_smarty_tpl->tpl_vars['error']->value!=''){?>
	<div class="alert alert-danger"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</div>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['success']->value!=''){?>
	<div class="alert alert-success"><?php echo $_smarty_tpl->tpl_vars['success']->value;?>
</div>
<?php }?>


<form role="form" method='post' action='password'>
  <div class="form-group">
    <label for="exampleInputEmail1">Current Password</label>
    <input type="password" name='current_password' class="form-control" id="exampleInputEmail1" placeholder="Current Password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">New Password</label>
    <input type="password" name='new_password' class="form-control" id="exampleInputPassword1" placeholder="New Password">
  </div>
  <button type="submit" class="btn btn-default">Change Password</button>
</form>

<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>