<div>
	<img src="{{url('images/ecomsail_logo.png')}}" alt="{{public_path('images/ecomsail_logo.png')}}" width="250">
</div>
<div style="font-size:18px;margin-top:10px">
<p >
<span style="font-weight: bold">¡Hola {{$name}}!</span>
</p>
<p>
Ya puedes descargar tu factura del pedido {{$order_name}} incluida en este mensaje o de tu lista de pedidos desde tu panel de usuario.
</p>
<p>
	Para cualquier consulta relacionada con tu pedido puedes hacerla desde la sección de Contacto. Te agradecemos tu confianza en Ecomsail.
</p>
<p>
	Un saludo,
	El equipo de EcomSail
</p>
</div>

<div>
	@if($shared_data->count()!=0)
<?php $sum=0; ?>
<table style="font-size:20px;width:800px;" class="table table-hover">
	<thead style="background:rgba(110,110,110,1);
	color:#FFF;">
		<tr >
			<th style="padding:10px" >ID</th>
			<th >Producto</th>
			<th>Descripción</th>
			<th >Precio</th>
			<th >Cantidad</th>
			<th >Total Producto</th>
		</tr>
	</thead>

	
	<tbody style="background-color:#EEE9E9;text-align:center">
		@foreach($shared_data as $pro)
		<tr>
			<td style="padding:10px">{{$pro->id}}</td>
			<td>{{$pro->title}}</td>

			<td>
			@if($pro->combinations_text != 'null')
				@php
				$text = json_decode($pro->combinations_text) 
				@endphp
				@foreach($text as $t)
				{{$t->name}}:{{$t->value}}
				@endforeach
			@endif
			</td>

			<td>{{$pro->price_unit}}</td>
			<td>{{$pro->quantity}}</td>
			<td>{{$pro->total}}</td>
		</tr>
		<?php 
		$sum=$sum+$pro->total * $pro->quantity;		
		?>
		@endforeach
		@php
		$total_sum=$sum *((100+21)/100);
		@endphp
		<tr>
			<td style="text-align:right;padding:10px" colspan="5">Total Neto</td>
			<td class="suma"><?php echo number_format($sum,0,",","."); ?></td>
		</tr>
		<tr>
			<td style="text-align:right;padding:10px" colspan="5">IVA</td>
			<td><?php echo "21%"; ?></td>
		</tr>
		<tr>
			<td style="text-align:right;padding:10px" colspan="5"><?php echo "Total"; ?></td>
			{{--
			@php
			session()->put(["suma"=>$sum]);
			@endphp
			--}}

			<td><?php echo number_format($total_sum,0,",","."); ?>€</td>
		</tr>
	</tbody>
</table>
@endif
</div>

