{* detail div in obj list *}
        <label>unique name:</label> {$object.nickname}<br />
    <textarea id="md-textarea-{$object.id}" style="display:none;" name="data[description][{$object.id}]">{$object.description|default:''}</textarea>
    <div id="md-editor-{$object.id}">
    </div>
        