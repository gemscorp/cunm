<?php /* Smarty version Smarty-3.1-DEV, created on 2014-05-22 15:08:48
         compiled from "templates/dashboard.tpl" */ ?>
<?php /*%%SmartyHeaderCode:36873512553292df95846d4-50603476%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1e27f2c4a7e1cf18177b42281d1171ff2c8485b2' => 
    array (
      0 => 'templates/dashboard.tpl',
      1 => 1400746124,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '36873512553292df95846d4-50603476',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_53292df95a3445_93878472',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53292df95a3445_93878472')) {function content_53292df95a3445_93878472($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<h2> Credit Union Management Network </h2>

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
	
</table>

<script type='text/javascript'>

	$(function () {
	
	});

</script>


<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>