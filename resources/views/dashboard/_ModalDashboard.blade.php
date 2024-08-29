<div class="modal fade" id="detailModalDashboard" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title title" id="exampleModalLabelLogout"></h5>
                  <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body text-center">
                <p><b id="warning"></b></p>
                <p id="pesan"></p>
                <input type="hidden" id="id_pesan">
                <input type="hidden" id="security_feedback" value="{{auth()->user()->name}}">
                <div class="row mb-3">
                    <div class="col-md-12">
                      <label for="feedback" class=" small mb-1">Feedback :</label>
                      <textarea class="form-control @error('feedback') is-invalid @enderror " name="feedback" id="feedback" placeholder="Enter your full Feedback"> </textarea>
                    </div>
                </div>
                  <button type="button" class="btn btn-outline-primary" id="button-feedback" data-dismiss="modal">submit</button>
                  <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancel</button>
                </div>
              </div>
            </div>
          </div>