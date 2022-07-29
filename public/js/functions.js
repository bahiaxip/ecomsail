//nombre de ruta (asignado en meta tag que indica el valor de name en el archivo de rutas)
var route = document.getElementsByName('route_name')[0].getAttribute('content');
var token = document.getElementsByName('csrf_token')[0].getAttribute('content');
var events = [
'userUpdated','editUser','addCategory','editCategory','addProduct','editProduct',
'confirmDel','editPermissions','sendModal','sendModal2','addAttribute',
'editAttribute','addValue','massiveConfirm','settings','editLocation','addCity',
'editCity','fastview','addAddress','addSlider','editSlider'
];
var description = document.querySelector('#friendly_edit1');
//distintos events listeners recibidos por "$this->emit()" de livewire, tan solo
//es necesario añadir datos al array events
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
window.livewire.on('description1',(data=null)=>{
        
    //CKEDITOR.on('instanceReady',function(){
    //para no generar conflictos entre los 2 textarea (CKEDITOR), diferenciamos
    //entre friendly_edit1 para el atributo padre y friendly_edit1_value para el valor
        CKEDITOR.instances.friendly_edit1.setData("");
        if(data == 'value'){
            CKEDITOR.instances.friendly_edit1_value.setData("");
        }    
    //})
})

window.livewire.on('description2',(data)=>{
    CKEDITOR.instances.friendly_edit2.setData(data);
})
window.livewire.on('description3',(data)=>{
    console.log("description3: ",data);
    CKEDITOR.instances.friendly_edit3.setData(data);

})
//ocultar div pasando el selector de id(#)  por parámetro(data)
window.livewire.on('loading',(data)=>{
    let loading = document.querySelector('#'+data);
    if(data){
        loading.style.display='none';
    }
    
})

window.livewire.on('combinations',()=>{
    clearPanelCombinations();
})

