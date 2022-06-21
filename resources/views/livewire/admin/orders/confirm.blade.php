<!-- Modal confirmación eliminar usuario -->
<div wire:ignore.self class="modal fade" id="confirmDel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      @if(!$orderIdTmp)
          <div style="display: flex;width:100%;height:100%;position:absolute;background-color: rgba(0,0,0,.5);z-index:1" >
              <img src="{{url('icons/spinner2.svg')}}" alt="" style="margin:auto" width="100">
          </div>
      @endif
      <div class="modal-header justify-content-center">
        <!-- necesario loading -->
        
          <div class="modal-title h5 ">
            @if($actionTmp == 'delete')
              @if($count_order == 0)
              ¿Seguro que desea eliminar el registro seleccionado?
              @else
              No es posible eliminar este pedido. Tiene facturas asociadas
              @endif
            @else              
              ¿Seguro que desea restaurar el registro seleccionado?
            @endif
          </div>
      </div>      
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-sm btn_sail btn_sry" data-bs-dismiss="modal" wire:click="clearOrderId()">Cancelar</button>
        @if($count_order == 0)
          @if($actionTmp == 'delete')
          <button type="button" class="btn btn-sm btn_sail btn_pry" data-dismiss="modal" wire:click="delete()">Eliminar</button>
          @else
          <button type="button" class="btn btn-sm btn_sail btn_pry" data-dismiss="modal" wire:click="restore({{$orderIdTmp}})">Restaurar</button>
          @endif
        @endif
        
      </div>
    </div>
  </div>
</div>