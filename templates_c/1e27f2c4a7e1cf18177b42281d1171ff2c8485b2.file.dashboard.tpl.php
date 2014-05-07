<?php /* Smarty version Smarty-3.1-DEV, created on 2014-04-01 16:56:24
         compiled from "templates/dashboard.tpl" */ ?>
<?php /*%%SmartyHeaderCode:36873512553292df95846d4-50603476%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1e27f2c4a7e1cf18177b42281d1171ff2c8485b2' => 
    array (
      0 => 'templates/dashboard.tpl',
      1 => 1395735004,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '36873512553292df95846d4-50603476',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_53292df95a3445_93878472',
  'variables' => 
  array (
    'sites' => 0,
    'site' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53292df95a3445_93878472')) {function content_53292df95a3445_93878472($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<h2> ChatBox Operations - Dashboard </h2>

<h3>Whats New</h3>

<div class='well'>You can now add a note to a site, notes are specific for each day. It will show up in managers report, under your username</div> 

<h3>Profiler Quota</h3>

<table class='table table-striped table-bordered'>
	<tr>
		<td>Site</td>
		<td>Quota</td>
		<td>Created</td>
		<td>Note</td>
	</tr>
	<?php  $_smarty_tpl->tpl_vars['site'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['site']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['sites']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['site']->key => $_smarty_tpl->tpl_vars['site']->value){
$_smarty_tpl->tpl_vars['site']->_loop = true;
?>
		<?php if ($_smarty_tpl->tpl_vars['site']->value['quota']>0||$_smarty_tpl->tpl_vars['site']->value['override']>0){?>
			<tr>
				<td><?php echo $_smarty_tpl->tpl_vars['site']->value['name'];?>
</td>
				<?php if ($_smarty_tpl->tpl_vars['site']->value['quota']<$_smarty_tpl->tpl_vars['site']->value['override']){?>
					<td style='background-color: #FF3300;'><?php echo $_smarty_tpl->tpl_vars['site']->value['override'];?>
</td>
				<?php }else{ ?>
					<td><?php echo $_smarty_tpl->tpl_vars['site']->value['quota'];?>
</td>
				<?php }?>
				<td><?php echo $_smarty_tpl->tpl_vars['site']->value['created'];?>
</td>
				<td><a data-site-id='<?php echo $_smarty_tpl->tpl_vars['site']->value['site_id'];?>
' href='#' class='note'>Add/Edit</td></td>
			</tr>
		<?php }?>
	<?php } ?>
</table>

<script type='text/javascript'>

	$(function () {
		$(".note").click(function (e) {
			e.preventDefault();
			e.preventDefault();
			$("#note").load("sitenote/" + $(this).data('site-id'));
			$("#note").dialog({minWidth: 550, minHeight: 400});		
		});
	});

</script>

<div id="note" title="Add Site Note">
</div>

<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>