<br><br>



<div class="container"  style="padding: 32px 88px 0px 88px; width: 1500px;">

  <div class="row">
    <div id="admin" class="col s12">
      <div class="card material-table">
        <div class="table-header">
          <span class="table-title">Data User</span>
          <div class="actions">

            <a href="#" class="search-toggle waves-effect btn-flat nopadding"><i class="material-icons">search</i></a>
          </div>
        </div>
        <table id="datatable">
          <thead>
            <tr>
              <th width="50">No</th>
              <th width="250">Nama</th>
              <th width="250">Date Joined</th>
              <th width="250">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;

            foreach ($data as $row) {
              $session        =   $this->session->all_userdata();
              if($row->id_user != $session['id_user']){
                echo "
                <tr>
                <td>".$no."</td>
                <td>".$row->username."</td>
                <td>".$row->date_joined2."</td>
                <td>
                <a class='btn-floating btn-small tooltipped red darken-2 modal-trigger' data-position='right' data-delay='50' data-tooltip='Delete User' href='#modalDeleteUser".$row->id_user."'>
                <i class='material-icons'>delete</i>
                </a> 
                </td>
                </tr>";

                echo "
                <div id='modalDeleteUser".$row->id_user."' class='modal' style='width: 400px;'>
                <div class='modal-content'>
                <h4>Delete Data User <i><b>".$row->username."</b></i> ?</h4>
                <p><b>!WARNING!</b> This can't be undone!</p>
                </div>
                <div class='modal-footer centered'>
                <a href='".base_url('dashboard/del_user/'.$row->id_user)."' class='modal-action modal-close waves-effect waves-green btn-flat'>Ok</a>
                <a href='#!' class='modal-action modal-close waves-effect waves-green btn-flat'>Cancel</a>
                </div>
                </div>";
                $no++;
              }
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>



</div>

</div>



<br><br>