<!-- Modal confirmación eliminar usuario -->
<div wire:ignore.self class="modal fade2" id="productFeedback" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content">
      {{--
      @if(!$prodIdTmp)
          <div style="display: flex;width:100%;height:100%;position:absolute;background-color: rgba(0,0,0,.5);z-index:1" >
              <img src="{{url('ics/spinner2.svg')}}" alt="" style="margin:auto" width="100">
          </div>
      @endif
      --}}
      <div class="modal-header justify-content-center">
        Valoraciones
      </div>
      @if($total_feed_products)
        <div class="modal-body">
            @foreach($total_feed_products as $totalfeed)
                <div class="row">
                    <div class="col">
                        {{$totalfeed->product->name}} <span>{{$totalfeed->feedback}}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        {{$totalfeed->description}}
                    </div>                    
                </div>
            @endforeach
        </div>
      @endif
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal" >Cancelar</button>
      </div>
    </div>
  </div>
</div>