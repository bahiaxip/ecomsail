<div class="container">
        <div class="row">
            <div class="col text-center">
                <div  class="container mt-3" >

                    <div class="card">
                        <div class="card-header text-center">
                            <p style="font-size:20px;text-align:center;font-weight:bold">Lista de productos</p>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered" >
                                    <tr>
                                        <th 
                                        style="border:black 2px solid">
                                            Imagen
                                        </th>
                                        <th 
                                        style="border:black 2px solid">
                                            Nombre
                                        </th>
                                        <th 
                                        style="border:black 2px solid">
                                            Descripción
                                        </th>
                                        <th 
                                        style="border:black 2px solid">
                                            Categoría
                                        </th>
                                        <th 
                                        style="border:black 2px solid">
                                            Precio
                                        </th>
                                        <th 
                                        style="border:black 2px solid">
                                            Stock
                                        </th>
                                        <th 
                                        style="border:black 2px solid">
                                            Cod.Ref.
                                        </th>
                                            
                                    </tr>                                
                                <tbody  class="">

                                    @foreach($products as $prod)
                                    <tr>
                                        <td style="margin-top: 14px;padding-top:12px;border:black 1px solid;text-align:center">
                                            @if($prod->image)
                                            <img width="32" src="{{ 'storage/'.$prod->image }}"/>
                                            @else
                                            <img width="32" src="{{ public_path('/images/bolsas-de-compra.png') }}"/>
                                            @endif
                                        </td>
                                        <td style="margin-top: 14px;padding-top:12px;border:black 1px solid;text-align:center">
                                            {{$prod->name}}
                                        </td>
                                        <td style="margin-top: 14px;padding-top:12px;border:black 1px solid;text-align:center">
                                            {!!$prod->detail!!}
                                        </td>
                                        <td style="margin-top: 14px;padding-top:12px;border:black 1px solid;text-align:center">
                                            {{$prod->cat->name}}
                                        </td>
                                        <td style="margin-top: 14px;padding-top:12px;border:black 1px solid;text-align:center">
                                            {{$prod->price}}
                                        </td>
                                        <td style="margin-top: 14px;padding-top:12px;border:black 1px solid;text-align:center">
                                            {{$prod->stock}}
                                        </td>
                                        <td style="margin-top: 14px;padding-top:12px;border:black 1px solid;text-align:center">
                                            {{$prod->code}}
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