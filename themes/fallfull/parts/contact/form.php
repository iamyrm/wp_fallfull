<div id="form_status"></div>
<div class="contact-form">
	<form type="POST" id="fruitkha-contact" onSubmit="return valid_datas( this );">
		<p>
			<input type="text" placeholder="Name" name="name" id="name">
			<input type="email" placeholder="Email" name="email" id="email">
		</p>
		<p>
			<input type="tel" placeholder="Phone" name="phone" id="phone">
			<input type="text" placeholder="Subject" name="subject" id="subject">
		</p>
		<p><textarea name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea></p>
		<p><input type="submit" value="Submit"></p>
	</form>
</div>


<?php // echo do_shortcode('[[contact-form-7 id="e3cf714" title="Contact Page Form"]'); 
?>