//Añadir link en la url
window.livewire.on('minilink',(cat_id,cat_name,classname)=>{
    console.log(cat_id)
    console.log(cat_name)
    let subcat =  document.querySelector('#sublist_name');
    let link=`&nbsp;>&nbsp;<a href="${cat_id}" >
        <div class="icon ${classname}"></div> <span>${cat_name}</span>
    </a>`;

    //estableciendo datos en localStorage, anulado: no necesario,anulado
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

window.livewire.on('slider',()=>{
    var slider = new Slider();
    console.log("slider")
})
/* no necesaria, eliminar
window.livewire.on('galleryslider',()=>{
    //$('productmodal_slick').slick('unslick').slick();
    $('#fastview').modal('hide');
    console.log("clearmodal")
})
*/
//Para reicinializar el slider slick se inicia la primera vez, y después las
//siguientes se usa refresh(). (antes se han eliminado las imágenes del slick)
window.livewire.on('slick',(data)=>{    
    if(data){        
        $('#fastview').modal('show');        
        $('.productmodal_slick').slick('refresh');        
    }else{
        $('#fastview').modal('show');
    //    setTimeout(()=>{
           $('.productmodal_slick').slick({
              dots:true,
              infinite:true,
              autoplay:true,
              autoplaySpeed:4000,
            });
           $('.productmodal_slick').slick('init');
    //    },100);
    }
})

//no necesario, eliminar
/*
window.livewire.on('unslick',()=>{
    console.log("unslick");
    $('#fastview').modal('hide');
    $('.productmodal_slick').slick('unslick');
})
*/
//reinicia el slider cada vez que livewire renderiza
window.addEventListener('contentChanged',event =>{
    console.log("contentChanged")
    $('.productmodal_slick').slick('init'); 
})
window.addEventListener('contentChanged2',event =>{
    console.log("contentChanged")
    $('.product_slick').slick('init'); 
})
//editor_init('friendly_edit');

//galería slick de imágenes

window.livewire.on('slick2',(data)=>{
    console.log("slick2")
    if(data){        
        $('#fastview').modal('show');        
        $('.product_slick').slick('refresh');        
    }else{

        //$('#fastview').modal('show');
    //    setTimeout(()=>{
           $('.product_slick').slick({
              dots:true,
              infinite:true,
              autoplay:true,
              autoplaySpeed:4000,
            });
           $('.product_slick').slick('init');
    //    },100);
    }
})
//limpiar checkbox de acción masiva(aplicación en lote) y resetear 
//select de acciones
window.livewire.on('clearcheckbox',()=>{
    clearCheckbox();
    //reseteamos el select de acciones (necesario pasar actionSelected a null)
    actionSelected=null;
    document.querySelector('#indiv_checkbox').value=0;
})

window.livewire.on('message_opacity',()=>{
    let div_message = document.querySelector('.message_opacity');
    div_message.style.opacity = '1';
    setTimeout(()=>{ $('.alert').slideUp();div_message.style.opacity = 0; }, 5000);
    
    console.log(div_message)
})
if(route == 'list_home'){
    
    let products = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio','Julio','Agosto','Septiembre'];
}
if(route == 'cart'){
    console.log("cart")
    //mostramos el loading duplicado al actualizar y ocultamos al comenzar el método update()
      let btn_update=document.querySelector('#btn_update');
      if(btn_update){
        btn_update.addEventListener('click',()=>{
            console.log("loading");
          let loading = document.querySelector('#loading');
          loading.style.display='flex';
        })
      }
      
    
    set_payment();
}

document.addEventListener('readystatechange',() => {  

//document.addEventListener('DOMContentLoaded',() => {
        if(document.readyState == "complete"){
            //tooltip
            Livewire.onLoad(() => {
                $('[data-toggle="tooltip"]').tooltip()
            })
            if(route == 'categories'){ 
                //"readystate")
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
            //console.log("history.length: ",window.history.length)
            
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

                        //console.log(path.match(/\//g).length);
                    }
                }
                
            })
            //establecer combinación por defecto al mostrar producto
            if(route == 'product'){
    
                let combinationNodes = document.querySelectorAll('.combinations_items');
                let combinations = [].slice.call(combinationNodes);
                console.log("llega a product")
                console.log(combinations);
                combinations.forEach((item)=>{
                    console.log("item: ",item);
                    if(item.firstElementChild.firstElementChild.getElementsByClassName="color"){
                        console.log(item.firstElementChild.firstElementChild)
                        console.log("es color");
                        
                    }
                    item.firstElementChild.firstElementChild.firstElementChild.click();
                })
                
            }
            


        }

        if(route == 'list_attributes'){
            /*
            console.log("attr");
            //$('#colorpicker').css('background-color','#FFFFFF');
            //$('#colorpicker').colorpicker('setValue','#FFF');
            //$('#colorpicker').ColorPicker()
            //$('#colorpicker')[0].style.backgroundColor='#FFFFFF'
            //$('#colorpicker').colpickSetColor('ffffff');
            $('#colorpicker').val('#FFFFFF')
            console.log($('#colorpicker'))
            */
    
        }
        if(route == "list_products"){
            
        }

        

        


})
//efectos hover con javascript según sean imágenes o icons font awesome
if(route == 'offers'){
    //comprobamos si es elemento font awesome(<i>) o imagen y establecemos
    //la correspondiente
    let divCategoriesNodes = document.querySelectorAll('.div_category');
    let divCategories = [].slice.call(divCategoriesNodes);
    let icon_hover=[];
    let icon = [];
    divCategories.map((category,counter)=>{
        //si es elemento i de font awesome
        if(!category.getElementsByTagName('i')[0]){
            icon_hover[counter] = category.getElementsByTagName('input')[0].getAttribute('data_icon');
            icon[counter] = category.querySelector('.icon').style.backgroundImage;

            console.log(counter)
            category.addEventListener('mouseover',()=>{
                category.querySelector('.icon').style.backgroundImage="url("+icon_hover[counter]+")"
            })
            category.addEventListener('mouseout',()=>{
                category.querySelector('.icon').style.backgroundImage=icon[counter];
            })            
        //si es imagen
        }else{
            console.log("existe")
        }
        
    })
    console.log("offers: ",divCategories)
}
//Inicio de librería AOS
        /*
        window.scrollTop='0';
        AOS.init();
        console.log("hola")
        AOS.refresh();
        */
window.livewire.on('activeCombinations',() =>{
    activeCheckboxCombinations();
})
    

function activeCheckboxCombinations(){
    console.log("llega a home");
            let combinationNodes = document.querySelectorAll('.combinations_items');
            console.log(combinationNodes)
            let combinations = [].slice.call(combinationNodes);
            combinations.forEach((item)=>{
              item.firstElementChild.firstElementChild.click();
            })
}

//comprueba si existe algún checkbox y alguna acción seleccionados,
//si existen muestra el modal

function testAnyCheckbox(){    
    //almacenamos todos los checkbox
    let total_list = document.querySelectorAll('.checkbox');
    //convertimos a array
    let total = [].slice.call(total_list);
    let res = total.filter(item => item.checked)    
    if(!actionSelected){
        document.querySelector('#indiv_checkbox').focus();
        return;
    }
    if(res.length == 0){        
        document.querySelector('#allcheckbox').focus();
        return;
    }
    if(res.length > 0 && actionSelected)
        $('#massiveConfirm').modal('show');
}

