<div class="modal fade" id="detailModalPermission" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title title" id="exampleModalLabelLogout"></h5>
                  <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body text-center">
                    <p id="warning"></p>
                    <input type="hidden" name="id" id="permission_id">
                    <input type="hidden" name="id" id="security_update" value="{{auth()->user()->name}}">
                    <p><b id="needs"></b></p>
                    <p id="name"></p>
                    <p id="remark"></p>
                    <p id="security"></p>
                    <p id="hrd"></p>
                    <p id="part"></p>
                    <p id="masuk"></p>
                    <p id="status"></p>
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                  <button type="button" class="btn btn-outline-success" id="validate">Validate</button>
                </div>
              </div>
            </div>
          </div>