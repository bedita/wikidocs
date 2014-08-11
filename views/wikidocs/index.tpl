{$html->script('libs/epiceditor/epiceditor.min.js', false)}

{$view->element('modulesmenu')}

{$view->element('menuleft', ['method' => 'index'])}

{$view->element('menucommands', ['method' => 'index'])}

{$view->element('toolbar')}

<div class="mainfull">

    {$view->element('filters')}

	{$view->element('list_objects')}

</div>