function setActionSelected(el){
    console.log("el: ",el.value);    
    if(el.value == 1)
        actionSelected = "delete";
    else if(el.value == 2)
        actionSelected = 'restore';
    else
        actionSelected = null;
}
//para la selección total
//si se ha pulsado checkbox de seleccionar/deseleccionar todos comprobamos
function selectAllCheckbox(){
    //si existe elemento allcheckbox...    
    if(document.querySelector('#allcheckbox')){

        let allcheckbox = document.querySelector('#allcheckbox');
        //almacenamos todos los checkbox
        let total_list = document.querySelectorAll('.checkbox');
        //convertimos a array
        let total = [].slice.call(total_list);
        //comprobamos si es seleccionar o deseleccionar
        if(allcheckbox.checked){
            console.log("pasa por checked")
            activeCheckbox(total);
        }
        else{
            console.log("no pasa por checked")
           clearCheckbox(total);
        }
    }
    //setList();
    console.log("list_selected: ",selected_list);
}



//FALTA COMPROBAR SI SE QUEDA VACÍA LA PÁGINA PASAR A LA ANTERIOR DESDE PHP

        /*métodos para selección/deselección de checkbox y aplicar acciones en lote*/

let selected_list=[];
//generamos desde aquí el dropdown de "Filtros" ya que en ocasiones genera conflicto
//con modal de boostrap o con session()->flash())
function showMenuFilters(){
    $('#dropdownMenuExport').hide();
    $('#dropdownMenuFilters').toggle();
}
function showMenuExport(){
    $('#dropdownMenuFilters').hide();
    $('#dropdownMenuExport').toggle();
}

//activar todos los checkbox
function activeCheckbox(allcheckbox){
    //establecemos todos los checkbox a true y añadimos elementos al selected_list 
    selected_list = allcheckbox.map((item)=>{
        item.checked=true;
        return item.name
    })
}

function clearCheckbox(allcheckbox=null){    
    let list=allcheckbox;
    if(!list){
        //almacenamos todos los checkbox
        let total_list = document.querySelectorAll('.checkbox');
        //convertimos a array
        list = [].slice.call(total_list);
    }
    //establecemos todos los checkbox a false y resetamos la lista
    list.map((node)=>{        
        node.checked=false;
    })
    document.querySelector('#allcheckbox').checked=false;
    selected_list = [];
}
    
//selección por id(uno en uno)
function selectCheckbox(id,el){
    
    //si está checkeado añadimos a la lista        
    if(el.checked){
        console.log("pasa por checked")
        //comprobamos si no se encuentra en la lista (para más seguridad)
        if(!selected_list.includes(id))
            selected_list.push(id);
            
    //si no está checkeado comprobamos si existe en la listay se elimina de la lista
    }else{
        console.log("no pasa por checked")
        //comprobamos si existe en la lista
        if(selected_list.includes(id))                
            selected_list=selected_list.filter((item) => item != id);
    }
    //actualizamos el data binding del form hidden 
    console.log("antes de setList(): ",selected_list);
    //setList();
}

        /*fin métodos para select boxes de aplicaciones en lote*/


//método clearActiveTabs resetea las pestañas del modal de configuración de producto
//para que siempre que se pulse Cancelar al volver a abrir comienze por la primera pestaña
function clearActiveTabs(detail=null){
    //mostramos loading
    let loading = document.querySelector('#loading');
      loading.style.display='flex';
    console.log("llega")
    if(detail){
        saveDetail2();
    }
    let tabpanes = document.querySelectorAll('.tab-pane');
    let tabs = [].slice.call(tabpanes);
    tabs.map((item,index)=>{
        //comprobamos si existen las clases active y show en alguna de las pestañas
        //exceptuando la primera
        console.log("index: ",index);
        if(index != 0)
            if(item.classList.contains('show') || item.classList.contains('active') ){
                item.classList.remove('active');
                item.classList.remove('show');
                tabs[0].classList.add('active');
                tabs[0].classList.add('show');
            }
    })
    clearValues();
}


            /*bloque de métodos para generar combinaciones*/

