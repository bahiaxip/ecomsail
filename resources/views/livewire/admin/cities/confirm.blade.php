<!-- Modal confirmación eliminar usuario -->
<div wire:ignore.self class="modal fade" id="confirmDel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      @if(!$cityIdTmp)
          <div class="div_loading loading_edit">
              <img src="{{url('icons/loading/dualball.svg')}}" alt="dualball.svg">
          </div>
      @endif
      <div class="modal-header justify-content-center">        
            <div class="modal-title h5 ">
              @if($actionTmp == 'delete')
                ¿Seguro que desea eliminar el registro seleccionado?
              @else
                ¿Seguro que desea restaurar el registro seleccionado?
              @endif
          </div>
      </div>      
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-sm btn_sail btn_sry" data-bs-dismiss="modal" wire:click="clearCityId()">Cancelar</button>
        
          @if($actionTmp == 'delete')
          <button type="button" class="btn btn-sm btn_sail btn_pry" data-dismiss="modal" wire:click="delete()">Eliminar</button>
          @else
          <button type="button" class="btn btn-sm btn_sail btn_pry" data-dismiss="modal" wire:click="restore({{$cityIdTmp}})">Restaurar</button>
          @endif
        
      </div>
    </div>
  </div>
</div>