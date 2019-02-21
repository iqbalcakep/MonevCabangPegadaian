<?php echo form_open('user/update/'.$this->uri->segment(3)); ?>
	<legend>User</legend>

	<div class="form-group">
		<label for="">Cabang</label>
		<input type="text" class="form-control" name="nama" id="" value="<?php echo $user[0]->nama ?>">
		<label for="">username</label>
		<input type="text" class="form-control" name="username" id="" value="<?php echo $user[0]->username ?>">
		<label for="">Password</label>
		<input type="text" class="form-control" name="password" id="" value="<?php echo $user[0]->password ?>">
	</div>

	
	<button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php echo form_close(); ?>