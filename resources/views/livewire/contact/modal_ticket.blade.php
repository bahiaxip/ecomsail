<div wire:ignore.self class="modal fade edit_modal" id="addTicket" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content" >
      <div class="modal-header justify-content-center">        
        
        <div class="modal-title h5 justify-self-center" >
          Crear ticket          
        </div>
        
      </div>      
      <!-- loading cuando actualizamos edición -->
      <div id="loading_user" class="div_loading loading_update">
        <img src="{{url('icons/loading/dualball.svg')}}" alt="dualball.svg">
      </div>
      <div class="modal-body" >
        
          <!-- campo oculto: id -->
          <div class="row ">
              <div class="col-md-6">
                {{ Form::label('name','Nombre')}}
                {{ Form::text('name',null,['class' => 'form-control','wire:model' => 'name'])}}
                @error('name')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            
            <div class="col-md-6">
                {{ Form::label('lastname','Apellidos')}}
                {{ Form::text('lastname',null,['class' => 'form-control','wire:model' => 'lastname'])}}
                @error('lastname')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            
          </div>
          <div class="row mtop16">
              <div class="col-md-6">
                {{ Form::label('email','E-Mail')}}
                {{ Form::text('email',null,['class' => 'form-control','wire:model' => 'email'])}}
                @error('email')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="col-md-6">
                {{ Form::label('subject','Asunto')}}
                {{ Form::text('subject',null,['class' => 'form-control','wire:model' => 'subject'])}}
                @error('subject')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
          </div>

          <div class="row mtop16">
            <div class="col">
                {{ Form::label('message','Mensaje')}}
                {{ Form::textarea('message',null,['class' => 'form-control','wire:model' => 'message'])}}
                @error('message')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
          </div>
          
        	
        	
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn_sail btn_sry" data-bs-dismiss="modal" wire:click.prevent="clear()" style="z-index:2">Cerrar</button>
        <button type="button" class="btn btn-sm btn_sail btn_pry" wire:click.prevent="add_ticket()" id="btn_update_user" style="z-index:2">Crear</button>
      </div>
    </div>
  </div>
</div>
<script>
  //mostramos el loading duplicado al actualizar y ocultamos al comenzar el método update()
  let btn_update_user=document.querySelector('#btn_update_user');
  if(btn_update_user){

    btn_update_user.addEventListener('click',()=>{
      console.log("no llega");
      let loading_user = document.querySelector('#loading_user');
      loading_user.style.display='flex';
    })
  }
</script>