let list_combinations=[];
//id temporal para eliminación de combinaciones
let combIdTmp;
//id temporal para eliminación de galería
let galleryIdTmp;
//importe adicional de combinaciones (temporal, solo para la edición de precio)
let added_price_tmp;
//importe total de combinaciones (temporal, solo para la edición de precio)
let final_price_tmp;
//globales que pasaremos para actualizar los 2 input de precio en save() en PHP
let added_price, final_price
//añadir valor al panel de combinaciones
function addValue(value_id,value_name,parent_id,el=null){
//Revisar si es necesario
    //filtramos si ya existe en la lista de combinaciones el input seleccionado para no repetirlo
    let filteredList=list_combinations;
    console.log("filteredList: ",filteredList);
//revisar si es necesario
    //este método era para la acción de descheckear, al cambiar a input radio no es necesario
    /*
    if(!el || !el.checked){
        if(filteredList)
            list_combinations = list_combinations.filter(item => item.id != value_id);
    }
    */

    //si es el primero añadimos a la lista, si no es el primero comprobamos si pertenecen 
    //al mismo padre
    if(filteredList.length == 0){
        list_combinations.push({id:value_id,name:value_name,parent_id:parent_id});
        console.log("es el primero");
    }else{
        //aseguramos que son del mismo padre (aunque no se debería poder al desactivar los botones collapse)
        //let list = list_combinations.filter(item => item.parent_id == parent_id && item.id != value_id)
        let list=false;
        filteredList.forEach((item) => {
            console.log("item: ",item)
            if(item.id == value_id){
                filteredList = filteredList.filter(item => item.id != value_id);
                //eliminamos el id de la lista
                list=true;
            }
        })
        if(!list)
            filteredList.push({id:value_id,name:value_name,parent_id:parent_id})

        console.log("pasa al segundo: ",filteredList)
    }
    list_combinations = filteredList;
    //identificamos el elemento .boxes como selected para poder desactivar el resto
    let parentSelected = el.parentNode.parentNode.parentNode.parentNode;
    parentSelected.classList.add('selected')
    //desactivamos el resto de collapses
    inactiveCollapses(el)
    
    testValues();
    setListValues();
    
}
//desactivamos y cerramos los menús collapse de atributos excepto el seleccionado(selected)
function inactiveCollapses(){
    let boxesNode = document.querySelectorAll('.boxes');
    let boxes = [].slice.call(boxesNode);
    //console.log(boxes)  
    boxes.map((box)=>{  
        if(!box.classList.contains('selected')){
            //desactivamos botones 
            box.firstElementChild.firstElementChild.setAttribute('disabled','disabled');
            let show = box.querySelector('.collapse.show');
            if(show){
                show.classList.remove('show');
            }
        }
    })
}
//activar todos los botones collapses desactivados(disabled)
function activeAllCollapses(){
    let boxesNode = document.querySelectorAll('.boxes');
    let boxes = [].slice.call(boxesNode);
    boxes.map((box)=>{ 
        if(box.classList.contains('selected'))
            box.classList.remove('selected');
        if(box.firstElementChild.firstElementChild.getAttribute('disabled') == 'disabled'){
            box.firstElementChild.firstElementChild.removeAttribute('disabled');
        }
    })
}
function setListValues(){
    let list=[];
    list_combinations.map((item)=>{
        let comb = `<button type="button" class="btn btn-primary btn-sm" style="margin:2px auto;vertical-align:middle">
            ${item.name} <span class="badge text-bg-secondary" onclick="deleteValue(${item.id},'${item.name}')">X</span>
        </button>`;        
        list.push(comb);
    })
    let panel = document.querySelector('#panel_combinations');
    panel.innerHTML=list.join(' ');
}
//cerrar todos los collapse sin modificar nada
function closeAllCollapse(){
    let boxesNode = document.querySelectorAll('.boxes');
    let boxes = [].slice.call(boxesNode);
    boxes.map((box)=>{
        let show = box.querySelector('.collapse.show');
        if(show){
            show.classList.remove('show');
        }
    })
}
//comprueba si existe algún checkbox marcado/seleccionado
function revise_boxes(){
    let boxesNode = document.querySelectorAll('.boxes');
    let boxes = [].slice.call(boxesNode);
    let checked_values=[];
    let data = false;
    boxes.map((box)=>{        
        let valuesNode = box.querySelectorAll('.values');
        let values = [].slice.call(valuesNode);
        const checked_values = (child) => child.firstElementChild.checked;        
        if(values.some(checked_values))
            data=true;        
        console.log("checked_values: ",checked_values)
    });
    return data;
    
}
function testValues(){
    let test = revise_boxes();
    //si no existe ningún checkbox marcado activamos todos los buttons collapse
    //y eliminamos la clase selected del elemento boxes
    if(!test){
        activeAllCollapses();
        console.log("test: ",test)
    }
    
}
function deleteValue(id,name){    
    list_combinations = list_combinations.filter(item => item.id != id)
    setListValues();    
}
//resetea el div de generar combinaciones
function clearPanelCombinations(){
    let panel = document.querySelector('#panel_combinations');
    panel.innerHTML = "";    
    clearValues();
    //console.log("boxes: ",boxes);

}
//resetear todos los checkbox de valores de los atributos para crear las combinaciones
function clearValues(){
    let boxesNode = document.querySelectorAll('.boxes');
    let boxes = [].slice.call(boxesNode);
    //console.log(boxes)  
    boxes.map((box)=>{
        let valuesNode = box.querySelectorAll('.values');
        let values = [].slice.call(valuesNode);
        values.map((child)=>{            
            child.firstElementChild.checked = false;
        })
    })
    //limpiamos la lista de combinaciones
    list_combinations = [];    
}
//mostrar/ocultar modal de confirmación para la eliminación de combinación o galería
//para pasar el id de combinación usamos la variable combIdTmp
//para detectar si es galería o combinación pasamos gallery
//¿¿ Necesario cerrar los collapses antes de mostrar el modal ??
function confirmComb(id){
    //cerramos todos los collapse
    closeAllCollapse()
        let confirmComb = document.querySelector('#confirmComb');
        let btn_delete =confirmComb.querySelector('#btn_delete');    
        combIdTmp = id;
        confirmComb.classList.toggle('showconfirm');    
        clearPanelCombinations();
}
function confirmGallery(id){    
    let confirmGallery = document.querySelector('#confirmGallery');
    galleryIdTmp = id;
    console.log(confirmGallery)
    confirmGallery.classList.toggle('showconfirm2');    
    
}
//método principal que llama desde los botones de edit de cada combinación
function editComb(id,cancel=null){
    //primero reseteamos todos por si se ha dejado alguno sin cerrar o actualizar
    resetEditComb();
    let tr = document.querySelector('.tr_'+id);
    let input = tr.querySelector('.added_price').getElementsByTagName('input')[0];
    let input2 = tr.querySelector('.final_price').getElementsByTagName('input')[0];
    //si se pulsa cancelar no se actualiza el valor del input
    if(!cancel){
        //si es editar, en lugar de cancelar la edición, almacenamos en global
        //para poder recuperar el valor que se encontraba al editar si se desea cancelar
        added_price_tmp = input.value;
        final_price_tmp = input2.value;
        openEditComb(tr,input,input2)
    }else{
        closeEditComb(tr,input,input2) 
    }
    clearPanelCombinations();
    
}
//editar combinación de un solo registro de la tabla de combinaciones
function openEditComb(t,el,el2){
    el.disabled = false;
    el2.disabled = false;
    el.focus();
    //input2.disabled = false;
    t.querySelector('.edit_comb').style.display='none';
    t.querySelector('.edit_comb_update').style.display='flex';
    //t.querySelector('.delete').style.display='none';
}
//editar combinación de un solo registro de la tabla de combinaciones
function closeEditComb(t,el,el2){
    el.disabled = true;        
    el2.disabled = true;
    t.querySelector('.edit_comb').style.display='flex';
    t.querySelector('.edit_comb_update').style.display='none';
    //t.querySelector('.delete').style.display='flex';
    //recuperamos los valores anteriores a la edición 
    el.value=added_price_tmp;
    el2.value=final_price_tmp;
    //reseteamos las globales
    added_price_tmp = null;
    final_price_tmp = null;
}
//resetea todos los botones de edición de combinaciones y desactiva todos los inputs de precio
//devolviendo el valor que tenía el último en el caso de que se haya dejado abierto
function resetEditComb(){
    let table = document.querySelector('.table');
    let allInputsNode = table.querySelectorAll('input');
    console.log("allinputsnode: ",allInputsNode);
    let allInputs =[].slice.call(allInputsNode);
    //con counter establecemos que el primer item desactivado pertenece a added_price
    //y el segundo a final_price
    let counter = 0;
    allInputs.map((item,index)=>{
        //si existe alguno desactivado se desactiva y se devuelve su valor original
        if(item.disabled == false){
            console.log(index)
            if(counter==0)
                item.value=added_price_tmp;
            if(counter==1)
                item.value = final_price_tmp;
        }
        item.disabled=true;
    })

    let allCombNode = table.querySelectorAll('.edit_comb');
    let allCombUpdateNode = table.querySelectorAll('.edit_comb_update');
    let allComb = [].slice.call(allCombNode);
    let allCombUpdate = [].slice.call(allCombUpdateNode);
    allComb.map((item)=>{
        item.style.display = 'flex';
    })
    allCombUpdate.map((item)=>{
        item.style.display='none';
    })
}
//eventos change para detectar el precio de los input y poder pasarlo al actualizar
//mediante JavaScript
function update_added_price(data){
    added_price = data.value;
}
function update_final_price(data){
    final_price = data.value;
}

