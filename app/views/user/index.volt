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
    <button type="button" class="btn btn-default pull-right" data-toggle="modal" data-target="#modal-default" onclick="return send_data_add();">
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
              <?php $no=1 ?> {% for user in data_user %}
              {#{% for user in data_user %}#}
              <tr id="data_{{user.id}}">
                <td>
                  <?php echo $no++; ?>
                </td>
                <td>{{user.username}}</td>
                <td>{{user.password}}</td>
                <td>{{user.type}}</td>
                <td>
                  <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-default" onclick="return send_data_edit('{{ user.id }}');">
                    Edit
                  </button>
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-default" onclick="return hapus_data_user();">
                    Delete
                  </button>
                </td>
              </tr>
              {% endfor %}
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
      {# new #}
      <form class="addUser" action="user/addUser" method="post">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Tambah User</h4>
          </div>
          <div class="modal-body">
            <div class="input-group-id">
              <input type="hidden" name="id" class="form-control id"> {# di tambahkan #}
            </div>
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
            <button type="button" class="btn btn-primary btnAction" onclick="return addUser();">Add User</button>
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
  function send_data_add() {
    $('.modal-title').text('Tambah User');
    $('.btnAction').attr('onclick',"return addUser();");
    $('.btnAction').attr('class',"btn btn-primary btnAction");
    $('.btnAction').text('Tambah User');
  }

  function addUser() {
    $.ajax({
      method: "POST",
      dataType: "json",
      url: "{{url('user/addUser')}}",
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

  function send_data_edit(id)
  {
    $('.modal-title').text('Edit User ' + id);
    $('.input-group-id').append('<input type="hidden" name="id" class="form-control id">');
    $('.btnAction').attr('onclick',"return editUser();");
    $('.btnAction').attr('class',"btn btn-warning btnAction");
    $('.btnAction').text('Edit User');

    var username = $('#data_' + id + '> td').eq(1).html();
    var password = $('#data_' + id + '> td').eq(2).html();
    var type = $('#data_' + id + '> td').eq(3).html();

    $('input[name=id]').val(id);
    $('input[name=username]').val(username);
    $('input[name=password]').val(password);
    $('input[name=type]').val(type);

  }


  function editUser() {
    $.ajax({
      method: "POST",
      dataType: "json",
      url: "{{url('user/editUser')}}",
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
