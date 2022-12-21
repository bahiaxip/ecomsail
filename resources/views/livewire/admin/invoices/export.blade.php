<div class="container">
        <div class="row">
            <div class="col text-center">
                <div  class="container mt-3" >
                    <div class="card">
                        <div class="card-header text-center">
                            <p style="font-size:20px;text-align:center;font-weight:bold">
                                Lista de facturas
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
                                            Nombre
                                        </th>
                                        <th 
                                        style="border:black 2px solid">
                                            Neto
                                        </th>
                                        <th 
                                        style="border:black 2px solid">
                                            IVA
                                        </th>                                        
                                        <th 
                                        style="border:black 2px solid">
                                            Total
                                        </th>
                                        <th style="border:black 2px solid">
                                            Productos
                                        </th>                                        
                                        <th 
                                        style="border:black 2px solid">
                                            Fecha
                                        </th>
                                    </tr>                                
                                <tbody  class="">

                                    @foreach($invoices as $invoice)
                                    <tr>                                        
                                        <td style="margin-top: 14px;padding-top:12px;border:black 1px solid;text-align:center">
                                            {{$invoice->id}}
                                        </td>
                                        <td style="margin-top: 14px;padding-top:12px;border:black 1px solid;text-align:center">
                                            {{ $invoice->get_order->get_history_address->name}} {{ $invoice->get_order->get_history_address->lastname}}
                                        </td>
                                        <td style="margin-top: 14px;padding-top:12px;border:black 1px solid;text-align:center">
                                            {{ $invoice->net }}
                                        </td>
                                        <td style="margin-top: 14px;padding-top:12px;border:black 1px solid;text-align:center">
                                            {{ $invoice->vat }}
                                        </td>                                        
                                        <td style="margin-top: 14px;padding-top:12px;border:black 1px solid;text-align:center">
                                            {{$invoice->total}}
                                        </td>
                                        <td style="margin-top: 14px;padding-top:12px;border:black 1px solid;text-align:center">
                                            {{ $invoice->get_order->quantity }}
                                        </td>                                        
                                        <td style="margin-top: 14px;padding-top:12px;border:black 1px solid;text-align:center">
                                            {{$invoice->created_at}}
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