{include file='header.tpl'}
<h3>Report</h3>

{include file='common/alert.tpl'}
<!-- Nav tabs -->
<ul class="nav nav-tabs">
  <li class='active'><a href="#area_market" data-toggle="tab">Area, Market, Gender &amp; Age</a></li>
  <li><a href="#service" data-toggle="tab">Have Less Member Service Distribution</a></li>
  <li><a href="#usage_services" data-toggle="tab">Usage of Service</a></li>
  <li><a href="#balancesheet" data-toggle="tab">Balance Sheet</a></li>
  <li><a href="#incomestatment" data-toggle="tab">Income Statement</a></li>
  <li><a href="#pearls" data-toggle="tab">PEARLS</a></li>    
</ul>
<form role="form" method='post' action='http://{$smarty.server.HTTP_HOST}{$smarty.const.APP_PATH}/member/detail'>
<div class="tab-content">

	<div class="tab-pane" id="usage_services">
  		<table class="table">
  			<thead>
  				<tr>
  					<th>Type of Services</th>
  					<th>Period</th>
	  				<th>Amount</th>
	  				<th>Change</th>
	  				<th>Male</th>
	  				<th>Change</th>
	  				<th>Percentage</th>
	  				<th>Change</th>
	  				<th>Female</th>
	  				<th>Change</th>
	  				<th>Percentage</th>
	  				<th>Change</th>
	  				<th>Youth</th>
	  				<th>Change</th>
	  				<th>Percentage</th>
	  				<th>Change</th>
	  				<th>Non-members</th>
	  				<th>Change</th>
	  				<th>Percentage</th>
	  				<th>Change</th>
  				</tr>
  			</thead>
  			<tbody>
  			{foreach from=$services item=service}
  				<tr>
  					<td rowspan='2'>{$service.name}</td>
  					{foreach from=$periods item=period name='periods'}
  						{if $smarty.foreach.periods.last}
  							<tr>
  						{/if}
  						<td>Period {$period} </td>
  						<td>{$serval[$service.id][$period].total|number_format:2:".":","}</td>
  						{if $smarty.foreach.periods.first}
  							<td rowspan='2' style='vertical-align: middle;'>{$serval[$service.id].total_change|number_format:2:".":","}%</td>
  						{/if}
  						<td>{$serval[$service.id][$period].male|number_format:2:".":","}</td>
  						{if $smarty.foreach.periods.first}
  							<td rowspan='2' style='vertical-align: middle;'>{$serval[$service.id].male_change|number_format:2:".":","}%</td>
  						{/if}
  						<td>{$serval[$service.id][$period].male_ratio|number_format:2:".":","}%</td>
  						{if $smarty.foreach.periods.first}
  							<td rowspan='2' style='vertical-align: middle;'>{$serval[$service.id].male_ratio_change|number_format:2:".":","}%</td>
  						{/if}
  						<td>{$serval[$service.id][$period].female|number_format:2:".":","}</td>
  						{if $smarty.foreach.periods.first}
  							<td rowspan='2' style='vertical-align: middle;'>{$serval[$service.id].female_change|number_format:2:".":","}%</td>
  						{/if}
  						<td>{$serval[$service.id][$period].female_ratio|number_format:2:".":","}%</td>
  						{if $smarty.foreach.periods.first}
  							<td rowspan='2' style='vertical-align: middle;'>{$serval[$service.id].female_ratio_change|number_format:2:".":","}%</td>
  						{/if}
  						<td>{$serval[$service.id][$period].youth|number_format:2:".":","}</td>
  						{if $smarty.foreach.periods.first}
  							<td rowspan='2' style='vertical-align: middle;'>{$serval[$service.id].youth_change|number_format:2:".":","}%</td>
  						{/if}
  						<td>{$serval[$service.id][$period].youth_ratio|number_format:2:".":","}%</td>
  						{if $smarty.foreach.periods.first}
  							<td rowspan='2' style='vertical-align: middle;'>{$serval[$service.id].youth_ratio_change|number_format:2:".":","}%</td>
  						{/if}
  						<td>{$serval[$service.id][$period].none_member|number_format:2:".":","}</td>
  						{if $smarty.foreach.periods.first}
  							<td rowspan='2' style='vertical-align: middle;'>{$serval[$service.id].none_member_change|number_format:2:".":","}%</td>
  						{/if}
  						<td>{$serval[$service.id][$period].none_member_ratio|number_format:2:".":","}%</td>
  						{if $smarty.foreach.periods.first}
  							<td rowspan='2' style='vertical-align: middle;'>{$serval[$service.id].none_member_ratio_change|number_format:2:".":","}%</td>
  							</tr>
  						{/if}
  						{/foreach}
  				</tr>
  			{/foreach}
  			</tbody>
  		</table>
  </div>

  <div class="tab-pane active" id="area_market">
  		<table class="table">
  			<thead>
  				<tr>
	  				<th rowspan='2'>Type of CU</th>
	  				<th rowspan='2'>Period</th>
	  				<th rowspan='2'>Number of Members by Market</th>
	  				<th rowspan='2'>Change</th>
	  				<th rowspan='2'>Farmers</th>
	  				<th rowspan='2'>Change</th>
	  				<th rowspan='2'>Employee</th>
	  				<th rowspan='2'>Change</th>
	  				<th rowspan='2'>Micro Business</th>
	  				<th rowspan='2'>Change</th>
	  				<th colspan='10'>Age Segmentation of CU Membership</th>
  				</tr>
  				<tr>
  				<th>18 - 35</th>
  				<th>Change</th>
  				<th>36 - 45</th>
  				<th>Change</th>
  				<th>46 - 60</th>
  				<th>Change</th>
  				<th>&gt; 60</th>
  				<th>Change</th>
  				<th>Total</th>
  				<th>Change</th>
  				</tr>
  			</thead>
  			<tbody>
  				{foreach from=$opareas item=oparea}
  					{foreach from=$genders item=gender}
	  				<tr>
	  					<td rowspan='2'>{$areas[$oparea]} - {$gtxt[$gender]}</td>
	  					{foreach from=$periods item=period name='period'}
	  						{if $smarty.foreach.period.last}
	  							<tr>
	  						{/if}
	  						<td>Period {$period}</td>
	  						<td>{$gender_groups[$oparea][$gender][$period].total}</td>
	  						{if $smarty.foreach.period.first}
	  							<td rowspan='2' style='vertical-align: middle;'>{$gender_groups[$oparea][$gender].total_change|number_format:2}%</td>
	  						{/if}
	  						<td>{$gender_groups[$oparea][$gender][$period].farmer}</td>
	  						{if $smarty.foreach.period.first}
	  							<td rowspan='2' style='vertical-align: middle;'>{$gender_groups[$oparea][$gender].farmer_change|number_format:2}%</td>
	  						{/if}
	  						<td>{$gender_groups[$oparea][$gender][$period].employee}</td>
	  						{if $smarty.foreach.period.first}
	  							<td rowspan='2' style='vertical-align: middle;'>{$gender_groups[$oparea][$gender].employee_change|number_format:2}%</td>
	  						{/if}
	  						<td>{$gender_groups[$oparea][$gender][$period].microb}</td>
	  						{if $smarty.foreach.period.first}
	  							<td rowspan='2' style='vertical-align: middle;'>{$gender_groups[$oparea][$gender].microb_change|number_format:2}%</td>
	  						{/if}
	  						<td>{$gender_groups[$oparea][$gender][$period].group1}</td>
	  						{if $smarty.foreach.period.first}
	  							<td rowspan='2' style='vertical-align: middle;'>{$gender_groups[$oparea][$gender].group1_change|number_format:2}%</td>
	  						{/if}
	  						<td>{$gender_groups[$oparea][$gender][$period].group2}</td>
	  						{if $smarty.foreach.period.first}
	  							<td rowspan='2' style='vertical-align: middle;'>{$gender_groups[$oparea][$gender].group2_change|number_format:2}%</td>
	  						{/if}
	  						<td>{$gender_groups[$oparea][$gender][$period].group3}</td>
	  						{if $smarty.foreach.period.first}
	  							<td rowspan='2' style='vertical-align: middle;'>{$gender_groups[$oparea][$gender].group3_change|number_format:2}%</td>
	  						{/if}
	  						<td>{$gender_groups[$oparea][$gender][$period].group4}</td>
	  						{if $smarty.foreach.period.first}
	  							<td rowspan='2' style='vertical-align: middle;'>{$gender_groups[$oparea][$gender].group4_change|number_format:2}%</td>
	  						{/if}
	  						<td>{$gender_groups[$oparea][$gender][$period].total}</td>
	  						{if $smarty.foreach.period.first}
	  							<td rowspan='2' style='vertical-align: middle;'>{$gender_groups[$oparea][$gender].total_change|number_format:2}%</td>
	  							</tr>
	  						{/if}
	  					{/foreach}
	  				</tr>
	  				{/foreach}
				{/foreach}
  			</tbody>
  		</table>
  </div>
  <div class="tab-pane" id="service">
  		<table class="table">
  			<thead>
  				<tr>
  					<th>&nbsp;</th>
  					<th>Period</th>
	  				<th>Total Member</th>
	  				<th>Change</th>
	  				<th>Total Savings</th>
	  				<th>Change</th>
	  				<th>Total Loans</th>
	  				<th>Change</th>
	  				<th>Loan Outstanding</th>
	  				<th>Change</th>
  				</tr>
  			</thead>
  			<tbody>
  				{foreach from=$opareas item=oparea}
  					{foreach from=$genders item=gender}
  				<tr>
  					<td rowspan='2'>{$areas[$oparea]} - {$gtxt[$gender]}</td>
  					{foreach from=$periods item=period name='period'}
  						{if $smarty.foreach.period.last}
	  						<tr>
	  					{/if}
	  					<td>Period {$period}</td>
	  					<td>{$gender_groups[$oparea][$gender][$period].less_total}</td>
	  					{if $smarty.foreach.period.first}
	  						<td rowspan='2' style='vertical-align: middle;'>{$gender_groups[$oparea][$gender].less_total_change|number_format:2}%</td>
	  					{/if}
	  					<td>{$gender_groups[$oparea][$gender][$period].less_savings}</td>
	  					{if $smarty.foreach.period.first}
	  						<td rowspan='2' style='vertical-align: middle;'>{$gender_groups[$oparea][$gender].less_savings_change|number_format:2}%</td>
	  					{/if}
	  					<td>{$gender_groups[$oparea][$gender][$period].less_totalg}</td>
	  					{if $smarty.foreach.period.first}
	  						<td rowspan='2' style='vertical-align: middle;'>{$gender_groups[$oparea][$gender].less_totalg_change|number_format:2}%</td>
	  					{/if}
	  					<td>{$gender_groups[$oparea][$gender][$period].less_outstand}</td>
	  					{if $smarty.foreach.period.first}
	  						<td rowspan='2' style='vertical-align: middle;'>{$gender_groups[$oparea][$gender].less_outstand_change|number_format:2}%</td>
	  						</tr>
	  					{/if}
	  				{/foreach}
  				</tr>
  					{/foreach}
  				{/foreach}  				
  			</tbody>
  		</table>
  </div>
  <div class="tab-pane" id="balancesheet">
  		<table class="table">
  					<tr>
  						<td>Line Item</td>
  						{if $smarty.session.user_level neq 0}
  						<td>Period 1</td>
  						<td>Period 2</td>
  						<td>Change</td>
  						{/if}
  						<td>Period 1</td>
  						<td>Period 2</td>
  						<td>Change</td>
  					</tr>
  			{foreach from=$bslines item=bsline}
  				{if $group neq $bsline.group_name}
  					{assign var=group value=$bsline.group_name}
  					<tr>
  						{if $smarty.session.user_level neq 0}
  							<td colspan='7' style='text-align: left;'><strong>{$group}</strong></td>
  						{else}
  							<td colspan='4' style='text-align: left;'><strong>{$group}</strong></td>
  						{/if}
  					</tr>
  				{/if}
  				{if $subgroup neq $bsline.subgroup_name}
  					{assign var=subgroup value=$bsline.subgroup_name}
  					<tr>
  						{if $smarty.session.user_level neq 0}
  							<td colspan='7' style='text-align: left; padding-left: 30px;'><i>{$subgroup}</i></td>
  						{else}
  							<td colspan='4' style='text-align: left; padding-left: 30px;'><i>{$subgroup}</i></td>
  						{/if}
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
  						{if $smarty.session.user_level neq 0}
	  						<td>
	  							{if $bsline.total eq "0"}
	  								{if $bsvals[$bsline.id][1].amount < 0}
	  									<span style='color: red;'>({$bsvals[$bsline.id][1].amount})</span>
	  								{else}
	  									{$bsvals[$bsline.id][1].amount}
	  								{/if}
	  							{else}
	  								{if $bsvals[$bsline.id][1].amount < 0}
	  									<strong><span style='color: red;'>({$bsvals[$bsline.id][1].amount})</span></strong>
	  								{else}
	  									<strong>{$bsvals[$bsline.id][1].amount}</strong>
	  								{/if}
	  							{/if}
	  						</td>
	  						<td>
	  							{if $bsline.total eq "0"}
	  								{if $bsvals[$bsline.id][2].amount < 0}
	  									<span style='color: red;'>({$bsvals[$bsline.id][2].amount})</span>
	  								{else}
	  									{$bsvals[$bsline.id][2].amount}
	  								{/if}
	  							{else}
	  								{if $bsvals[$bsline.id][2].amount < 0}
	  									<strong><span style='color: red;'>({$bsvals[$bsline.id][2].amount})</span></strong>
	  								{else}
	  									<strong>{$bsvals[$bsline.id][2].amount}</strong>
	  								{/if}
	  							{/if}
	  						</td>
	  						<td>
	  							{if $bsline.total eq "0"}
	  								{if $bsvals[$bsline.id].amount_change < 0}
	  									<span style='color: red;'>({$bsvals[$bsline.id].amount_change|number_format:2})%</span>
	  								{else}
	  									{$bsvals[$bsline.id].amount_change|number_format:2}%
	  								{/if}
	  							{else}
	  								{if $bsvals[$bsline.id].amount_change < 0}
	  									<strong><span style='color: red;'>({$bsvals[$bsline.id].amount_change|number_format:2})</span></strong>
	  								{else}
	  									<strong>{$bsvals[$bsline.id].amount_change|number_format:2}%</strong>
	  								{/if}
	  							{/if}
	  						</td>
	  					{/if}
  						<td>
  							{if $bsline.total eq "0"}
  								{if $bsvals[$bsline.id][1].us_amount < 0}
  									US$<span style='color: red;'>({$bsvals[$bsline.id][1].us_amount|number_format:2})</span>
  								{else}
  									US${$bsvals[$bsline.id][1].us_amount|number_format:2}
  								{/if}
  							{else}
  								{if $bsvals[$bsline.id][1].us_amount < 0}
  									US$<strong><span style='color: red;'>({$bsvals[$bsline.id][1].us_amount|number_format:2})</span></strong>
  								{else}
  									US$<strong>{$bsvals[$bsline.id][1].us_amount|number_format:2}</strong>
  								{/if}
  							{/if}
  						</td>
  						<td>
  							{if $bsline.total eq "0"}
  								{if $bsvals[$bsline.id][2].us_amount < 0}
  									US$<span style='color: red;'>({$bsvals[$bsline.id][2].us_amount|number_format:2})</span>
  								{else}
  									US${$bsvals[$bsline.id][2].us_amount|number_format:2}
  								{/if}
  							{else}
  								{if $bsvals[$bsline.id][2].us_amount < 0}
  									US$<strong><span style='color: red;'>({$bsvals[$bsline.id][2].us_amount|number_format:2})</span></strong>
  								{else}
  									US$<strong>{$bsvals[$bsline.id][2].us_amount|number_format:2}</strong>
  								{/if}
  							{/if}
  						</td>
  						<td>
  							{if $bsline.total eq "0"}
  								{if $bsvals[$bsline.id].amount_change < 0}
  									US$<span style='color: red;'>({$bsvals[$bsline.id].amount_change|number_format:2})%</span>
  								{else}
  									US${$bsvals[$bsline.id].amount_change|number_format:2}%
  								{/if}
  							{else}
  								{if $bsvals[$bsline.id].amount_change < 0}
  									US$<strong><span style='color: red;'>({$bsvals[$bsline.id].amount_change|number_format:2})%</span></strong>
  								{else}
  									US$<strong>{$bsvals[$bsline.id].amount_change|number_format:2}%</strong>
  								{/if}
  							{/if}
  						</td>
  						</tr>
  			{/foreach}
  		</table>
  </div>
  <div class="tab-pane" id="incomestatment">
  		<table class="table">
  					<tr>
  						<td>Line Item</td>
  						{if $smarty.session.user_level neq 0}
  							<td>Period 1</td>
  							<td>Period 2</td>
  							<td>Change</td>
  						{/if}
  						<td>Period 1</td>
  						<td>Period 2</td>
  						<td>Change</td>
  					</tr>
  			{foreach from=$islines item=isline}
  				{if $group neq $isline.group_name}
  					{assign var=group value=$isline.group_name}
  					<tr>
  						{if $smarty.session.user_level neq 0}
  							<td colspan='7' style='text-align: left;'><strong>{$group}</strong></td>
  						{else}
  							<td colspan='4' style='text-align: left;'><strong>{$group}</strong></td>
  						{/if}
  					</tr>
  				{/if}
  				{if $subgroup neq $isline.subgroup_name}
  					{assign var=subgroup value=$isline.subgroup_name}
  					<tr>
  						{if $smarty.session.user_level neq 0}
  							<td colspan='7' style='text-align: left; padding-left: 30px;'><i>{$subgroup}</i></td>
  						{else}
  							<td colspan='4' style='text-align: left; padding-left: 30px;'><i>{$subgroup}</i></td>
  						{/if}
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
  						{if $smarty.session.user_level neq 0}
	  						<td>
	  							{if $isline.total eq "0"}
	  								{if $isvals[$isline.id][1].amount < 0}
	  									<span style='color: red;'>({$isvals[$isline.id][1].amount})</span>
	  								{else}
	  									{$isvals[$isline.id][1].amount}
	  								{/if}
	  							{else}
	  								{if $isvals[$isline.id][1].amount < 0}
	  									<strong><span style='color: red;'>({$isvals[$isline.id][1].amount})</span></strong>
	  								{else}
	  									<strong>{$isvals[$isline.id][1].amount}</strong>
	  								{/if}
	  							{/if}
							</td>
							<td>
	  						
	  							{if $isline.total eq "0"}
	  								{if $isvals[$isline.id][2].amount < 0}
	  									<span style='color: red;'>({$isvals[$isline.id][2].amount})</span>
	  								{else}
	  									{$isvals[$isline.id][2].amount}
	  								{/if}
	  							{else}
	  								{if $isvals[$isline.id][2].amount < 0}
	  									<strong><span style='color: red;'>({$isvals[$isline.id][2].amount})</span></strong>
	  								{else}
	  									<strong>{$isvals[$isline.id][2].amount}</strong>
	  								{/if}
	  							{/if}
							</td>
							<td>
	  						
	  							{if $isline.total eq "0"}
	  								{if $isvals[$isline.id].amount_change < 0}
	  									<span style='color: red;'>({$isvals[$isline.id].amount_change|number_format:2})%</span>
	  								{else}
	  									{$isvals[$isline.id].amount_change|number_format:2}%
	  								{/if}
	  							{else}
	  								{if $isvals[$isline.id].amount_change < 0}
	  									<strong><span style='color: red;'>({$isvals[$isline.id].amount_change|number_format:2})%</span></strong>
	  								{else}
	  									<strong>{$isvals[$isline.id].amount_change|number_format:2}%</strong>
	  								{/if}
	  							{/if}
							</td>
						{/if}
						<td>
  							{if $isline.total eq "0"}
  								{if $isvals[$isline.id][1].us_amount < 0}
  									US$<span style='color: red;'>({$isvals[$isline.id][1].us_amount|number_format:2})</span>
  								{else}
  									US${$isvals[$isline.id][1].us_amount|number_format:2}
  								{/if}
  							{else}
  								{if $isvals[$isline.id][1].us_amount < 0}
  									US$<strong><span style='color: red;'>({$isvals[$isline.id][1].us_amount|number_format:2})</span></strong>
  								{else}
  									US$<strong>{$isvals[$isline.id][1].us_amount|number_format:2}</strong>
  								{/if}
  							{/if}
						</td>
						<td>
  							{if $isline.total eq "0"}
  								{if $isvals[$isline.id][2].us_amount < 0}
  									US$<span style='color: red;'>({$isvals[$isline.id][2].us_amount|number_format:2})</span>
  								{else}
  									US${$isvals[$isline.id][2].us_amount|number_format:2}
  								{/if}
  							{else}
  								{if $isvals[$isline.id][2].us_amount < 0}
  									US$<strong><span style='color: red;'>({$isvals[$isline.id][2].us_amount|number_format:2})</span></strong>
  								{else}
  									US$<strong>{$isvals[$isline.id][2].us_amount|number_format:2}</strong>
  								{/if}
  							{/if}
						</td>
						<td>
  							{if $isline.total eq "0"}
  								{if $isvals[$isline.id].amount_change < 0}
  									US$<span style='color: red;'>({$isvals[$isline.id].amount_change|number_format:2})</span>
  								{else}
  									US${$isvals[$isline.id].amount_change|number_format:2}
  								{/if}
  							{else}
  								{if $isvals[$isline.id].amount_change < 0}
  									US$<strong><span style='color: red;'>({$isvals[$isline.id].amount_change|number_format:2})</span></strong>
  								{else}
  									US$<strong>{$isvals[$isline.id].amount_change|number_format:2}</strong>
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
	  				<th>Actual Period 1</th>
	  				<th>Actual Period 2</th>
	  				<th>Change</th>
	  				<th>Goal</th>
  				</tr>
  			</thead>
  			<tbody>
  				<tr>
  					<td rowspan='2'>P = Protection</td>
  					<td>P1</td>
  					<td>Allowance for Loan Losses / Allowance Required &lt; 12 Months</td>
  					<td>{$pearls.P1_p1|number_format:2}%</td>
  					<td>{$pearls.P1_p2|number_format:2}%</td>
  					<td>{$pearls.P1_change|number_format:2}%</td>
  					<td>100%</td>
  				</tr>
  				<tr>
  					<td>P2</td>
  					<td>Net Allowance for Loan Losses / Allowance Required for Loans Delinquent less than 12 Months</td>
  					<td>{$pearls.P2_p1|number_format:2}%</td>
  					<td>{$pearls.P2_p2|number_format:2}%</td>
  					<td>{$pearls.P2_change|number_format:2}%</td>
  					<td>35%</td>
  				</tr>
  				
  				<tr>
  					<td rowspan='3'>E = Effective Financial Structure</td>
  					<td>E1</td>
  					<td>Net Loans / Total Assets</td>
  					<td>{$pearls.E1_p1|number_format:2}%</td>
  					<td>{$pearls.E1_p2|number_format:2}%</td>
  					<td>{$pearls.E1_change|number_format:2}%</td>
  					<td>70% - 80%</td>
  				</tr>
  				<tr>
  					<td>E5</td>
  					<td>Savings Deposits / Total Assets</td>
  					<td>{$pearls.E5_p1|number_format:2}%</td>
  					<td>{$pearls.E5_p2|number_format:2}%</td>
  					<td>{$pearls.E5_change|number_format:2}%</td>
  					<td>70% - 80%</td>
  				</tr>
  				<tr>
  					<td>E9</td>
  					<td>Net Institutional Capital / Total Assets</td>
  					<td>{$pearls.E9_p1|number_format:2}%</td>
  					<td>{$pearls.E9_p2|number_format:2}%</td>
  					<td>{$pearls.E9_change|number_format:2}%</td>
  					<td>Min 10%</td>
  				</tr>
  				
  				<tr>
  					<td rowspan='2'>A = Asset Quality</td>
  					<td>A1</td>
  					<td>Total Loan Delinquency / Gross Loan Portfolio</td>
  					<td>{$pearls.A1_p1|number_format:2}%</td>
  					<td>{$pearls.A1_p2|number_format:2}%</td>
  					<td>{$pearls.A1_change|number_format:2}%</td>
  					<td>&lt; 5%</td>
  				</tr>
  				<tr>
  					<td>A2</td>
  					<td>Non-Earning Assets / Total Assets</td>
  					<td>{$pearls.A2_p1|number_format:2}%</td>
  					<td>{$pearls.A2_p2|number_format:2}%</td>
  					<td>{$pearls.A2_change|number_format:2}%</td>
  					<td>&lt; 5%</td>
  				</tr>
  				
  				<tr>
  					<td rowspan='2'>S = Signs of Growth</td>
  					<td>S10</td>
  					<td>Growth in Membership</td>
  					<td>{$pearls.S10_p1|number_format:2}%</td>
  					<td>{$pearls.S10_p2|number_format:2}%</td>
  					<td>{$pearls.S10_change|number_format:2}%</td>
  					<td>&gt; 12%</td>
  				</tr>
  				<tr>
  					<td>S11</td>
  					<td>Growth in Total Assets</td>
  					<td>{$pearls.S11_p1|number_format:2}%</td>
  					<td>{$pearls.S11_p2|number_format:2}%</td>
  					<td>{$pearls.S11_change|number_format:2}%</td>
  					<td>&lt; inflation</td>
  				</tr>
  				
  			</tbody>
  		</table>
  </div>
</div>
</form>
{include file='footer.tpl'}
