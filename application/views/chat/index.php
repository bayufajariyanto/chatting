<div class="container" style="margin-top: 50px;">
    <!-- <form action="" method="post"> -->
    <div class="form-group row">
        <label for="pesan" class="col-sm-2 col-form-label">Pesan</label>
        <div class="col-sm-10">
            <input type="text" class="form-control d-none" name="username" id="username" value="<?= $this->session->userdata('username'); ?>">
            <input type="text" class="form-control" name="pesan" id="pesan">
        </div>
    </div>
    <div class="table-responsive-sm">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Username</th>
                    <th scope="col">Chat</th>
                </tr>
            </thead>
            <tbody id="show_data">

            </tbody>
        </table>
    </div>
    <!-- </form> -->
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        tampil_data();
        //fungsi tampil barang
        function tampil_data() {
            $.ajax({
                type: 'GET',
                url: '<?php echo base_url() ?>kasir/tampil_chat',
                async: true,
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {
                        html += '<tr>' +
                            '<td>' + data[i].username + '</td>' +
                            '<td>' + data[i].pesan + '</td>' +
                            '</tr>';
                    }
                    $('#show_data').html(html);
                }

            });
        }
        // Simpan chat
        $('#pesan').keydown(function(e) {
            if (e.keyCode == 13) {
                var pesan = $('#pesan').val();
                var username = $('#username').val();
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('kasir/simpan_chat') ?>",
                    dataType: "JSON",
                    data: {
                        username: username,
                        pesan: pesan,
                    },
                    success: function(data) {
                        $('[name="pesan"]').val("");
                        $('[name="username"]').val("");
                        // $('#ModalaAdd').modal('hide');
                        tampil_data();
                    }
                });
                return false;
            }
        })
    });
</script>