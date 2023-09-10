<a href="{{ route('pembelian.edit',$id) }}" data-toggle="tooltip" data-original-title="Edit" class="edit btn btn-success edit">
<span data-feather="edit"></span>
</a>

<button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="delete btn btn-danger" ><span data-feather="x-circle"></span></button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Menghapus Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <img style="margin-left:180px; margin-bottom:20px;" width="100" src="/img/danger.png" alt="">
        <p class="text-center">Apakah Anda Yakin Ingin Menghapus? <br> Proses Ini Tidak Bisa Dibatalkan!</p> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <form action="{{ route('pembelian.destroy',$id) }}}}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="delete btn btn-danger">Hapus</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
    feather.replace();
</script>