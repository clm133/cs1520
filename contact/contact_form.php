<div class="container col-sm-6" id="contact_form">
	<form action="contact/contact_process.php" method="post">
		<div class="form-group">
			<label for="Name">Name</label>
			<input type="text" name="name" class="form-control" id="name" placeholder="optional">
		</div>
		<div class="form-group">
			<label for="initiativeValue">Email</label>
			<input type="email" name="email" class="form-control" id="email" placeholder="janedoe@email.com">
		</div>
		<div class="form-group">
			<label for="message">Message</label>
			<textarea class="form-control" name="message" rows="4" id="message" placeholder="Type your message here."></textarea>
		</div>
		<button type="submit" class="btn btn-primary">Send</button>
	</form>
</div>