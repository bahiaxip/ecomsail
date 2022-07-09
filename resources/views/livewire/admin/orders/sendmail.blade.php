<!-- Modal confirmación eliminar usuario -->
<div wire:ignore.self class="modal fade" id="sendModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header justify-content-center">
            <div class="modal-title h5">
                Envío de correo electrónico
            </div>
            
        </div>
        <!-- loading cuando actualizamos edición -->
        <div id="loading_sendemail" style="display: none;width:100%;height:100%;position:absolute;background-color: rgba(0,0,0,.5);z-index:999" >
            <img src="{{url('icons/loading/dualball.svg')}}" alt="dualball.svg" style="margin:auto" width="80">
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <label for="sendEmail">Email</label>
                    <div class="input-group">
                        
                        <span class="input-group-text">
                            <i class="fa-solid fa-keyboard"></i>
                        </span>
                        <input type="text" name="sendEmail" id="sendEmail" class="form-control form-control-sm" wire:model="email_export">
                    </div>
                    @error('email_export')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="row justify-content-around mtop16">
                <div class="col-md-12">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="checkpdf"  value="" wire:model="checkpdf">
                        <label class="form-check-label" for="checkpdf">PDF</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" id="checkexcel" value="" wire:model="checkexcel">
                        <label class="form-check-label" for="checkexcel">Excel</label>
                    </div>
                </div>
                @if(session()->has('check'))
                    <div class="text-danger ">{{session('check')}}</div>
                @endif
            </div>
        </div>
      <div class="modal-footer justify-content-center">
          <button type="button" class="btn btn-sm btn_sail btn_sry" data-bs-dismiss="modal" wire:click="clearOrderId()">Cancelar</button>
          
          <button type="button" class="btn btn-sm btn_sail btn_pry" data-dismiss="modal" wire:click="sendEmail" id="btn_sendemail_attr">Enviar</button>
        
      </div>
    </div>
  </div>
</div>
<script>
  //mostramos el loading duplicado al actualizar y ocultamos al comenzar el método update()
  let btn_sendemail=document.querySelector('#btn_sendemail_attr');
  if(btn_sendemail){
    btn_sendemail.addEventListener('click',()=>{
      let loading = document.querySelector('#loading_sendemail');
      loading.style.display='flex';
    })
  }
</script>