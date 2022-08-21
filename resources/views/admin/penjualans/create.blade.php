<!-- Tambah Penjualan Modal-->
<div class="modal fade" id="addPenjualanModal" tabindex="-1" role="dialog" aria-labelledby="addPenjualanModalabel"
aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPenjualanModalabel">Tambah Penjualan</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('penjualan.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Pilih Barang</label>
                        <select class="form-control" name="barang" id="barang">
                            <option>Pilih barang...</option>
                            @foreach ( $barangs as $barang )
                                <option value="{{ $barang->id }}">{{ $barang->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="jenis" class="form-label">Pilih Pembeli</label>
                        <select class="form-control" name="pembeli" id="pembeli">
                            <option>Pilih pembeli...</option>
                            @foreach ( $users as $user )
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
