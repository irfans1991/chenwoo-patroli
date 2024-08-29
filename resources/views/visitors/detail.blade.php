<div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelLogout">Detail Visitor</h5>
                  <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close" wire:click="closeViewVisitorModal">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                <livewire:visitor-detail />
              </div>
            </div>
          </div>
        </div>
