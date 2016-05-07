<page>
<table class="table">
  			<thead>
  				{if $smarty.session.user_level neq 0 && $smarty.session.user_country_id neq 0}
  				<tr>
  					<th>Type of Services</th>
	  				<th>Amount</th>
	  				<th>Amount US$</th>
	  				<th>Male</th>
	  				<th>Male US$</th>
	  				<th>Percentage</th>
	  				<th>Female</th>
	  				<th>Female US$</th>
	  				<th>Percentage</th>
	  				<th>Youth</th>
	  				<th>Youth US$</th>
	  				<th>Percentage</th>
	  				<th>Non-members</th>
	  				<th>Non-members US$</th>
	  				<th>Percentage</th>
  				</tr>
  				{else}
  					<tr>
  					<th>Type of Services</th>
	  				<th>Amount US$</th>
	  				<th>Male US$</th>
	  				<th>Percentage</th>
	  				<th>Female US$</th>
	  				<th>Percentage</th>
	  				<th>Youth US$</th>
	  				<th>Percentage</th>>
	  				<th>Non-members US$</th>
	  				<th>Percentage</th>
  				</tr>
  				{/if}
  			</thead>
  			<tbody>
  			{foreach from=$services item=service}
  				{if $smarty.session.user_level neq 0 && $smarty.session.user_country_id neq 0}
  				<tr>
  					<td>{$service.name}</td>
  					<td>{$smarty.session.user_currency} {$serval[$service.id].total|number_format:2:".":","}</td>
  					<td>${$serval[$service.id].total_us|number_format:2:".":","}</td>
  					<td>{$smarty.session.user_currency} {$serval[$service.id].male|number_format:2:".":","}</td>
  					<td>${$serval[$service.id].male_us|number_format:2:".":","}</td>
  					<td>{$serval[$service.id].male_ratio|number_format:2:".":","}%</td>
  					<td>{$smarty.session.user_currency} {$serval[$service.id].female|number_format:2:".":","}</td>
  					<td>${$serval[$service.id].female_us|number_format:2:".":","}</td>
  					<td>{$serval[$service.id].female_ratio|number_format:2:".":","}%</td>
  					<td>{$smarty.session.user_currency} {$serval[$service.id].youth|number_format:2:".":","}</td>
  					<td>${$serval[$service.id].youth_us|number_format:2:".":","}</td>
  					<td>{$serval[$service.id].youth_ratio|number_format:2:".":","}%</td>
  					<td>{$smarty.session.user_currency} {$serval[$service.id].none_member|number_format:2:".":","}</td>
  					<td>${$serval[$service.id].none_member_us|number_format:2:".":","}</td>
  					<td>{$serval[$service.id].none_member_ratio|number_format:2:".":","}%</td>
  				</tr>
  				{else}
  					<tr>
  					<td>{$service.name}</td>
  					<td>${$serval[$service.id].total_us|number_format:2:".":","}</td>
  					<td>${$serval[$service.id].male_us|number_format:2:".":","}</td>
  					<td>{$serval[$service.id].male_ratio|number_format:2:".":","}%</td>
  					<td>${$serval[$service.id].female_us|number_format:2:".":","}</td>
  					<td>{$serval[$service.id].female_ratio|number_format:2:".":","}%</td>
  					<td>${$serval[$service.id].youth_us|number_format:2:".":","}</td>
  					<td>{$serval[$service.id].youth_ratio|number_format:2:".":","}%</td>
  					<td>${$serval[$service.id].none_member_us|number_format:2:".":","}</td>
  					<td>{$serval[$service.id].none_member_ratio|number_format:2:".":","}%</td>
  				</tr>
  				{/if}
  			{/foreach}
  			</tbody>
  		</table>
