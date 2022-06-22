<div>
    @include('layouts.nav_user')
    
    <div class="container">
        <div class="row mtop32 address">
            <div class="col-md-8 shadow">
                <div class="address_header">
                    <h5>
                        <i class="fa-solid fa-bag-shopping"></i> FAVORITOS
                    </h5>                    
                </div>
                @if($favorites)
                
                <div class="empty_address alert alert-success">
                    <h5>Aun no existen direcciones</h5>
                </div>
                
                @else
                <div class="cart_orders_items">
                    <table class="table_orders_items">
                        <thead>
                            <tr>                                
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>

                            
                            

                            
                        </tbody>
                    </table>
                </div>
                @endif
                
                
                
            </div>
            <div class="col-md-4 shadow">
                
            </div>
        </div>
    </div>
</div>
