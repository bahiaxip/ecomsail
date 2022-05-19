<div class="confirmComb"  id="confirmComb">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header justify-content-center">
            <div class="modal-title h5 ">¿Seguro que desea eliminar el registro seleccionado?
            </div>
          </div>      
          <div class="modal-footer justify-content-center">
            <button type="button" class="btn btn-sm  btn-secondary" onclick="confirmComb()">Cancelar</button>
            <button type="button" class="btn btn-sm btn-primary text-white" id="btn_delete" wire:click="deleteComb(combIdTmp)">Eliminar</button>
          </div>
        </div>
    </div>
</div>