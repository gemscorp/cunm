{include file='header.tpl'}
<h3>Datasheet</h3>
          
<!-- Nav tabs -->
<ul class="nav nav-tabs">
  <li class="active"><a href="#area_gender" data-toggle="tab">Area &amp; Gender</a></li>
  <li><a href="#area_market" data-toggle="tab">Area, Market &amp; Age</a></li>
  <li><a href="#service" data-toggle="tab">Less Member Service Distribution</a></li>
  <li><a href="#assets" data-toggle="tab">Assets</a></li>
  <li><a href="#balancesheet" data-toggle="tab">Balance Sheet</a></li>
  <li><a href="#usage_services" data-toggle="tab">Usage of Services</a></li>
</ul>

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
	  					<td><input type='text' /></td>
	  					<td><input type='text' /></td>
	  					<td><input type='text' /></td>
	  				</tr>
  				{/foreach}
				<tr>
  					<td>Total</td>
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
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
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
  				</tr>
				{/foreach}
				<tr>
  					<td>Total</td>
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
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
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
  				</tr>
  				{/foreach}
  				<tr>
  					<td>Total</td>
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
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
			    <input type="radio" name="optionsRadios" id="optionsRadios1" value="{$assetgroup.id}">
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
  						<td><input type='text' /></td>
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
  				<tr>
  					<td>Total Share</td>
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
  				</tr>
  				<tr>
  					<td>Deposit</td>
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
  				</tr>
  				<tr>
  					<td>Savings</td>
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
  				</tr>
  				<tr>
  					<td>Loans Outstanding (with princila &gt; US$ 300)</td>
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
  				</tr>
  				<tr>
  					<td>Loans Outstanding (with princila &lt; US$ 300)</td>
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
  				</tr>
  				<tr>
  					<td>Total Reserves</td>
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
  				</tr>
  				<tr>
  					<td>Total Asset</td>
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
  				</tr>
  				<tr>
  					<td>Loans Deliquent for more than 1 month</td>
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
  					<td><input type='text' /></td>
  				</tr>
  			</tbody>
  		</table>
  </div>
</div>
{include file='footer.tpl'}