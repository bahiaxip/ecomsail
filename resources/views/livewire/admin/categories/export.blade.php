<div class="container">
        <div class="row">
            <div class="col text-center">
                <div  class="container mt-3" >

                    <div class="card">
                        <div class="card-header text-center">
                            <p style="font-size:20px;text-align:center;font-weight:bold">Lista de categorías</p>
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
                                    </tr>                                
                                <tbody  class="">

                                    @foreach($categories as $cat)
                                    <tr>
                                        <td style="margin-top: 14px;padding-top:12px;border:black 1px solid;text-align:center">
                                            <img width="32" src="{{ 'storage/'.$cat->image }}"/>
                                        </td>
                                        <td style="margin-top: 14px;padding-top:12px;border:black 1px solid;text-align:center">
                                            {{$cat->name}}
                                        </td>
                                        <td style="margin-top: 14px;padding-top:12px;border:black 1px solid;text-align:center">
                                            {!!$cat->description!!}
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