<div wire:ignore.self class="modal fade" id="addFeedback" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
  <div class="modal-dialog modal-md" >
    <div class="modal-content" >
		<div class="modal-header justify-content-center">        

		<div class="modal-title h5 justify-self-center" >
		  Feedback          
		</div>

		</div>
		<!-- loading cuando actualizamos edición -->
		<div id="loading_user" class="div_loading loading_update">
			<img src="{{url('icons/loading/dualball.svg')}}" alt="dualball.svg">
		</div>
		<form wire:submit.prevent="submit(Object.fromEntries(new FormData($event.target)))">
			<div class="modal-body" >
			
			  <!-- campo oculto: id -->
			  	<div class="row">
			      	<div class="col-md-12">
			        	{{ Form::label('feed','Valoración')}}
			    	</div>
				    <div class="col-md-12 feed">
						<span onclick="setFeedback(1)"><i class="fa-solid fa-star"></i></span>
				    	<span onclick="setFeedback(2)"><i class="fa-solid fa-star"></i></span>
				    	<span onclick="setFeedback(3)"><i class="fa-solid fa-star"></i></span>
				    	<span onclick="setFeedback(4)"><i class="fa-solid fa-star"></i></span>
				    	<span onclick="setFeedback(5)"><i class="fa-solid fa-star"></i></span>
				        {{Form::hidden('feed',null)}}
				        @error('feed')
				        <p class="text-danger">{{$message}}</p>
				        @enderror
				    </div>
			  	</div>          

			  	<div class="row mtop16">
				    <div class="col">
				        {{ Form::label('description','Descripción')}}
				        {{ Form::textarea('description',null,['class' => 'form-control','wire:model.defer' => 'description','placeholder' => 'Describe tu valoración aquí...'])}}
				        @error('description')
				        <p class="text-danger">{{$message}}</p>
				        @enderror
				    </div>
			  	</div>
		  	
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-sm btn_sail btn_sry" data-bs-dismiss="modal" wire:click.prevent="clear_feedback" style="z-index:2">Cerrar</button>
				<button type="submit" class="btn btn-sm btn_sail btn_pry"  style="z-index:2">Enviar</button>
			</div>
		</form>
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