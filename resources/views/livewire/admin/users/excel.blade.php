<div class="container">
    <div class="row">
        <div class="col text-center">
            <div  class="container mt-3" >
                <div class="card">
                    <div class="card-header text-center">
                        <p style="font-size:20px;text-align:center;font-weight:bold">Listado de usuarios</p>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered" >
                            <thead style="border:black 2px solid">
                                <tr>
                                    <th 
                                    style="border:black 2px solid;padding:5px">
                                        Imagen
                                    </th>
                                    <th 
                                    style="border:black 2px solid;padding:5px">
                                        Nick
                                    </th>
                                    <th 
                                    style="border:black 2px solid;padding:5px">
                                        Nombre
                                    </th>
                                    <th 
                                    style="border:black 2px solid;padding:5px">
                                        Apellidos
                                    </th>
                                    <th 
                                    style="border:black 2px solid;padding:5px">
                                        E-Mail
                                    </th>
                                </tr>
                            </thead>
                            <tbody  class="">
                                @foreach($users as $user)
                                <thead  style="border:black 1px solid !important;margin-top: 10px;">
                                <tr>
                                    <td style="border:black 1px solid;text-align:center;vertical-align: middle;padding:5px">
                                        <img width="32" src="{{ 'storage/'.$user->image }}" style="margin:auto;" />
                                    </td>
                                    <td style="margin-top: 14px;padding-top:12px;border:black 1px solid;text-align:center;padding:5px">
                                        {{$user->nick}}
                                    </td>
                                    <td style="margin-top: 14px;padding-top:12px;border:black 1px solid;text-align:center;padding:5px">
                                        {{$user->name}}
                                    </td>
                                    <td style="margin-top: 14px;padding-top:12px;border:black 1px solid;text-align:center;padding:5px">
                                        {{$user->lastname}}
                                    </td>
                                    <td style="margin-top: 14px;padding-top:12px;border:black 1px solid;text-align:center;padding:5px">
                                        {{$user->email}}
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