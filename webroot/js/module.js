/* linked inside the module (if file exists) */

/**
 * Open markdown editor in fullscreen mode in wikidocs list
 * @param objId - obeject id to view/edit
 */
function openEditor(objId) {
    
    $('#desc_' + objId).slideToggle();

    if (!BEDITA.openEditors) {
        BEDITA.openEditors = [];
    }
    
    var editor = null;
    if (!BEDITA.openEditors[objId]) {
        var opts = {
                container : 'md-editor-' + objId,
                textarea : 'md-textarea-' + objId,
                basePath : BEDITA.webroot,
                clientSideStorage : false,
                localStorageName : 'epic',
                useNativeFullscreen : true,
                parser : marked,
                file : {
                    name : 'epiceditor',
                    defaultContent : '',
                    autoSave : 100
                },
                theme : {
                    base : 'css/epiceditor/base/epiceditor.css',
                    preview : 'css/epiceditor/preview/github.css',
                    editor : 'css/epiceditor/editor/epic-light.css'
                },
                button : {
                    preview : true,
                    fullscreen : true,
                    bar : "auto"
                },
                focusOnLoad : false,
                shortcut : {
                    modifier : 18,
                    fullscreen : 70,
                    preview : 80
                },
                string : {
                    togglePreview : 'Toggle Preview Mode',
                    toggleEdit : 'Toggle Edit Mode',
                    toggleFullscreen : 'Enter Fullscreen'
                },
                autogrow : false
            };
        editor = new EpicEditor(opts).load();
        BEDITA.openEditors[objId] = editor;
    } else {
        editor = BEDITA.openEditors[objId].load();
    }
    editor.enterFullscreen();
    editor.on('fullscreenexit', function () {
        if (editor.is('loaded')) {
            editor.unload();
        }
        $('#desc_' + objId).hide();
        console.log('Fullscreen exit, editor removed');
      });
}

$(document).ready(function(){

    openAtStart("#title");

});

	