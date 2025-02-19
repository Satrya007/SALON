<!-- Login Modal -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Login</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php 
        if($this->session->flashdata('message')): 
            echo "<script>alert('".$this->session->flashdata('message')."');</script>";
        endif; 
        ?>
        <?php echo form_open('login/auth_action'); ?>
        <div class="modal-body">
          <div class="mb-3">
            <label>Username</label>
            <input type="text" class="form-control" name="username" required>
          </div>
          <div class="mb-3">
            <label>Password</label>
              <div class="input-group mb-3">
              <input type="password" class="form-control" name="password" id="password" required>
              <div class="input-group-append">
                <span class="input-group-text">
                  <a href="javascript:void(0);" class="text-dark" id="showPassword">
                    <i class="fa fa-eye" id="visible"></i>
                    <i class="fa fa-eye-slash" id="invisible"></i>
                  </a>
                </span>
              </div>
              </div>
          </div>
          <div class="d-flex justify-content-between align-items-center">
            <a href="#" class="text-decoration-none" data-toggle="modal" data-target="#forgotPasswordModal" data-dismiss="modal">
              Reset Password?
            </a>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-info btn-pill">Login</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="forgotPasswordModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Reset Password</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?= base_url('login/forgot_password'); ?>" method="post">
          <div class="mb-3">
            <label>Username</label>
            <input type="text" class="form-control" name="username" required>
          </div>
          <div class="mb-3">
            <label>Password Baru</label>
            <div class="input-group mb-3">
              <input type="password" class="form-control" name="password" id="password2" required>
              <div class="input-group-append">
                <span class="input-group-text">
                  <a href="javascript:void(0);" class="text-dark" id="showPassword2">
                    <i class="fa fa-eye" id="visible2"></i>
                    <i class="fa fa-eye-slash" id="invisible2"></i>
                  </a>
                </span>
              </div>
              </div>
            <small class="text-muted">
              Masukkan password baru untuk akun Anda
            </small>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-info btn-pill">Update Password</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="exampleModalFormTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalFormTitle">Register</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <?php
        echo validation_errors();
        echo form_open('site/register'); ?>

        <!-- Modal body -->
        <div class="modal-body">
          <div class="mb-3">
            <label for="exampleInputEmail1">Nama pelanggan</label>
            <input type="text" class="form-control" name="nama_pelanggan" required>

          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1">JK</label>

            <select class="form-control" name="jk">

              <option>--Pilih JK--</option>

              <option value="L">L</option>
              <option value="P">P</option>

            </select>

          </div>

          <div class="mb-3">
            <label for="exampleInputEmail1">Tempat Lahir</label>
            <input type="text" class="form-control" name="tempat_lahir" required>

          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1">Tgl Lahir</label>
            <input type="date" class="form-control" name="tgl_lahir" required>

          </div>

          <div class="mb-3">
            <label for="exampleInputEmail1">Alamat</label>
            <input type="text" class="form-control" name="alamat" required>

          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1">No Telp</label>
            <input type="text" class="form-control" name="no_telp" required>

          </div>

          <div class="mb-3">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" class="form-control" name="username" required>

          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1">Password</label>
            <div class="input-group mb-3">
              <input type="password" class="form-control" name="password" id="password3" required>
              <div class="input-group-append">
                <span class="input-group-text">
                  <a href="javascript:void(0);" class="text-dark" id="showPassword3">
                    <i class="fa fa-eye" id="visible3"></i>
                    <i class="fa fa-eye-slash" id="invisible3"></i>
                  </a>
                </span>
              </div>
              </div>

          </div>
          <div class="modal-footer">

            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <input type="submit" name="submit" class="btn btn-info btn-pill" value="Register">

          </div>
        </div>


        </form>
       
      </div>
    </div>
  </div>