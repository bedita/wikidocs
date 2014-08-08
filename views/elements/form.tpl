{*
** form for object view detail
*}
{$formUrl = "/"|cat:$currentModule.url|cat:"/save"}
<form action="{$html->url($formUrl)}" method="post" name="updateForm" id="updateForm" class="cmxform">
<input type="hidden" name="data[id]" value="{$object.id|default:''}"/>

	{$view->element('form_title_description')}

	{$view->element('form_properties')}

    {$view->element('form_assoc_objects', ['object_type_id' => $conf->objectTypes.wiki_doc.id])}
	
	{$view->element('form_tags')}
	
	{$view->element('form_links')}			
	
	{$view->element('form_translations')}
	
	{$view->element('form_advanced_properties')}
	
	{$view->element('form_custom_properties')}
	
	{$view->element('form_permissions')}

</form>