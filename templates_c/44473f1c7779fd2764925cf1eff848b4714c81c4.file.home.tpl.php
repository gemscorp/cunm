<?php /* Smarty version Smarty-3.1-DEV, created on 2014-05-15 12:19:46
         compiled from "templates/home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:408609685532929d6d041a1-19797056%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '44473f1c7779fd2764925cf1eff848b4714c81c4' => 
    array (
      0 => 'templates/home.tpl',
      1 => 1400131183,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '408609685532929d6d041a1-19797056',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_532929d6d172e7_60707596',
  'variables' => 
  array (
    'error' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532929d6d172e7_60707596')) {function content_532929d6d172e7_60707596($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<h2> ACCU CUNM </h2>

<?php if ($_smarty_tpl->tpl_vars['error']->value!=''){?>
	<div class="alert alert-danger"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</div>
<?php }?>

<form role="form" method='post' action='login'>
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" name='username' class="form-control" id="exampleInputEmail1" placeholder="Enter Username">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name='password' class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-default">Login</button>
  <button type="button" class="btn btn-default" id='register'>Register</button>
</form>

<script type='text/javascript'>
	$(function (e) {
		$("#register").click(function (e) {
			window.location.href = 'register';
		});
	});
</script>

<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>