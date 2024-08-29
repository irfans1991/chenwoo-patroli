<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelLogout">Create Supplier</h5>
                  <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                <!-- <form name="form-tambah" id="form-tambah"> -->
                    @csrf
                    <div class="form-group">
                      <label for="name">Supplier Name</label>
                      <input type="text" name="name" id="name" class="form-control errList" placeholder="Enter Name" value="{{ old('name') }}" autofocus="on">
                        <div class="invalid-feedback" >
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="from">From</label>
                      <input type="text" class="form-control errList" name="from" id="from" aria-describedby="emailHelp"
                        placeholder="Enter from" autocomplete="off" value="{{ old('from') }}" required>
                        <div class="invalid-feedback">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="supplier">Supplier</label>
                      <input type="text" class="form-control errList" name="supplier" id="supplier"
                        placeholder="Enter supplier" autocomplete="off" value="{{ old('supplier') }}" required>
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
