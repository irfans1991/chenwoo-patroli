<div class="modal fade" id="ModalCreateProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title title" id="exampleModalLabelLogout"></h5>
                  <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                <!-- <form name="form-tambah" id="form-tambah"> -->
                    @csrf
                    <div class="form-group">
                      <label for="jenisBarang">Jenis Product</label>
                      <input type="text" name="name" id="jenisBarang" class="form-control errList" placeholder="Enter Jenis Barang" value="{{ old('name') }}" autofocus="on">
                        <div class="invalid-feedback" >

                      </div>
                    </div>
                    <div class="form-group">
                      <label for="jenisBarang">Harga</label>
                      <input type="text" class="form-control errList" name="from" id="harga" aria-describedby="emailHelp"
                        placeholder="Enter Harga" autocomplete="off" value="{{ old('from') }}" required>
                        <div class="invalid-feedback">

                      </div>
                    </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                  <button type="submit" id="savedata" class="btn btn-primary">Save</button>
                </div>
            <!-- </form> -->
              </div>
            </div>
          </div>
        </div>
