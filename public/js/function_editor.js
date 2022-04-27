//CKEDITOR

//pasamos editor_init() a create.blade y edit.blade para solucionar error
//ya que al regresar con return back() en la actualización no se muestra el ckeditor
/*
document.onreadystatechange = () => {
    if(document.readyState == "complete")
        if(document.querySelector('#friendly_edit'))
            editor_init('friendly_edit');
}
*/

function editor_init(field){
    //CKEDITOR.plugins.addExternal('codesnippet',base+'/static/libs/ckeditor/plugins/codesnippet/','plugins.js');
    CKEDITOR.replace(field,{
        //skin y extraPlugins no están instalados
        //skin:'mono',
        //extraPlugins: 'codesnippet,ajax,xml,textmatch,autocomplete,textwatcher,emoji,panelbutton,preview,wordcount',
        toolbar:[
        { name:'clipboard', items:['Cut','Copy','Paste','PasteText','-','Undo','Redo']},
        //{ name: 'basicstyles',items:['Bold','Italic','BulletedList','Strike','Image','Link','Unlink','Blockquote']},
        //eliminamos 'Image','Link' y 'Unlink' temporalmente
        { name: 'basicstyles',items:['Bold','Italic','BulletedList','Strike','Blockquote']},
        { name: 'document', items:['CodeSnippet','EmojiPanel','Preview','Source']}
        ]
    })
}    