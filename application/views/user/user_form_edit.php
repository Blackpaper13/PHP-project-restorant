<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Pekerja
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Users</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box">
            <div class="box-header">
            <div class="pull-right">
                <a href="<?=site_url('user')?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-arrow-circle-left"></i> Back
                </a>
              </div>
                <h3 class="box-title">
                    Edit Data Users
                </h3>
                
            </div>
            
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <form action="" method="post">
                            <div class="form-group <?=form_error('fullname') ? 'has-error' : null ?>">
                                <label >Name *</label>
                                <input type="hidden" name="user_id" value="<?=$row->user_id?>">
                                <input type="text" name="fullname" value="<?=$this->input->post('fullname')?? $row->name?>" class="form-control">
                               <?=form_error('fullname')?>
                            </div>
                            <div class="form-group <?=form_error('username') ? 'has-error' : null ?>">
                                <label >Username *</label>
                                <input type="text" name="username" value="<?=$this->input->post('username')?? $row->username?>" class="form-control">
                                <?=form_error('username')?>
                            </div>
                            <div class="form-group <?=form_error('password') ? 'has-error' : null ?>">
                                <label >Password </label> <small>(biarkan Kosong jika tidak diganti)</small>
                                <input type="password" name="password" value="<?=$this->input->post('password')?>" class="form-control">
                                <?=form_error('password')?>
                            </div>
                            <div class="form-group <?=form_error('passconf') ? 'has-error' : null ?>">
                                <label >Password Confirmation </label>
                                <input type="password" name="passconf" value="<?=$this->input->post('passconf')?>" class="form-control">
                                <?=form_error('passconf')?>
                            </div>
                            <div class="form-group <?=form_error('address') ? 'has-error' : null ?>">
                                <label >Address *</label>
                                <textarea name="address" cols="30" rows="10" value="<?=$this->input->post('address')?? $row->address?>" class="form-control"></textarea>
                                <?=form_error('address')?>
                            </div>
                            <div class="form-group <?=form_error('level') ? 'has-error' : null ?>">
                                <label >Position Job*</label>
                                <select name="level" id="" class="form-control">
                                <?php $level = $this->input->post('level') ? $this->input->post('level') : $row->level?>
                                    <option value="1" >Admin</option>
                                    <option value="2"<?=$level == 2 ? 'selected' : null?> >Kasir</option>
                                    <option value="3" <?=$level == 3 ? 'selected' : null?>>Chef</option>
                                    <option value="4" <?=$level == 4 ? 'selected' : null?>>Owner</option>
                                    <option value="5" <?=$level == 5 ? 'selected' : null?>>Waiter</option>
                                </select>
                                <?=form_error('level')?>
                            </div>
                            <div class="form-group <?=form_error('status_kerja') ? 'has-error' : null ?>">
                                <label >Status Kerja*</label>
                                <select name="status_kerja" id="" class="form-control">
                                <?php $status_kerja = $this->input->post('status_kerja') ? $this->input->post('status_kerja') : $row->status_kerja?>
                                    <option value="0">Online</option>
                                    <option value="1"<?=$status_kerja == 1 ? 'selected' : null?> >Offline</option>
                                </select>
                                <?=form_error('status_kerja')?>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-flat">
                                <i class="fa fa-paper-plane"></i> Submit</button>
                                <button type="reset" class="btn btn-warning btn-flat">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            

        </div>

    </section>