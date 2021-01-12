<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Tambah Pasien</h1>
  </div>

  <form class="" action="<?= base_url('post/enkripsi') ?>" method="POST">
    <div class="card">
      <h5 class="card-header text-center">Informasi Pasien</h5>
      <div class="card-body">
        <div class="form-row">
          <div class="form-group col-8">
            <label>Nama</label>
            <input type="text" class="form-control" name="nama" placeholder="Nama Pasien">
          </div>
          <div class="form-group col-4">
            <label>No. Telp</label>
            <input type="text" class="form-control" name="no_telp" placeholder="Nomor Telepon">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-6">
            <label>Topik Konseling</label>
            <select class="form-control" name="topik">
              <option selected>Pilih</option>
              <option value="Karir">Karir</option>
              <option value="Pendidikan">Pendidikan</option>
              <option value="Hubungan">Hubungan</option>
              <option value="Keluarga">Keluarga</option>
              <option value="Masalah Umum">Masalah Umum</option>
            </select>
          </div>
          <div class="form-group col-6">
            <label>Jadwal</label>
            <input type="datetime-local" class="form-control" name="jadwal">
          </div>
        </div>
        <div class="form-group">
          <label>Keterangan Permasalahan</label>
          <textarea class="form-control" name="ket" rows="5"></textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Submit</button>
      </div>
    </div>
  </form>
</main>