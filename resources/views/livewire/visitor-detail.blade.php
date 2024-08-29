<div>
                  <div class="alert alert-success" role="alert">
                    <h3 class="text-center">Foto KTP</h3>
                    <div class="d-flex justify-content-center">
                      <img src="{{asset('storage/public/'.$view_visitor_image)}}" width="50%" >
                    </div>
                      <ul class="list-group mt-2">
                        <li class="list-group-item active">Nama : {{ $view_visitor_name }}</li>
                        <li class="list-group-item text-dark">Email : {{ $view_visitor_email }}</li>
                        <li class="list-group-item text-dark">Guest : {{ $view_visitor_guest }}</li>
                        <li class="list-group-item text-dark">No. Pol : {{ $view_visitor_police }}</li>
                        <li class="list-group-item text-dark">Id Card/Ktp/Sim : {{ $view_visitor_idCard }}</li>
                        <li class="list-group-item text-dark">Meet : {{ $view_visitor_meet }}</li>
                        <li class="list-group-item text-dark">Tujuan : {{ $view_visitor_purpose }}</li>
                        <li class="list-group-item text-dark">status : {{ $view_visitor_status }}</li>
                      </ul>
                    <p class="mb-0 text-center">
                    {{ $view_visitor_info }}
                    </p>
                  </div>
              </div>
              <div class="d-flex justify-content-center">
                <button type="button" class="btn btn-outline-primary col-lg-2 " data-dismiss="modal">Cancel</button>
              </div>
</div>
