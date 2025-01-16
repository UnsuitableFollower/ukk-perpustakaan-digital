<div class="mb-3">
    <label for="id_rak" class="form-label">Rak</label>
    <select name="id_rak" id="id_rak" class="form-select @error('id_rak') is-invalid @enderror">
        <option value="">-- Pilih Rak --</option>
        @foreach ($rak as $r)
            <option value="{{ $r->id_rak }}" {{ old('id_rak', $ddc->id_rak ?? '') == $r->id_rak ? 'selected' : '' }}>
                {{ $r->rak }}
            </option>
        @endforeach
    </select>
    @error('id_rak')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="kode_ddc" class="form-label">Kode DDC</label>
    <input type="text" name="kode_ddc" id="kode_ddc" class="form-control @error('kode_ddc') is-invalid @enderror"
           value="{{ old('kode_ddc', $ddc->kode_ddc ?? '') }}">
    @error('kode_ddc')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="ddc" class="form-label">DDC</label>
    <input type="text" name="ddc" id="ddc" class="form-control @error('ddc') is-invalid @enderror"
           value="{{ old('ddc', $ddc->ddc ?? '') }}">
    @error('ddc')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="keterangan" class="form-label">Keterangan</label>
    <textarea name="keterangan" id="keterangan" rows="4"
              class="form-control @error('keterangan') is-invalid @enderror">{{ old('keterangan', $ddc->keterangan ?? '') }}</textarea>
    @error('keterangan')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
