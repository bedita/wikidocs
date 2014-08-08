{$html->css('ui.datepicker', null, [inline => 'false'])}

{$html->script('libs/jquery/jquery-migrate-1.2.1', false)} 
{$html->script('libs/jquery/plugins/jquery.form', false)}
{$html->script('libs/jquery/ui/jquery.ui.sortable.min', true)}
{$html->script('libs/jquery/ui/jquery.ui.datepicker.min', false)}
{if $currLang != "eng"}
    {$html->script("libs/jquery/ui/i18n/jquery.ui.datepicker-$currLang2.min.js", false)}
{/if}

{$html->script('libs/epiceditor/epiceditor.min.js', false)}
{$html->script('libs/epiceditor/epiceditor.init.js', false)}

{$view->element('form_common_js')}

{$view->element('modulesmenu')}

{$view->element('menuleft', [method => 'view'])}

<div class="head">
	
	<h1>{if !empty($object)}{$object.title|default:"<i>[no title]</i>"}{else}<i>[{t}New item{/t}]</i>{/if}</h1>

</div>

{$objIndex=0}

{$view->element("menucommands", [method => "view", fixed => true])}

<div class="main">	
	
	{$view->element("form")}
		
</div>

{$view->element("menuright")}