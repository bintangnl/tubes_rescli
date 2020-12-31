<html>
<head>
    <title>WAHANA RENTAL PS</title>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    
</head>
<body>
    <nav class="navbar navbar-inverse navbar">
        <div class="container-fluid">
            <ul class="nav navbar-nav">
                <li class="active"><a href="https://localhost/1718118_restclient/ajg.php">Home</a></li>
                <li class="active"><a href="http://localhost/1718118_restclient">Pelayanan</a></li>
                <li><a href="#">Tentang Kami</a></li> 
                <li><a href="#">Kontak</a></li> 
            </ul>
            <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Daftar</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
        </div>
            <br />
            <h1 align="center"><strong> <font color="White"> WAHANA RENTAL PS MALANG</strong></h1>
            <br />
            </nav>
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-6">
                        <h3 class="panel-title">WAHANA RENTAL PS MALANG</h3>
                    </div>
                    <div class="col-md-6" align="right">
                        <button type="button" id="add_button" class="btn btn-info btn-xs">+</button>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <span id="success_message"></span>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Jenis PS</th>
                            <th>Tgl Sewa</th>
                            <th>Tgl Kembali</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>   
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="navbar navbar-inverse navbar-fixed-bottom">
        <div class="container">
            <p style="color:#fff" align="center">
               <strong>Wahana Playstation</strong>
            </p>
        </div>
    </div>
</body>
</html>

<div id="userModal" class="modal fade">
    <div class="modal-dialog">
        <form method="post" id="user_form">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Tambah Data Pelanggan</h4>
                </div>
                <div class="modal-body">
                    <label>Masukan Nama</label>
                    <input type="text" name="nama_pel" id="nama_pel" class="form-control" />
                    <span id="nama_pel_error" class="text-danger"></span>
                    <br />
                    <label>Masukan Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control" />
                    <span id="alamat_error" class="text-danger"></span>
                    <br />
                    <label>Masukan Jenis PS</label>
                    <input type="text" name="jenis_ps" id="jenis_ps" class="form-control" />
                    <span id="jenis_ps_error" class="text-danger"></span>
                    <br />
                    <label>Masukan Tgl sewa</label>
                    <input type="date" name="tgl_sewa" id="tgl_sewa" class="form-control" />
                    <span id="tgl_sewa_error" class="text-danger"></span>
                    <br />
                    <label>Masukan Tgl Kembali</label>
                    <input type="date" name="tgl_kembali" id="tgl_kembali" class="form-control" />
                    <span id="tgl_kembali_error" class="text-danger"></span>
                    <br />
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="user_id" id="user_id" />
                    <input type="hidden" name="data_action" id="data_action" value="Insert" />
                    <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript" language="javascript" >
$(document).ready(function(){
    
    function fetch_data()
    {
        $.ajax({
            url:"<?php echo base_url(); ?>test_api/action",
            method:"POST",
            data:{data_action:'fetch_all'},
            success:function(data)
            {
                $('tbody').html(data);
            }
        });
    }

    fetch_data();

    $('#add_button').click(function(){
        $('#user_form')[0].reset();
        $('.modal-title').text("Tambahkan Pelanggan");
        $('#action').val('Add');
        $('#data_action').val("Insert");
        $('#userModal').modal('show');
    });

    $(document).on('submit', '#user_form', function(event){
        event.preventDefault();
        $.ajax({
            url:"<?php echo base_url() . 'test_api/action' ?>",
            method:"POST",
            data:$(this).serialize(),
            dataType:"json",
            success:function(data)
            {
                if(data.success)
                {
                    $('#user_form')[0].reset();
                    $('#userModal').modal('hide');
                    fetch_data();
                    if($('#data_action').val() == "Insert")
                    {
                        $('#success_message').html('<div class="alert alert-success">Data Di Tambahkan</div>');
                    }
                }

                if(data.error)
                {
                    $('#nama_pel_error').html(data.nama_pel_error);
                    $('#alamat_error').html(data.alamat_error);
                    $('#jenis_ps_error').html(data.jenis_ps_error);
                    $('#tgl_sewa_error').html(data.tgl_sewa_error);
                    $('#tgl_kembali_error').html(data.tgl_kembali_error);

                }
            }
        })
    });

    $(document).on('click', '.edit', function(){
        var user_id = $(this).attr('id');
        $.ajax({
            url:"<?php echo base_url(); ?>test_api/action",
            method:"POST",
            data:{user_id:user_id, data_action:'fetch_single'},
            dataType:"json",
            success:function(data)
            {
                $('#userModal').modal('show');
                $('#nama_pel').val(data.nama_pel);
                $('#alamat').val(data.alamat);
                $('#jenis_ps').val(data.jenis_ps);
                $('#tgl_sewa').val(data.tgl_sewa);
                $('#tgl_kembali').val(data.tgl_kembali);
                $('.modal-title').text('Edit User');
                $('#user_id').val(user_id);
                $('#action').val('Edit');
                $('#data_action').val('Edit');
            }
        })
    });

    $(document).on('click', '.delete', function(){
        var user_id = $(this).attr('id');
        if(confirm("Yakin data mau di hapus?"))
        {
            $.ajax({
                url:"<?php echo base_url(); ?>test_api/action",
                method:"POST",
                data:{user_id:user_id, data_action:'Delete'},
                dataType:"JSON",
                success:function(data)
                {
                    if(data.success)
                    {
                        $('#success_message').html('<div class="alert alert-success">Data Terhapus</div>');
                        fetch_data();
                    }
                }
            })
        }
    });
    
});
</script>