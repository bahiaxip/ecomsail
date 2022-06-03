<div class="container">
    <div class="row">
        <div class="col text-center">
            <div  class="container mt-3" >
                <div class="card">
                    <div class="card-header text-center">
                        <p style="font-size:20px;text-align:center;font-weight:bold">Listado de productos</p>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered" >
                            <thead style="border:black 2px solid">
                                <tr>
                                    <th>Imagen</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Categoría</th>
                                    <th>Precio</th>
                                    <th>Stock</th>
                                    <th>Cod.Ref.</th>
                                </tr>                                
                            </thead>
                            <tbody>
                                @foreach($products as $prod)
                                <tr>
                                    <td style="margin-top: 14px;padding-top:12px">
                                    @if($prod->image)                                    
                                        <img width="32" src="{{ 'storage/'.$prod->image }}"/>
                                    @else
                                        <img width="32" src="{{ public_path('/images/bolsas-de-compra.png') }}"/>
                                    </td>
                                    @endif
                                    <td style="margin-top: 14px;padding-top:12px">{{$prod->name}}
                                    </td>
                                    <td style="margin-top: 14px;padding-top:12px">{!!$prod->short_detail!!}
                                    </td>
                                    <td style="margin-top: 14px;padding-top:12px">{!!$prod->cat->name!!}
                                    </td>
                                    <td style="margin-top: 14px;padding-top:12px">{!!$prod->price!!}
                                    </td>
                                    <td style="margin-top: 14px;padding-top:12px">{!!$prod->stock!!}
                                    </td>
                                    <td style="margin-top: 14px;padding-top:12px">{!!$prod->code!!}
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                        </table>                            
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>