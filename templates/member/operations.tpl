{include file='header.tpl'}
<h3>Primary Credit Union - Operations</h3>

{include file='common/alert.tpl'}

<form role="form" method='post' action='http://{$smarty.server.HTTP_HOST}{$smarty.const.APP_PATH}/member/operations'>
<div class="tab-pane" id="operations">
  	 <div class="span7">
          <legend>Operational Area</legend>
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
          <legend>No of Employees</legend>
           <div class="controls controls-row">
             Males: <input type="text" class='span1' value='{$operations.males}' placeholder='Male' name="male" />
             Females: <input type="text" class='span2' value='{$operations.females}' placeholder='Female' name="female" />
           </div>
        </div>
        
        <div class="span7">
          <legend>No of Employees by Type</legend>
           <div class="controls controls-row">
             Managerial: <input type="text" class='span1' value='{$operations.manager}' placeholder='Male' name="manager" />
             Operational: <input type="text" class='span2' value='{$operations.ops}' placeholder='Female' name="ops" />
           </div>
        </div>
        
        <div class="span7">
          <legend>No of Employees by Department</legend>
           <div class="controls controls-row">
             General Managment: <input type="text" class='span1' value='{$operations.gm}' placeholder='Male' name="gm" />
             Loan Management: <input type="text" class='span2' value='{$operations.lm}' placeholder='Female' name="lm" />
             HR Management: <input type="text" class='span2' value='{$operations.hr}' placeholder='Female' name="hr" />
             Finance &amp; Accounting: <input type="text" class='span2' value='{$operations.fa}' placeholder='Female' name="fa" />
             Internal Audit: <input type="text" class='span2' value='{$operations.audit}' placeholder='Female' name="audit" />
             Other: <input type="text" class='span2' value='{$operations.other}' placeholder='Female' name="other" />
             BOD: <input type="text" class='span2' value='{$operations.bod}' placeholder='Female' name="bod" />
           </div>
        </div>
        
        <div class="span7">
          	<legend>
          		Total no. of Board of Directors and Committee Members
			</legend>
           <div class="controls controls-row">
             Male: <input type="text" class='span1' value='{$operations.bodmale}' placeholder='Male' name="bodmale" />
             Female: <input type="text" class='span2' value='{$operations.bodfemale}' placeholder='Female' name="bodfemale" />
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
           </div>
           
           <div class="controls controls-row">
             Credit Committee 
             Male: <input type="text" class='span1' value='{$operations.creditmale}' placeholder='Male' name="creditmale" />
             Female: <input type="text" class='span2' value='{$operations.creditfemale}' placeholder='Female' name="creditfemale" />
           </div>
           
           <div class="controls controls-row">
             Audit Committee 
             Male: <input type="text" class='span1' value='{$operations.auditmale}' placeholder='Male' name="auditmale" />
             Female: <input type="text" class='span2' value='{$operations.auditfemale}' placeholder='Female' name="auditfemale" />
           </div>
           
           <div class="controls controls-row">
             Other Committee 
             Male: <input type="text" class='span1' value='{$operations.othermale}' placeholder='Male' name="othermale" />
             Female: <input type="text" class='span2' value='{$operations.otherfemale}' placeholder='Female' name="otherfemale" />
           </div>
        </div>
        
        <button type="submit" class="btn btn-default">Update Operational Data</button>
        
  </div>
 </form>
{include file='footer.tpl'}