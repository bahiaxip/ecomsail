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
                                        Pedido
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
                                        Pago
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
                                            @if($order->selected_address != 0)
                                            {{ $order->get_history_address->name}} {{$order->get_history_address->lastname}}
                                            @else
                                            {{ $order->selected_address }}
                                            @endif
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
                                        <td>
                                            {{ $order->payment_method }}
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