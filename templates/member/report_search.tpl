{include file='header.tpl'}
<h3>Primary Credit Union - Data Sheet</h3>

{include file='common/alert.tpl'}

<hr>

<h3>Report Search</h3>

<form method='post' action='{$smarty.const.APP_PATH}/report/main'>
<table>
	<tr>
		<td>Country</td>
		<td><select name='country_id' id='country_id'>
			{html_options options=$country}
			</select>
		</td>
	</tr>
	<tr>
		<td>
			Federation 
		</td>
		<td>
			<select name='federation_id' id='federation_id'>
					<option value='0'>All</option>
					{html_options options=$federation}
				   </select>
		</td>
	</tr>
	<tr>
		<td colspan='2'><input type='submit' value='Search' /></td>
	</tr>
</table>
</form>

<script type='text/javascript'>
	$(function () {
		$("#country_id").change(function (e) {
			e.preventDefault();
			var country_id = $(this).val();
			$.ajax({
				url: '{$smarty.const.APP_PATH}/ajax/federations/' + country_id,
				type: 'get',
				dataType: 'json',
				success: function (json) {
					$("#federation_id").html("");
					$("#federation_id").append("<option value='0'>All</option>");
					$.each(json.federations, function (v,k) {
						$("#federation_id").append("<option value='" + k.id + "'>" + k.name + "</option>");
					});
				}				
			});
		});
	});
</script>

{include file='footer.tpl'}