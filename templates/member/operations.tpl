{include file='header.tpl'}
<h3>Primary Credit Union - Operations</h3>

{include file='common/alert.tpl'}

<form role="form" method='post' action='http://{$smarty.server.HTTP_HOST}{$smarty.const.APP_PATH}/member/operations'>
<div class="tab-pane" id="operations">
  	 <div class="span7">
          <legend>Operational Area (Select All That Apply)</legend>
           <div class="controls controls-row">
             {foreach from=$areas item=area}
             	{if in_array($area.id, $oparea)}
             		<input type="checkbox" class='span1' placeholder='{$area.name}' name="area[]" value="{$area.id}" checked/>{$area.name}
             	{else}
             		<input type="checkbox" class='span1' placeholder='{$area.name}' name="area[]" value="{$area.id}" />{$area.name}
             	{/if}
             {/foreach}
           </div>
        </div>
       <div class="span7">
          <legend>Total No. of Employees</legend>
           <div class="controls controls-row">
             Males: <input type="text" class='span1' value='{$operations.males}' placeholder='Male' name="male" />
             Females: <input type="text" class='span2' value='{$operations.females}' placeholder='Female' name="female" />
             Total: <input type="text" class='span3' value='{$operations.gtotal}' placeholder='Total' name="gtotal" />
           </div>
        </div>
        
        <div class="span7">
          <legend>Total No. of Employees by Type</legend>
           <div class="controls controls-row">
             Managerial: <input type="text" class='span1' value='{$operations.manager_male}' placeholder='Male' name="manager_male" /> <input type="text" class='span1' value='{$operations.manager_female}' placeholder='FeMale' name="manager_female" /> <input type="text" class='span1' value='{$operations.manager_total}' placeholder='Total' name="manager_total" /> <br/>
             Operational: <input type="text" class='span2' value='{$operations.ops_male}' placeholder='Male' name="ops_male" /> <input type="text" class='span2' value='{$operations.ops_female}' placeholder='Female' name="ops_female" /> <input type="text" class='span2' value='{$operations.ops_total}' placeholder='Total' name="ops_total" />
           </div>
        </div>
        
        <div class="span7">
          <legend>No of Employees by Department</legend>
           <div class="controls controls-row">
             General Managment: <input type="text" class='span1' value='{$operations.gm_male}' placeholder='Male' name="gm_male" /> <input type="text" class='span1' value='{$operations.gm_female}' placeholder='FeMale' name="gm_female" /> <input type="text" class='span3' value='{$operations.gm_total}' placeholder='Total' name="gm_total" /> <br/>
             Loan Management: <input type="text" class='span2' value='{$operations.lm_male}' placeholder='Male' name="lm_male" /> <input type="text" class='span2' value='{$operations.lm_female}' placeholder='Female' name="lm_female" /> <input type="text" class='span3' value='{$operations.lm_total}' placeholder='Total' name="lm_total" /> <br/>
             HR Management: <input type="text" class='span2' value='{$operations.hr_male}' placeholder='Male' name="hr_male" /> <input type="text" class='span2' value='{$operations.hr_female}' placeholder='Female' name="hr_female" /> <input type="text" class='span3' value='{$operations.hr_total}' placeholder='Total' name="hr_total" /> <br/>
             Finance &amp; Accounting: <input type="text" class='span2' value='{$operations.fa_male}' placeholder='Male' name="fa_male" /> <input type="text" class='span2' value='{$operations.fa_female}' placeholder='Female' name="fa_female" /> <input type="text" class='span3' value='{$operations.fa_total}' placeholder='Total' name="fa_total" /> <br/>
             Internal Audit: <input type="text" class='span2' value='{$operations.audit_male}' placeholder='Male' name="audit_male" /> <input type="text" class='span2' value='{$operations.audit_female}' placeholder='Female' name="audit_female" /> <input type="text" class='span3' value='{$operations.audit_total}' placeholder='Total' name="audit_total" /> <br/>
             Other: <input type="text" class='span1' value='{$operations.other_male}' placeholder='Male' name="other_male" /> <input type="text" class='span2' value='{$operations.other_female}' placeholder='Female' name="other_female" /> <input type="text" class='span3' value='{$operations.other_total}' placeholder='Female' name="other_total" /> <br/>
             BOD: <input type="text" class='span1' value='{$operations.bod_male}' placeholder='Male' name="bod_male" /> <input type="text" class='span2' value='{$operations.bod_female}' placeholder='Female' name="bod_female" /> <input type="text" class='span3' value='{$operations.bod_total}' placeholder='Total' name="bod_total" /> <br/>
           </div>
        </div>
        
        <div class="span7">
          	<legend>
          		Total no. of Board of Directors and Committee Members
			</legend>
           <div class="controls controls-row">
             Male: <input type="text" class='span1' value='{$operations.bodmale}' placeholder='Male' name="bodmale" />
             Female: <input type="text" class='span2' value='{$operations.bodfemale}' placeholder='Female' name="bodfemale" />
             Total: <input type="text" class='span2' value='{$operations.bodtotal}' placeholder='Total' name="bodtotal" />
           </div>
        </div>
        
        <div class="span7">
          	<legend>
          		Committee in the Credit Union
			</legend>
           <div class="controls controls-row">
             Education Committee 
             Male: <input type="text" class='span1' value='{$operations.edumale}' placeholder='Male' name="edumale" />
             Female: <input type="text" class='span2' value='{$operations.edufemale}' placeholder='Female' name="edufemale" />
             Total: <input type="text" class='span2' value='{$operations.edutotal}' placeholder='Total' name="edutotal" />
           </div>
           
           <div class="controls controls-row">
             Credit Committee 
             Male: <input type="text" class='span1' value='{$operations.creditmale}' placeholder='Male' name="creditmale" />
             Female: <input type="text" class='span2' value='{$operations.creditfemale}' placeholder='Female' name="creditfemale" />
             Total: <input type="text" class='span3' value='{$operations.credittotal}' placeholder='Total' name="credittotal" />
           </div>
           
           <div class="controls controls-row">
             Audit Committee 
             Male: <input type="text" class='span1' value='{$operations.auditmale}' placeholder='Male' name="auditmale" />
             Female: <input type="text" class='span2' value='{$operations.auditfemale}' placeholder='Female' name="auditfemale" />
             Total: <input type="text" class='span3' value='{$operations.audittotal}' placeholder='Total' name="audittotal" />
           </div>
           
           <div class="controls controls-row">
             Other Committee 
             Male: <input type="text" class='span1' value='{$operations.othermale}' placeholder='Male' name="othermale" />
             Female: <input type="text" class='span2' value='{$operations.otherfemale}' placeholder='Female' name="otherfemale" />
             Total: <input type="text" class='span3' value='{$operations.othertotal}' placeholder='Female' name="othertotal" />
           </div>
        </div>
        
        <button type="submit" class="btn btn-default">Update Operational Data</button>
        
  </div>
 </form>
{include file='footer.tpl'}