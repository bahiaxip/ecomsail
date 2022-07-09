<!-- Modal confirmación eliminar usuario -->
<div wire:ignore.self class="modal fade" id="confirmDel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      @if(!$invoiceIdTmp)
          <div class="div_loading loading_edit">
              <img src="{{url('icons/loading/dualball.svg')}}" alt="dualball.svg">
          </div>
      @endif
      <div class="modal-header justify-content-center">
        <!-- necesario loading -->
        @if($actionTmp == 'restore')
          <div class="modal-title h5 ">
            @if($count_invoice == 0)
            ¿Seguro que desea restaurar el registro seleccionado?
            @else
            No es posible restaurar esta factura. No tiene un pedido asociado
            @endif
          </div>
        @else
          <div class="modal-title h5 ">            
            ¿Seguro que desea eliminar el registro seleccionado?
          </div>
        @endif
      </div>      
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-sm btn_sail btn_sry" data-bs-dismiss="modal" wire:click="clearOrderId()">Cancelar</button>
        @if($count_invoice == 0)
            @if($actionTmp == 'delete')
            <button type="button" class="btn btn-sm btn_sail btn_pry" data-dismiss="modal" wire:click="delete()">Eliminar</button>
            @else
            <button type="button" class="btn btn-sm btn_sail btn_pry" data-dismiss="modal" wire:click="restore({{$invoiceIdTmp}})">Restaurar</button>
            @endif

        @endif
        
      </div>
    </div>
  </div>
</div>