//al dar problemas con el input radio para poder activar/desactivar 
//el input de custom_delivery(Entrega personalizada) enviamos los datos a la
//variable mediante un onclick desde las opciones del input radio

let deliveryTime;
function setCustomDelivery(num,value){    
    let customDelivery = document.querySelector('#custom_delivery');
    if(num == 0){
        customDelivery.value="";
        customDelivery.setAttribute("disabled","true");
    }else{
        customDelivery.removeAttribute("disabled","false");
    }
    deliveryTime = value;
    //enviamos al método setDeliveryTime() includio en settings.blade
    //setDeliveryTime(value)

}


        /*fin de bloque de métodos para generar combinaciones*/

                    /* drag&drop */
//lista de imágenes transfer en base64
let listImages = [];
//lista de imágenes de tipo File()
let listFiles = [];
let existsImg = false;
let list;
let images;
let formdata;
let file2;
let actionSelected;
//eliminar imagen transferida mediante drag&drop
function deleteTransfer(index,id){
    //revisar este index    
    
    if(index==-1){
      listImages=[];
    }
    
    //eliminamos la imagen de la lista    
    listImages.splice(index,1);
    listFiles.splice(index,1);

    if(listImages.length==0){
      existsImg=false;
    }
    images=listImages;
    showFiles(id);

}
//id es el product_id
function dropHandler(event,id){    
    event.preventDefault();
  //mayoría de navegadores (dataTransfer.items)
    if(event.dataTransfer.items){      
      // Usar la interfaz DataTransferItemList para acceder a el/los archivos)
      for(let i=0;i<event.dataTransfer.items.length;i++){        
        // Si los elementos arrastrados no son ficheros, rechazarlos
        //aunque el método showAndStoreFile ya incorpora una validación
         
        if(event.dataTransfer.items[i].kind === 'file'){ 
          let file = event.dataTransfer.items[i].getAsFile();
          //console.log("el file: ",file);
//necesario comprobar 2MB de archivo e incluir el else con el método dataTransfer()
          showAndStoreFile(file,id);
        }else{
            //se muestra siempre, mientras se actualiza
          //console.log("No es un archivo válido");
        }
      }
    }else{      
  // Usar la interfaz DataTransfer y su propiedad files para acceder a 
      //los archivos en I.E (ev.dataTransfer.files)
      if(event.dataTransfer.files){
        for(let i=0;i<event.dataTransfer.files.length;i++){
          let file=event.dataTransfer.files[i];
          //evitamos la validación, ya incorporada en showAndStoreFile()
          /*
          if(file.type==='image/jpeg' || file.type==="image/png"
            || file.type==="image/gif"){
          */
          
          showAndStoreFile(file,id);
          
          /*
          }else{
          
            console.log("No es un archivo válido")
          }
          */
        }
      }
    }
    //Pasar el evento a removeDragData para limpiar
    removeDragData(event);
}

