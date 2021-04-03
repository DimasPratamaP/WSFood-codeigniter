<!-- modal login -->
<div class="modal fade" id="register" tabindex="-1" aria-labelledby="register" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Register</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>     
            <form action="Auth/register/save" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email"></input>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">No Hp</label>
                        <input type="number" class="form-control" id="nohp" name="nohp"></input>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password"></input>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Password</label>
                        <input type="password" class="form-control" id="confpassword" name="confpassword"></input>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end modal login -->