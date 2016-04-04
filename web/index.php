<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Contact</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
		<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	</head>	
	<body>
		<div class="navbar-wrapper">
			<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed"
						data-toggle="collapse" data-target="#navbar" aria-expanded="false"
						aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span> <span
							class="icon-bar"></span> <span class="icon-bar"></span> <span
							class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">Contact+</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li class="active"><a href="index.php"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Formulaire</a></li>
						<li><a href="tableau.php"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Tableau </a></li>
					</ul>
				</div>
			</nav>
		</div>
		<?php $page = index ?>

		<div id="page" class="container">
			<div class ="row">
				<h4> Formulaire de Contact</h4>
				<div class="list-group-item">		
					<form id="ajouterContact" method="POST">
						<div class ="row">
							<div class ="col-sm-6">
								<div class="form-group">
									<label for="nomEntreprise" class="control-label"> Nom de l'entreprise :</label><br/>
									<input type="text" name="nomEntreprise" id="nomEntreprise" class="form-control" placeholder="Credit Agricole" value=""/>
									<div class="help-block"></div>
								</div>
								<div class="form-group">
									<label for="nomContact" class="control-label"> Nom :</label><br/>
									<input type="text" name="nomContact" id="nomContact" class="form-control" placeholder="Grosjean" value=""/>
									<div class="help-block"></div>
								</div>
								<div class="form-group">
									<label for="prenomContact" class="control-label"> Prenom :</label><br/>
									<input type="text" name="prenomContact" id="prenomContact" class="form-control" placeholder="Milan" value=""/>
									<div class="help-block"></div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<input type="submit" class="btn btn-success" id="ajouter" value="Ajouter">
								<button type="button" class="btn btn-default"> Annuler </button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>


<?php 
	//Connexion Base de Données
	try
	{
		$bdd = new PDO('mysql:host=192.168.132.147:3307;dbname=contact','root','root');
	}
	catch (Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
	}
	
	//Traitement
	if($_POST['nomEntreprise'] != '' && $_POST['nomContact'] != '' && $_POST['prenomContact'] != '')
	{
		$requete = $bdd->prepare('INSERT INTO PERSONNE(ENTREPRISE, NOM, PRENOM) VALUES (:ENTREPRISE, :NOM, :PRENOM)');
		$requete->execute(array(
			'ENTREPRISE' => $_POST['nomEntreprise'],
			'NOM' => $_POST['nomContact'],
			'PRENOM' => $_POST['prenomContact']
		));
		header("Location: index.php");

	}
?>

<script type="text/javascript">
	<!--
	$(function () { //pour faire du _blank valide W3C
		$('body').on('click', '.blank', function(e){
			e.preventDefault();
			window.open($(this).attr('href'));
		});
		$('body').on('click', '.loader', function(e){
			$(this).html('<img src="image/ajax-loader.gif" title="Chargement" alt="Chargement">');
		});
	});
	
	$("#ajouter").click(function(){
		verif= true;
		$('.help-block').hide();
		$('.has-error').removeClass("has-error");
		$('.has-warning').removeClass("has-warning");
		
		if($("#nomEntreprise").val() == ''){
			$("#nomEntreprise").parent().addClass("has-error");
			$("#nomEntreprise").parent().children('.help-block').show().html("<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span> Veuillez entrer le nom de l'entreprise.");
			verif = false;
		}
		
		if($("#nomContact").val() == ''){
			$("#nomContact").parent().addClass("has-error");
			$("#nomContact").parent().children('.help-block').show().html("<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span> Veuillez entrer le nom de votre contact.");
			verif = false;
		}
		if($("#prenomContact").val() == ''){
			$("#prenomContact").parent().addClass("has-error");
			$("#prenomContact").parent().children('.help-block').show().html("<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span> Veuillez entrer le prenom de votre contact.");
			verif = false;
		}
		return verif;
	});

	//-->
</script>