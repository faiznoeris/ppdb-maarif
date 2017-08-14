<br><br>



<div class="container"  style="padding: 32px 88px 0px 88px; width: 1500px;">

<div class="row">
  <div id="admin" class="col s12">
    <div class="card material-table">
      <div class="table-header">
        <span class="table-title">Data Blacklist</span>
        <div class="actions">

          <a href="#" class="search-toggle waves-effect btn-flat nopadding"><i class="material-icons">search</i></a>
        </div>
      </div>
      <table id="datatable">
        <thead>
          <tr>
            <th width="50">No</th>
            <th width="250">Nama</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;

          foreach ($data as $row) {
            echo "<tr>
            <td>".$no."</td>
            <td>".$row->nama_pendaftar."</td>
            </tr>";

            $no++;
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