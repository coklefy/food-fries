<!-- Modal Confirm Delete -->
<div class="modal fade" id="modal-delete-<?= $row['id_pietanza'] ?>">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-trash"></i> Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Do you want to delete product <strong><?= $row['nome_pietanza']  ?>  <? $row['id_pietanza']?></strong> ?</p>
            </div>
            <div class="modal-footer">
                <a href="php/delete_product.php?id_pietanza=<?=$row['id_pietanza'] ?>" class="btn btn-outline-success deletedButton">Save changes</a>
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->