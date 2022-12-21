<div class="container">
        <div class="row">
            <div class="col text-center">
                <div  class="container mt-3" >
                    <div class="card">
                        <div class="card-header text-center">
                            <p style="font-size:20px;text-align:center;font-weight:bold">
                                Lista de pedidos
                            </p>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered" >
                                    <tr>
                                        <th 
                                        style="border:black 2px solid">
                                            ID
                                        </th>
                                        <th 
                                        style="border:black 2px solid">
                                            Pedido
                                        </th>
                                        <th 
                                        style="border:black 2px solid">
                                            Cliente
                                        </th>
                                        <th 
                                        style="border:black 2px solid">
                                            Entrega
                                        </th>
                                        <th 
                                        style="border:black 2px solid">
                                            Productos
                                        </th>
                                        <th 
                                        style="border:black 2px solid">
                                            Total
                                        </th>
                                        <th style="border:black 2px solid">
                                            Pago
                                        </th>
                                        <th 
                                        style="border:black 2px solid">
                                            Estado
                                        </th>
                                        <th 
                                        style="border:black 2px solid">
                                            Fecha
                                        </th>
                                    </tr>                                
                                <tbody  class="">

                                    @foreach($orders as $order)
                                    <tr>                                        
                                        <td style="margin-top: 14px;padding-top:12px;border:black 1px solid;text-align:center">
                                            {{$order->id}}
                                        </td>
                                        <td style="margin-top: 14px;padding-top:12px;border:black 1px solid;text-align:center">
                                            {{$order->order_num}}
                                        </td>
                                        <td style="margin-top: 14px;padding-top:12px;border:black 1px solid;text-align:center">
                                            @if($order->selected_address != 0)
                                            {{ $order->get_history_address->name}} {{$order->get_history_address->lastname}}
                                            @else
                                            N/A
                                            @endif
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
                                            {{ $order->payment_method }}
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
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>