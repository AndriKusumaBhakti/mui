<?php 
    include 'header.php'; 
    include 'config.php';
    $per_hal=5;
    $jumlah_record=mysqli_query($conn, "SELECT COUNT(*) jumlah from m_channel_youtobe");
    $jum=mysqli_fetch_array($jumlah_record);
    $halaman=ceil($jum['jumlah'] / $per_hal);
    $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
    $start = ($page - 1) * $per_hal;
?>

<h3><span class="glyphicon glyphicon-time"></span>  Jadwal Video Streaming</h3>
<br/>
<br/>
<form action="#" method="get">
	<div class="input-group col-md-5 col-md-offset-7">
		<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-search"></span></span>
		<input type="text" class="form-control" placeholder="Cari jadwal di sini .." aria-describedby="basic-addon1" name="cari">	
	</div>
</form>
<br/>
<div class="container-fluid">
    <div class="row">
       <div class="col-xs-12">
			<table class="table table-hover">
				<tr>
					<th class="col-md-1">No</th>
					<th class="col-md-2">Judul</th>
					<th class="col-md-3">Link</th>
					<th class="col-md-3">Deskripsi</th>
					<th class="col-md-2">Jam Tanyang</th>
					<th class="col-md-1">Aksi</th>
				</tr>
				<?php 
				if(isset($_GET['cari']) && !empty($_GET['cari'])){
					$cari=mysqli_real_escape_string($_GET['cari']);
					$brg=mysqli_query($conn, "select * from m_channel_youtobe where judul like '$cari'");
				}else{
					$brg=mysqli_query($conn, "select * from m_channel_youtobe limit $start, $per_hal");
				}
				$no=1;
				while($b=mysqli_fetch_array($brg)){
					?>
					<tr>
						<td><?php echo $no++ ?></td>
						<td><?php echo $b['judul'] ?></td>
						<td><a href = "<?php echo $b['link_channel'] ?>"><?php echo $b['link_channel'] ?></a></td>
						<td><?php echo $b['description'] ?></td>
						<td><?php echo $b['time_from_show'];?> - <?php echo $b['time_to_show'];?></td>
						<td>
                            <?php 
								?><a style="margin-bottom:10px" onclick="if(confirm('Cek detail sekarang ??')){ location.href='data_pengguna.php?id_pengguna=<?php echo $b['id_pengguna']; ?>' }"  target="_blank" class="btn btn-danger">Detail </a>&nbsp;&nbsp;<?php
								?><a style="margin-bottom:10px" onclick="if(confirm('Apakah anda yakin ingin hapus data ini ??')){ location.href='hapus_pengguna.php?id_pengguna=<?php echo $b['id_pengguna']; ?>' }"  target="_blank" class="btn btn-danger">   Hapus</a><?php
							?>
						</td>
					</tr>		
					<?php 
				}
				?>
				<tr>
					<td colspan="5">Total</td>
					<td>			
					<?php 
						$x=mysqli_query($conn, "select COUNT(*) as total from m_channel_youtobe");	
						$xx=mysqli_fetch_array($x);			
						echo $xx['total'];		
					?>
					</td>
				</tr>
			</table>
			<ul class="pagination">			
						<?php 
						for($x=1;$x<=$halaman;$x++){
							?>
							<li><a href="?page=<?php echo $x ?>"><?php echo $x ?></a></li>
							<?php
						}
						?>						
			</ul>
		</div>
	</div>
</div>
<!-- modal input 
<div id="myModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Tambah Barang Baru</h4>
			</div>
			<div class="modal-body">
				<form action="tmb_brg_act.php" method="post">
					<div class="form-group">
						<label>Nama Barang</label>
						<input name="nama" type="text" class="form-control" placeholder="Nama Barang ..">
					</div>
					<div class="form-group">
						<label>Jenis</label>
						<input name="jenis" type="text" class="form-control" placeholder="Jenis Barang ..">
					</div>
					<div class="form-group">
						<label>Suplier</label>
						<input name="suplier" type="text" class="form-control" placeholder="Suplier ..">
					</div>
					<div class="form-group">
						<label>Harga Modal</label>
						<input name="modal" type="text" class="form-control" placeholder="Modal per unit">
					</div>	
					<div class="form-group">
						<label>Harga Jual</label>
						<input name="harga" type="text" class="form-control" placeholder="Harga Jual per unit">
					</div>	
					<div class="form-group">
						<label>Jumlah</label>
						<input name="jumlah" type="text" class="form-control" placeholder="Jumlah">
					</div>																	

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
					<input type="submit" class="btn btn-primary" value="Simpan">
				</div>
			</form>
		</div>
	</div>
</div>-->
<script type="text/javascript">
	$(document).ready(function(){
		$("#tgl").datepicker({dateFormat : 'yy/mm/dd'});							
	});
</script>
<?php 
include 'footer.php';

?>
