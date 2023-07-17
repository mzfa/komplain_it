<div class="form-group">
    <label for="validationCustom03">Judul Pesan</label>
    <input type="text" class="form-control" id="validationCustom03" value="{{ $data->judul_pesan }}" required="" name="judul_pesan">
    <div class="invalid-feedback">
        Judul Pesan Wajib di isi.
    </div>
 </div>
<div class="form-group">
    <label for="validationCustom04">Isi Pesan</label>
    <textarea name="isi_pesan" class="form-control" id="isi_pesan" cols="30" rows="10">{{ $data->isi_pesan }}</textarea>
    <div class="invalid-feedback">
        Isi Pesan Wajib di isi.
    </div>
</div> 
<input type="hidden" name="pesan_id" value="{{ Crypt::encrypt($data->pesan_id) }}">