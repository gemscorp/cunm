<?php /* Smarty version Smarty-3.1-DEV, created on 2014-04-02 09:39:48
         compiled from "templates/ureport.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1152551286533a8e29cd4736-34854931%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '96fb9b69fd6302f0002a0c5084b19af69d685fa3' => 
    array (
      0 => 'templates/ureport.tpl',
      1 => 1396406253,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1152551286533a8e29cd4736-34854931',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_533a8e29ce9894_39636967',
  'variables' => 
  array (
    'days' => 0,
    'day' => 0,
    'summary' => 0,
    'sites' => 0,
    'site' => 0,
    'site_id' => 0,
    'report' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_533a8e29ce9894_39636967')) {function content_533a8e29ce9894_39636967($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<h3>Profiler Report Past 7 Day</h3>


<table class='table table-striped table-bordered'>
	<tr>
		<td>Site</td>
		<?php  $_smarty_tpl->tpl_vars['day'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['day']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['days']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['day']->key => $_smarty_tpl->tpl_vars['day']->value){
$_smarty_tpl->tpl_vars['day']->_loop = true;
?>
			<td><?php echo $_smarty_tpl->tpl_vars['day']->value;?>
</td>
		<?php } ?>
	</tr>	
	<tr>
		<td>Total</td>
		<?php  $_smarty_tpl->tpl_vars['day'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['day']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['days']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['day']->key => $_smarty_tpl->tpl_vars['day']->value){
$_smarty_tpl->tpl_vars['day']->_loop = true;
?>
			<?php if ($_smarty_tpl->tpl_vars['summary']->value[$_smarty_tpl->tpl_vars['day']->value]['created']<$_smarty_tpl->tpl_vars['summary']->value[$_smarty_tpl->tpl_vars['day']->value]['quota']){?>
			<td style='background-color: #FF3300;'><?php echo $_smarty_tpl->tpl_vars['summary']->value[$_smarty_tpl->tpl_vars['day']->value]['created'];?>
 / <?php echo $_smarty_tpl->tpl_vars['summary']->value[$_smarty_tpl->tpl_vars['day']->value]['quota'];?>
</td>
			<?php }elseif($_smarty_tpl->tpl_vars['summary']->value[$_smarty_tpl->tpl_vars['day']->value]['created']==0&&$_smarty_tpl->tpl_vars['summary']->value[$_smarty_tpl->tpl_vars['day']->value]['quota']==0){?>
			<td><?php echo $_smarty_tpl->tpl_vars['summary']->value[$_smarty_tpl->tpl_vars['day']->value]['created'];?>
 / <?php echo $_smarty_tpl->tpl_vars['summary']->value[$_smarty_tpl->tpl_vars['day']->value]['quota'];?>
</td>
			<?php }else{ ?>
			<td style='background-color: #00FF00;'><?php echo $_smarty_tpl->tpl_vars['summary']->value[$_smarty_tpl->tpl_vars['day']->value]['created'];?>
 / <?php echo $_smarty_tpl->tpl_vars['summary']->value[$_smarty_tpl->tpl_vars['day']->value]['quota'];?>
</td>
			<?php }?>
		<?php } ?>
	</tr>
	<?php  $_smarty_tpl->tpl_vars['site'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['site']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['sites']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['site']->key => $_smarty_tpl->tpl_vars['site']->value){
$_smarty_tpl->tpl_vars['site']->_loop = true;
?>
		<tr>
		<td><?php echo $_smarty_tpl->tpl_vars['site']->value['name'];?>
</td>
		<?php $_smarty_tpl->tpl_vars['site_id'] = new Smarty_variable($_smarty_tpl->tpl_vars['site']->value['id'], null, 0);?>
		<?php  $_smarty_tpl->tpl_vars['day'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['day']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['days']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['day']->key => $_smarty_tpl->tpl_vars['day']->value){
$_smarty_tpl->tpl_vars['day']->_loop = true;
?>
			<?php if ($_smarty_tpl->tpl_vars['report']->value[$_smarty_tpl->tpl_vars['day']->value][$_smarty_tpl->tpl_vars['site_id']->value]['created']<$_smarty_tpl->tpl_vars['report']->value[$_smarty_tpl->tpl_vars['day']->value][$_smarty_tpl->tpl_vars['site_id']->value]['quota']){?>
			<td style='background-color: #FF3300;'><?php echo $_smarty_tpl->tpl_vars['report']->value[$_smarty_tpl->tpl_vars['day']->value][$_smarty_tpl->tpl_vars['site_id']->value]['created'];?>
 / <?php echo $_smarty_tpl->tpl_vars['report']->value[$_smarty_tpl->tpl_vars['day']->value][$_smarty_tpl->tpl_vars['site_id']->value]['quota'];?>
</td>
			<?php }elseif($_smarty_tpl->tpl_vars['report']->value[$_smarty_tpl->tpl_vars['day']->value][$_smarty_tpl->tpl_vars['site_id']->value]['created']==0&&$_smarty_tpl->tpl_vars['report']->value[$_smarty_tpl->tpl_vars['day']->value][$_smarty_tpl->tpl_vars['site_id']->value]['quota']==0){?>
			<td><?php echo $_smarty_tpl->tpl_vars['report']->value[$_smarty_tpl->tpl_vars['day']->value][$_smarty_tpl->tpl_vars['site_id']->value]['created'];?>
 / <?php echo $_smarty_tpl->tpl_vars['report']->value[$_smarty_tpl->tpl_vars['day']->value][$_smarty_tpl->tpl_vars['site_id']->value]['quota'];?>
</td>
			<?php }else{ ?>
			<td style='background-color: #00FF00;'><?php echo $_smarty_tpl->tpl_vars['report']->value[$_smarty_tpl->tpl_vars['day']->value][$_smarty_tpl->tpl_vars['site_id']->value]['created'];?>
 / <?php echo $_smarty_tpl->tpl_vars['report']->value[$_smarty_tpl->tpl_vars['day']->value][$_smarty_tpl->tpl_vars['site_id']->value]['quota'];?>
</td>
			<?php }?>
		<?php } ?>
	</tr>
	<?php } ?>
</table>


<script type='text/javascript'>
	
</script>

<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>