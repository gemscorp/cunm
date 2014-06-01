{include file='header.tpl'}
<h3>Primary Credit Union - Operations</h3>

<form role="form" method='post' action='adduser'>
<div class="tab-pane" id="operations">
  	 <div class="span7">
          <legend>Operational Area</legend>
           <div class="controls controls-row">
             {foreach from=$areas item=area}
             <input type="checkbox" class='span1' placeholder='{$area.name}' name="area" value="{$area.id}" />{$area.name}
             {/foreach}
           </div>
        </div>
       <div class="span7">
          <legend>No of Employees</legend>
           <div class="controls controls-row">
             <input type="text" class='span1' placeholder='Male' name="male" />
             <input type="text" class='span2' placeholder='Female' name="female" />
           </div>
        </div>
  </div>
 </form>
{include file='footer.tpl'}