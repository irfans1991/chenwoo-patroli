<div>
<form wire:submit.prevent="store">
                    <div class="form-group">
                      <label for="document">No. Document </label><code class="highlighter-rouge"> *</code>
                      <input wire:model="document" type="text" name="" id="" class="form-control" placeholder="Enter Name" value="" readonly>
                    </div>
                    <div class="form-group">
                      <label for="security">Security </label><code class="highlighter-rouge"> *</code>
                      <input wire:model="security" type="text" class="form-control" name="" id="" readonly>
                      @error('username')
                        <div class="invalid-feedback">
                       {{ $message }}
                      </div>
                      @enderror
                    </div>

                    <div class="form-group">
                      <label for="guest">Jenis Visitor/Visitor Type :</label>
                      <select wire:model="guest" class="form-control" name="" id="" required>
                        <option selected disabled>--Please Select Visitor Type--</option>
                        <option value="distributor" selected>Distributor</option>
                        <option value="collector">Collector</option>
                        <option value="supplier">Supplier</option>
                        <option value="visitor">Visitor</option>
                        <option value="Auditor">Auditor</option>
                        <option value="Constructor">Constructor</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="name">Nama Visitor/Visitor Name :</label><code class="highlighter-rouge"> *</code>
                      <input wire:model="name" type="text" class="form-control @error('name') is-invalid @enderror" name="" id="" autocomplete="off" value="{{ old('name') }}" placeholder="Please Enter Visitor Name">
                        @error('name')
                        <div class="invalid-feedback">
                       {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="idCard">No.ID Card </label><code class="highlighter-rouge"> *</code>
                      <input wire:model="idCard" type="text" class="form-control @error('idCard') is-invalid @enderror" name="" id="" autocomplete="off" value="{{ old('noId') }}" placeholder="Please Enter Id Card">
                        @error('idCard')
                        <div class="invalid-feedback">
                       {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="police">No. Polisi/ Police Number</label><code class="highlighter-rouge"> *</code>
                      <input wire:model="police" type="text" class="form-control " name="" id="" autocomplete="off" value="{{ old('police') }}" placeholder="Please Enter Police Number" >
                    </div>
                    <div class="form-group">
                      <label for="company">Perusahaan/Instansi/Company/Instance :</label><code class="highlighter-rouge"> *</code>
                      <input wire:model="company" type="text" class="form-control @error('company') is-invalid @enderror" name="" id="" autocomplete="off" value="{{ old('company') }}" placeholder="Please Enter Name Company/Instance">
                        @error('company')
                        <div class="invalid-feedback">
                       {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="meet">Bertemu/Meeting With :</label><code class="highlighter-rouge"> *</code>
                      <input wire:model="meet" type="text" class="form-control @error('meet') is-invalid @enderror" name="" id="" autocomplete="off" value="{{ old('meet') }}" placeholder="Please Enter Meeting With">
                        @error('meet')
                        <div class="invalid-feedback">
                       {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="purpose">Tujuan/Purpose :</label><code class="highlighter-rouge"> *</code>
                      <input wire:model="purpose" type="text" class="form-control @error('purpose') is-invalid @enderror" name="" id="" autocomplete="off" value="{{ old('pupose') }}" placeholder="Please Enter Your Purpose">
                        @error('purpose')
                        <div class="invalid-feedback">
                       {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="info">Informasi/Information </label><code class="highlighter-rouge"> *</code>
                      <textarea wire:model="info" type="text" class="form-control @error('info') is-invalid @enderror" autocomplete="off" value="{{ old('info') }}" placeholder="Please Enter Other Information" style="height:150px;"> </textarea>
                        @error('info')
                        <div class="invalid-feedback">
                       {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="status">Status </label><code class="highlighter-rouge"> *</code>
                      <input wire:model ="status" type="text" class="form-control @error('status') is-invalid @enderror" name="" id="" autocomplete="off" value="test" readonly>
                        @error('status')
                        <div class="invalid-feedback">
                       {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                    <label for="upload">Upload Foto Tamu/Upload Photo :</label><code class="highlighter-rouge"> *</code>
                      <div class="custom-file">
                        <input wire:model="photo" type="file" name="" class="custom-file-input orm-control @error('photo') is-invalid @enderror" id="" name="">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                      </div>
                      @error('photo')
                      <code class="highlighter-rouge">
                      {{ $message }}
                      </code>
                      @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
</div>
