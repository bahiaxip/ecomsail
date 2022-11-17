<!-- Modal confirmación eliminar usuario -->
<div wire:ignore.self class="modal fade" id="confirmDel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      @if(!$prodIdTmp)
          <div class="div_loading loading_edit">
              <img src="{{url('ics/loading/dualball.svg')}}" alt="dualball.svg">
          </div>
      @endif
      <div class="modal-header justify-content-center">
        @if($actionTmp == 'restore')
        <div class="modal-title h5 ">¿Seguro que desea restaurar el registro seleccionado?
        </div>
        @else
        <div class="modal-title h5 ">¿Seguro que desea eliminar el registro seleccionado @if($actionTmp=='deleteend') definitivamente @endif ?
        </div>
        @endif
      </div>      
      <div class="modal-footer justify-content-center">

        <button type="button" class="btn btn-sm btn_sail  btn_sry" data-bs-dismiss="modal" wire:click="clearProdId()">Cancelar</button>
        @if($actionTmp == 'restore')
        <button type="button" class="btn btn-sm btn_sail btn_pry" data-dismiss="modal" wire:click="restore({{$prodIdTmp}})">Restaurar</button>
        @else
        <button type="button" class="btn btn-sm btn_sail btn_pry" data-dismiss="modal" wire:click="delete()">Eliminar</button>
        @endif
      </div>
    </div>
  </div>
</div>