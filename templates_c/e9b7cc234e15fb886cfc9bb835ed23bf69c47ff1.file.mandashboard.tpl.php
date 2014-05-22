<?php /* Smarty version Smarty-3.1-DEV, created on 2014-05-22 16:02:29
         compiled from "templates/mandashboard.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1508474855532929db9834e8-99169183%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e9b7cc234e15fb886cfc9bb835ed23bf69c47ff1' => 
    array (
      0 => 'templates/mandashboard.tpl',
      1 => 1400749347,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1508474855532929db9834e8-99169183',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_532929db9a12f0_62332336',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532929db9a12f0_62332336')) {function content_532929db9a12f0_62332336($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<h3>Manager Dashboard</h3>



<script type='text/javascript'>
	$(function () {
		$( ".datepicker" ).datepicker({ "dateFormat" : "yy-mm-dd"});		
	});
</script>

<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>