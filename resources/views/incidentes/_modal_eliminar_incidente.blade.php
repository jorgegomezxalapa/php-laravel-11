<div class="modal fade" id="modalEliminarIncidente" tabindex="-1" aria-labelledby="modalEliminarIncidenteLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalEliminarIncidenteLabel">Eliminar incidente</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('incidentes.delete') }}" method="POST">
                    @csrf
                    <input type="hidden" id="eliminar_incidente_id" name="incidente_id" value="{{ @$obra->id }}">
                    <div class="modal-body">
                        <p>Al eliminar el incidente no podrá recuperar la información, ¿Desea continuar?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Eliminar incidente</button>
                    </div>
                </form>
            </div>
        </div>
    </div>