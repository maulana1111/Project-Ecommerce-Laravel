<div class="row">
    <div class="col-12">
        <div class="bg-inverse">
            <p class="color-light text-center py-3 m-0">Copyright &copy; <?php echo date('Y') ?></p>
        </div>
    </div>
</div>

<div class="modal fade"  id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Login</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="/memberArea/login" method="POST">
					{{ csrf_field() }}
					<div class="form-group">
						<input type="text" class="form-control" name="username" placeholder="ID">
					</div>
					<div class="form-group">
						<input type="password" class="form-control" name="password" placeholder="Password">
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-primary form-control" name="submit" value="Login">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>