//valida el archivo dataTransfer
function showAndStoreFile(file,id){
    //si listImages (que es un Input() del padre) es distinto a listFiles 
    //reseteamos listFiles para que no se mantenga al crear un nuevo alojamiento
    if(listImages.length != listFiles.length){
      listFiles=[];
    }
    var reader = new FileReader();
    
    if(file){        
        //validación de extensión y medida
        //1048576 bytes = 1024 Kbytes = 1Mbytes
        //medida máxima 2MB
        let size=1048576 * 2;
        if(file.type =="image/png" && file.size <= size 
          || file.type == "image/jpeg" && file.size <= size
          || file.type == "image/gif" && file.size <= size)
        {
              formdata=new FormData();          
              formdata.append('file',file,file.name);
              reader.readAsDataURL(file);
            //pasando en onloadend el parámetro event y recogiendo con event.target.result
            //no funciona en este caso, pasamos sin parámetro el onloadend y
            //recogemos con el mismo reader, para evitar algunos errores, la lectura 
            //con el método readAsDataURL() se debe establecer antes de onloadend()
              reader.onloadend=() =>{
                    let ima;
                    if(existsImg){
                      if(typeof reader.result === 'string'){
                        ima=reader.result;                
                      }else{
                        //console.log("no es string")
                      }
                      //listImages es el array de elementos para asignarlos en el contenedor
                      listImages.push(ima);
                      //listFiles es el array para subir los archivos al servidor

                      listFiles.push(file);
                      //console.log("listFiles: ",listFiles);
                    }else{

                      if(typeof reader.result === 'string'){
                        ima=reader.result;                
                      }else{
                        //console.log("no es string")
                      }
                      
                      //listImages es el array de elementos para asignarlos en el contenedor
                      listImages.push(ima);
                      //listFiles es el array para subir los archivos al servidor
                      listFiles.push(file);
                      //console.log("listFiles: ",listFiles);
                      file2 = file;
                      //switch que indica que existe al menos una imagen en la lista
                      existsImg=true;
                    }
                //this._cardrentService.setImages(listFiles);
                images = listImages;
                
                showFiles(id);    
                
                
                //this.listFiles=[];
              };
              reader.onerror = function(){
                console.log(reader.error);
              }
        }else{

          //llamamos al modal y mostramos mensaje si no es de formato imagen
          console.log("El archivo no es una imagen válida");
          console.log("La imagen no tiene el formato permitido o es superior a 2MB")

        }
    }     
}

