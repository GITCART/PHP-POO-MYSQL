      
      <div id="registrar" class="pt-3">
        <div class="card">
          <div class="text-center">
              <h3>Register User</h3>
          </div>
          <div class="card-body">
            <form method="POST">
                <div class="form-row">
                  <div class="form-group col-md-4">
                    <label>Email</label>
                    <input type="email" id="email" class="form-control" placeholder="Email">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Password</label>
                    <input type="password" id="password" class="form-control" placeholder="Password">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Username</label>
                    <input type="text" id="username" class="form-control" placeholder="Username">
                  </div>
                </div>
              
                <button onclick="createUser()" type="button" class="btn btn-primary">Registrar</button>
            </form>
          </div>
        </div>
      </div>

      <div id="listUser" class="pt-3">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">User</th>
              <th scope="col">Password</th>
              <th scope="col">Email</th>
              <th scope="col">#tags</th>
            </tr>
          </thead>
          <tbody id ="dataList">
          </tbody>
        </table>
      </div>

      <div id="modifyUser">
       <div class="modal fade" id="modalUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modify User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div>
              <form method="POST">
                <div class="modal-body">
                    <div class="form-row">
                    <input type="hidden" id="idM" class="form-control">
                      <div class="form-group col-md-4">
                        <label>Email</label>
                        <input type="email" id="emailM" class="form-control" placeholder="Email">
                      </div>
                      <div class="form-group col-md-4">
                        <label>Password</label>
                        <input type="password" id="passwordM" class="form-control" placeholder="Password">
                      </div>
                      <div class="form-group col-md-4">
                        <label>Username</label>
                        <input type="text" id="usernameM" class="form-control" placeholder="Username">
                      </div>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" onclick="udpateUser()" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
