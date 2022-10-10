<div wire:ignore.self class="modal fade edit_modal" id="userRole" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content" >
      <div class="modal-header justify-content-center">
        
        <div class="modal-title h5 justify-self-center" >
          Editar Usuario
          <p style="font-size:12px;text-align:center">E-Mail: {{$email}}</p>
        </div>
        
      </div>
      <!-- loading cuando comienza la edición -->
      @if(!$user_id)
        <div  class="div_loading loading_edit">
          <img src="{{url('ics/loading/dualball.svg')}}" alt="dualball.svg">
        </div>
      @else
          <!-- loading cuando actualizamos edición -->
          <div id="loading2" class="div_loading loading_update">
            <img src="{{url('ics/loading/dualball.svg')}}" alt="dualball.svg">
          </div>
          @if($roles && $role)
          <div class="modal-body" >
              <!-- campo oculto: id -->
              <input type="hidden" name="id" wire:model="user_id">
              <div class="row ">
                  <div class="col-md-6 {{$role}}">
                      {{Form::label('role','Rol')}}
                      {{Form::select('role',$roles,null,['class' => 'form-select','wire:model' => 'role'])}}
                      
                      @error('role')
                      <p class="text-danger">{{$message}}</p>
                      @enderror
                  </div>
              </div>
          </div>
          @endif
      @endif
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn_sail btn_sry" data-bs-dismiss="modal" wire:click.prevent="clear()" style="z-index:2">Cerrar</button>
        <button type="button" class="btn btn-sm btn_sail btn_pry" wire:click.prevent="update_roles()" id="btn_update2" style="z-index:2">Actualizar</button>
      </div>
    </div>
  </div>
</div>
<script>
  //mostramos el loading duplicado al actualizar y ocultamos al comenzar el método update()
  let btn_update2=document.querySelector('#btn_update2');
  if(btn_update2){
    btn_update2.addEventListener('click',()=>{
      let loading = document.querySelector('#loading');
      loading2.style.display='flex';
      console.log("loading2")
    })
  }
</script>