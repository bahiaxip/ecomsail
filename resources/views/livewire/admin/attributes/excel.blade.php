<div class="container">
    <div class="row">
        <div class="col text-center">
            <div  class="container mt-3" >
                <div class="card">
                    <div class="card-header text-center">
                        <p style="font-size:20px;text-align:center;font-weight:bold">
                            @if($attr)
                            Lista de valores asociados al atributo 
                            @else
                            Lista de atributos
                            @endif
                        </p>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered" >
                            <thead style="border:black 2px solid">
                                <tr>                                    
                                    <th>Nombre</th>
                                    <th>Descripción</th>                
                                </tr>
                            </thead>
                            <tbody  class="">
                                @foreach($attributes as $at)
                                <thead  style="border:black 1px solid !important;margin-top: 10px;">
                                <tr>                                    
                                    <td style="margin-top: 14px;padding-top:12px">{{$at->name}}</td>
                                    <td style="margin-top: 14px;padding-top:12px">{!!$at->description!!}</td>
                                </tr>
                            </thead>
                                @endforeach
                            </tbody>
                        </table>                            
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>