<div class="modal fade" id="checkInKendaraan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title title" id="exampleModalLabelLogout"></h5>
                  <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body text-center">
                <p class="warning"></p>
                <input type="hidden" name="id" id="transport_id" class="transport_id">
                <input type="hidden" name="status" id="status" class="status">
                    <div class="form-group">
                      <label for="after_speedometer">Speedometer</label><code class="highlighter-rouge"> *</code></label>
                      <input id="touchSpin2" type="text" name="after_speedometer" class="form-control after_speedometer">
                    </div>
                    <div class="form-group">
                      <label for="fuel">Bahan Bakar</label><code class="highlighter-rouge"> *</code></label>
                      <input id="touchSpin2" type="text" name="fuel" class="form-control touchSpin2 fuel">
                    </div>
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                  <button type="button" class="btn btn-outline-success" id="checkInData">Check In</button>
                </div>
              </div>
            </div>
          </div>