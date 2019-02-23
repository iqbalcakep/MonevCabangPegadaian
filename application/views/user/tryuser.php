<table class="table table-striped table-hover">
	<thead>
		<tr>
			<th>id</th>
			<th>nama cabang</th>
			<th>username</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($user as $key): ?>
		<tr>
			<td><?php echo $key->id_user ?></td>
			<td><?php echo $key->nama ?></td>
			<td><?php echo $key->username ?></td>
			<td> <a href="<?php  echo site_url('user/updateform/').$key->id_user?>"> edit</a> </td>
			<td> <a href="<?php  echo site_url('user/delete/').$key->id_user?>"> delete</a> </td>
		</tr>
		<?php endforeach ?>
		
	</tbody>
</table>

<br><br>

<?php echo form_open('user/input'); ?>
	<legend>User</legend>

	<div class="form-group">
		<label for="">Cabang</label>
		<input type="text" class="form-control" name="nama" id="" placeholder="Input field">
		<label for="">username</label>
		<input type="text" class="form-control" name="username" id="" placeholder="Input field">
		<label for="">Password</label>
		<input type="text" class="form-control" name="password" id="" placeholder="Input field">
	</div>

	
	<button type="submit" class="btn btn-primary">Submit</button>
</form>
<?php echo form_close(); ?>