</page>
<page>
  		<table class="table">
  			<thead>
  				<tr>
	  				<th rowspan='2'>Type of CU</th>
	  				<th rowspan='2'>Number of Members by Market</th>
	  				<th colspan='3'>Occupation Segmentation</th>
	  				<th colspan='5'>Age Segmentation of CU Membership</th>
  				</tr>
  				<tr>
  					<th>Farmers</th>
	  				<th>Employee</th>
	  				<th>Micro Business</th>
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
	  					<td>{$gender_groups[$oparea][$gender].total|number_format:0}</td>
	  					<td>{$gender_groups[$oparea][$gender].farmer|number_format:0}</td>
	  					<td>{$gender_groups[$oparea][$gender].employee|number_format:0}</td>
	  					<td>{$gender_groups[$oparea][$gender].microb|number_format:0}</td>
	  					<td>{$gender_groups[$oparea][$gender].group1|number_format:0}</td>
	  					<td>{$gender_groups[$oparea][$gender].group2|number_format:0}</td>
	  					<td>{$gender_groups[$oparea][$gender].group3|number_format:0}</td>
	  					<td>{$gender_groups[$oparea][$gender].group4|number_format:0}</td>
	  					<td>{$gender_groups[$oparea][$gender].total|number_format:0}</td>
	  				</tr>
	  				{/foreach}
				{/foreach}
				<tr>
  					<td>Total</td>
  					<td>{$gender_total.total|number_format:0}</td>
  					<td>{$gender_total.farmer|number_format:0}</td>
  					<td>{$gender_total.employee|number_format:0}</td>
  					<td>{$gender_total.microb|number_format:0}</td>
  					<td>{$gender_total.group1|number_format:0}</td>
  					<td>{$gender_total.group2|number_format:0}</td>
  					<td>{$gender_total.group3|number_format:0}</td>
  					<td>{$gender_total.group4|number_format:0}</td>
  					<td>{$gender_total.total|number_format:0}</td>
  				</tr>
  			</tbody>
  		</table>
</page>
<page>
  		<table class="table">
  			<thead>
  				{if $smarty.session.user_level neq 0 && $smarty.session.user_country_id neq 0}
  					<tr>
	  					<th>&nbsp;</th>
		  				<th>Total Member</th>
		  				<th>Total Savings</th>
		  				<th>Total Savings US$</th>
		  				<th>Total Loans</th>
		  				<th>Total Loans US$</th>
		  				<th>Loan Outstanding</th>
		  				<th>Loan Outstanding US$</th>
	  				</tr>
  				{else}
	  				<tr>
	  					<th>&nbsp;</th>
		  				<th>Total Member</th>
		  				<th>Total Savings</th>
		  				<th>Total Loans</th>
		  				<th>Loan Outstanding</th>
	  				</tr>
  				{/if}
  			</thead>
  			<tbody>
  				{foreach from=$opareas item=oparea}
  					{foreach from=$genders item=gender}
  					{if $smarty.session.user_level neq 0 && $smarty.session.user_country_id neq 0}
		  				<tr>
		  					<td>{$areas[$oparea]} - {$gtxt[$gender]}</td>
		  					<td>{$gender_groups[$oparea][$gender].less_total|number_format:2}</td>
		  					<td>{$smarty.session.user_currency} {$gender_groups[$oparea][$gender].less_savings|number_format:2}</td>
		  					<td>${$gender_groups[$oparea][$gender].less_savings_us|number_format:2}</td>
		  					<td>{$smarty.session.user_currency} {$gender_groups[$oparea][$gender].less_totalg|number_format:2}</td>
		  					<td>${$gender_groups[$oparea][$gender].less_totalg_us|number_format:2}</td>
		  					<td>{$smarty.session.user_currency} {$gender_groups[$oparea][$gender].less_outstand|number_format:2}</td>
		  					<td>${$gender_groups[$oparea][$gender].less_outstand_us|number_format:2}</td>
		  				</tr>
		  			{else}
		  				<tr>
		  					<td>{$areas[$oparea]} - {$gtxt[$gender]}</td>
		  					<td>{$gender_groups[$oparea][$gender].less_total|number_format:2}</td>
		  					<td>${$gender_groups[$oparea][$gender].less_savings_us|number_format:2}</td>
		  					<td>${$gender_groups[$oparea][$gender].less_totalg_us|number_format:2}</td>
		  					<td>${$gender_groups[$oparea][$gender].less_outstand_us|number_format:2}</td>
		  				</tr>
		  			{/if}
  					{/foreach}
  				{/foreach}
  				{if $smarty.session.user_level neq 0 && $smarty.session.user_country_id neq 0}
  				<tr>
  					<td>Total</td>
  					<td>{$gender_total.less_total|number_format:2}</td>
  					<td>{$smarty.session.user_currency} {$gender_total.less_savings|number_format:2}</td>
  					<td>${$gender_total.less_savings_us|number_format:2}</td>
  					<td>{$smarty.session.user_currency} {$gender_total.less_totalg|number_format:2}</td>
  					<td>${$gender_total.less_totalg_us|number_format:2}</td>
  					<td>{$smarty.session.user_currency} {$gender_total.less_outstand|number_format:2}</td>
  					<td>${$gender_total.less_outstand_us|number_format:2}</td>
  				</tr>
  				{else}
  					<tr>
  					<td>Total</td>
  					<td>{$gender_total.less_total|number_format:2}</td>
  					<td>${$gender_total.less_savings_us|number_format:2}</td>
  					<td>${$gender_total.less_totalg_us|number_format:2}</td>
  					<td>${$gender_total.less_outstand_us|number_format:2}</td>
  				</tr>
  				{/if}
  				
  			</tbody>
  		</table>
