<div class="modal-body">
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="kode_pengarang" class="form-label">Kode Pengarang</label>
                <input type="text" class="form-control" id="kode_pengarang" name="kode_pengarang" value="{{ $pengarang->kode_pengarang ?? '' }}" maxlength="10" required>
            </div>
            <div class="mb-3">
                <label for="gelar_depan" class="form-label">Gelar Depan</label>
                <input type="text" class="form-control" id="gelar_depan" name="gelar_depan" value="{{ $pengarang->gelar_depan ?? '' }}" maxlength="10" placeholder="Contoh: Dr.">
            </div>
            <div class="mb-3">
                <label for="nama_pengarang" class="form-label">Nama Pengarang</label>
                <input type="text" class="form-control" id="nama_pengarang" name="nama_pengarang" value="{{ $pengarang->nama_pengarang ?? '' }}" maxlength="50" required>
            </div>
            <div class="mb-3">
                <label for="gelar_belakang" class="form-label">Gelar Belakang</label>
                <input type="text" class="form-control" id="gelar_belakang" name="gelar_belakang" value="{{ $pengarang->gelar_belakang ?? '' }}" maxlength="10" placeholder="Contoh: Ph.D">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="no_telp" class="form-label">No. Telp</label>
                <input type="text" class="form-control" id="no_telp" name="no_telp" value="{{ $pengarang->no_telp ?? '' }}" maxlength="15">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $pengarang->email ?? '' }}" maxlength="30">
            </div>
            <div class="mb-3">
                <label for="website" class="form-label">Website</label>
                <input type="url" class="form-control" id="website" name="website" value="{{ $pengarang->website ?? '' }}" maxlength="50">
            </div>
            <div class="mb-3">
                <label for="biografi" class="form-label">Biografi</label>
                <textarea class="form-control" id="biografi" name="biografi" rows="3">{{ $pengarang->biografi ?? '' }}</textarea>
            </div>
            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $pengarang->keterangan ?? '' }}" maxlength="50">
            </div>
        </div>
    </div>
</div>
