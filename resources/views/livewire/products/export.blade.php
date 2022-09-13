{{--
<div class="row" style="font-size:15px;width:100%">
    <div class="col-6">
        <span style ="text-align: left;">Pedido:{{$order_name}}</span>    
    </div>
    <div class="col-6">
        <span style ="text-align: left;">Fecha:{{$date}}</span>
    </div>
</div>
--}}
<div style="width:100%;margin:auto">
    <div class="" style="padding:10px" >
        <img src="{{public_path('images/ecomsail_logo.png')}}" alt="{{public_path('images/ecomsail_logo.png')}}" width="100">
        <span style="float:right;font-size:8px;margin:10px 2px">E-Mail: bahiaxip@hotmail.com</span>
    </div>
    <div style="font-size:10px;width:100%;margin:auto;">
        <div style="float:left;padding:0 5px">
            <span style ="text-align: left;">Pedido:{{$order_name}}</span>    
        </div>
        <div style="float:right;padding:0px 5px">
            <span style ="text-align: right;">Fecha:{{$date}}</span>
        </div>
    </div>

    <div style="width:100%;display:block;clear:left">
        @if($orders_items->count()!=0)
        <?php $sum=0; ?>
        <table style="font-size:14px;width:100%" class="table table-hover">
            <thead style="background:rgba(110,110,110,1);
            color:#FFF;">
                <tr >
                    <th style="padding:2px" >REF.</th>
                    <th style="padding:2px">Imagen</th>
                    <th style="padding:2px">Producto</th>
                    <th style="padding:2px">Descripción</th>
                    <th style="padding:2px">Cantidad</th>
                    <th style="padding:2px">Precio</th>
                    <th style="padding:2px">Total Producto</th>
                </tr>
            </thead>

            
            <tbody style="background-color:#EEE9E9;text-align:center">
                @foreach($orders_items as $pro)
                <tr>
                    <td style="padding:10px">{{$pro->id}}</td>
                    <td>
                        <img src="{{public_path($pro->path_tag.$pro->image)}}" width="32" alt="" style="padding:4px">
                    </td>
                    <td style="padding:2px">{{$pro->title}}</td>

                    <td style="padding:2px">
                    @if($pro->combinations_text != 'null')
                        @php
                        $text = json_decode($pro->combinations_text) 
                        @endphp
                        @foreach($text as $t)
                        {{$t->name}}:{{$t->value}}
                        @endforeach
                    @endif
                    </td>
                    <td style="padding:2px">{{$pro->quantity}}</td>
                    <td style="padding:2px">{{$pro->price_unit}}</td>
                    <td style="padding:2px">{{$pro->total}}</td>
                </tr>
                <?php 
                $sum=$sum+$pro->total * $pro->quantity;     
                ?>
                @endforeach
                @php
                $iva = 21;

                $total_sum=$sum *((100+21)/100);
                $concepto_iva = $total_sum - $sum;
                @endphp
                <tr>
                    <td style="text-align:right;padding:10px" colspan="6">
                        Neto
                    </td>
                    <td class="suma"><?php echo number_format($sum,2,"."," "); ?></td>
                </tr>
                <tr>
                    <td style="text-align:right;padding:10px" colspan="6">IVA {{$iva}}%</td>
                    <td>{{number_format($concepto_iva,2,'.',' ')}}</td>
                </tr>
                <tr>
                    <td style="text-align:right;padding:10px" colspan="6">
                        Total
                    </td>
                    {{--
                    @php
                    session()->put(["suma"=>$sum]);
                    @endphp
                    --}}

                    {{--<td><?php echo number_format($total_sum,0,",","."); ?>€</td>--}}
                    <td>{{number_format($total_sum,2,'.','')}}€</td>
                </tr>
            </tbody>
        </table>
        @endif
    </div>
</div>