</page>
<page>
  		<table class="table">
  			{foreach from=$bslines item=bsline}
  				{if $group neq $bsline.group_name}
  					{assign var=group value=$bsline.group_name}
  					<tr>
  						{if $smarty.session.user_level neq 0}
  							<td colspan='3' style='text-align: left;'><strong>{$group}</strong></td>
  						{else}
  							<td colspan='2' style='text-align: left;'><strong>{$group}</strong></td>
  						{/if}
  					</tr>
  				{/if}
  				{if $subgroup neq $bsline.subgroup_name}
  					{assign var=subgroup value=$bsline.subgroup_name}
  					<tr>
  						{if $smarty.session.user_level neq 0}
  							<td colspan='3' style='text-align: left; padding-left: 30px;'><i>{$subgroup}</i></td>
  						{else}
  							<td colspan='2' style='text-align: left; padding-left: 30px;'><i>{$subgroup}</i></td>
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
  						{if $smarty.session.user_level neq 0 && $smarty.session.user_country_id neq 0}
	  						<td>
	  							{if $bsline.total eq "0"}
	  								{if $bsvals[$bsline.id].amount < 0}
	  									<span style='color: red;'>{$smarty.session.user_currency} ({$bsvals[$bsline.id].amount|number_format:2})</span>
	  								{else}
	  									{$smarty.session.user_currency} {$bsvals[$bsline.id].amount|number_format:2}
	  								{/if}
	  							{else}
	  								{if $bsvals[$bsline.id].amount < 0}
	  									<strong><span style='color: red;'>{$smarty.session.user_currency} ({$bsvals[$bsline.id].amount|number_format:2})</span></strong>
	  								{else}
	  									<strong>{$smarty.session.user_currency} {$bsvals[$bsline.id].amount|number_format:2}</strong>
	  								{/if}
	  							{/if}
	  						</td>
  						{/if}
  						<td>
  							{if $bsline.total eq "0"}
  								{if $bsvals[$bsline.id].us_amount < 0}
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
</page>
<page>

  		<table class="table">
  			{foreach from=$islines item=isline}
  				{if $group neq $isline.group_name}
  					{assign var=group value=$isline.group_name}
  					<tr>
  						{if $smarty.session.user_level neq 0}
  							<td colspan='3' style='text-align: left;'><strong>{$group}</strong></td>
  						{else}
  							<td colspan='2' style='text-align: left;'><strong>{$group}</strong></td>
  						{/if}
  					</tr>
  				{/if}
  				{if $subgroup neq $isline.subgroup_name}
  					{assign var=subgroup value=$isline.subgroup_name}
  					<tr>
  						{if $smarty.session.user_level neq 0}
  							<td colspan='3' style='text-align: left; padding-left: 30px;'><i>{$subgroup}</i></td>
  						{else}
  							<td colspan='2' style='text-align: left; padding-left: 30px;'><i>{$subgroup}</i></td>
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
  						{if $smarty.session.user_level neq 0 && $smarty.session.user_country_id neq 0}
	  						<td>
	  							{if $isline.total eq "0"}
	  								{if $isvals[$isline.id].amount < 0}
	  									<span style='color: red;'>{$smarty.session.user_currency} ({$isvals[$isline.id].amount|number_format:2})</span>
	  								{else}
	  									{$smarty.session.user_currency} {$isvals[$isline.id].amount|number_format:2}
	  								{/if}
	  							{else}
	  								{if $isvals[$isline.id].amount < 0}
	  									<strong><span style='color: red;'>{$smarty.session.user_currency} ({$isvals[$isline.id].amount|number_format:2})</span></strong>
	  								{else}
	  									<strong>{$smarty.session.user_currency} {$isvals[$isline.id].amount|number_format:2}</strong>
	  								{/if}
	  							{/if}
							</td>
						{/if}
						<td>
  						
  							{if $isline.total eq "0"}
  								{if $isvals[$isline.id].us_amount < 0}
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
</page>
<page>
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
  					<td>{$pearls.P1|number_format:2}%</td>
  					<td>100%</td>
  				</tr>
  				<tr>
  					<td>P2</td>
  					<td>Net Allowance for Loan Losses / Allowance Required for Loans Delinquent less than 12 Months</td>
  					<td>{$pearls.P2|number_format:2}%</td>
  					<td>35%</td>
  				</tr>
  				
  				<tr>
  					<td rowspan='3'>E = Effective Financial Structure</td>
  					<td>E1</td>
  					<td>Net Loans / Total Assets</td>
  					<td>{$pearls.E1|number_format:2}%</td>
  					<td>70% - 80%</td>
  				</tr>
  				<tr>
  					<td>E5</td>
  					<td>Savings Deposits / Total Assets</td>
  					<td>{$pearls.E5|number_format:2}%</td>
  					<td>70% - 80%</td>
  				</tr>
  				<tr>
  					<td>E9</td>
  					<td>Net Institutional Capital / Total Assets</td>
  					<td>{$pearls.E9|number_format:2}%</td>
  					<td>Min 10%</td>
  				</tr>
  				
  				<tr>
  					<td rowspan='2'>A = Asset Quality</td>
  					<td>A1</td>
  					<td>Total Loan Delinquency / Gross Loan Portfolio</td>
  					<td>{$pearls.A1|number_format:2}%</td>
  					<td>&lt; 5%</td>
  				</tr>
  				<tr>
  					<td>A2</td>
  					<td>Non-Earning Assets / Total Assets</td>
  					<td>{$pearls.A2|number_format:2}%</td>
  					<td>&lt; 5%</td>
  				</tr>
  				
  				<tr>
  					<td rowspan='2'>S = Signs of Growth</td>
  					<td>S10</td>
  					<td>Growth in Membership</td>
  					<td>{$pearls.S10|number_format:2}%</td>
  					<td>&gt; 12%</td>
  				</tr>
  				<tr>
  					<td>S11</td>
  					<td>Growth in Total Assets</td>
  					<td>{$pearls.S11|number_format:2}%</td>
  					<td>&lt; inflation</td>
  				</tr>
  				
  			</tbody>
  		</table>
</page>