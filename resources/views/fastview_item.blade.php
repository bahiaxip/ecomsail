<!-- Modal confirmación eliminar usuario -->
<div wire:ignore.self class="modal fade" id="fastview" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      {{--
      @if(!$prodIdTmp)
          <div style="display: flex;width:100%;height:100%;position:absolute;background-color: rgba(0,0,0,.5);z-index:1" >
              <img src="{{url('icons/spinner2.svg')}}" alt="" style="margin:auto" width="100">
          </div>
      @endif
      --}}
      <div class="modal-header justify-content-center">
        
      </div>      
      <div class="modal-footer justify-content-center">

        <button type="button" class="btn btn-sm  btn-secondary" data-bs-dismiss="modal" wire:click="clearProdId()">Cancelar</button>
        
      </div>
    </div>
  </div>
</div>