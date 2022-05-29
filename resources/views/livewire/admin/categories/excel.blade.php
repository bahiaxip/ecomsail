<div class="container">
    <div class="row">
        <div class="col text-center">
            <div  class="container mt-3" >
                <div class="card">
                    <div class="card-header text-center">
                        <p style="font-size:20px;text-align:center;font-weight:bold">Listado de categorías</p>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered" >
                            <thead style="border:black 2px solid">
                                <tr>
                                    <th>Imagen</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>                
                                </tr>
                            </thead>
                            <tbody  class="">
                                @foreach($categories as $cat)
                                <thead  style="border:black 1px solid !important;margin-top: 10px;">
                                <tr>
                                    
                                    <td style="margin-top: 14px;padding-top:12px">
                                        @if($cat->image)
                                        <img width="32" src="{{ url('storage/'.$cat->image) }}"/>
                                        @else
                                        <img src="{{ public_path('/icons/categories.png') }}" alt="{{ $cat->file_name }}" width="32">
                                        @endif
                                    </td>
                                    <td style="margin-top: 14px;padding-top:12px">
                                        {{$cat->name}}
                                    </td>
                                    <td style="margin-top: 14px;padding-top:12px">
                                        {!!$cat->description!!}
                                    </td>
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