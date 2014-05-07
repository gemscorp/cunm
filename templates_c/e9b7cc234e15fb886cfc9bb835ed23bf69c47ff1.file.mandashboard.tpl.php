<?php /* Smarty version Smarty-3.1-DEV, created on 2014-04-01 16:59:35
         compiled from "templates/mandashboard.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1508474855532929db9834e8-99169183%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e9b7cc234e15fb886cfc9bb835ed23bf69c47ff1' => 
    array (
      0 => 'templates/mandashboard.tpl',
      1 => 1396346357,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1508474855532929db9834e8-99169183',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_532929db9a12f0_62332336',
  'variables' => 
  array (
    'day_start' => 0,
    'users' => 0,
    'user' => 0,
    'summary' => 0,
    'cr' => 0,
    'qt' => 0,
    'sites' => 0,
    'site' => 0,
    'do' => 0,
    'u' => 0,
    'cd' => 0,
    'req' => 0,
    'ful' => 0,
    'sn' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532929db9a12f0_62332336')) {function content_532929db9a12f0_62332336($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<h3>Manager Dashboard</h3>

Date: <input class='datepicker' type='text' id='day_start_date' name='start_date' value='<?php echo $_smarty_tpl->tpl_vars['day_start']->value;?>
' />
<button class='btn btn-primary btn-sm' id='dailySearch'>Search</button>

<table class='table table-striped table-bordered'>
	<tr>
		<td>Site</td>
		<td>Required</td>
		<td>Assigned</td>
		<td>Created</td>
		<?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['users']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value){
$_smarty_tpl->tpl_vars['user']->_loop = true;
?>
			<td><a href="/bot/op/ureport/<?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
"><?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
</a></td>
		<?php } ?>
	</tr>
	<tr>
		<td>Total</td>
		<td><?php echo $_smarty_tpl->tpl_vars['summary']->value['profile_req'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['summary']->value['profile_quota'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['summary']->value['profile_created'];?>
</td>
		<?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['users']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value){
$_smarty_tpl->tpl_vars['user']->_loop = true;
?>
			<?php $_smarty_tpl->tpl_vars['qt'] = new Smarty_variable("quota_".((string)$_smarty_tpl->tpl_vars['user']->value['id']), null, 0);?>
			<?php $_smarty_tpl->tpl_vars['cr'] = new Smarty_variable("create_".((string)$_smarty_tpl->tpl_vars['user']->value['id']), null, 0);?>
			<?php if ($_smarty_tpl->tpl_vars['summary']->value[$_smarty_tpl->tpl_vars['cr']->value]<$_smarty_tpl->tpl_vars['summary']->value[$_smarty_tpl->tpl_vars['qt']->value]){?>
				<td style='background-color: #FF3300;'><?php echo $_smarty_tpl->tpl_vars['summary']->value[$_smarty_tpl->tpl_vars['cr']->value];?>
 / <?php echo $_smarty_tpl->tpl_vars['summary']->value[$_smarty_tpl->tpl_vars['qt']->value];?>
</td>
			<?php }elseif($_smarty_tpl->tpl_vars['summary']->value[$_smarty_tpl->tpl_vars['qt']->value]==0){?>
				<td><?php echo $_smarty_tpl->tpl_vars['summary']->value[$_smarty_tpl->tpl_vars['cr']->value];?>
 / <?php echo $_smarty_tpl->tpl_vars['summary']->value[$_smarty_tpl->tpl_vars['qt']->value];?>
</td>
			<?php }else{ ?>
				<td style='background-color: #00FF00;'><?php echo $_smarty_tpl->tpl_vars['summary']->value[$_smarty_tpl->tpl_vars['cr']->value];?>
 / <?php echo $_smarty_tpl->tpl_vars['summary']->value[$_smarty_tpl->tpl_vars['qt']->value];?>
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
		<td><?php echo $_smarty_tpl->tpl_vars['site']->value['profile_req'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['site']->value['assigned'];?>
</td>
		<td><?php echo $_smarty_tpl->tpl_vars['site']->value['created'];?>
</td>
		<?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['users']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value){
$_smarty_tpl->tpl_vars['user']->_loop = true;
?>
			<?php $_smarty_tpl->tpl_vars['u'] = new Smarty_variable($_smarty_tpl->tpl_vars['user']->value['id'], null, 0);?>
			<?php $_smarty_tpl->tpl_vars['cd'] = new Smarty_variable("create_".((string)$_smarty_tpl->tpl_vars['user']->value['id']), null, 0);?>
			<?php $_smarty_tpl->tpl_vars['do'] = new Smarty_variable("do_".((string)$_smarty_tpl->tpl_vars['user']->value['id']), null, 0);?>
			<?php $_smarty_tpl->tpl_vars['sn'] = new Smarty_variable("sn_".((string)$_smarty_tpl->tpl_vars['user']->value['id']), null, 0);?>
			<?php if ($_smarty_tpl->tpl_vars['site']->value[$_smarty_tpl->tpl_vars['do']->value]>$_smarty_tpl->tpl_vars['site']->value[$_smarty_tpl->tpl_vars['u']->value]){?>
				<?php $_smarty_tpl->tpl_vars['ful'] = new Smarty_variable($_smarty_tpl->tpl_vars['site']->value[$_smarty_tpl->tpl_vars['do']->value], null, 0);?>
			<?php }else{ ?>
				<?php $_smarty_tpl->tpl_vars['ful'] = new Smarty_variable($_smarty_tpl->tpl_vars['site']->value[$_smarty_tpl->tpl_vars['u']->value], null, 0);?>
			<?php }?>
			<?php $_smarty_tpl->tpl_vars['req'] = new Smarty_variable($_smarty_tpl->tpl_vars['site']->value[$_smarty_tpl->tpl_vars['cd']->value], null, 0);?>
			
			<?php if ($_smarty_tpl->tpl_vars['req']->value<$_smarty_tpl->tpl_vars['ful']->value){?>
				<td style='background-color: #FF3300;'>
					<?php echo $_smarty_tpl->tpl_vars['req']->value;?>
 / <?php echo $_smarty_tpl->tpl_vars['ful']->value;?>

					
					<?php if ($_smarty_tpl->tpl_vars['site']->value[$_smarty_tpl->tpl_vars['sn']->value]==1){?>
						<a class='info' data-site-id='<?php echo $_smarty_tpl->tpl_vars['site']->value['id'];?>
' data-user-id='<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
' data-day='<?php echo $_smarty_tpl->tpl_vars['day_start']->value;?>
' href='#'><img src='/bot/op/images/more.jpg' width=16 height=16 /></a>
					<?php }?>
					 
				</td>
			<?php }elseif($_smarty_tpl->tpl_vars['ful']->value=="0"){?>
				<td>
					<?php echo $_smarty_tpl->tpl_vars['req']->value;?>
 / <?php echo $_smarty_tpl->tpl_vars['ful']->value;?>

				</td>
			<?php }else{ ?>
				<td style='background-color: #00FF00;'>
					<?php echo $_smarty_tpl->tpl_vars['req']->value;?>
 / <?php echo $_smarty_tpl->tpl_vars['ful']->value;?>

				</td>
			<?php }?>
			
		<?php } ?>
	</tr>
	<?php } ?>
</table>

<div id="note" title="Site Note">
</div>


<script type='text/javascript'>
	$(function () {
		$( ".datepicker" ).datepicker({ "dateFormat" : "yy-mm-dd"});
		
		$("#dailySearch").click(function (e) {
			var day = $("#day_start_date").val();
			window.location.href = "/bot/op/mandashboard/" + day;
		});
		
		$(".info").click(function (e) {
			e.preventDefault();
			$("#note").load("/bot/op/viewsitenote/" + $(this).data('site-id') + "/" + $(this).data('user-id') + "/" + $(this).data('day'));
			$("#note").dialog({minWidth: 400, minHeight: 300});		
		});
	});
</script>

<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>