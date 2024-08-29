<div class="modal fade" id="ModalValidasiNota" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title title" id="exampleModalLabelLogout"></h5>
                  <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form method="post"  action="/notaBarang/{id}" id="updateNota" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="modal-body text-center">
                <p class="warning"></p>
                   <input type="hidden" name="id" id="idValidasi" class="idValidated">
                    <input type="hidden" name="disetujui" id="disetujui" class="departement" value="{{ auth()->user()->name }}">
                    <div class="form-group">
                      <label for="position">Upload File</label><code class="highlighter-rouge"> *</code></label>
                      <div class="custom-file">
                        <input type="file" name="foto" class="custom-file-input form-control @error('photo') is-invalid @enderror" id="foto">
                        <label class="custom-file-label" for="customFile">Upload Foto Bukti</label>
                      </div>
                      @error('photo')
                      <code class="highlighter-rouge">
                        {{ $message }}
                      </code>
                      @enderror
                    </div>
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-outline-success" id="validasiNota">validated</button>
                  </div>
                </form>
                </div>
              </div>