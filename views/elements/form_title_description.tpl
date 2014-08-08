{* title and description *}

<div class="tab"><h2>{t}Title & Description{/t}</h2></div>

<fieldset id="title">

	<label>{t}title{/t}:</label>
	<br />
	<input type="text" name="data[title]" value="{$object.title|escape:'html'|escape:'quotes'}" id="titleBEObject" style="width:100%" />
	<br />
	<label>{t}description{/t}:</label>
	<br />
    <textarea id="md-textarea" style="display:none;" name="data[description]">{$object.description|default:''}</textarea>
    <div id="md-editor" style="height: 400px;">
    </div>
	<br />
	<input type="text" id="nicknameBEObject" name="data[nickname]" style="font-style:italic; width:100%" value="{$object.nickname|escape:'html'|escape:'quotes'}"/>
	
</fieldset>