<form action="user/submit" method="post" id="myForm" enctype="multipart/form-data">
	<input type="name" name="name"> <br>
	<input type="email" name="email"> <br>
	<input type="contact_number" name="contact_number"> <br>
    Select image to upload:
    <input type="file" name="img" id="img"> <br>
    <input type="submit" value="Upload Image" name="submit">
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("form").submit(function(){
    $("#myForm").submit();
  });
});
</script>