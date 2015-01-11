{include file='header.tpl'}
<h3>Datasheet</h3>

{include file='common/alert.tpl'}
          
<!-- Nav tabs -->
<ul class="nav nav-tabs">
  <li class='active'><a href="#area_market" data-toggle="tab">Area, Market, Gender &amp; Age</a></li>
  <li><a href="#service" data-toggle="tab">Have Less Member Service Distribution</a></li>
  <li><a href="#assets" data-toggle="tab">Assets</a></li>
  <li><a href="#balancesheet" data-toggle="tab">Balance Sheet</a></li>
  <li><a href="#incomestatment" data-toggle="tab">Income Statement</a></li>
  <li><a href="#usage_services" data-toggle="tab">Usage of Services</a></li>
</ul>

<form role="form" method='post' action='http://{$smarty.server.HTTP_HOST}{$smarty.const.APP_PATH}/member/detail'>
<input type='hidden' name='dsid' value='{$pid}' />
<div class="tab-content datasheet">
  <div class="tab-pane active" id="area_market">
  		<table class="table">
  			<thead>
  				<tr>
	  				<th rowspan='2'>Type of CU</th>
	  				<th rowspan='2'>Number of Members by Market</th>
	  				<th rowspan='2'>Farmers</th>
	  				<th rowspan='2'>Employee</th>
	  				<th rowspan='2'>Micro Business</th>
	  				<th colspan='5'>Age Segmentation of CU Membership</th>
  				</tr>
  				<tr>
  				<th>18 - 35</th>
  				<th>36 - 45</th>
  				<th>46 - 60</th>
  				<th>&gt; 60</th>
  				<th>Total</th>
  				</tr>
  			</thead>
  			<tbody>
  				{foreach from=$opareas item=oparea}
  					{foreach from=$genders item=gender}
	  				<tr>
	  					<td>{$areas[$oparea]} - {$gtxt[$gender]}</td>
	  					<td><input id='total_{$oparea}_{$gender}' data-oparea='{$oparea}' data-gender='{$gender}' class='totalx' data-sum='ttotalxl' data-group='totalx' type='text' name="area[{$oparea}][{$gender}][total]" value="{$gender_groups[$oparea][$gender].total}" /></td>
	  					<td><input id='farmer_{$oparea}_{$gender}' data-oparea='{$oparea}' data-gender='{$gender}' class='farmer' data-sum='tfarmer' data-group='farmer' type='text' name="area[{$oparea}][{$gender}][farmer]" value="{$gender_groups[$oparea][$gender].farmer}" /></td>
	  					<td><input id='employee_{$oparea}_{$gender}' data-oparea='{$oparea}' data-gender='{$gender}' class='employee' data-sum='temployee' data-group='employee' type='text' name="area[{$oparea}][{$gender}][employee]" value="{$gender_groups[$oparea][$gender].employee}" /></td>
	  					<td><input id='microb_{$oparea}_{$gender}' data-oparea='{$oparea}' data-gender='{$gender}' class='microb' data-sum='tmicrob' data-group='microb' type='text' name="area[{$oparea}][{$gender}][microb]" value="{$gender_groups[$oparea][$gender].microb}" /></td>
	  					<td><input id='group1_{$oparea}_{$gender}' data-oparea='{$oparea}' data-gender='{$gender}' class='group1' data-sum='tgroup1' data-group='group1' type='text' name="area[{$oparea}][{$gender}][group1]" value="{$gender_groups[$oparea][$gender].group1}" /></td>
	  					<td><input id='group2_{$oparea}_{$gender}' data-oparea='{$oparea}' data-gender='{$gender}' class='group2' data-sum='tgroup2' data-group='group2' type='text' name="area[{$oparea}][{$gender}][group2]" value="{$gender_groups[$oparea][$gender].group2}" /></td>
	  					<td><input id='group3_{$oparea}_{$gender}' data-oparea='{$oparea}' data-gender='{$gender}' class='group3' data-sum='tgroup3' data-group='group3' type='text' name="area[{$oparea}][{$gender}][group3]" value="{$gender_groups[$oparea][$gender].group3}" /></td>
	  					<td><input id='group4_{$oparea}_{$gender}' data-oparea='{$oparea}' data-gender='{$gender}' class='group4' data-sum='tgroup4' data-group='group4' type='text' name="area[{$oparea}][{$gender}][group4]" value="{$gender_groups[$oparea][$gender].group4}" /></td>
	  					<td><input id='grouptotal_{$oparea}_{$gender}' data-oparea='{$oparea}' data-gender='{$gender}' class='totalx' data-sum='ttotalxr' data-group='totalx' type='text' name="area[{$oparea}][{$gender}][total]" value="{$gender_groups[$oparea][$gender].total}" /></td>
	  				</tr>
	  				{/foreach}
				{/foreach}
				<tr>
  					<td>Total</td>
  					<td><input id='ttotalxl' type='text' value='{$gender_total.total}' /></td>
  					<td><input id='tfarmer' type='text' value='{$gender_total.farmer}' /></td>
  					<td><input id='temployee' type='text' value='{$gender_total.employee}' /></td>
  					<td><input id='tmicrob' type='text' value='{$gender_total.microb}' /></td>
  					<td><input id='tgroup1' type='text' value='{$gender_total.group1}' /></td>
  					<td><input id='tgroup2' type='text' value='{$gender_total.group2}' /></td>
  					<td><input id='tgroup3' type='text' value='{$gender_total.group3}' /></td>
  					<td><input id='tgroup4' type='text' value='{$gender_total.group4}' /></td>
  					<td><input id='ttotalxr' type='text' value='{$gender_total.total}' /></td>
  				</tr>
  			</tbody>
  		</table>
  </div>
  <div class="tab-pane" id="service">
  		<table class="table">
  			<thead>
  				<tr>
  					<th>&nbsp;</th>
	  				<th>Total Member</th>
	  				<th>Total Savings</th>
	  				<th>Total Loans</th>
	  				<th>Loan Outstanding</th>
  				</tr>
  			</thead>
  			<tbody>
  				{foreach from=$opareas item=oparea}
  					{foreach from=$genders item=gender}
  				<tr>
  					<td>{$areas[$oparea]} - {$gtxt[$gender]}</td>
  					<td><input class='less_total' data-sum='tless_total' data-group='less_total' type='text' name="area[{$oparea}][{$gender}][less_total]" value="{$gender_groups[$oparea][$gender].less_total}" /></td>
  					<td><input class='less_savings' data-sum='tless_savings' data-group='less_savings' type='text' name="area[{$oparea}][{$gender}][less_savings]" value="{$gender_groups[$oparea][$gender].less_savings}" /></td>
  					<td><input class='less_totalg' data-sum='tless_totalg' data-group='less_totalg' type='text' name="area[{$oparea}][{$gender}][less_totalg]" value="{$gender_groups[$oparea][$gender].less_totalg}" /></td>
  					<td><input class='less_outstand' data-sum='tless_outstand' data-group='less_outstand' type='text' name="area[{$oparea}][{$gender}][less_outstand]" value="{$gender_groups[$oparea][$gender].less_outstand}" /></td>
  				</tr>
  					{/foreach}
  				{/foreach}
  				<tr>
  					<td>Total</td>
  					<td><input id='tless_total' type='text' value='{$gender_total.less_total}' /></td>
  					<td><input id='tless_savings' type='text' value='{$gender_total.less_savings}' /></td>
  					<td><input id='tless_totalg' type='text' value='{$gender_total.less_totalg}' /></td>
  					<td><input id='tless_outstand' type='text' value='{$gender_total.less_outstand}' /></td>
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
  						{if $bsline.total eq "1"}
  							<td style='text-align: left; padding-left: 30px;'>
  						{elseif $bsline.total eq "2"}
  							<td style='text-align: left;'>
  						{else}
  							<td style='text-align: left; padding-left: 60px;'>
  						{/if}
  						
  						{if $bsline.bold eq "1"}
  							<strong>{$bsline.name}</strong>
  						{else}
  							{$bsline.name}
  						{/if}
  						
  						</td>
  						<td>
  							{if $bsline.formula eq ""}
  								<input type='text' id='bs{$bsline.id}' class="bslines" name='bsline[{$bsline.id}][amount]' value="{$bsvals[$bsline.id].amount}" />
  							{else}
  								<input style='background-color: #99FF99' type='text' id='bs{$bsline.id}' class="bslines" name='bsline[{$bsline.id}][amount]' value="{$bsvals[$bsline.id].amount}" readonly/>
  							{/if}
  							
  							{if $bsline.formula ne ""}
  								<script type='text/javascript'>
  								
  									$(function () {
  										$(".bslines").change(function (e) {
  											calsum{$bsline.id}();
  										});
  									});
  								
  									function calsum{$bsline.id}() {
  									
		  								{assign var=formulas value=","|explode:$bsline.formula}
		  								{assign var=grp value=0}
		  							
		  								var x = 
		  								{foreach from=$formulas item=litem name=lloop}
		  							
		  								{if preg_match("/^\[/", $litem)}
		  									{if $grp == 1}
		  										var y = 
		  									{/if}
		  									{assign var=zx value=$litem|replace:"[":""}
		  									
		  										getval({$zx}) + 
		  									
		  									{assign var=grp value=1}
		  									
		  								{elseif preg_match("/\]/", $litem)}
		  									{assign var=zx value=$litem|replace:"]":""}
		  									getval({$zx})
		  									;
		  								{else}
			  								{if $smarty.foreach.lloop.last}
			  									getval({$litem});
			  								{else}
			  									getval({$litem}) + 
			  								{/if}
			  							{/if}
		  							{/foreach}
		  							
		  							{if $grp == 1}
		  								$("#bs{$bsline.id}").val(x - y);
		  							{else}
		  								$("#bs{$bsline.id}").val(x);
		  							{/if}
  									}
	  								</script>
	  						{/if}
  							
  						
  						</td>
  					</tr>
  			{/foreach}
  		</table>
  </div>
  <div class="tab-pane" id="incomestatment">
  		<table class="table">
  			{foreach from=$islines item=isline}
  				{if $group neq $isline.group_name}
  					{assign var=group value=$isline.group_name}
  					<tr>
  						<td colspan='2' style='text-align: left;'><strong>{$group}</strong></td>
  					</tr>
  				{/if}
  				{if $subgroup neq $isline.subgroup_name}
  					{assign var=subgroup value=$isline.subgroup_name}
  					<tr>
  						<td colspan='2' style='text-align: left; padding-left: 30px;'><i>{$subgroup}</i></td>
  					</tr>
  				{/if}
  					<tr>
  						{if $isline.total eq "1"}
  							<td style='text-align: left; padding-left: 30px;'>
  						{elseif $isline.total eq "2"}
  							<td style='text-align: left;'>
  						{else}
  							<td style='text-align: left; padding-left: 60px;'>
  						{/if}
  						
  						{if $isline.bold eq "1"}
  							<strong>{$isline.name}</strong>
  						{else}
  							{$isline.name}
  						{/if}
  						
  						</td>
  						<td>
  						
  							{if $isline.formula eq ""}
  								<input type='text' id='is{$isline.id}' class='islines' name='isline[{$isline.id}][amount]' value="{$isvals[$isline.id].amount}" />
  							{else}
  								<input type='text' style='background-color: #99FF99'  id='is{$isline.id}' class='islines' name='isline[{$isline.id}][amount]' value="{$isvals[$isline.id].amount}" readonly />
  							{/if}
  						
  							{if $isline.formula ne ""}
  								<script type='text/javascript'>
  								
  									$(function () {
  										$(".islines").change(function (e) {
  											icalsum{$isline.id}();
  										});
  									});
  								
  									function icalsum{$isline.id}() {
  									
		  								{assign var=formulas value=","|explode:$isline.formula}
		  								{assign var=grp value=0}
		  							
		  								var x = 
		  								{foreach from=$formulas item=litem name=lloop}
		  							
		  								{if preg_match("/^\[/", $litem)}
		  									{if $grp == 1}
		  										var y = 
		  									{/if}
		  									{assign var=zx value=$litem|replace:"[":""}
		  									{if preg_match("/\]/", $zx)}
		  										{assign var=zy value=$zx|replace:"]":""}
		  										igetval({$zy});
		  									{else}
		  										igetval({$zx}) +
		  									{/if}
		  									
		  									{assign var=grp value=1}
		  									
		  								{elseif preg_match("/\]/", $litem)}
		  									{assign var=zx value=$litem|replace:"]":""}
		  									igetval({$zx})
		  									;
		  								{else}
			  								{if $smarty.foreach.lloop.last}
			  									igetval({$litem});
			  								{else}
			  									igetval({$litem}) + 
			  								{/if}
			  							{/if}
		  							{/foreach}
		  							
		  							{if $grp == 1}
		  								$("#is{$isline.id}").val(x - y);
		  							{else}
		  								$("#is{$isline.id}").val(x);
		  							{/if}
  									}
	  								</script>
	  						{/if}	
  							
  							
  						</td>
  					</tr>
  			{/foreach}
  		</table>
  </div>
  <div class="tab-pane" id="usage_services">
  		<table class="table">
  			<thead>
  				<tr>
  					<th>Type of Services</th>
	  				<th>Amount</th>
	  				<th>Male</th>
	  				<th>Percentage</th>
	  				<th>Female</th>
	  				<th>Percentage</th>
	  				<th>Youth</th>
	  				<th>Percentage</th>
	  				<th>Non-members</th>
	  				<th>Percentage</th>
  				</tr>
  			</thead>
  			<tbody>
  			{foreach from=$services item=service}
  				<tr>
  					<td>{$service.name}</td>
  					<td><input id='ustotal_{$service.id}' class='ustotal' data-service-id='{$service.id}' type='text' name='service[{$service.id}][total]' value="{$serval[$service.id].total}" readonly /></td>
  					<td><input id='usmale_{$service.id}' class='usmale' data-service-id='{$service.id}' type='text' name='service[{$service.id}][male]' value="{$serval[$service.id].male}" /></td>
  					<td><input id='usmale_ratio_{$service.id}' type='text' name='service[{$service.id}][male_ratio]' value="{$serval[$service.id].male_ratio}" /></td>
  					<td><input id='usfemale_{$service.id}' class='usfemale' data-service-id='{$service.id}' type='text' name='service[{$service.id}][female]' value="{$serval[$service.id].female}" /></td>
  					<td><input id='usfemale_ratio_{$service.id}' type='text' name='service[{$service.id}][female_ratio]' value="{$serval[$service.id].female_ratio}" /></td>
  					<td><input id='usyouth_{$service.id}' class='usyouth' data-service-id='{$service.id}' type='text' name='service[{$service.id}][youth]' value="{$serval[$service.id].youth}" /></td>
  					<td><input id='usyouth_ratio_{$service.id}' type='text' name='service[{$service.id}][youth_ratio]' value="{$serval[$service.id].youth_ratio}" /></td>
  					<td><input id='usnone_member_{$service.id}' class='usnone_member' data-service-id='{$service.id}' type='text' name='service[{$service.id}][none_member]' value="{$serval[$service.id].none_member}" /></td>
  					<td><input id='usnone_member_ratio_{$service.id}' type='text' name='service[{$service.id}][none_member_ratio]' value="{$serval[$service.id].none_member_ratio}" /></td>
  				</tr>
  			{/foreach}
  			</tbody>
  		</table>
  </div>
