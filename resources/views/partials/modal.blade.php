<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina progetto</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Sei sicuro di voler eliminare questo progetto? L'azione è irreversibile
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <form action="" id="record-to-delete" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    Elimina
                </button>
            </form>
        </div>
      </div>
    </div>
  </div>