<?php /* Smarty version Smarty-3.1-DEV, created on 2014-03-25 12:48:36
         compiled from "templates/sitenote.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17562856845331166d46f4e5-98966890%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e8c4bec8131e7d4d4cc12a1476fe086de93b7798' => 
    array (
      0 => 'templates/sitenote.tpl',
      1 => 1395726511,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17562856845331166d46f4e5-98966890',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_5331166d4785a2_79941096',
  'variables' => 
  array (
    'site_id' => 0,
    'sites' => 0,
    'note' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5331166d4785a2_79941096')) {function content_5331166d4785a2_79941096($_smarty_tpl) {?><h3><?php echo $_smarty_tpl->tpl_vars['sites']->value[$_smarty_tpl->tpl_vars['site_id']->value];?>
</h3>
<form method='post' id='savenote'>
	<textarea id='txtnote' name='note' style='width: 400px; height: 300px;'><?php echo $_smarty_tpl->tpl_vars['note']->value['note'];?>
</textarea> <br/>
	<input type='hidden' id='site_id' name='site_id' value='<?php echo $_smarty_tpl->tpl_vars['site_id']->value;?>
'/>
	<button id='save'>Save</button>
</form>
<script type='text/javascript'>

	$(function () {
		$("#save").click(function (e) {
			e.preventDefault();
			var note = $("#txtnote").val();
			var site_id = $("#site_id").val();
			$.ajax({
				url: 'sitenote',
				type: 'post',
				dataType: 'json',
				data: {site_id: site_id, note: note},
				success: function (json) {
					$("#note").dialog('close');
				}
			});
		});
	});

</script>
<?php }} ?>