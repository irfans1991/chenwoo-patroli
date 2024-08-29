<div class="modal fade" id="createDataNota" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelLogout">Buat Nota</h5>
                  <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                      <label for="name">No. Nota<code class="highlighter-rouge">*</code></label>
                      <input type="text" name="nota" id="nota" class="form-control errList" value="{{ $countNota }}" readonly>
                        <div class="invalid-feedback" >

                      </div>
                    </div>
                    <div class="form-group">
                      <label for="from">Pembeli<code class="highlighter-rouge">*</code></label>
                      <input type="text" class="form-control errList" name="pembeli" id="pembeli"
                        placeholder="Nama Pembeli" autocomplete="off" value="{{ old('pembeli') }}" required autofocus="on">
                        <div class="invalid-feedback">

                      </div>
                    </div>
                    <div class="form-group">
                      <label for="supplier">Jenis Pembeli<code class="highlighter-rouge">*</code></label>
                      <select class="form-control" name="jenisPembeli" id="jenisPembeli" required>
                        <option value="Local" selected>Local</option>
                        <option value="Karyawan">Karyawan</option>
                        <option value="Bandar Tuna">Bandar Tuna</option>
                    </select>
                    </div>
                    <div class="form-group">
                      <label for="from">Pembuat<code class="highlighter-rouge">*</code></label>
                      <input type="text" class="form-control errList" name="pembuat" id="pembuat" autocomplete="off" value="{{ auth()->user()->name }}" readonly>
                        <div class="invalid-feedback">

                      </div>
                    </div>
                    <div class="form-group">
                      <label for="from">Penimbang<code class="highlighter-rouge">*</code></label>
                      <input type="text" class="form-control errList" name="penimbang" id="penimbang" autocomplete="off" placeholder="masukkan nama penimbang.." value="{{ auth()->user()->name }}" readonly>
                        <div class="invalid-feedback">

                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                      <button type="submit" id="savedata" class="btn btn-primary">Save</button>
                    </div>
              </div>
            </div>
          </div>
        </div>