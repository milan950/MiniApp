<!DOCTYPE html>
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
	$response = $bdd->query('SELECT * FROM PERSONNE');
	$donnees = $response->fetchAll(PDO::FETCH_OBJ);
?>

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
		<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.css">
		<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.js"></script>

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
						<li><a href="index.php"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Formulaire</a></li>
						<li class="active"><a href="tableau.php"><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Tableau </a></li>
					</ul>
				</div>
			</nav>
		</div>
		<div id="page" class="container">
			<div class ="row">
				<h4> Tableau</h4>
				<div class="resultats">
					<table id="dataTables" class="display" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>Nom Entreprise</th>
								<th>Nom Contact</th>
								<th>Prenom Contact</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach($donnees as $k => $v){?>
							<tr id="<?php echo $v->ID ?>">
								<td><?php echo $v->ENTREPRISE ?></td>
								<td><?php echo $v->NOM ?></td>
								<td><?php echo $v->PRENOM ?></td>
							</tr>
							<?php } ?>
						</tbody>
						<tfoot>
							<tr>
								<th>Nom Entreprise</th>
								<th>Nom Contact</th>
								<th>Prenom Contact</th>		
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</body>
</html>
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
	var dataTable = $('#dataTables').DataTable({ //appel de la fonction js qui transforme le tableau
		language: {
           url: "<?php echo BASE_URL;?>js/i18n/french.json" //traduction
               
        },
        "order": [[ 1, "asc" ]],

        "columnDefs": [ {

        "targets": 'no-sort',

        "orderable": false,

        } ]

                
	});
	
	//-->
</script>