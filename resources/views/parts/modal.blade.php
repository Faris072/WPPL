<!-- Modal DELETE pembukuan -->
<div class="modal fade" id="modalDeletePembukuan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">DELETE DATA</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Dengan menghapus data ini, maka saldo setelah data ini akan disesuaikan
             </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <form action="pembukuan/{{ $value->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger" type="submit" value="Tetap Hapus">
                </form>
            </div>
        </div>
    </div>
</div>
<!--endmodal-->
