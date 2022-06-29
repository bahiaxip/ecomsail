<div style="position:relative;height:100vh" class="edit_user">
  @section('title','Editar usuario')
  <!-- loading cuando actualizamos edición -->
    <div id="loading"  >
      <img src="{{url('icons/loading/dualball.svg')}}" alt="" style="margin:auto" width="80">
    </div>
    <div class="message_opacity" style="opacity:0;position:absolute;top:120px;left:50%;transform:translate(-50%,-50%);z-index:1">
        <div class="alert alert-{{$typealert}}" >            
            <h2 style="font-size:1em;text-align:center">{{session('message') }}</h2>
            @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif
            <script>
                
            </script>
        </div>
    </div>
    @include('layouts.nav_user')
    <!-- loading cuando comienza la edición (al no ser modal en esta vista no es necesario) -->
    @if(!$user_id)
    <div style="display: flex;width:100%;height:100%;position:absolute;background-color: rgba(0,0,0,.5);z-index:999" >
      <img src="{{url('icons/loading/dualball.svg')}}" alt="" style="margin:auto" width="80">
    </div>
    @endif

    

    <div class="container" x-data="cart()" x-init="start()" x-cloak>
        <div class="row">
          <div class="col-12 mtop16">
                <div class="header">
                  @if(!$thumb)
                  <!--
                  <img src="{{url('images/default2.png')}}" alt="" width="64" style="position:absolute;left:10px;margin-top:5px">
                -->
                  <div style="position:absolute;left:10px;margin-top:5px;font-size:3rem">
                      <i class="fa-solid fa-user"  ></i>  
                  </div>
                  
                  @else
                  <div class="img_user" style="background-image:url({{url('storage/'.$thumb)}})">
                      <!--<img src="{{url('storage/'.$thumb)}}" alt="" style="" class="img_user">-->
                  </div>
                  @endif
                  <div class="title">
                    <h5>Editar Usuario</h5>
                    <p><span>E-Mail:</span> {{$email}}</p>
                  </div>
                  
                </div>

                

                <div class="modal-body" >
                  
                    <!-- campo oculto: id -->
                    
                    <input type="hidden" name="id" wire:model="user_id">
                    <div class="row ">
                        <div class="col-md-6">
                            <label for="nick">Nick</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                  <i class="fa-solid fa-keyboard"></i>
                                </span>
                                <input type="text" name="nick" id="nick" class="form-control" wire:model="nick"/>
                            </div>
                            @error('nick')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    
                        <div class="col-md-6">
                            <label for="name">Nombre</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                  <i class="fa-solid fa-keyboard"></i>
                                </span>
                                <input type="text" name="name" id="name" class="form-control" wire:model="name"/>
                            </div>
                            @error('name')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row mtop16">
                        <div class="col-md-6">
                            <label for="surname">Apellidos</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                  <i class="fa-solid fa-keyboard"></i>
                                </span>
                                <input type="text" name="surname" id="surname" class="form-control" wire:model="surname"/>
                            </div>
                            @error('surname')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="phone">Teléfono</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                  <i class="fa-solid fa-keyboard"></i>
                                </span>
                                <input type="text" name="phone" id="phone" class="form-control" wire:model="phone"/>
                            </div>
                            @error('phone')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="row mtop16">
                      <div class="col-md-6">
                          <label for="profile_image" >Imagen</label>
                          {!! Form::file('profile_image',['class' =>'form-control','id' => $iteration,'accept' =>'image/*','wire:model' => 'profile_image'])!!}
                          @error('profile_image')
                          <p class="text-danger">{{$message}}</p>
                          @enderror
                          <div wire:loading wire:target="profile_image">
                              <img src="{{url('icons/loading/dualball.svg')}}" alt="" style="margin:auto" width="32">
                          </div>
                      </div>
                      <div class="col-md-6">
                          <!-- countries con la variable all -->
                          <label for="country">País</label>
                          {{--  {{ Form::select('country',$countries,null,['class' => 'form-select','wire:model' => 'country','wire:change' => 'testCountry'])}} --}}
                          <select name="country" id="" class="form-select" wire:model="country" >
                            <option value="0">Seleccione...</option>
                            @foreach($countries as $c)
                                <option value="{{$c['id']}}">
                                    {!!$c['icon_code']!!} 
                                    {!!$c['nombre']!!}
                              </option>
                            @endforeach
                          </select>
                            @error('country')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                      </div>
                    </div>
                    <div class="row" wire:loading wire:target="country">
                        <div class="col-md-12 justify-content-center"   style="position:absolute;background-color:rgba(255,255,255,.8);width:99%;min-height:20px;margin:auto;">
                            <img src="{{url('icons/loading/dualball.svg')}}" alt="" style="margin:20px auto" width="32">
                        </div>
                    </div>

                    @if($country==58)
                    <div class="row mtop16">
                        
                        <div class="col-md-6">
                            <label for="province">Provincia</label>

                            <select name="province" wire:model="province" class="form-select">
                              <option value="0">Seleccione...</option>
                              @foreach($provinces_list as $prov)
                              <option value="{{$prov['provincia_id']}}">{{$prov['nombre']}}</option>
                              @endforeach
                            </select>
                            
                            @error('province')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="city">Ciudad/Municipio</label>
                            <!-- con wire:loading,wire:loading.remove,... podemos mantener la espera
                              a la devolución de datos con wire:target podemos indicar la variable o 
                              método al que escuchar-->                    
                            <select name="city" wire:model="city"  wire:loading.attr="disabled"  wire:target="province"  class="form-select">
                                  <option value="0" >Seleccione...</option>
                                  @foreach($municipies_list as $mun)
                                  @if($mun['provincia_id']==$province)
                                  <option value="{{$mun['municipio_id']}}" >{{$mun['nombre']}}</option>
                                  @endif
                                  @endforeach
                              
                            </select>
                              
                            

                            {{--
                            <select name="city" wire:model="city" wire:loading.remove wire:target="provinces" class="form-select">
                              <option value="" >Seleccione...</option>
                              @foreach($municipies_list as $mun)
                              @if($mun['provincia_id']==$provinces)
                              <option value="">{{$mun['nombre']}}</option>
                              @endif
                              @endforeach
                            </select>
                            --}}

                            
                            @error('city')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                            <div wire:loading wire:target="province">
                              <img src="{{url('icons/loading/dualball.svg')}}" alt="" style="margin:auto" width="32">
                          </div>
                        </div>
                    </div>
                    @endif
                     <!-- ignoramos pass e email en la edición por seguridad -->
                    <!--
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="text" name="email" id="email" class="form-control" wire:model="email"/>
                      @error('email')
                      <p class="text-danger">{{$message}}</p>
                      @enderror
                    </div>
                    -->
                    <!--
                    <div class="form-group" x-data="toggle2()">
                      <label>Imagen</label>
                      <div class="custom-file">              
                        <input type="file" class="custom-file-input" name="file" id="customFile" x-on:change="testFile($event)" wire:model="file">
                        <label class="custom-file-label" for="customFile" data-browse="Seleccionar">Subir Archivo</label>          
                      </div>

                      <p class="text-danger text-center" x-text="errorFile"></p>
                    </div>-->
                  
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-sm btn_sail btn_pry" wire:click.prevent="update()" id="btn_update" style="z-index:2">Actualizar</button>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer')
</div>
<script>
  //mostramos el loading duplicado al actualizar y ocultamos al comenzar el método update()
  let btn_update=document.querySelector('#btn_update');
  if(btn_update){
    btn_update.addEventListener('click',()=>{
      let loading = document.querySelector('#loading');
      loading.style.display='flex';
    })
  }
</script>