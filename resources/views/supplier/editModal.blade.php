<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelLogout">Edit Supplier</h5>
                  <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    @csrf
                    
                    <input type="hidden" id="id_supplier">
                    <div class="form-group">
                      <label for="name">Supplier Name</label>
                      <input type="text" id="edit_name" class="form-control errList name" placeholder="Enter supplier" value="{{ old('name') }}" autofocus>
                        <div class="invalid-feedback">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="from">From</label>
                      <input type="text" class="form-control errList from" id="edit_from" aria-describedby="emailHelp"
                        placeholder="Enter from" autocomplete="off" value="{{ old('from') }}" required>
                        <div class="invalid-feedback">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="supplier">Supplier</label>
                      <input type="text" class="form-control errList" name="supplier" id="edit_supplier"
                        placeholder="Enter supplier" autocomplete="off" value="{{ old('supplier') }}" required>
                        <div class="invalid-feedback">
                      </div>
                    </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                  <button type="submit" id="updateData" class="btn btn-primary updateData">Update</button>
                </div>
              </div>
            </div>
          </div>
        </div>

