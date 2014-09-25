{include file='header.tpl'}
<h3>Report</h3>

{include file='common/alert.tpl'}
          
<!-- Nav tabs -->
<ul class="nav nav-tabs">
  <li class='active'><a href="#area_market" data-toggle="tab">Area, Market, Gender &amp; Age</a></li>
  <li><a href="#service" data-toggle="tab">Have Less Member Service Distribution</a></li>
  <li><a href="#balancesheet" data-toggle="tab">Balance Sheet</a></li>
  <li><a href="#incomestatment" data-toggle="tab">Income Statement</a></li>
  <li><a href="#pearls" data-toggle="tab">PEARLS</a></li>    
</ul>
<form role="form" method='post' action='http://{$smarty.server.HTTP_HOST}{$smarty.const.APP_PATH}/member/detail'>
<div class="tab-content">
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
	  					<td>{$gender_groups[$oparea][$gender].total}</td>
	  					<td>{$gender_groups[$oparea][$gender].farmer}</td>
	  					<td>{$gender_groups[$oparea][$gender].employee}</td>
	  					<td>{$gender_groups[$oparea][$gender].microb}</td>
	  					<td>{$gender_groups[$oparea][$gender].group1}</td>
	  					<td>{$gender_groups[$oparea][$gender].group2}</td>
	  					<td>{$gender_groups[$oparea][$gender].group3}</td>
	  					<td>{$gender_groups[$oparea][$gender].group4}</td>
	  					<td>{$gender_groups[$oparea][$gender].total}</td>
	  				</tr>
	  				{/foreach}
				{/foreach}
				<tr>
  					<td>Total</td>
  					<td>{$gender_total.total}</td>
  					<td>{$gender_total.farmer}</td>
  					<td>{$gender_total.employee}</td>
  					<td>{$gender_total.microb}</td>
  					<td>{$gender_total.group1}</td>
  					<td>{$gender_total.group2}</td>
  					<td>{$gender_total.group3}</td>
  					<td>{$gender_total.group4}</td>
  					<td>{$gender_total.total}</td>
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
  					<td>{$gender_groups[$oparea][$gender].less_total}</td>
  					<td>{$gender_groups[$oparea][$gender].less_savings}</td>
  					<td>{$gender_groups[$oparea][$gender].less_totalg}</td>
  					<td>{$gender_groups[$oparea][$gender].less_outstand}</td>
  				</tr>
  					{/foreach}
  				{/foreach}
  				<tr>
  					<td>Total</td>
  					<td>{$gender_total.less_total}</td>
  					<td>{$gender_total.less_savings}</td>
  					<td>{$gender_total.less_totalg}</td>
  					<td>{$gender_total.less_outstand}</td>
  				</tr>
  				
  			</tbody>
  		</table>
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
  							{if $bsline.total eq "0"}
  								{if $bsvals[$bsline.id].amount < 0}
  									<span style='color: red;'>({$bsvals[$bsline.id].amount})</span>
  								{else}
  									{$bsvals[$bsline.id].amount}
  								{/if}
  							{else}
  								{if $bsvals[$bsline.id].amount < 0}
  									<strong><span style='color: red;'>({$bsvals[$bsline.id].amount})</span></strong>
  								{else}
  									<strong>{$bsvals[$bsline.id].amount}</strong>
  								{/if}
  							{/if}
  						</td>
  						<td>
  							{if $bsline.total eq "0"}
  								{if $bsvals[$bsline.id].amount < 0}
  									US$<span style='color: red;'>({$bsvals[$bsline.id].us_amount|number_format:2})</span>
  								{else}
  									US${$bsvals[$bsline.id].us_amount|number_format:2}
  								{/if}
  							{else}
  								{if $bsvals[$bsline.id].us_amount < 0}
  									US$<strong><span style='color: red;'>({$bsvals[$bsline.id].us_amount|number_format:2})</span></strong>
  								{else}
  									US$<strong>{$bsvals[$bsline.id].us_amount|number_format:2}</strong>
  								{/if}
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
  						
  							{if $isline.total eq "0"}
  								{if $isvals[$isline.id].amount < 0}
  									<span style='color: red;'>({$isvals[$isline.id].amount})</span>
  								{else}
  									{$isvals[$isline.id].amount}
  								{/if}
  							{else}
  								{if $isvals[$isline.id].amount < 0}
  									<strong><span style='color: red;'>({$isvals[$isline.id].amount})</span></strong>
  								{else}
  									<strong>{$isvals[$isline.id].amount}</strong>
  								{/if}
  							{/if}
  				
						</td>
						<td>
  						
  							{if $isline.total eq "0"}
  								{if $isvals[$isline.id].amount < 0}
  									US$<span style='color: red;'>({$isvals[$isline.id].us_amount|number_format:2})</span>
  								{else}
  									US${$isvals[$isline.id].us_amount|number_format:2}
  								{/if}
  							{else}
  								{if $isvals[$isline.id].amount < 0}
  									US$<strong><span style='color: red;'>({$isvals[$isline.id].us_amount|number_format:2})</span></strong>
  								{else}
  									US$<strong>{$isvals[$isline.id].us_amount|number_format:2}</strong>
  								{/if}
  							{/if}
  				
						</td>
  					</tr>
  			{/foreach}
  		</table>
  </div>
  <div class="tab-pane" id="pearls">
  		<table class="table">
  			<thead>
  				<tr>
	  				<th>Area</th>
	  				<th>Code</th>
	  				<th>Indicator</th>
	  				<th>Actual</th>
	  				<th>Goal</th>
  				</tr>
  			</thead>
  			<tbody>
  				<tr>
  					<td rowspan='2'>P = Protection</td>
  					<td>P1</td>
  					<td>Allowance for Loan Losses / Allowance Required &lt; 12 Months</td>
  					<td>{$pearls.P1}</td>
  					<td>100%</td>
  				</tr>
  				<tr>
  					<td>P2</td>
  					<td>Net Allowance for Loan Losses / Allowance Required for Loans Delinquent less than 12 Months</td>
  					<td>{$pearls.P2}</td>
  					<td>35%</td>
  				</tr>
  				
  				<tr>
  					<td rowspan='3'>E = Effective Financial Structure</td>
  					<td>E1</td>
  					<td>Net Loans / Total Assets</td>
  					<td>{$pearls.E1}</td>
  					<td>70% - 80%</td>
  				</tr>
  				<tr>
  					<td>E5</td>
  					<td>Savings Deposits / Total Assets</td>
  					<td>{$pearls.E5}</td>
  					<td>70% - 80%</td>
  				</tr>
  				<tr>
  					<td>E9</td>
  					<td>Net Institutional Capital / Total Assets</td>
  					<td>{$pearls.E9}</td>
  					<td>Min 10%</td>
  				</tr>
  				
  				<tr>
  					<td rowspan='2'>A = Asset Quality</td>
  					<td>A1</td>
  					<td>Total Loan Delinquency / Gross Loan Portfolio</td>
  					<td>{$pearls.A1}</td>
  					<td>&lt; 5%</td>
  				</tr>
  				<tr>
  					<td>A2</td>
  					<td>Non-Earning Assets / Total Assets</td>
  					<td>{$pearls.A2}</td>
  					<td>&lt; 5%</td>
  				</tr>
  				
  				<tr>
  					<td rowspan='2'>S = Signs of Growth</td>
  					<td>S10</td>
  					<td>Growth in Membership</td>
  					<td>{$pearls.S10}</td>
  					<td>&gt; 12%</td>
  				</tr>
  				<tr>
  					<td>S11</td>
  					<td>Growth in Total Assets</td>
  					<td>{$pearls.S11}</td>
  					<td>&lt; inflation</td>
  				</tr>
  				
  			</tbody>
  		</table>
  </div>
</div>
</form>
{include file='footer.tpl'}