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
        
        <button type="submit" class="btn btn-default">Update Operational Data</button>
        
  </div>
 </form>
{include file='footer.tpl'}