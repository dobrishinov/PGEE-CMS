<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Do.IT - Admin panel</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/plugins/summernote/summernote.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">

</head>

<body>

<div class="summernote container">
	<div class="row">
		<div class="span12">
			<h2>POST DATA</h2>
			<pre>
			<?php print_r($_POST); ?>
			</pre>
			<pre>
			<?php echo htmlspecialchars($_POST['content']); ?>
			</pre>
		</div>
	</div>
	<div class="row">
		<form class="span12" id="postForm" action="" method="post" enctype="multipart/form-data">
			<fieldset>
				<legend>Make Post</legend>
				<p class="container"><textarea class="input-block-level" id="summernote" name="content" rows="18"></textarea>
				</p>
			</fieldset>
			<button type="submit" class="btn btn-primary">Save changes</button>
			<button type="button" id="cancel" class="btn">Cancel</button>
		</form>
	</div>
</div>


</div>
</div>

<!-- Mainly scripts -->
<script src="js/jquery-2.1.1.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>
<script src="js/plugins/summernote/summernote.min.js"></script>
<script type="text/javascript">
    $('#summernote').summernote({
        height: '300px',
        onImageUpload: function(files) {
            var $editor = $(this);
            var data = new FormData();
            data.append('file', files[0]);
            $.ajax({
                url: 'saveimage.php',
                method: 'POST',
                data: data,
                processData: false,
                contentType: false,
                success: function(data) {
                    var imgURL = data.url;
                    $editor.summernote('insertImage', imgURL);
                }
            });
        }
    });

</script>

</body>
</html>
