<div class="modal fade" id="idver<?= $row['idVeterinario'] ?>" tabindex="-1" aria-labelledby="VistaModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="VistaModal">Vista Completa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card" style="width: 28rem;">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">NOMBRE: <?=$row['nomVeterinario']?></li>
                        <li class="list-group-item">CNI: <?=$row['cni']?></li>
                        <li class="list-group-item">TELEFONO: <?=$row['telefono']?></li>
                        <li class="list-group-item">ESPECIALIDAD: <?=$row['especialidad']?></li>
                    </ul>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>