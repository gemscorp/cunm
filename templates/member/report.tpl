{include file='header.tpl'}
<h3>Datasheet</h3>

{include file='common/alert.tpl'}
          
<!-- Nav tabs -->
<ul class="nav nav-tabs">
  <li class="active"><a href="#lessmember" data-toggle="tab">Have Less Member</a></li>
  <li><a href="#area_market" data-toggle="tab">Area, Market &amp; Age</a></li>
  <li><a href="#service" data-toggle="tab">Have Less Member Service Distribution</a></li>
  <li><a href="#assets" data-toggle="tab">Assets</a></li>
  <li><a href="#balancesheet" data-toggle="tab">Balance Sheet</a></li>
  <li><a href="#incomestatment" data-toggle="tab">Income Statement</a></li>  
</ul>

<form role="form" method='post' action='http://{$smarty.server.HTTP_HOST}{$smarty.const.APP_PATH}/member/detail'>
<input type='hidden' name='dsid' value='{$pid}' />
<div class="tab-content">
  <div class="tab-pane active" id="lessmember">
  		<table class="table">
  			<thead>
  				<tr>
	  				<th>Gender</th>
	  				<th>Number of Have Less Member</th>
	  				<th>Total Savings</th>
	  				<th>Loan Outstanding</th>
	  				<th>Total Loan Granted</th>
  				</tr>
  			</thead>
  			<tbody>
  				<tr>
  					<td>Male</td>
  					<td></td>
  					<td></td>
  					<td></td>
  					<td></td>
  				</tr>
  				<tr>
  					<td>Female</td>
  					<td></td>
  					<td></td>
  					<td></td>
  					<td></td>
  				</tr>
				<tr>
  					<td>Total</td>
  					<td></td>
  					<td></td>
  					<td></td>
  					<td></td>
  				</tr>
  			</tbody>
  		</table>
  </div>
  <div class="tab-pane" id="area_market">
  		<table class="table">
  			<thead>
  				<tr>
  				<th>18 - 35</th>
  				<th>36 - 45</th>
  				<th>46 - 60</th>
  				<th>&gt; 60</th>
  				<th>Total</th>
  				</tr>
  			</thead>
  			<tbody>
				<tr>
  					<td><input id='ttotalx' type='text' value='{$gender_total.total}' /></td>
  					<td><input id='tfarmer' type='text' value='{$gender_total.farmer}' /></td>
  					<td><input id='temployee' type='text' value='{$gender_total.employee}' /></td>
  					<td><input id='tmicrob' type='text' value='{$gender_total.microb}' /></td>
  					<td><input id='tgroup1' type='text' value='{$gender_total.group1}' /></td>
  				</tr>
  			</tbody>
  		</table>
  </div>
  <div class="tab-pane" id="service">
  		<table class="table">
  			<thead>
  				<tr>
  					<th> < 300</th>
	  				<th>300 - 1000</th>
	  				<th>1001 - 3000</th>
	  				<th>3001 - 5000</th>
	  				<th>5000 < </th>
  				</tr>
  			</thead>
  			<tbody>
  				<tr>
  					<td>Total</td>
  					<td><input id='tless_total' type='text' value='{$gender_total.less_total}' /></td>
  					<td><input id='tless_male' type='text' value='{$gender_total.less_male}' /></td>
  					<td><input id='tless_female' type='text' value='{$gender_total.less_female}' /></td>
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
  						<td style='text-align: left; padding-left: 60px;'>{$isline.name}</td>
  						<td><input type='text' name='isline[{$isline.id}][amount]' value="{$isvals[$isline.id].amount}" /></td>
  					</tr>
  			{/foreach}
  		</table>
  </div>
  
</div>
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
		
		$( "#dialog-form" ).dialog({
      autoOpen: false,
      height: 300,
      width: 350,
      modal: true,
      buttons: {
        "Unlock Request": function() {
          
          	var comment = $("#reason").val();
          	var that = $(this);
          
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