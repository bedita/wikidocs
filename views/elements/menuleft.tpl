
{$view->set("method", $method)}
<div class="primacolonna">

	<div class="modules"><label class="bedita" rel="{$html->url('/')}">{$conf->projectName|default:$conf->userVersion}</label></div>

		{$modulePath="/"|cat:$currentModule.url}
		<ul class="menuleft insidecol">
		<li {if $method eq 'index'}class="on"{/if}>{$tr->link($currentModule.label, $modulePath)}</li>
		{if $module_modify eq '1'}
		<li><a href="{$html->url($modulePath)}/view">{t}Create new KB{/t}</a></li>
		{/if}
	</ul>

{$view->element("export")}

{if (!empty($method)) && $method eq "index"}

		<div class="insidecol publishingtree">
			
			{$view->element("tree")}
		
		</div>

{/if}

{$view->element("previews")}

{$view->element("user_module_perms")}

</div>
