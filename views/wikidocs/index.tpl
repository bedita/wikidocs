<script type="text/javascript">
var baseUrl = "{$html->url('/')}";
var firstId = "{if !empty($objects)}{$objects.0.id}{else}null{/if}";
</script>

{$view->element("modulesmenu")}

{assign_associative var="params" method="index"}
{$view->element("menuleft", $params)}

{assign_associative var="params" method="index"}
{$view->element("menucommands", $params)}


{$view->element("toolbar")}



<div class="mainfull">

	{$view->element("list_objects")}

</div>

<div class="wikimenu" style="position:absolute; z-index:180; top:170px; left:970px;">

{* bullets *}
<ul class="bullets navigator">
	{foreach from=$objects|default:'' name="panelsT" item="item"}
	<li rel="{$item.id}" id="m_{$item.id}">&bull;</li>
	{/foreach}
</ul>

{* se c'è più di un panel 
{if $nextID || $prevID} 
<ul class="toolbar2">
	<li class="next"></li>
	<li class="prev"></li>
	<!--
	<li class="last"></li>
	<li class="first"></li>
	-->
</ul>
{/if}
*}
<br />

<a class="edit" href="#">E</a>

</div>