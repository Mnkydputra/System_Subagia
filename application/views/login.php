<!DOCTYPE html>
<html>

<head>
	<title>ERP SYSTEM</title>
	<meta name="viewport" content="width=device-width , initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/login.css" media="screen">
	<link rel="icon" type="image/png" href="<?php echo base_url()?>assets/img/Erp.png">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
	<div class="container">
		<div class="brand-logo"><img class="brand-logo" src="<?php echo base_url() ?>assets/img/Erp.png"></div>
		<div class="brand-title">KWE SYSTEM</div><br>
		<form method="post" onsubmit="return validasi()" action="<?= base_url('Login/Ceklogin') ?>">
			<div class="input">
				<!-- <label>NPK</label> -->
				<input type="email" name="email" id="email" autocomplete="off" placeholder="Alamat Email" data-validate="NPK is Required"><br>
				<!-- <label>PASSWORD</label> -->
				<input type="password" name="password" id="password" placeholder="Masukan Password anda" data-validate="Password is Reuired">
				<button type="submit">LOGIN</button>
			</div>
		</form>
		<div class="alert">
			<?php if ($this->session->flashdata("nouser")) { ?>
				<span style="color:red">user tidak di temukan</span>
			<?php } else if ($this->session->flashdata('info')) { ?>
				<small style="color:red"><?= $this->session->flashdata('info'); ?></small>
			<?php } ?>
		</div>
		<div class="akun">
			<a href="Login/Create_akun">Daftar Akun</a></label>
		</div>


		<div class="copyright">
			<a href="https://wa.me/6287886511096?text=Murray%20are%20you%20there" target="_blank">&copy;<b>Rizky Subagia</b></a>
		</div>
	</div>


	<script type="text/javascript">
		function validasi() {
			if (document.getElementById('email').value == "") {
				alert('Email belum di isi');
				return false;
			} else if (document.getElementById('password').value == "") {
				alert('Harap masukan password');
				return false;
			}
		}
	</script>

	<?php if ($this->session->flashdata('sukses')) { ?>
		<script type="text/javascript">
			Swal.fire({
				title: 'Berhasil!',
				text: 'Password Anda : S1g4p123',
				icon: 'success',
				confirmButtonText: 'Cool'
			})
		</script>

	<?php } ?>
</body>
</html>