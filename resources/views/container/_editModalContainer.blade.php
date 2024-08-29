<div class="modal fade" id="editModalContainer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabelLogout">Check Out Container</h5>
        <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p id="warning"></p>
        <div class="card-body">
          <div class="form-group">
            <input type="hidden" class="form-control" name="security" id="id_container">
          </div>
          <div class="form-group">
            <input type="hidden" class="form-control" name="status_container" id="status_container">
          </div>
          <div class="form-group">
            <label for="no_seal">No. Seal</label><code class="highlighter-rouge"> (No Seal Di input)*</code>
            <input type="text" class="text-right form-control " id="noSealUpdate" value="">
            @error('no_seal')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="form-group">
            <label for="before_temperature"> suhu(berangkat) °C </label><code class="highlighter-rouge"> *</code></label>
            <input id="after_temperature" type="text" name="after_temperature" value="" class="form-control touchSpin2">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
          <button type="submit" id="updateDataContainer" class="btn btn-success updateData">Check Out</button>
        </div>
      </div>
    </div>
  </div>
</div>