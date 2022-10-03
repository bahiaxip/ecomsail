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

    <div class="container home">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header @if($selected_type == 'orders' ) active @endif" wire:click.prevent="set_type_graphic('orders')" >
                        Pedidos
                    </div>
                    <div class="card-body">                        
                        <div class="link_graphics" >
                            <div>
                                {{$count_orderstoday}}
                            </div>
                            <div class="label_today">{{'Pedido'}}@if($count_orderstoday>1 || $count_orderstoday==0 ){{'s'}} @endif hoy
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header @if($selected_type == 'visitors' ) active @endif" wire:click.prevent="set_type_graphic('visitors')">
                        Visitas 
                    </div>
                    <div class="card-body">                        
                        <div class="link_graphics" >
                            <div>
                                {{$visitors_today}}
                            </div>
                            <div class="label_today">{{'Visita'}}@if($visitors_today>1 || $visitors_today == 0){{'s'}} @endif hoy
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header @if($selected_type == 'cart' ) active @endif" wire:click="set_type_graphic('cart')">
                        Valor del carrito
                    </div>
                    <div class="card-body">
                        
                        <div class="link_graphics" >
                            <div>
                                {{floatval(number_format($cart,2,'.',''))}} €
                            </div>
                            <div class="label_today">{{'Valor'}}@if($cart>1 || $cart == 0){{'es'}} @endif hoy
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header @if($selected_type == 'sales' ) active @endif" wire:click="set_type_graphic('sales')">
                        Ventas
                    </div>
                    <div class="card-body">
                         
                        <div class="link_graphics" >
                            <div>
                                {{floatval(number_format($subtotal,2,'.',''))}} €
                                <span class="label_today">(Imp.excl.)</span>
                            </div>
                            <div class="label_today">{{'Venta'}}@if($subtotal>1 || $subtotal == 0){{'s'}} @endif hoy
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
            <div class="row mtop16 div_chart" style="background-color:rgba(255,255,255,.1);position:relative">
                @if(!$switch_chart)
                <div id="loading" style="display: flex;width:100%;height:100vh;position:absolute;left: 0;background-color: rgba(255,255,255,.1);z-index:999" >
                    <img src="{{url('ics/loading/dualball.svg')}}" alt="" style="margin:auto" width="100">
                </div>
                @else
                <div class="col-12 chart">
                    <canvas id="myChart"   style="position: relative; height:100vh; width:100vw"></canvas>
                </div>
                @endif        
            </div>
        
    </div>

</div>
@push('scripts')
<script>
    let totalMonths = @js($total_months);
    let months = @js($months);

let chartJS;
Chart.defaults.maintainAspectRatio = true;
generateGraphic(months,totalMonths);
console.log("Chart: ",Chart.defaults)
//Chart.defaults.responsive = false;

function generateGraphic(months,totalMonths){

    const ctx = document.getElementById('myChart').getContext('2d');
    chartJS = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: months,
            datasets: [{
                label: 'Pedidos',
                data: totalMonths,
                backgroundColor: [
                    
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                ],
                borderColor: [                    
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 99, 132, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            plugins:{
                legend:{
                    display:true,
                    labels:{
                        //boxWidth por defecto: 40
                        //boxWidth: 50,
                        //color text por defecto negro
                        //color:'rgba(54, 162, 235, 1)',
                        
                        /*
                        generateLabels: function(chart) {
                            labels = Chart.defaults.global.legend.labels.generateLabels(chart);
                            for (var key in labels) {
                              labels[key].text = "Hello World";
                              labels[key].fillStyle  = "rgba(133, 4, 12, 0.7)";
                              labels[key].strokeStyle = "rgba(33, 44, 22, 0.7)"; 
                            }
                            return labels;
                        }
                        */
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: false,
                },
            }
        }
    });
    
}
</script>
@endpush
