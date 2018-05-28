<!DOCTYPE html>
<html>
<head>
	<title>Coba data Tabel</title>
<style type="text/css" title="currentStyle"> 
  @import "css/demo_table_jui.css";
  @import "css/TableTools.css";
</style>
<script type="text/javascript" language="javascript" src="js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
<script type="text/javascript" language="javascript" src="js/ZeroClipboard.js"></script>
<script type="text/javascript" language="javascript" src="js/TableTools.js"></script>
<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
$('#datatables').dataTable({ 
"sPaginationType": "full_numbers",
"sDom": 'T<"clear">lfrtip',
"oTableTools": {
"sSwfPath": "swf/copy_csv_xls_pdf.swf"
}
});
} );
</script>
<style>
.dataTables_length, .dataTables_filter, .dataTables_info, .dataTables_paginate{
font-size:12px;
margin-top:10px;
}
</style>
<body>
<table class='list display' id='datatables' cellspacing="0" width="100%">  
     <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Nim</th>
              <th>Password</th>
              <th>Angkatan</th>
              <th>Status</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tfoot>
  
              <th>No</th>
              <th>Nama</th>
              <th>Nim</th>
              <th>Password</th>
              <th>Angkatan</th>
              <th>Status</th>
          </tfoot>
        
        <tbody>
        
        <?php
        include('kon.php');
          
          $sql = "SELECT * FROM tb_delegasi ORDER BY id_delegasi DESC";
          $query = mysqli_query($koneksi,$sql);
          if(mysqli_num_rows($query)==0){
            //jika data kosong, maka akan menampilkan row kosong
            echo '<tr><td colspan="6">Tidak ada data!</td></tr>';
          }else{ 
            $no = 1;   
            while ($data = mysqli_fetch_assoc($query)){ ?>
              <tr>
                <td><?php echo $no;?></td>
                <td><?php echo $data['nama_delegasi'];?></td>
                <td><?php echo $data['nim'];?></td>
                <td><?php echo $data['password'];?></td>
                <td><?php echo $data['angkatan'];?></td>
                <td><?php echo $data['status'];?></td> 
                <td><?php echo '<a class="fa fa-pencil" href="index_admin.php?page=edit_delegasi&id='.$data['id_delegasi'].'">Edit</a> / 
                <a class="fa fa-trash" href="php/delegasi/hapus.php?id='.$data['id_delegasi'].'" onclick="return confirm(\'Apakah Anda Yakin Ingin Mengahapus Data ini?\')">Hapus</a>';?>
                </td>

              </tr>
        <?php 
            $no++;
            }
          }  
        ?>

        </tbody>
      </table>  

</body>
</html>
