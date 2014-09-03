{include file='header.tpl'}
<h3>Primary Credit Union - Operations</h3>

{include file='common/alert.tpl'}

<form role="form" method='post' action='http://{$smarty.server.HTTP_HOST}{$smarty.const.APP_PATH}/member/operations'>
<div class="tab-pane" id="operations">
          <div class='panel panel-default'>
          	  <div class='panel-heading'>Operational Area (Select All That Apply)</div>
	          <div class='panel-body'>
		           <div class="controls controls-row">
		             {foreach from=$areas item=area}
		             	{if in_array($area.id, $oparea)}
		             		<input type="checkbox" class='span1 checks' placeholder='{$area.name}' name="area[]" value="{$area.id}" checked/>{$area.name}
		             	{else}
		             		<input type="checkbox" class='span1 checks' placeholder='{$area.name}' name="area[]" value="{$area.id}" />{$area.name}
		             	{/if}
		             {/foreach}
		           </div>
		       </div>
           
          	<div class='panel-heading'>Total No. of Employees</div>
          	<div class='panel-body'>
	           <div class="controls controls-row">
	             Males: <input type="text" class='span1 digits male' value='{$operations.males}' placeholder='Male' name="male" />
	             Females: <input type="text" class='span2 digits female' value='{$operations.females}' placeholder='Female' name="female" />
	             Total: <input type="text" class='span3 digits total' value='{$operations.gtotal}' placeholder='Total' name="gtotal" />
	           </div>
	        </div>
       
        
       
          <div class='panel-heading'>Total No. of Employees by Type</div>
          <div class='panel-body'>
	           <table class='table table-striped table-bordered table-hover'>
           		<thead>
           			<tr>
           				<th>Type</th>
           				<th>Male</th>
           				<th>Female</th>
           				<th>Total</th>
           			</tr>
           		</thead>
           		<tbody>
           		<tr>
	           		<td class='info'>
	             		Managerial
	             	</td>
	             	<td><input type="text" class='span1 digits male' value='{$operations.manager_male}' placeholder='Male' name="manager_male" /></td> 
	             	<td><input type="text" class='span1 digits female' value='{$operations.manager_female}' placeholder='FeMale' name="manager_female" /></td> 
	             	<td><input type="text" class='span1 digits total' value='{$operations.manager_total}' placeholder='Total' name="manager_total" /> </td>
	             </tr>
	             <tr>
	             	<td class='info'>
	             		Operational
	             	</td>
	             	<td><input type="text" class='span2 digits male' value='{$operations.ops_male}' placeholder='Male' name="ops_male" /></td> 
	             	<td><input type="text" class='span2 digits female' value='{$operations.ops_female}' placeholder='Female' name="ops_female" /></td> 
	             	<td><input type="text" class='span2 digits total' value='{$operations.ops_total}' placeholder='Total' name="ops_total" /></td>
	             </tr>
	             </tbody>
	             </table>
	           </div>
	      </div>
       
        
       
          <div class='panel-heading'>No of Employees by Department</div>
          <div class='panel-body'>
           <div class="controls controls-row">
           	<table class='table table-striped table-bordered table-hover'>
           		<thead>
           			<tr>
           				<th>Department</th>
           				<th>Male</th>
           				<th>Female</th>
           				<th>Total</th>
           			</tr>
           		</thead>
           		<tbody>
           		<tr>
	           		<td class='info'>
	             		General Managment:
	             	</td> 
	             	<td><input type="text" class='span1 digits male' value='{$operations.gm_male}' placeholder='Male' name="gm_male" /></td> 
	             	<td><input type="text" class='span1 digits female' value='{$operations.gm_female}' placeholder='FeMale' name="gm_female" /></td> 
	             	<td><input type="text" class='span3 digits total' value='{$operations.gm_total}' placeholder='Total' name="gm_total" /> </td>
             	</tr>
             	<tr>
             		<td class='info'>Loan Management:</td> 
             		<td><input type="text" class='span2 digits male' value='{$operations.lm_male}' placeholder='Male' name="lm_male" /></td> 
             		<td><input type="text" class='span2 digits female' value='{$operations.lm_female}' placeholder='Female' name="lm_female" /></td> 
             		<td><input type="text" class='span3 digits total' value='{$operations.lm_total}' placeholder='Total' name="lm_total" /> </td>
             	</tr>
             	<tr>
             		<td class='info'>HR Management:</td> 
             		<td><input type="text" class='span2 digits male' value='{$operations.hr_male}' placeholder='Male' name="hr_male" /></td> 
             		<td><input type="text" class='span2 digits female' value='{$operations.hr_female}' placeholder='Female' name="hr_female" /></td> 
             		<td><input type="text" class='span3 digits total' value='{$operations.hr_total}' placeholder='Total' name="hr_total" /> </td>
             	</tr>
             	<tr>
             		<td class='info'>Finance &amp; Accounting:</td> 
             		<td><input type="text" class='span2 digits male' value='{$operations.fa_male}' placeholder='Male' name="fa_male" /></td> 
             		<td><input type="text" class='span2 digits female' value='{$operations.fa_female}' placeholder='Female' name="fa_female" /></td> 
             		<td><input type="text" class='span3 digits total' value='{$operations.fa_total}' placeholder='Total' name="fa_total" /> </td>
             	</tr>
             	<tr>
             		<td class='info'>Internal Audit:</td> 
             		<td><input type="text" class='span2 digits male' value='{$operations.audit_male}' placeholder='Male' name="audit_male" /></td> 
             		<td><input type="text" class='span2 digits female' value='{$operations.audit_female}' placeholder='Female' name="audit_female" /></td> 
             		<td><input type="text" class='span3 digits total' value='{$operations.audit_total}' placeholder='Total' name="audit_total" /> </td>
             	</tr>
             	<tr>
             		<td class='info'>Other:</td> 
             		<td><input type="text" class='span1 digits male' value='{$operations.other_male}' placeholder='Male' name="other_male" /></td> 
             		<td><input type="text" class='span2 digits female' value='{$operations.other_female}' placeholder='Female' name="other_female" /></td> 
             		<td><input type="text" class='span3 digits total' value='{$operations.other_total}' placeholder='Female' name="other_total" /> </td>
             	</tr>
             	<tr>
             		<td class='info'>BOD:</td> 
             		<td><input type="text" class='span1 digits male' value='{$operations.bod_male}' placeholder='Male' name="bod_male" /></td> 
             		<td><input type="text" class='span2 digits female' value='{$operations.bod_female}' placeholder='Female' name="bod_female" /></td> 
             		<td><input type="text" class='span3 digits total' value='{$operations.bod_total}' placeholder='Total' name="bod_total" /> </td>
             	</tr>
             	</tbody>
             	</table>
           </div>
       	</div>
        
       
          <div class='panel-heading'>
          		Total no. of Board of Directors and Committee Members
		  </div>
		  <div class='panel-body'>
           <div class="controls controls-row">
           	           	<table class='table table-striped table-bordered table-hover'>
           		<tr>
	           		<td class='info'>
             			Male: 
             		</td>
             		<td><input type="text" class='span1 digits male' value='{$operations.bodmale}' placeholder='Male' name="bodmale" /></td>
             		<td class='info'>Female:</td> 
             		<td><input type="text" class='span2 digits female' value='{$operations.bodfemale}' placeholder='Female' name="bodfemale" /></td>
             		<td class='info'>Total:</td><td> <input type="text" class='span2 digits total' value='{$operations.bodtotal}' placeholder='Total' name="bodtotal" /></td>
             	</tr>
             	</table>
           </div>
       		</div>
        
       
          	<div class='panel-heading'>
          		Committee in the Credit Union
			</div>
			<div class='panel-body'>
           	<table class='table table-striped table-bordered table-hover'>
           		<thead>
           			<tr>
           				<th>Committee</th>
           				<th>Male</th>
           				<th>Female</th>
           				<th>Total</th>
           			</tr>
           		</thead>
           		<tbody>
           			<tr>
           				<td class='info'>Education</td>
           				<td><input type="text" class='span1 digits male' value='{$operations.edumale}' placeholder='Male' name="edumale" /></td>
           				<td><input type="text" class='span2 digits female' value='{$operations.edufemale}' placeholder='Female' name="edufemale" /></td>
           				<td><input type="text" class='span2 digits total' value='{$operations.edutotal}' placeholder='Total' name="edutotal" /></td>
           			</tr>
           			
           			<tr>
             			<td class='info'>Credit</td> 
             			<td><input type="text" class='span1 digits male' value='{$operations.creditmale}' placeholder='Male' name="creditmale" /></td>
             			<td><input type="text" class='span2 digits female' value='{$operations.creditfemale}' placeholder='Female' name="creditfemale" /></td>
             			<td><input type="text" class='span3 digits total' value='{$operations.credittotal}' placeholder='Total' name="credittotal" /></td>
             		</tr>
           			
           			<tr>
             			<td class='info'>Audit</td>
             			<td><input type="text" class='span1 digits male' value='{$operations.auditmale}' placeholder='Male' name="auditmale" /></td>
             			<td><input type="text" class='span2 digits female' value='{$operations.auditfemale}' placeholder='Female' name="auditfemale" /></td>
             			<td><input type="text" class='span3 digits total' value='{$operations.audittotal}' placeholder='Total' name="audittotal" /></td>
           			</tr>
           
           			<tr>
             			<td class='info'>Other</td> 
             			<td><input type="text" class='span1 digits male' value='{$operations.othermale}' placeholder='Male' name="othermale" /></td>
             			<td><input type="text" class='span2 digits female' value='{$operations.otherfemale}' placeholder='Female' name="otherfemale" /></td>
             			<td><input type="text" class='span3 digits total' value='{$operations.othertotal}' placeholder='Female' name="othertotal" /></td>
             		</tr>
           		</tbody>
             </table>
           
           
       		</div>
        
        <button type="submit" class="btn btn-default">Update Operational Data</button>
        </div> 
  </div>
 </form>
{include file='footer.tpl'}