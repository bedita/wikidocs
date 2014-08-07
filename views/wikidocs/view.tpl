{$html->css("ui.datepicker", null, [inline => "false"])}
{$javascript->link("jquery/jquery.form", false)}
{$javascript->link("jquery/jquery.selectboxes.pack", false)}
{$javascript->link("jquery/ui/jquery.ui.sortable", true)}
{$javascript->link("jquery/ui/jquery.ui.datepicker", false)}
{if $currLang != "eng"}
{$javascript->link("jquery/ui/i18n/ui.datepicker-$currLang.js", false)}
{/if}


<script type="text/javascript">
    $(document).ready(function(){	
		openAtStart("#title,#long_desc_langs_container");
    });
</script>


{$view->element("form_common_js")}

{$view->element("modulesmenu")}

{$view->element("menuleft", [method => "view"])}

<div class="head">
	
	<h1>{if !empty($object)}{$object.title|default:"<i>[no title]</i>"}{else}<i>[{t}New item{/t}]</i>{/if}</h1>

</div>

{$objIndex=0}

{$view->element("menucommands", [method => "view", fixed => true])}

<div class="main">	
	
	{$view->element("form")}
		
</div>

{$view->element("menuright")}
