<?php /* Smarty version Smarty-3.1-DEV, created on 2014-05-01 15:55:49
         compiled from "templates/health.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19225824865361e6ba1ad445-80756918%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '29a82c99dff760a2fe884edef8e87e8f278f2f1f' => 
    array (
      0 => 'templates/health.tpl',
      1 => 1398934543,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19225824865361e6ba1ad445-80756918',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_5361e6ba1c0572_86460850',
  'variables' => 
  array (
    'start' => 0,
    'finish' => 0,
    'sites' => 0,
    'site' => 0,
    'users' => 0,
    'user' => 0,
    'all' => 0,
    'bad' => 0,
    'percent' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5361e6ba1c0572_86460850')) {function content_5361e6ba1c0572_86460850($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<h3>Profiler Health</h3>

Period: <input class='datepicker' type='text' id='day_start_date' name='start_date' value='<?php echo $_smarty_tpl->tpl_vars['start']->value;?>
' /> <input class='datepicker' type='text' id='day_end_date' name='start_date' value='<?php echo $_smarty_tpl->tpl_vars['finish']->value;?>
' />
<button class='btn btn-primary btn-sm' id='dailySearch'>Search</button>


<table class='table table-striped table-bordered'>
	<tr>
		<td>Profiler</td>
		<td>Total</td>
		<td>Bad</td>
		<td>Percent Bad</td>
		<?php  $_smarty_tpl->tpl_vars['site'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['site']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['sites']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['site']->key => $_smarty_tpl->tpl_vars['site']->value){
$_smarty_tpl->tpl_vars['site']->_loop = true;
?>
			<td><?php echo $_smarty_tpl->tpl_vars['site']->value['name'];?>
</td>
		<?php } ?>
	</tr>
	<?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['users']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value){
$_smarty_tpl->tpl_vars['user']->_loop = true;
?>
			<tr>
				<td><?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['user']->value['profile_count'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['user']->value['profile_not'];?>
</td>
				<td><?php echo number_format($_smarty_tpl->tpl_vars['user']->value['percent'],2);?>
</td>
				<?php  $_smarty_tpl->tpl_vars['site'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['site']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['sites']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['site']->key => $_smarty_tpl->tpl_vars['site']->value){
$_smarty_tpl->tpl_vars['site']->_loop = true;
?>
					<?php $_smarty_tpl->tpl_vars['all'] = new Smarty_variable("all_".((string)$_smarty_tpl->tpl_vars['site']->value['id']), null, 0);?>
					<?php $_smarty_tpl->tpl_vars['bad'] = new Smarty_variable("bad_".((string)$_smarty_tpl->tpl_vars['site']->value['id']), null, 0);?>
					<?php $_smarty_tpl->tpl_vars['percent'] = new Smarty_variable("percent_".((string)$_smarty_tpl->tpl_vars['site']->value['id']), null, 0);?>
					<?php if ($_smarty_tpl->tpl_vars['user']->value[$_smarty_tpl->tpl_vars['all']->value]=="0"){?>
						<td>&nbsp;</td>
					<?php }else{ ?>
						<td nowrap><?php echo $_smarty_tpl->tpl_vars['user']->value[$_smarty_tpl->tpl_vars['bad']->value];?>
 / <?php echo $_smarty_tpl->tpl_vars['user']->value[$_smarty_tpl->tpl_vars['all']->value];?>
 ( <?php echo number_format($_smarty_tpl->tpl_vars['user']->value[$_smarty_tpl->tpl_vars['percent']->value],2);?>
 ) </td>
					<?php }?>
				<?php } ?>
			</tr>
	<?php } ?>
</table>

<script type='text/javascript'>
	var host = '<?php echo $_SERVER['HTTP_HOST'];?>
';


	$(function () {
		
		$( ".datepicker" ).datepicker({ "dateFormat" : "yy-mm-dd"});
		
		 $("#dailySearch").click(function (e) {
		    	e.preventDefault();
		    	var startDate = $("#day_start_date").val();
		    	var endDate = $("#day_end_date").val();
		    	window.location.href = 'http://' + host + '/bot/op/health/' + startDate + '/' + endDate
		    });
	});

</script>

<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>