<div class="container">
    <div class="row">
        <div class="col text-center">
            <div  class="container mt-3" >
                <div class="card">
                    <div class="card-header text-center">
                        <p style="font-size:20px;text-align:center;font-weight:bold">
                            Lista de atributos
                        </p>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered" >
                            <thead style="border:black 2px solid">
                                <tr>                                    
                                    <th>
                                       ID
                                    </th>
                                    <th>
                                        Número de pedido
                                    </th>
                                    <th>
                                        Cliente
                                    </th>
                                    <th>
                                        Entrega
                                    </th>
                                    <th>
                                        Productos
                                    </th>
                                    <th>
                                        Total
                                    </th>
                                    <th>
                                        Estado
                                    </th>
                                    <th>
                                        Fecha
                                    </th>                
                                </tr>
                            </thead>
                            <tbody  class="">
                                @foreach($orders as $order)
                                <thead  style="border:black 1px solid !important;margin-top: 10px;">
                                <tr>                                    
                                    <td style="margin-top: 14px;padding-top:12px">
                                        {{$order->id}}
                                    </td>
                                    <td style="margin-top: 14px;padding-top:12px">
                                        {{$order->order_num}}
                                    </td>
                                    <td style="margin-top: 14px;padding-top:12px">
                                        {{$order->get_user->name}}
                                    </td>
                                    <td style="margin-top: 14px;padding-top:12px">
                                        @if($order->location)
                                        {{ $order->get_location->name}}
                                        @else
                                        N/A
                                        @endif
                                    </td>
                                    <td style="margin-top: 14px;padding-top:12px">
                                        {{$order->quantity}}
                                    </td>
                                    <td style="margin-top: 14px;padding-top:12px">
                                        {{$order->total}}
                                    </td>
                                    <td style="margin-top: 14px;padding-top:12px">
                                        @if($order->order_state != 0)
                                        {{ $order->get_state->name }}
                                        @else
                                        N/A
                                        @endif
                                    </td>
                                    <td style="margin-top: 14px;padding-top:12px">
                                        {{$order->created_at}}
                                    </td>

                                    <td style="margin-top: 14px;padding-top:12px;border:black 1px solid;text-align:center">
                                            {{$order->id}}
                                        </td>
                                        <td style="margin-top: 14px;padding-top:12px;border:black 1px solid;text-align:center">
                                            {{$order->order_num}}
                                        </td>
                                        <td style="margin-top: 14px;padding-top:12px;border:black 1px solid;text-align:center">
                                            {{$order->get_user->name}}
                                        </td>
                                        <td style="margin-top: 14px;padding-top:12px;border:black 1px solid;text-align:center">
                                            @if($order->location)
                                            {{ $order->get_location->name}}
                                            @else
                                            N/A
                                            @endif
                                        </td>
                                        <td style="margin-top: 14px;padding-top:12px;border:black 1px solid;text-align:center">
                                            {{$order->quantity}}
                                        </td>
                                        <td style="margin-top: 14px;padding-top:12px;border:black 1px solid;text-align:center">
                                            {{$order->total}}
                                        </td>
                                        <td style="margin-top: 14px;padding-top:12px;border:black 1px solid;text-align:center">
                                            @if($order->order_state != 0)
                                            {{ $order->get_state->name }}
                                            @else
                                            N/A
                                            @endif
                                        </td>
                                        <td style="margin-top: 14px;padding-top:12px;border:black 1px solid;text-align:center">
                                            {{$order->created_at}}
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