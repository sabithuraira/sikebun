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
                          <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" name="is_karet"  type="checkbox" value="1" @if($model->is_karet==1) checked @endif >
                                <label class="bmd-label-floating">Apakah Memiliki Komoditas Karet</label>
                                <span class="form-check-sign">
                                    <span class="check"></span>
                                </span>
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" name="is_sawit"  type="checkbox" value="1" @if($model->is_sawit==1) checked @endif >
                                <label class="bmd-label-floating">Apakah Memiliki Komoditas Kelapa Sawit</label>
                                <span class="form-check-sign">
                                    <span class="check"></span>
                                </span>
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>

                    <button type="submit" class="btn btn-primary pull-right">SIMPAN</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>