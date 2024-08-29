<div class="modal fade" id="ModalCheckedBy" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
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
                   <input type="hidden" id="cekBy" value="{{ auth()->user()->name }}">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-outline-success" id="checkedNota">validated</button>
                  </div>
                </div>
        </div>
     </div>
     </div>
     </div>