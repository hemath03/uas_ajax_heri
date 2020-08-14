<div class="content-wrapper">
	<section class="content">
		<?php echo form_open_multipart('co_email/sendmail'); ?>
			<?php //var_dump($pengguna); echo "<br>".$pengguna['username']; ?>
				<div class="form-group">
					<br>
					<img width="180px" height="240px" src="<?php echo base_url().'asset/foto/MHS003.png' ?>">
					<br>
					<label>Username</label>
					<input type="email" readonly="" name="username" class="form-control" value="<?php echo $pengguna['username'] ?>">
					<label>Ubah Nama Pengguna</label>
					<input type="text" required="" name="nama" class="form-control" value="<?php echo($pengguna['nama_user']) ?>">
					<label>Ubah Password</label>
					<input type="text" required="" name="password" class="form-control" value="">
					<?php if (isset($error)) {
						echo  '<i class="text-danger">'.$error.'</i>';
					}  ?>
					<br>
				</div>
				<button type="reset" class="btn btn-danger">Reset</button>
				<button type="submit" class="btn btn-primary">Simpan</button>
			</form>
		<?php echo form_close(); ?>
	</section>
	<br>
	<br>
</div>