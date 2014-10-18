{include file='header.tpl'}
<h3>Primary Credit Union - Data Sheet</h3>

{include file='common/alert.tpl'}

<hr>

<h3>Report Search</h3>

<form method='post' action='{$smarty.const.APP_PATH}/report/main'>
<table>
	<tr>
		<td>Country</td>
		<td>
			{if $smarty.session.user_level eq "0"}
				<select name='country_id' id='country_id'>
					{html_options options=$country}
				</select>
			{/if}
			
			{if $smarty.session.user_level eq "1" || $smarty.session.user_level eq "2"}
				<span>{$ucountry}</span>
				<input type='hidden' name='country_id' value='{$smarty.session.user_country_id}' />
			{/if}
			
		</td>
	</tr>
	<tr>
		<td>
			Federation 
		</td>
		<td>
			{if $smarty.session.user_level eq "0"}
					<select name='federation_id' id='federation_id'>
						<option value='0'>All</option>
						{html_options options=$federation}
				   </select>
			{/if}
			
			{if $smarty.session.user_level eq "1" || $smarty.session.user_level eq "2"}
				<span>{$ufed}</span>
				<input type='hidden' name='federation_id' value='{$smarty.session.user_federation_id}' />
			{/if}
			
		</td>
	</tr>
	
	<tr>
		<td>
			Report Type 
		</td>
		<td>
			<select name='report_type' id='report_type'>
				<option value='0'>Select Report Type</option>
				<option value='1'>Individual</option>
				<option value='2'>Comparison</option>
			</select>
		</td>
	</tr>
	
	<tr id='rpt_individual' style='display: none;'>
		<td>
			Period
		</td>
		<td>
			<table>
				<tr>
					<td>
			<select name='date_type' id='date_type'>
				<option value='3'>Latest</option>
				<option value='0'>Monthly</option>
				<option value='1'>Quaterly</option>
				<option value='2'>Annually</option>
			</select>
				</td>
				<td>
					<select name='dt_month' id='dt_month' style='display: none;'>
						<option value='1'>January</option>
						<option value='2'>February</option>
						<option value='3'>March</option>
						<option value='4'>April</option>
						<option value='5'>May</option>
						<option value='6'>June</option>
						<option value='7'>July</option>
						<option value='8'>Auguest</option>
						<option value='9'>September</option>
						<option value='10'>October</option>
						<option value='11'>November</option>
						<option value='12'>December</option>
					</select> 
					<select name='dt_quater' id='dt_quater' style='display: none;'>
						<option value='1'>1</option>
						<option value='2'>2</option>
						<option value='3'>3</option>
						<option value='4'>4</option>
					</select> 
					<select name='dt_year' id='dt_year' style='display: none;'>
						<option value='2014'>2014</option>
					</select> 
				</td>
				</tr>
			</table>
		</td>
	</tr>
	
		<tr id='rpt_comparison' style='display: none;'>
		<td>
			Period (Comparison)
		</td>
		<td>
			<table>
				<tr>
					<td>
			<select name='date_type_comp' id='date_type_comp'>
				<option value='0'>Monthly</option>
				<option value='1'>Quaterly</option>
				<option value='2'>Annually</option>
			</select>
				</td>
				<td>From</td>
				<td>
					<select name='dt_month_from' id='dt_month_from' style='display: block;'>
						<option value='1'>January</option>
						<option value='2'>February</option>
						<option value='3'>March</option>
						<option value='4'>April</option>
						<option value='5'>May</option>
						<option value='6'>June</option>
						<option value='7'>July</option>
						<option value='8'>Auguest</option>
						<option value='9'>September</option>
						<option value='10'>October</option>
						<option value='11'>November</option>
						<option value='12'>December</option>
					</select> 
					<select name='dt_quater_from' id='dt_quater_from' style='display: none;'>
						<option value='1'>1</option>
						<option value='2'>2</option>
						<option value='3'>3</option>
						<option value='4'>4</option>
					</select> 
					<select name='dt_year_from' id='dt_year_from' style='display: block;'>
						<option value='2014'>2014</option>
					</select> 
				</td>
				<td>To</td>
				<td>
					<select name='dt_month_to' id='dt_month_to' style='display: block;'>
						<option value='1'>January</option>
						<option value='2'>February</option>
						<option value='3'>March</option>
						<option value='4'>April</option>
						<option value='5'>May</option>
						<option value='6'>June</option>
						<option value='7'>July</option>
						<option value='8'>Auguest</option>
						<option value='9'>September</option>
						<option value='10'>October</option>
						<option value='11'>November</option>
						<option value='12'>December</option>
					</select> 
					<select name='dt_quater_to' id='dt_quater_to' style='display: none;'>
						<option value='1'>1</option>
						<option value='2'>2</option>
						<option value='3'>3</option>
						<option value='4'>4</option>
					</select> 
					<select name='dt_year_to' id='dt_year_to' style='display: block;'>
						<option value='2014'>2014</option>
					</select> 
				</td>
				</tr>
			</table>
		</td>
	</tr>
	
	
	<!-- <tr>
		<td>
			Debug
		</td>
		<td>
			<input type='checkbox' name='debug' value='1' /> 
		</td>
	</tr> -->
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
		
		$("#report_type").change(function (e) {
			e.preventDefault();
			$("#rpt_individual").hide();
			$("#rpt_comparison").hide();
			if ($(this).val() == 1) {
				$("#rpt_individual").show();
			} else if ($(this).val() == 2) {
				$("#rpt_comparison").show();
			}
		});
		
		$("#date_type").change(function (e) {
			e.preventDefault();
			if ($(this).val() == 0) {
				$("#dt_month").show();
				$("#dt_year").show();
				$("#dt_quater").hide();
			} else if ($(this).val() == 1) {
				$("#dt_month").hide();
				$("#dt_year").show();
				$("#dt_quater").show();
			} else if ($(this).val() == 2) {
				$("#dt_month").hide();
				$("#dt_year").show();
				$("#dt_quater").hide();
			}
		});
		
		$("#date_type_comp").change(function (e) {
			e.preventDefault();
			if ($(this).val() == 0) {
				$("#dt_month_from").show();
				$("#dt_month_to").show();
				$("#dt_year_from").show();
				$("#dt_quater_from").hide();
				$("#dt_year_to").show();
				$("#dt_quater_to").hide();
			} else if ($(this).val() == 1) {
				$("#dt_month_from").hide();
				$("#dt_year_from").show();
				$("#dt_quater_from").show();
				$("#dt_month_to").hide();
				$("#dt_year_to").show();
				$("#dt_quater_to").show();
			} else if ($(this).val() == 2) {
				$("#dt_month_from").hide();
				$("#dt_year_from").show();
				$("#dt_quater_from").hide();
				$("#dt_month_to").hide();
				$("#dt_year_to").show();
				$("#dt_quater_to").hide();
			}
		});
	});
</script>

{include file='footer.tpl'}