function showFiles(id){
    let list = [];    
    let data = [];
    let image;
    if(images){
        console.log("images: ",images)
        for(let i=0;i<images.length;i++){
            image = `<div class="box_images" id="gallery_${i}" >
                    <span class="" style="width:100%">
                        <div class="div_images">
                            <img src="${images[i]}" class="images" />
                            <div class="upload_image" onclick="uploadImage(${id},${i})" title="Subir imagen">
                                <i class="fa-solid fa-circle-up"></i>
                            </div>
                            <div class="delete_images" onclick="deleteTransfer(${i},id)">
                                <i class="fa-solid fa-circle-xmark"></i>
                            </div>
                            <div class="loading_transfer" style="display: none;" >
                                <img src="../../icons/spinner2.svg" alt="" style="margin:auto" width="80">
                            </div>
                        </div>
                    </span> 
                </div>`;
            //console.log(images[i]);
            list.push(image);
        }
    }
    let back_images = document.querySelector('.back_images');
    let boxTransfer = document.querySelector("#box_transfer");
    if(back_images){
        back_images.innerHTML=list.join("");    
    }
    //mostramos o ocultamos flechas de scroll de galería transfer
    if(back_images.clientWidth>boxTransfer.clientWidth){
        boxTransfer.getElementsByTagName('span')[0].style.display="block";
        boxTransfer.getElementsByTagName('span')[1].style.display="block";
    }else{
        boxTransfer.getElementsByTagName('span')[0].style.display="none";
        boxTransfer.getElementsByTagName('span')[1].style.display="none";
    }

    //document.querySelector('.box').style.width='100%';
    //document.querySelector('.info_upload').style.display='none';

    document.querySelector('.info_upload').style.display='none';
    document.querySelector('.div_btn_gallery').classList.add('active');
    //comprobamos ancho y si es necesario mostramos flechas
    console.log("width de back_images: ",back_images.clientWidth)
    console.log("width de box: ",boxTransfer.clientWidth)
    //si no existen imágenes volvemos a mostrar el div "info_upload" que indica soltar imagen
    if(!images || images.length == 0){
        document.querySelector('.info_upload').style.display='flex';
        document.querySelector('.div_btn_gallery').classList.remove('active');
    }
}

function removeDragData(ev){
    //console.log("eliminando drag data")
    if(ev.dataTransferItemList){
      console.log("existe itemlist")
      ev.dataTransferItemList.clear();
    }
    if(ev.dataTransfer.items){
      //Usamos la la interface DataTransferItemList para eliminar el drag data
      ev.dataTransfer.items.clear();
      //console.log("dataTransfer.items")
    }
    if(ev.dataTransfer){
      //Usar la interface DataTransfer para eliminar el drag data
      ev.dataTransfer.clearData();
      //console.log("dataTransfer")
    }    
  }

function dragOverHandler(event){
    //console.log("dragOverHandler");
    //console.log(this.listImages)
    //console.log(this._cardrentService.getImages())
    event.preventDefault();
  }


function scrollGalleryLeft(){
let gallery = document.querySelector('.back_upload');
    gallery.scrollLeft -=50;
}
 
function scrollGalleryRight(){
    let gallery = document.querySelector('.back_upload');
    gallery.scrollLeft +=50;
}

                       /* fin drag&drop */

function uploadImage(id,image_id=null){
    let loadingTransfer;
    console.log("existe_image_id: ",image_id)
    //necesario la comparación a null, ya que el image_id puede ser 0 y lo detecta como false
    if(image_id != null){
        //loadingTransfer = document.querySelector('#gallery_'+image_id).querySelector(".loading_transfer");    
        loadingTransfer =document.querySelector('#gallery_'+image_id).querySelector('.loading_transfer');
    }else{
        loadingTransferNode =document.querySelectorAll('.loading_transfer');
        loadingTransfer = [].slice.call(loadingTransferNode);

    }
    
    //console.log(id);return;
    //en principio no es necesario promesas
  //return new Promise(function(resolve, reject){
      
    let fd = new FormData();
    //subida de imagen individual o de todas las imágenes
    if(image_id != null){
        fd.append('files[]',listFiles[image_id]);
    }
    else{
        listFiles.forEach((item)=> fd.append('files[]',item));
    }

    fd.append("_token",token);
    fd.append("product_id",id);

    let xhr = new XMLHttpRequest();
    let rand=parseInt(Math.random()*99999);
    
    let vinculo = "../../images2";
    xhr.open("POST",vinculo);
    /* cabeceras no necesarias
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xhr.setRequestHeader("Content-type","multipart/form-data");
    xhr.setRequestHeader("Content-type","application/json");
    */
    //mostramos loading de carga
    if(image_id != null){
        loadingTransfer.style.display="flex";
    }else{
        loadingTransfer.map((item)=>{item.style.display="flex"})
    }
    
    xhr.onreadystatechange =  function(){ 
    //console.log("ejem: ",image_id);return;       
        if(xhr.readyState == 4){
          //resolve(console.log("response:" ,xhr.responseText));
            console.log("response:" ,xhr.response)
            //ocultamos el loading de carga
            if(image_id != null){
                loadingTransfer.style.display="flex";
            }else{
                loadingTransfer.map((item)=>{item.style.display="flex"})
            }
     
            //eliminamos la imagen subida del drag&drop
            if(image_id != null){
                console.log("el image_id es: ",image_id)
                console.log(listFiles);
                deleteTransfer(image_id,id);
            }else{
                deleteTransfer(-1,id);                
            }
            console.log("livewire")
            mimetodo(id);
        }
    }
    xhr.onerror = function (){
        //reject(console.log("error"));
        console.log("error");
        loadingTransfer.style.display="none";
    }
    xhr.send(fd);
  //});

}
window.livewire.on('reload_images',(product_id)=>{
    showFiles(product_id);
    //activamos la pestaña de galería, ya que al renderizar se pasa a la primera
    document.querySelector('#nav-gallery-tab').click();
})

