{include file='header.tpl'}
<h3>Datasheet</h3>

{include file='common/alert.tpl'}
          
<!-- Nav tabs -->
<ul class="nav nav-tabs">
  <li class="active"><a href="#lessmember" data-toggle="tab">Have Less Member</a></li>
  <li><a href="#gender" data-toggle="tab">Gender</a></li>
  <li><a href="#area_market" data-toggle="tab">Market &amp Age</a></li>
  <li><a href="#balancesheet" data-toggle="tab">Balance Sheet</a></li>
  <li><a href="#incomestatment" data-toggle="tab">Income Statement</a></li>  
</ul>

<form role="form" method='post' action='http://{$smarty.server.HTTP_HOST}{$smarty.const.APP_PATH}/member/detail'>
<div class="tab-content">
  <div class="tab-pane active" id="lessmember">
  		<table class="table">
  			<thead>
  				<tr>
  					<th>Operational Area</th>
  					<th>Female</th>
	  				<th>Male</th>
	  				<th>Total Savings</th>
	  				<th>Loan Outstanding</th>
	  				<th>Total Loan Granted</th>
  				</tr>
  			</thead>
  			<tbody>
  				{foreach from=$less_member item=l}
  				<tr>
  					<td>{$l.area_id}</td>
  					<td>{$l.female}</td>
  					<td>{$l.male}</td>
  					<td>{$l.savings}</td>
  					<td>{$l.outstanding}</td>
  					<td>{$l.total_granted}</td>
  				</tr>
  				{/foreach}
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
  <div class="tab-pane" id="gender">
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
  				{foreach from=$gender item=g}
	  				<tr>
	  					<td>{$g.area_id}</td>
	  					<td>{$g.total}</td>
	  					<td>{$g.male}</td>
	  					<td>{$g.female}</td>
	  				</tr>
  				{/foreach}
				<tr>
  					<td>Total</td>
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
  				{foreach from=$market item=m}
  				<tr>
  					<td>{$m.area_id}</td>
  					<td></td>
  					<td>{$m.farmer}</td>
  					<td>{$m.employee}</td>
  					<td>{$m.microb}</td>
  					<td>{$m.group1}</td>
  					<td>{$m.group2}</td>
  					<td>{$m.group3}</td>
  					<td>{$m.group4}</td>
  				</tr>
				{/foreach}
				<tr>
  					<td>Total</td>
  					<td></td>
  					<td></td>
  					<td></td>
  					<td></td>
  					<td></td>
  					<td></td>
  					<td></td>
  					<td></td>
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
  						<td style='text-align: left; padding-left: 60px;'>{$bsline.name}</td>
  						<td>{$bsvals[$bsline.id].amount}</td>
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
  						<td>{$isvals[$isline.id].amount}</td>
  					</tr>
  			{/foreach}
  		</table>
  </div>
</div>
</form>
{include file='footer.tpl'}