<!-- Modal confirmación eliminar usuario -->
<div wire:ignore.self class="modal fade" id="confirmDel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      @if(!$catIdTmp)
          <div style="display: flex;width:100%;height:100%;position:absolute;background-color: rgba(0,0,0,.5);z-index:1" >
              <img src="{{url('icons/spinner2.svg')}}" alt="" style="margin:auto" width="100">
          </div>
      @endif
      <div class="modal-header justify-content-center">
        @if($count_cat==0)
            <div class="modal-title h5 ">¿Seguro que desea eliminar el registro seleccionado?
          </div>
        @else
            <div class="modal-title h5 ">No es posible eliminar esta categoria porque tiene sucategorías o productos asociados
          </div>  
        @endif
      </div>      
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-sm  btn-secondary" data-bs-dismiss="modal" wire:click="clearCatId()">Cancelar</button>
        @if($count_cat==0)
          @if($actionTmp == 'delete')
          <button type="button" class="btn btn-sm btn-primary back_livewire2 text-white" data-dismiss="modal" wire:click="delete()">Eliminar</button>
          @else
          <button type="button" class="btn btn-sm btn-primary back_livewire2 text-white" data-dismiss="modal" wire:click="restore({{$catIdTmp}})">Restaurar</button>
          @endif
        @endif
      </div>
    </div>
  </div>
</div>