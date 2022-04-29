//nombre de ruta (asignado en meta tag que indica el valor de name en el archivo de rutas)
var route = document.getElementsByName('route_name')[0].getAttribute('content');

var events = ['userUpdated','addCategory','editCategory','addProduct','editProduct','confirmDel','editPermissions'];
var description = document.querySelector('#friendly_edit1');
//distintos events listeners recibidos por "$this->emit()" de livewire, tan solo
//es necesario añadir datos al array
events.forEach((event)=>{        
    window.livewire.on(event,()=>{
        $('#'+event).modal('hide');
    })
})
/*
window.livewire.on('description',(data)=>{
    console.log("pasa datos")
    console.log(data)
    console.log(description.innerHTML);
    console.log(CKEDITOR.instances.friendly_edit1.getData());
})
*/
let btnCreateProducts = document.querySelector('#btn_create_products');
if (btnCreateProducts)
    btnCreateProducts.addEventListener('click',()=>{
        let text = $('#form_description iframe').contents().find("body").text();
        if(text == ""){
            console.log('está vacío')
        }
    })
//método necesario para mostrar el valor por defecto de description
//en la edición, ya que ckeditor genera conflicto con wire:model
window.livewire.on('description1',()=>{
        
    //CKEDITOR.on('instanceReady',function(){
        CKEDITOR.instances.friendly_edit1.setData("");    
    //})
})

window.livewire.on('description2',(data)=>{
    CKEDITOR.instances.friendly_edit2.setData(data);
})
window.livewire.on('subcat',(data,data2)=>{
    console.log(data)
    console.log(data2)
    let subcat =  document.querySelector('.subcat');
    let link=`<a href="admin/categories/1/2" id="subcat">&nbsp;
        <i class="fa-solid fa-columns"></i> &nbsp;>&nbsp;${data2}
    </a>`;
    //subcat.firstElementChild.href="dfsaf";    
    subcat.innerHTML = link;
    document.querySelector('#subcat').href='admin/categories/1/'+data;

    subcat.classList.add('active');

})

console.log(route)
//editor_init('friendly_edit');

document.addEventListener('readystatechange',() => {        
//document.addEventListener('DOMContentLoaded',() => {        
    
    console.log("llega")       
        if(document.readyState == "complete"){
            //tooltip
            Livewire.onLoad(() => {
                $('[data-toggle="tooltip"]').tooltip()
            })
            if(route == 'categories'){ 
                console.log("readystate")
                /*
                let desc = document.querySelector('.description');
                if(desc){
                    
                    /*
                    console.log("editor_init")
                    editor_init('friendly_edit1');
                    //en el caso de editar es necesario añadir wire:ignore para 
                    //k funcione ckeditor, ya que el wire:click que procesa el método 
                    //edit genera conflicto
                    editor_init('friendly_edit2');
                    */
                    

                    //editor.on('change',function(event){
                        //console.log(this.getData());
                        //this.set('description',this.getData());
                    //})
                //}



            }        
    }
})     
//}
