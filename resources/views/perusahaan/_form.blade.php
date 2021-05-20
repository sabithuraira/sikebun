<div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Perbaharu Nama & Alamat Perusahaan</h4>
                </div>
                <div class="card-body">
                  <form>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                            <label class="bmd-label-floating">Nama</label>
                            <input type="text" class="form-control {{($errors->first('nama_perusahaan') ? ' parsley-error' : '')}}" name="nama_perusahaan" value="{{ old('nama_perusahaan', $model->nama_perusahaan) }}">
                            @foreach ($errors->get('nama_perusahaan') as $msg)
                                <p class="text-danger">{{ $msg }}</p>
                            @endforeach
                        </div>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Alamat</label>
                          <input type="text" class="form-control {{($errors->first('alamat_perusahaan') ? ' parsley-error' : '')}}" name="alamat_perusahaan" value="{{ old('alamat_perusahaan', $model->alamat_perusahaan) }}">
                            @foreach ($errors->get('alamat_perusahaan') as $msg)
                                <p class="text-danger">{{ $msg }}</p>
                            @endforeach
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">SIMPAN</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>