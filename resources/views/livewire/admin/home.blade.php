<div>
    {{-- establecemos title si subcatlist['name'] contiene valor --}}
    @section('title', 'Inicio')

    @section('path')
    {{--
    &nbsp;>&nbsp;
    <li class="list_name">
        <a href="{{ url('admin/categories/1') }}">
            <div class="icon icon_cat"></div>
            <!--<i class="fa-solid fa-columns"></i>--> 
            <span>Categorías</span>
        </a>
    </li>
    <!-- elemento li que será rellenado al pulsar el botón subcategorías de algún 
        elemento del listado categorías -->
    <li class="sublist_name" id="sublist_name">
        
    </li>
    <!-- elemento li que será mostrado al recargar la página en una subcategoría, 
        este elemento li sustituye al anterior al recargar la página -->
    @if($subcatlist['name'])
    &nbsp;>&nbsp;
    <li class="sublist_name">
        <a href="{{ url('admin/categories/'.$filter_type.'/'.$subcatlist['id']) }}" id="subcat">
            <div class="icon icon_subcat"></div>
            <span>{{$subcatlist['name']}}</span>
        </a>
    </li>
    @endif
    --}}
    @endsection
    
    @if(session()->has('message'))
    <div class="container ">
        <div class="alert alert-{{$typealert}}">            
            <h2 >{{session('message') }}</h2>
            @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif
            <script>
                $('.alert').slideDown();
                setTimeout(()=>{ $('.alert').slideUp(); }, 10000);
            </script>
        </div>
    </div>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-md-3 ">
                <div class="card">
                    <div class="card-header" wire:click="set_type_graphic('orders')">
                        Pedidos hoy
                    </div>
                    <div class="card-body">
                        {{$count_orderstoday}}
                    </div>
                </div>
                
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header" wire:click="set_type_graphic('visitors')">
                        Visitas hoy
                    </div>
                    <div class="card-body">
                        {{$visitors_today}}
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header" wire:click="set_type_graphic('cart')">
                        Valor del carrito
                    </div>
                    <div class="card-body">
                        {{floatval(number_format($cart,2,'.',''))}} €
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header" wire:click="set_type_graphic('sales')">
                        Ventas hoy
                    </div>
                    <div class="card-body">
                        {{floatval(number_format($subtotal,2,'.',''))}} € <span>(Imp.excl.)</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mtop16" style="background-color:rgba(255,255,255,.1)">
            <div class="col-12">
                <canvas id="myChart"  style="position: relative; height:100vh; width:100vw"></canvas>
            </div>
            
        </div>
    </div>

</div>
@push('scripts')
<script>
    let totalMonths = @js($total_months);
    let months = @js($months);

let chartJS;

generateGraphic(months,totalMonths);

function generateGraphic(months,totalMonths){

    const ctx = document.getElementById('myChart').getContext('2d');
    chartJS = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: months,
            datasets: [{
                label: 'ventas €',
                data: totalMonths,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    
}
</script>
@endpush
