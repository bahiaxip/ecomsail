var events = ['userUpdated','addCategory','editCategory','addProduct','editProduct','confirmDel'];
    
    //distintos events listeners recibidos por "$this->emit()" de livewire, tan solo
    //es necesario añadir datos al array
    events.forEach((event)=>{        
        window.livewire.on(event,()=>{
            $('#'+event).modal('hide');
        })
    })
    //tooltip
    Livewire.onLoad(() => {
            $('[data-toggle="tooltip"]').tooltip()
        })    