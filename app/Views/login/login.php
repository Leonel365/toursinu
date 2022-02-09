<?=$cabecera?>


<div class="modal fade" data-backdrop="static" id="ModalAdicionarLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
          
           <h5 class="modal-title w-100 text-center" style="color: #36907A"><b>INGRESO AL SISTEMA</b></h5>
        
        
        </div>
        <div class="modal-body">
            <iframe src="<?=Base_url('validar')?>" frameborder="0" width="440px" height="420px"></iframe>
        </div>
        </div>
    </div>
    </div>

    <script>
        $( document ).ready(function() {
            $('#ModalAdicionarLogin').modal('toggle')
        });
    </script>

