<p style="font-size:20px">Desde EcomSail le agradecemos su confianza. Ya puede descargar su factura.</p>

<div>
	@if($productos_factura->count()!=0)
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
		@foreach($productos_factura as $pro)
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

