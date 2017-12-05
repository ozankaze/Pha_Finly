<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Tables
      <small>advanced tables</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Tables</a></li>
      <li class="active">Data tables</li>
    </ol>
  </section>


  <!-- Main content -->
  <section class="content">
    <button type="button" class="btn btn-default pull-right" data-toggle="modal" data-target="#modal-default">
      Add User
    </button>
    <br>
    <br>
    <div class="row">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Table With Full Features</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Username</th>
                <th>Password</th>
                <th>Type</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1 ?> <?php foreach ($data_user as $user) { ?>
              
              <tr>
                <td>
                  <?php echo $no++; ?>
                </td>
                <td><?= $user->username ?></td>
                <td><?= $user->password ?></td>
                <td><?= $user->type ?></td>
                <td>
                  <button type="button" class="btn btn-warning">
                    Edit
                  </button>
                  <button type="button" class="btn btn-danger">
                    Delete
                  </button>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <form class="addUser" action="user/addUser" method="post">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Tambah User</h4>
          </div>
          <div class="modal-body">
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user-o"></i></span>
              <input type="text" name="username" class="form-control" placeholder="Username">
            </div>
            <br>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-lock"></i></span>
              <input type="text" name="password" class="form-control" placeholder="Pasword">
            </div>
            <br>
            <div class="input-group">
              <span class="input-group-addon"><i class="fa fa-user-circle "></i></span>
              <input type="text" name="type" class="form-control" placeholder="type">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="return addUser();">Add User</button>
          </div>
        </div>
      </form>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
  function addUser() {
    $.ajax({
      method: "POST",
      dataType: "json",
      url: "<?= $this->url->get('user/addUser') ?>",
      data: $('form.addUser').serialize(),
      succes: function(res){
        new PNotify({
          title: res.title,
          text: res.text,
          type: res.type,
        });
      }
    });
  }
</script>
