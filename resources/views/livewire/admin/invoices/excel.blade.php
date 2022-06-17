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
                            <thead style="border:black 2px solid">
                                <tr>                                    
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Nombre
                                    </th>
                                    <th>
                                        Neto
                                    </th>
                                    <th>
                                        IVA
                                    </th>                                    
                                    <th>
                                        Total
                                    </th>
                                    <th>
                                        Productos
                                    </th>                                    
                                    <th>
                                        Fecha
                                    </th>                
                                </tr>
                            </thead>
                            <tbody  class="">
                                @foreach($invoices as $invoice)
                                <thead  style="border:black 1px solid !important;margin-top: 10px;">
                                    <tr>                                    
                                        <td style="margin-top: 14px;padding-top:12px">
                                            {{$invoice->id}}
                                        </td>
                                        <td style="margin-top: 14px;padding-top:12px">
                                            {{ $invoice->get_order->get_address->name}} {{ $invoice->get_order->get_address->lastname}}
                                        </td>
                                        <td style="margin-top: 14px;padding-top:12px">
                                            {{ $invoice->net }}
                                        </td>
                                        <td style="margin-top: 14px;padding-top:12px">
                                            {{ $invoice->vat }}
                                        </td>                                        
                                        <td style="margin-top: 14px;padding-top:12px">
                                            {{$invoice->total}}
                                        </td>
                                        <td style="margin-top: 14px;padding-top:12px">
                                            {{$invoice->get_order->quantity}}
                                        </td>
                                        <td style="margin-top: 14px;padding-top:12px">
                                            {{$invoice->created_at}}
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