//establecemos el input pulsando desde cualquier punto de la card de direcciones

function set_direction(el){    
    el.querySelector('.input').firstElementChild.click()
    //let directionsNodes = document.querySelectorAll('.card-body')
    let directionsNodes = document.querySelectorAll('.box_address_card')
    let directions = [].slice.call(directionsNodes);
    directions.map((item)=>{
        item.classList.remove('active');
    })
    el.classList.add('active');
}

function set_payment(el=null){
    let div = el;
    let box_payment = document.querySelector('.box_payment');
    if(!el){
        //establecemos por defecto el tipo de pago (tarjeta) los estilos de activado 
        let selected_payment = box_payment.firstElementChild.firstElementChild.querySelector('button');
        div=selected_payment
    }
    
    //no necesario hacer click        
    let paymentsNodes = document.querySelectorAll('.btn_payment')    
    let payments = [].slice.call(paymentsNodes);

    payments.map((item)=>{
        //eliminamos la clase active de cada elemento
        item.classList.remove('active');
        //pasamos cada icono a node
        item.previousElementSibling.classList.remove('active');
    })
    div.classList.add('active');
    div.previousElementSibling.classList.add('active');
}

function showModal(selector){
    console.log($(selector))
    $(selector).modal('show');
}
function hideModal(selector,event){
    console.log($(event))
    event.preventDefault();
    event.stopPropagation();
    $(selector).modal('hide');   
}
//menú categorías
let sliderfirst = false;
function toggleDropdown(){
    $('#dropdownMenuLink5').toggle()
    if($('#dropdownMenuLink').hasClass('active')){
        $('#dropdownMenuLink').removeClass('active')
    }else{
        $('#dropdownMenuLink').addClass('active')    
    }
    
}
//botón flotante 
let btn_floatup = document.querySelector('.btn_floatup');
let toggle_floatup;
window.addEventListener('scroll',function(e){
    //console.log("scrolling...",window.scrollY)
    if(btn_floatup){
        if(window.scrollY > 200){
            if(!toggle_floatup){
                btn_floatup.style.opacity = '1';
                AOS.refresh();
                toggle_floatup = true;
            }
            //console.log("mostrar botón")
        }else{
            btn_floatup.style.opacity = '0';
            toggle_floatup = false;
            //console.log("ocultar botón")
        }
    }
    
})
function up(){
    window.scrollTo({
        top:0,
        behavior:'smooth',
    });
}


window.livewire.on('title', (data)=>{
    document.title = data.title;
})
//pasando en la edición de atributo el color almacenado en la base de datos
//al div de fondo del input colorpicker
window.livewire.on('colorpicker',(data) => {
    console.log('hola',$('.colorpicker_'+data.id));
    $('.colorpicker_'+data.id).val(data.color)

})
/* anulado, para modificar la transición del cierre es necesario modificar
los estilos de .fade o .hide o ambos, quizás mejor un bootstrap desde 0*/
/*
function show_modal_ticket(){
    $('#addTicket').modal('show');    
}
function hide_modal_ticket(){
    $('#addTicket').modal({
        hide:true,
        duration:'slow'
    })   
}
*/

function setBorderToCombSelected(data){
    let combinationNodes = document.querySelectorAll('.combinations_items');
    let combinations = [].slice.call(combinationNodes);
    
    combinations.forEach((item)=>{
        item.firstElementChild.firstElementChild.style.outline='none';
    })
    console.log("data:",data)
    setTimeout(()=>{

        //data.style.outline='#494949 1px solid';
        //data.firstElementChild.click();


    },100)
    
}
let combination_selected;
function passData(data){
    //data.disabled=true;
    //data.classList.add('selected');
    console.log("data: ",data)
}


