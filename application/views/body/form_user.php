
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">User</li>
			</ol>
		</div><!--/.row-->

	<br>


		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg>
<a href="#" style="text-decoration:none">Tambah Data User</a></div>
					<div class="panel-body">
	<?php echo $this->session->flashdata("msg");?>
					<div class="col-md-6">
					<form method="post" action="<?php echo base_url();?><?php echo $url;?>">

					<input type="hidden" class="form-control" name="id_user" value="<?php echo $id_user;?>">
					<input type="hidden" class="form-control" name="username" value="<?php echo $username;?>">
					<input type="hidden" class="form-control" name="password" value="<?php echo $password;?>">

					<?php if($flag=="edit")
					{ ?>

						<div class="form-group">
							<label>Username</label>
							<input class="form-control" name="username" placeholder="Username" value="<?php echo $username;?>" required>
						</div>

						<div class="form-group">
							<label>Password</label>
							<input class="form-control" name="password" placeholder="Password" value="<?php echo $password;?>" >
						</div>

					<?php }else{}
					?>
					<div class="form-group">
						<label>Nama</label>
						<input class="form-control" name="name"  value="<?php echo $name;?>" required>
					</div>

					<div class="form-group">
						<label>Jenis Kelamin</label>
						<?php echo form_dropdown('id_jk',$dd_jk, $id_jk, ' id="id_jk" required class="form-control"');?>
					</div>

					<div class="form-group">
						<label>Alamat</label>
						<textarea name="alamat" class="form-control" required><?php echo $alamat;?></textarea>
					</div>



										<div class="form-group">
											<label>No. Telp</label>
											<input type="number" class="form-control" name="notlp" value="<?php echo $notlp;?>">
										</div>


															<div class="form-group">
																<label>Email</label>
																<input type="email" class="form-control" name="email" value="<?php echo $email;?>">
															</div>


					<div class="form-group">
						<label>Level</label>
						<?php echo form_dropdown('id_level',$dd_level, $id_level, ' id="id_level" required class="form-control"');?>
					</div>

					<button type="submit" class="btn btn-primary">Simpan</button>
					<a href="<?php echo base_url();?>user/user_list"  class="btn btn-default">Batal</a>
				    </div>

				     </form>


					</div>
				</div>
			</div>
		</div><!--/.row-->
