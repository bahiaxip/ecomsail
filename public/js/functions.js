//nombre de ruta (asignado en meta tag que indica el valor de name en el archivo de rutas)
var route = document.getElementsByName('route_name')[0].getAttribute('content');

var events = ['userUpdated','editUser','addCategory','editCategory','addProduct','editProduct','confirmDel','editPermissions','sendModal'];
var description = document.querySelector('#friendly_edit1');
//distintos events listeners recibidos por "$this->emit()" de livewire, tan solo
//es necesario añadir datos al array
events.forEach((event)=>{        
    window.livewire.on(event,()=>{
        console.log("event: ",event+' cerramos modal')
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
window.livewire.on('loading',(data)=>{
    let loading = document.querySelector('#'+data);
    if(data){
        loading.style.display='none';
    }
    
})
//Añadir link en la url
window.livewire.on('subcat',(cat_id,cat_name)=>{
    console.log(cat_id)
    console.log(cat_name)
    let subcat =  document.querySelector('#sublist_name');
    let link=`&nbsp;>&nbsp;<a href="${cat_id}" id="subcat">
        <div class="icon icon_subcat"></div> <span>${cat_name}</span>
    </a>`;

    //estableciendo datos en localStorage, anulado: no necesario
    /*
    let data = {'cat_id':cat_id,'cat_name':cat_name};    
    localStorage.setItem('subcats',JSON.stringify(data));
    */

    //subcat.firstElementChild.href="dfsaf";    
    subcat.innerHTML = link;
    //document.querySelector('#subcat').href='admin/categories/1/'+data;
    //mostramos el minilink de subcategorías
    subcat.classList.add('active_inflex');

//establecemos la ruta subcategorías, ya que si entra aquí es porqué se ha pulsado el
//botón de subcategorías de algún elemento del listado de categorías
    if(route == 'list_categories'){
        document.getElementsByTagName('title')[0].innerHTML='EcomSail - Subcategorías';
    }
    

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
            //resaltar/oscurecer los iconos del buscador al hacer/deshacer focus
            let search_data=document.querySelector('#search_data');
            if(search_data){
                let div_inputgroup = document.querySelector('.div_search');
                search_data.addEventListener('focus',()=>{
                    //console.log("buscando el focus: ",div_inputgroup.firstElementChild.style.color="#696969")
                    div_inputgroup.firstElementChild.classList.add('active');
                    div_inputgroup.lastElementChild.classList.add('active');
                })
                search_data.addEventListener('blur',()=>{                    
                    //console.log("buscando el focus: ",div_inputgroup.firstElementChild.style.color="#696969")
                    div_inputgroup.firstElementChild.classList.remove('active');
                    div_inputgroup.lastElementChild.classList.remove('active');
                })
            }
            console.log("history.length: ",window.history.length)
            
            //el evento popstate detecta el botón de adelante, atrás del navegador
            //o cuando se llama a los métodos history.back(), history.forward(), history.go()
            window.addEventListener('popstate',(e)=>{
                //console.log(e.state);
                console.log(e.state)
                
            //se comprueba la ruta para detectar si es categoría o subcategoría y cambiar el title
            //se usa el evento popstate como alternativa a la variable route establecida al comienzo del layout con el tag meta
            //además de modificar el title popstate permite obtener si se ha pulsado el botón atrás o adelante en el navegador
            //y redirigimos con window.location para que no genere errores
                if(e.path[0].route == 'list_categories'){
                    
                    //obtener ruta exceptuando la raíz : location.pathname
                    if(window.location.pathname){
                        let path = window.location.pathname;
                        //expresión regular para contar los "/" que contiene el location.pathname
                        let sumSlash = path.match(/\//g);
                        if(sumSlash.length == 3){
                            //categorías
                            document.getElementsByTagName('title')[0].innerHTML='EcomSail - Categorías';
                            console.log("hostname: ",window.location.hostname)
                            console.log("host: ",window.location.host)
                            console.log("protocol: ",window.location.protocol)
                            window.location = path;
                        }else if(sumSlash.length==4){
                            //subcategorías
                            document.getElementsByTagName('title')[0].innerHTML='EcomSail - Subcategorías';
                            window.location = path;
                        }

                        console.log(path.match(/\//g).length);
                    }
                }
                
            })

            
            
        }

})     
//}
