<?php
require_once 'include/session.inc.php';
$pageTitle = isset($_GET["pt"])?$_GET["pt"]:"Note Share";

if (empty($pageTitle)){
    $pageTitle="Note Share";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="definition" content="Organize and share your markdown-flavored findings with others!">
	<meta name="author" content="Dylan Roberts: dylan.roberts@georgebrown.ca / Sean Price: sean.price@georgebrown.ca">
	<?php include_once("favicon.php")?>
	<link rel="stylesheet" href="css/materialize.css">
	<script src="js/materialize.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Chewy|Homemade+Apple|Pompiere" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="css/github-markdown.css">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.8.0/styles/default.min.css">
	<link rel="stylesheet" href="css/syntaxTheme.css">
	<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.8.0/highlight.min.js"></script>
	<script>hljs.initHighlightingOnLoad();</script>
	<title><?=$pageTitle?></title>

	<style>
		.markdown-body {
			box-sizing: border-box;
			min-width: 200px;
			max-width: 980px;
			margin: 0 auto;
			padding: 45px;
		}
	</style>

</head>
<body>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.js"></script>

<header >
<div class="container">
	<div class="row">
    	<?php include_once("nav.php")?>
	</div>

</header>

<main class="row" style="padding-left:330px;" >

    <div class="content  col s10">
        <?php include("contentController.php")?>
	</div>

	<div class="fixed-action-btn">
		<a class="btn-floating btn-large red tooltipped" data-position="left" data-delay="50" data-tooltip="Write a note" href="?cc=addnote&pt=New Note" title="Write a New Note" >
			<i class="large material-icons">mode_edit</i>
		</a>

		<ul>
			<li><a class="btn-floating tooltipped yellow darken-2" data-position="left" data-delay="50" data-tooltip="Markdown Guide" href="https://guides.github.com/features/mastering-markdown/#examples" target="_blank"><i class="material-icons">live_help</i></a></li>
			<li><a class="btn-floating blue tooltipped" data-position="left" data-delay="50" data-tooltip="Add a Group" href="?cc=addgroup&pt=Add Group"><i class="material-icons">supervisor_account</i></a></li>
			<li><a class="btn-floating green tooltipped" data-position="left" data-delay="50" data-tooltip="Upload a Note" href="?cc=uploadnote&pt=Upload Note" title="Upload a Note" class="col s2 "><i class="material-icons">publish</i></a></li>
		</ul>


</main>
<a class="showSource" href="/view_folder/vs.php?s=<?php echo __FILE__?>" target="_blank" >View Source</a>
</body>
</html>