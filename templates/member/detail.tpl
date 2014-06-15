{include file='header.tpl'}
<h3>Datasheet</h3>

{include file='common/alert.tpl'}
          
<!-- Nav tabs -->
<ul class="nav nav-tabs">
  <li class="active"><a href="#area_gender" data-toggle="tab">Area &amp; Gender</a></li>
  <li><a href="#area_market" data-toggle="tab">Area, Market &amp; Age</a></li>
  <li><a href="#service" data-toggle="tab">Have Less Member Service Distribution</a></li>
  <li><a href="#assets" data-toggle="tab">Assets</a></li>
  <li><a href="#balancesheet" data-toggle="tab">Balance Sheet</a></li>
  <li><a href="#usage_services" data-toggle="tab">Usage of Services</a></li>
</ul>

<form role="form" method='post' action='http://{$smarty.server.HTTP_HOST}{$smarty.const.APP_PATH}/member/detail'>
<input type='hidden' name='dsid' value='{$pid}' />
<div class="tab-content">
  <div class="tab-pane active" id="area_gender">
  		<table class="table">
  			<thead>
  				<tr>
	  				<th>Operational Areas of Credit Union</th>
	  				<th>Number of Members</th>
	  				<th>Male</th>
	  				<th>Female</th>
  				</tr>
  			</thead>
  			<tbody>
  				{foreach from=$opareas item=oparea}
	  				<tr>
	  					<td>{$areas[$oparea]}</td>
	  					<td><input class='total' data-sum='ttotal' data-group='total' type='text' name="area[{$oparea}][total]" value="{$gender_groups[$oparea].total}" /></td>
	  					<td><input class='male' data-sum='tmale' data-group='male' type='text' name="area[{$oparea}][male]" value="{$gender_groups[$oparea].male}" /></td>
	  					<td><input class='female' data-sum='tfemale' data-group='female' type='text' name="area[{$oparea}][female]" value="{$gender_groups[$oparea].female}"/></td>
	  				</tr>
  				{/foreach}
				<tr>
  					<td>Total</td>
  					<td><input id='ttotal' type='text' value='{$gender_total.total}' /></td>
  					<td><input id='tmale' type='text' value='{$gender_total.male}' /></td>
  					<td><input id='tfemale' type='text' value='{$gender_total.female}' /></td>
  				</tr>
  			</tbody>
  		</table>
  </div>
  <div class="tab-pane" id="area_market">
  		<table class="table">
  			<thead>
  				<tr>
	  				<th rowspan='2'>Type of CU</th>
	  				<th rowspan='2'>Number of Members</th>
	  				<th rowspan='2'>Farmers</th>
	  				<th rowspan='2'>Employee</th>
	  				<th rowspan='2'>Micro Business</th>
	  				<th colspan='4'>Age Segmentation of CU Membership</th>
  				</tr>
  				<tr>
  				<th>18 - 35</th>
  				<th>36 - 45</th>
  				<th>46 - 60</th>
  				<th>&gt; 60</th>
  				</tr>
  			</thead>
  			<tbody>
  				{foreach from=$opareas item=oparea}
  				<tr>
  					<td>{$areas[$oparea]}</td>
  					<td><input class='totalx' data-sum='ttotalx' data-group='totalx' type='text' name="area[{$oparea}][totalx]" value="{$gender_groups[$oparea].total}" /></td>
  					<td><input class='farmer' data-sum='tfarmer' data-group='farmer' type='text' name="area[{$oparea}][farmer]" value="{$gender_groups[$oparea].farmer}" /></td>
  					<td><input class='employee' data-sum='temployee' data-group='employee' type='text' name="area[{$oparea}][employee]" value="{$gender_groups[$oparea].employee}" /></td>
  					<td><input class='microb' data-sum='tmicrob' data-group='microb' type='text' name="area[{$oparea}][microb]" value="{$gender_groups[$oparea].microb}" /></td>
  					<td><input class='group1' data-sum='tgroup1' data-group='group1' type='text' name="area[{$oparea}][group1]" value="{$gender_groups[$oparea].group1}" /></td>
  					<td><input class='group2' data-sum='tgroup2' data-group='group2' type='text' name="area[{$oparea}][group2]" value="{$gender_groups[$oparea].group2}" /></td>
  					<td><input class='group3' data-sum='tgroup3' data-group='group3' type='text' name="area[{$oparea}][group3]" value="{$gender_groups[$oparea].group3}" /></td>
  					<td><input class='group4' data-sum='tgroup4' data-group='group4' type='text' name="area[{$oparea}][group4]" value="{$gender_groups[$oparea].group4}" /></td>
  				</tr>
				{/foreach}
				<tr>
  					<td>Total</td>
  					<td><input id='ttotalx' type='text' value='{$gender_total.total}' /></td>
  					<td><input id='tfarmer' type='text' value='{$gender_total.farmer}' /></td>
  					<td><input id='temployee' type='text' value='{$gender_total.employee}' /></td>
  					<td><input id='tmicrob' type='text' value='{$gender_total.microb}' /></td>
  					<td><input id='tgroup1' type='text' value='{$gender_total.group1}' /></td>
  					<td><input id='tgroup2' type='text' value='{$gender_total.group2}' /></td>
  					<td><input id='tgroup3' type='text' value='{$gender_total.group3}' /></td>
  					<td><input id='tgroup4' type='text' value='{$gender_total.group4}' /></td>
  				</tr>
  			</tbody>
  		</table>
  </div>
  <div class="tab-pane" id="service">
  		<table class="table">
  			<thead>
  				<tr>
  					<th>&nbsp;</th>
	  				<th>Total</th>
	  				<th>Female</th>
	  				<th>Male</th>
	  				<th>Total Savings</th>
	  				<th>Loan Outstanding</th>
	  				<th>Total Loans</th>
  				</tr>
  			</thead>
  			<tbody>
  				{foreach from=$opareas item=oparea}
  				<tr>
  					<td>{$areas[$oparea]}</td>
  					<td><input class='less_total' data-sum='tless_total' data-group='less_total' type='text' name="area[{$oparea}][less_total]" value="{$gender_groups[$oparea].less_total}" /></td>
  					<td><input class='less_male' data-sum='tless_male' data-group='less_male' type='text' name="area[{$oparea}][less_male]" value="{$gender_groups[$oparea].less_male}" /></td>
  					<td><input class='less_female' data-sum='tless_female' data-group='less_female' type='text' name="area[{$oparea}][less_female]" value="{$gender_groups[$oparea].less_female}" /></td>
  					<td><input class='less_savings' data-sum='tless_savings' data-group='less_savings' type='text' name="area[{$oparea}][less_savings]" value="{$gender_groups[$oparea].less_savings}" /></td>
  					<td><input class='less_outstand' data-sum='tless_outstand' data-group='less_outstand' type='text' name="area[{$oparea}][less_outstand]" value="{$gender_groups[$oparea].less_outstand}" /></td>
  					<td><input class='less_totalg' data-sum='tless_totalg' data-group='less_totalg' type='text' name="area[{$oparea}][less_totalg]" value="{$gender_groups[$oparea].less_totalg}" /></td>
  				</tr>
  				{/foreach}
  				<tr>
  					<td>Total</td>
  					<td><input id='tless_total' type='text' value='{$gender_total.less_total}' /></td>
  					<td><input id='tless_male' type='text' value='{$gender_total.less_male}' /></td>
  					<td><input id='tless_female' type='text' value='{$gender_total.less_female}' /></td>
  					<td><input id='tless_savings' type='text' value='{$gender_total.less_savings}' /></td>
  					<td><input id='tless_outstand' type='text' value='{$gender_total.less_outstand}' /></td>
  					<td><input id='tless_totalg' type='text' value='{$gender_total.less_totalg}' /></td>
  				</tr>
  				
  			</tbody>
  		</table>
  </div>
  <div class="tab-pane" id="assets">
  		<div class="form-group">
    		<label for="exampleInputEmail1">Total Assets</label>
    		{foreach from=$assetgroups item=assetgroup}
    		<div class="radio">
			  <label>
			    <input type="radio" name="optionsRadios" id="optionsRadios1" value="{$assetgroup.id}" {if $asset_group_id eq $assetgroup.id}checked{/if}>
			    {$assetgroup.name}
			  </label>
			</div>
			{/foreach}
  		</div>
  </div>
  <div class="tab-pane" id="balancesheet">
  		<table class="table">
  			{foreach from=$bslines item=bsline}
  				{if $group neq $bsline.group_name}
  					{assign var=group value=$bsline.group_name}
  					<tr>
  						<td colspan='2' style='text-align: left;'><strong>{$group}</strong></td>
  					</tr>
  				{/if}
  				{if $subgroup neq $bsline.subgroup_name}
  					{assign var=subgroup value=$bsline.subgroup_name}
  					<tr>
  						<td colspan='2' style='text-align: left; padding-left: 30px;'><i>{$subgroup}</i></td>
  					</tr>
  				{/if}
  					<tr>
  						<td style='text-align: left; padding-left: 60px;'>{$bsline.name}</td>
  						<td><input type='text' name='bsline[{$bsline.id}][amount]' value="{$bsvals[$bsline.id].amount}" /></td>
  					</tr>
  			{/foreach}
  		</table>
  </div>
  <div class="tab-pane" id="usage_services">
  		<table class="table">
  			<thead>
  				<tr>
  					<th>Type of Services</th>
	  				<th>Amount in US$</th>
	  				<th>Male</th>
	  				<th>Female</th>
	  				<th>Youth</th>
	  				<th>Non-members</th>
	  				<th>Ratio</th>
  				</tr>
  			</thead>
  			<tbody>
  			{foreach from=$services item=service}
  				<tr>
  					<td>{$service.name}</td>
  					<td><input type='text' name='service[{$service.id}][total]' value="{$serval[$service.id].total}" /></td>
  					<td><input type='text' name='service[{$service.id}][male]' value="{$serval[$service.id].male}" /></td>
  					<td><input type='text' name='service[{$service.id}][female]' value="{$serval[$service.id].female}" /></td>
  					<td><input type='text' name='service[{$service.id}][youth]' value="{$serval[$service.id].youth}" /></td>
  					<td><input type='text' name='service[{$service.id}][none_member]' value="{$serval[$service.id].none_member}" /></td>
  					<td><input type='text' /></td>
  				</tr>
  			{/foreach}
  			</tbody>
  		</table>
  </div>
</div>
	<button type="submit" name='save' class="btn btn-default">Save</button>
	<button type="submit" name='lock' class="btn btn-default">Save and Lock</button>
</form>

<script type='text/javascript'>

	$(function () {
		$( ".total, .totalx, .male, .female, .farmer, .employee, .microb, .group1, .group2, .group3, .group4, .less_total, .less_male, .less_female, .less_savings, .less_outstand, .less_totalg " ).change(function (e) {
			e.preventDefault();
			var total = 0;
			var sum_col = $(this).data('sum');
			var group = $(this).data('group');
			$("." + group).each(function (index) {
				total += parseInt($(this).val());
			});
			$("#" + sum_col).val(total);
		});
	});
</script>


{include file='footer.tpl'}