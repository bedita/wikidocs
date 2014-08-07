{assign var="count" value=$objects|@count}
<div class="panelscontainer" style="width:{$count*960}px">
{foreach name=o from=$objects item=obj}
<div class="panel graced Xshadow20" rel="{$obj.id}" id="p_{$obj.id}">
	<div style="text-align:right; margin-top:-15px">{$smarty.foreach.o.iteration} / {$objects|@count}</div>
	<h1>{$obj.title|default:'&nbsp;'}</h1>
	
	<div class="textC" style="width:75%; padding-top:1em; margin-top:1em; border-top:1px solid #999; font-size:1.15em; line-height:1.5em">
		{$obj.body}
	</div>
	<div class="prevP">&nbsp;</div>
	<div class="nextP">&nbsp;</div>
</div>

{/foreach}
</div>
