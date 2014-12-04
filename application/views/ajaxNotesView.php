<html>
<head>
	<title>Ajax Notes</title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).on('submit', 'form', function(){
	var that = this;
		$.post(
			$(this).attr('action'),
			$(this).serialize(),
			function(return_data)
			{
				if(return_data.action == 'addNote')
				{
$('.all-notes').prepend(""+
	"<div style='display:none'>"+
		"<form method='post' action='/updateNote'>"+
			"<input type='text' name='content' value='"+$('.noteContent').val()+"'>"+
			"<input type='hidden' name='id' value='"+return_data.result_id+"'>"+
		"</form>"+
		"<form method='post' action='/deleteNote/"+return_data.result_id+"'>"+
			"<input type='submit' value='DEL'>"+
		"</form>"+
	"</div>");
$('.all-notes > div:first-child').css('opacity', 0).slideDown('slow').animate({ opacity: 1 },{ queue:false, duration: 'slow' });
				}
				else if ( return_data.action =='deleteNote')
				{
$(that).parent().css('opacity', 1).slideUp('slow').animate({ opacity: 0 },{ queue:false, duration: 'slow' });
				}
			}, 'json'
		);
		return false;
	})
</script>
</head>
<body>
	<form method='post' action='addNote'>
		<input type='text' class='noteContent' name='content' placeholder='Enter note here...'>
		<input type='submit' value='Add a Note'>
	</form>
	<div class='all-notes'>
<?php 	foreach($results as $result)
		{
?>			<div>
				<form method='post' action='/updateNote'>
					<input type='text' name='content' value='<?= $result['content']?>'>
					<input type='hidden' name='id' value='<?= $result['id'] ?>'>
				</form>			
				<form method='post' action="/deleteNote/<?= $result['id'] ?>">
					<input type='submit' value='DEL'>
				</form>		
			</div>
<?php 	}
?>
	</div>
</body>
</html>