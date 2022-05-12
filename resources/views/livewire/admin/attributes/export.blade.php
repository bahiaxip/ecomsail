<div class="container">
        <div class="row">
            <div class="col text-center">
                <div  class="container mt-3" >
                    <div class="card">
                        <div class="card-header text-center">
                            <p style="font-size:20px;text-align:center;font-weight:bold">
                                @if($attr)
                                Lista de valores asociados al atributo {{$attributes[0]->parentattr->name;}}
                                @else
                                Lista de atributos
                                @endif
                            </p>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered" >
                                    <tr>
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

                                    @foreach($attributes as $at)
                                    <tr>                                        
                                        <td style="margin-top: 14px;padding-top:12px;border:black 1px solid;text-align:center">
                                            {{$at->name}}
                                        </td>
                                        <td style="margin-top: 14px;padding-top:12px;border:black 1px solid;text-align:center">
                                            {!!$at->description!!}
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