<!-- Modal confirmación eliminar usuario -->
<div wire:ignore.self class="modal fade" id="massiveConfirm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header justify-content-center">
        <!-- necesario loading -->
        
            <div class="modal-title h5 ">¿Seguro que desea aplicar la acción a los registros seleccionados?
          </div>
        
        <!--    <div class="modal-title h5 ">No es posible eliminar este atributo porque tiene productos asociados
          </div>  -->
        
      </div>      
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-sm  btn-secondary" data-bs-dismiss="modal" >Cancelar</button>
        
          <button type="button" class="btn btn-sm btn-primary text-white" data-dismiss="modal" wire:click="set_action_massive(selected_list,actionSelected)" >Aplicar</button>
        
      </div>
    </div>
  </div>
</div>