</div>
	{if $ds.saved eq "0"}
		<button type="submit" name='save' class="btn btn-default">Save</button>
	{else}
		{if $ds.locked eq "0"}
			<button type="submit" name='save' class="btn btn-default">Save</button>
			<button type="submit" name='lock' class="btn btn-default">Finalize</button>
		{else}
			<button type="button" id='unlock' name='unlock' class="btn btn-default">Unlock</button>
		{/if}
	{/if}
</form>

<script type='text/javascript'>

	function getval(xid) {
		return parseInt($("#bs" + xid).val());
	}

	function igetval(xid) {
		return parseInt($("#is" + xid).val());
	}
	
	function calcUsageTotal(service_id)
	{
		var male = parseInt($("#usmale_" + service_id).val());
		var female = parseInt($("#usfemale_" + service_id).val());
		var youth = parseInt($("#usyouth_" + service_id).val());
		var none_member = parseInt($("#usnone_member_" + service_id).val());
		
		var total = male + female + youth + none_member;
		$("#ustotal_" + service_id).val(total);
		
		return parseInt($("#ustotal_" + service_id).val());
	}
	
	$(function () {
		
		$( ".usmale, .usfemale, .usyouth, .usnone_member").change(function (e) {
			e.preventDefault();
			var service_id = $(this).data('service-id');
			var total = calcUsageTotal(service_id);
			var male = parseInt($("#usmale_" + service_id).val());
			var female = parseInt($("#usfemale_" + service_id).val());
			var youth = parseInt($("#usyouth_" + service_id).val());
			var none_member = parseInt($("#usnone_member_" + service_id).val());
			
			if (isNaN(total)) return false;
			
			if (!isNaN(male)) {
				var male_ratio = (male / total)	* 100;
				$("#usmale_ratio_" + service_id).val(male_ratio.toFixed(2));
			}
			
			if (!isNaN(female)) {
				var female_ratio = (female / total)	* 100;
				$("#usfemale_ratio_" + service_id).val(female_ratio.toFixed(2));
			}
			
			if (!isNaN(youth)) {
				var youth_ratio = (youth / total)	* 100;
				$("#usyouth_ratio_" + service_id).val(youth_ratio.toFixed(2));
			}
			 
			if (!isNaN(none_member)) {
				var none_member_ratio = (none_member / total)	* 100;
				$("#usnone_member_ratio_" + service_id).val(none_member_ratio.toFixed(2));
			}
			
			return true;
			
		});
		
		$( ".total, .totalx, .male, .female, .farmer, .employee, .microb, .group1, .group2, .group3, .group4, .less_total, .less_male, .less_female, .less_savings, .less_outstand, .less_totalg " ).change(function (e) {
			e.preventDefault();
			var total = 0;
			var sum_col = $(this).data('sum');
			var group = $(this).data('group');
			$("." + group).each(function (index) {
				total += parseInt($(this).val());
			});
			$("#" + sum_col).val(total);
			
			var id = $(this).attr('class');
			var gender = $(this).data('gender');
			var oparea = $(this).data('oparea');
			
			var total = parseInt($("#farmer_" + oparea + "_" + gender).val()) + parseInt($("#microb_" + oparea + "_" + gender).val()) + parseInt($("#employee_" + oparea + "_" + gender).val()); 
			$("#total_" + oparea + "_" + gender).val(total);	
			
			var total = parseInt($("#group1_" + oparea + "_" + gender).val()) + parseInt($("#group2_" + oparea + "_" + gender).val()) + parseInt($("#group3_" + oparea + "_" + gender).val()) + parseInt($("#group4_" + oparea + "_" + gender).val()); 
			$("#grouptotal_" + oparea + "_" + gender).val(total);
			
			var totall = 0, totalr = 0;
			$(".totalx").each(function (index) {
				if ($(this).data('sum') == 'ttotalxr') totalr += parseInt($(this).val());
				else if ($(this).data('sum') == 'ttotalxl') totall +=  parseInt($(this).val());
			});
			
			$("#ttotalxl").val(totall);
			$("#ttotalxr").val(totalr);
			
		});
		
		//$('input[type=text]').number(true, 2);
		
		$( "#dialog-form" ).dialog({
      autoOpen: false,
      height: 300,
      width: 350,
      modal: true,
      buttons: {
        "Unlock Request": function() {
          
          	var comment = $("#reason").val();
          	var that = $(this);
          	
          	if (comment.trim() == "") {
          		alert("You must provide a reason for unlock");
          		return false;
          	}
          
          	$.post("http://{$smarty.server.HTTP_HOST}{$smarty.const.APP_PATH}/ajax/unlock/{$ds.id}", { comment: comment } , function () {
          		that.dialog( "close" );
          	});
        },
        Cancel: function() {
          $( this ).dialog( "close" );
        }
      },
      close: function() {
		$("#reason").val('');
      }
    });
		
		$("#unlock").click(function (e) {
			e.preventDefault();
			$( "#dialog-form" ).dialog( "open" );
		});
	});
</script>

<div id="dialog-form" title="Unlock Request" style='display: none;'>
  <p class="validateTips">Request to unlock Datasheet</p>
 
  <form>
  <fieldset>
    <label for="reason">Reason</label>
    <textarea id='reason' name='reason' cols='40' rows='20'></textarea>
  </fieldset>
  </form>
</div>

{include file='footer.tpl'}
