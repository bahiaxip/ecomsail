<!-- Modal confirmación eliminar usuario -->
<div wire:ignore.self class="modal fade method_payment" id="payment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">            
      <div class="modal-header justify-content-center">
          <div class="modal-title h5 ">
              Métodos de pago
          </div>        
      </div>
      <div class="modal-body">
        <button class="btn btn_sry btn_collapse_payment parent collapsed " type="button" data-bs-toggle="collapse" data-bs-target="#collapse_target" aria-expanded="false" aria-controls="collapse_target">
            Tarjeta
            <span style="position:absolute;right:10px">
                <i class="fa-solid"></i>
            </span>
        </button>
        <div class="collapse collapse_parent" id="collapse_target">
            <p>El pago por tarjeta de crédito o débito es un método fiable, rápido y el más utilizado por el usuario. Es posible que sea necesario confirmar la compra desde la aplicación de su banco</p>
            <p class="mtop10">Tipos de tarjeta:</p>
            <ul class="mtop10">
                <li>Visa</li>
                <li>Visa Electron 4B</li>
                <li>Euro 6000</li>
                <li>MasterCard</li>                
                <li>Contrareembolso</li>
            </ul>
        </div>
        <button class="btn btn_sry btn_collapse_payment parent collapsed " type="button" data-bs-toggle="collapse" data-bs-target="#collapse_transfer" aria-expanded="false" aria-controls="collapse_transfer">
            Transferencia bancaria
            <span style="position:absolute;right:10px">
                <i class="fa-solid"></i>
            </span>
        </button>
        <div class="collapse collapse_parent" id="collapse_transfer">
            <p>La transferencia o ingreso en cuenta es el método convencional. Es necesario introducir el número de pedido en el concepto. En caso de pertenecer a entidades distintas la confirmación de la transferencia o ingreso puede demorarse has dos días hábiles, una vez confirmado, se iniciará el proceso de preparación de su pedido.</p>
        </div>
        <button class="btn btn_sry btn_collapse_payment parent collapsed " type="button" data-bs-toggle="collapse" data-bs-target="#collapse_contra" aria-expanded="false" aria-controls="collapse_contra">
            Contrareembolso
            <span style="position:absolute;right:10px">
                <i class="fa-solid"></i>
            </span>
        </button>
        <div class="collapse collapse_parent" id="collapse_contra" >
            El método contrareembolso permite abonar el importe del pedido justo en el momento en que el pedido es entregado. 
            <p class="mtop10">Características del método contrareembolso:</p>
            <ul class="mtop10">
              <li>
                  +6% : Conlleva un suplemento de un 6% sobre el importe del pedido en gastos de gestión.
              </li>
              <li>
                  Pago en efectivo: El pago debe ser entregado en metálico, el repartidor no está obligado a disponer de TPV.
              </li>
              <li>
                  Pago exacto: El importe debe ser exacto, el repartidor no está obligado a disponer de cambio.
              </li>
              <li>
                  1 pedido por entrega: Un segundo pedido no podrá realizarse mediante este método hasta la confirmación de entrega del primer pedido.
              </li>
            </ul>            
        </div>
      </div>      
      <div class="modal-footer justify-content-center">
        <button type="button" class="btn btn_sry " data-bs-dismiss="modal">Cerrar</button>        
      </div>
    </div>
  </div>
</div>