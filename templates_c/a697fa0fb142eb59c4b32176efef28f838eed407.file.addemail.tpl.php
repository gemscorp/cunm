<?php /* Smarty version Smarty-3.1-DEV, created on 2014-04-04 15:16:52
         compiled from "templates/addemail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:119678365453292e14855311-34953574%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a697fa0fb142eb59c4b32176efef28f838eed407' => 
    array (
      0 => 'templates/addemail.tpl',
      1 => 1396599184,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '119678365453292e14855311-34953574',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_53292e148619b4_84343515',
  'variables' => 
  array (
    'success' => 0,
    'index' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53292e148619b4_84343515')) {function content_53292e148619b4_84343515($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<h3>Add Email</h3>

<?php if ($_smarty_tpl->tpl_vars['success']->value!=''){?>
	<div class="alert alert-success"><?php echo $_smarty_tpl->tpl_vars['success']->value;?>
</div>
<?php }?>

<form method='post' action='addemail'>
		<div class="boxcontainner">
			<span class="label2">Email:</span>
			<span class="field">
				<input name="username" id="username" class="box" type="text">
			</span>
		</div>
		<div class="boxcontainner">
			<span class="label2">Password:</span>
			<span class="field">
				<input name="password" id="password" class="box" type="text">
			</span>
		</div>
		<?php $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['index']->step = 1;$_smarty_tpl->tpl_vars['index']->total = (int)ceil(($_smarty_tpl->tpl_vars['index']->step > 0 ? 10+1 - (1) : 1-(10)+1)/abs($_smarty_tpl->tpl_vars['index']->step));
if ($_smarty_tpl->tpl_vars['index']->total > 0){
for ($_smarty_tpl->tpl_vars['index']->value = 1, $_smarty_tpl->tpl_vars['index']->iteration = 1;$_smarty_tpl->tpl_vars['index']->iteration <= $_smarty_tpl->tpl_vars['index']->total;$_smarty_tpl->tpl_vars['index']->value += $_smarty_tpl->tpl_vars['index']->step, $_smarty_tpl->tpl_vars['index']->iteration++){
$_smarty_tpl->tpl_vars['index']->first = $_smarty_tpl->tpl_vars['index']->iteration == 1;$_smarty_tpl->tpl_vars['index']->last = $_smarty_tpl->tpl_vars['index']->iteration == $_smarty_tpl->tpl_vars['index']->total;?>
		<div class="boxcontainner">
			<span class="label2">Alias <?php echo $_smarty_tpl->tpl_vars['index']->value;?>
:</span>
			<span class="field">
				<input name="alias[]" id="alias<?php echo $_smarty_tpl->tpl_vars['index']->value;?>
" class="box" type="text">
			</span>
		</div>
		<?php }} ?>
		<div class="boxcontainner">
			<span class="label2">&nbsp;</span>
				<input name="submit" value="Add Email" class="button" type="submit">
			<span class="field">
			</span>
		</div>
</form>

<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>