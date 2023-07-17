<div class="form-group">
    <label for="validationCustom03">Nama Akun</label>
    <input type="text" class="form-control" id="validationCustom03" value="{{ $data->nama_akun }}" required="" name="nama_akun">
    <div class="invalid-feedback">
        Nama Akun Wajib di isi.
    </div>
 </div>
<div class="form-group">
    <label for="validationCustom04">No WA</label>
    <input type="text" class="form-control" id="validationCustom04" required="" name="no_telp" value="{{ $data->no_telp }}">
    <div class="invalid-feedback">
        Nomor WA Wajib di isi.
    </div>
</div> 
<input type="hidden" name="akun_id" value="{{ Crypt::encrypt($data->akun_id) }}">