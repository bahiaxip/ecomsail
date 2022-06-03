<!-- Modal confirmación eliminar usuario -->
<div wire:ignore.self class="modal fade" id="confirmDel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header justify-content-center">
        <div class="modal-title h5 ">¿Seguro que desea eliminar el registro seleccionado?
        </div>
      </div>      
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-sm btn_sail btn_sry" data-bs-dismiss="modal" wire:click="clearUserId()">Cancelar</button>
        <button type="button" class="btn btn-sm btn_sail btn_pry" data-dismiss="modal" wire:click="delete()">Eliminar</button>
      </div>
    </div>
  </div>
</div>