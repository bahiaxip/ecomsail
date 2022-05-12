<!-- Modal confirmación eliminar usuario -->
<div wire:ignore.self class="modal fade" id="confirmDel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header justify-content-center">
        <!-- necesario loading -->
        @if($count_attr==0)
            <div class="modal-title h5 ">¿Seguro que desea eliminar el registro seleccionado?
          </div>
        @else
            <div class="modal-title h5 ">No es posible eliminar este atributo porque tiene productos asociados
          </div>  
        @endif
      </div>      
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-sm  btn-secondary" data-bs-dismiss="modal" wire:click="clearAttrId()">Cancelar</button>
        @if($count_attr==0)
          <button type="button" class="btn btn-sm btn-primary back_livewire2 text-white" data-dismiss="modal" wire:click="delete()">Eliminar</button>
        @endif
      </div>
    </div>
  </div>
</div>