<p class="h1 text-center py-3">New Student</p>
<div class="container">
	<form method="post" id="createStudent">
		<p id="error"></p>
		<div class="input-group my-4">
			<div class="input-group-prepend">
				<span class="input-group-text"><i class="fa fa-envelope"></i></span>
			</div>
			<input type="text" class="form-control" name="email" placeholder="Email address">
		</div>
		<div class="input-group my-4 ">
			<div class="input-group-prepend">
				<span class="input-group-text"><i class="fa fa-lock px-1"></i></span>
			</div>
			<input type="password" class="form-control password" name="password" placeholder="Password">
			<div class="input-group-prepend">
				<button class="input-group-text showPassword"><img src="../img/eye.png" height="20"></button>
			</div>
			<div class="input-group-prepend">
				<button class="input-group-text generatePassword">Generate password</button>
			</div>
		</div>
		<div class="form-group text-center col-12 px-4 py-1">
			<button id="sendCreateStudent" type="submit" class="btn btn-primary w-50 createStudent">Create student</button>
		</div>
		
	</form>
</div>