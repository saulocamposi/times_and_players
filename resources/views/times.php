<html lang="pt" ng-app="futebol">
<head>
	<meta charset="utf-8">
	<title>Teste</title>
<link href="_css/style.css" media="screen" rel="stylesheet" type="text/css">
</head>
<body ng-controller="timesCtrl">
<header>

<div class="banner01"></div>
	<div class="header">
		<div class="container">
			<nav>
				<ul class="menu">
					<li class="logo"><a href="#" title="COSMOS"><img src="_img/logo.png" alt="Cosmos" /></a></li>
					<li class="link left"><a href="/" title="TIMES">TIMES</a></li>
					<li class="link left"><a href="pageJogadores" title="JOGADORES">JOGADORES</a></li>
				</ul>
			</nav>
		</div>
	</div>
</header>

<div class="container">

<h1>Times</h1>

	<div class="barForm barCad">
		<h2>Cadastrar novo time:</h2>

	<form class="formHome" name="timeForm" ng-submit="new()">
			<div class="colF">
				<label>Nome do Time</label>
				<input type="text"
							class="text"
							ng-model="time"
							required
							oninvalid="this.setCustomValidity('Preencha o nome do time')"
							oninput="setCustomValidity('')"
							/>
			</div>

			<div class="colF">
				<label>Estado</label>
					<select name="field"
									class="min"
									ng-model="estado"
									ng-options="estado.nome for estado in collEstados">
									<option selected disabled value="">Estados</option>
					</select>
			</div>

			<div class="colF">
				<label>Cidade</label>
					<select name="field"
									ng-model="cidade"
									ng-options="item for item in estado.cidades"
									ng-disabled="!cidades"
									required>
									<option selected disabled value="">Cidades</option>
					</select>
			</div>

			<div class="colF last">
				<label>Divisão</label>
				<select name="fielddivisao"
								class="min"
								ng-model="divisao"
								ng-options="item.divisao for item in divisoes"
								required>
								<option selected disabled value="">Divisão</option>
				</select>
			</div>

			<button class="button">Cadastrar</button>
		</form>
	</div>


	<table class="tableCad">
		<tr class="title">
			<td>Nome do Time</td>
			<td>Estado</td>
			<td>Cidade</td>
			<td>Divisão</td>
			<td></td>
		</tr>
		<tr ng-repeat= "time in times.collection" ng-class="{color: $odd}" ng-include="getTemplate(time)">

		</tr>
	</table>

	<script type="text/ng-template" id="display">
		<td class="nomeTime">{{time.nome}}</td>
		<td>{{time.estado}}</td>
		<td>{{time.cidade}}</td>
		<td>{{time.divisao}}</td>
		<td class="icons">
			<a href="#" class="icoEdit" title="Editar" ng-click="edit(time)"></a>
			<a href="#" class="icoDel" title="Excluir" ng-click="delete(time.id)"></a>
		</td>
 </script>


	<script type="text/ng-template" id="edit">
			<td class="nomeTime">
				<input type="text" class="text" ng-model="time.nome"/>
			</td>
			<td>
			<select name="field"
							class="min"
							ng-model="time.estado"
							ng-options="estado.nome for estado in collEstados"
							required>
			</select>
			</td>
			<td>

			<select name="field"
							ng-model="time.cidade"
							ng-options="cidade as cidade for cidade in time.estado.cidades"
							required>
			</select>
			</td>
			<td>
			<select name="fielddivisao"
							class="min"
							ng-model="time.divisao"
							ng-options="item.divisao as item.divisao for item in divisoes"
							required>
			</select>
			</td>
			<td class="icons">
				<a href="#" class="icoSave" title="Editar" ng-click="update(time)"></a>
				<a href="#" class="icoCancel" title="Excluir" ng-click="delete(time.id)"></a>
			</td>
	</script>

</div>

<footer>
	<div class="footer">
		<div class="container">
			<div class="col1">
			</div>
			<div class="col2">

			</div>
			<div class="col3">

				Teste Desenvolvedor PHP <br /> Freead Comunicação 2015.

			</div>
		</div>
	</div>
</footer>

<!-- JS -->
<link href='http://fonts.googleapis.com/css?family=Alef:400,700' rel='stylesheet' type='text/css'>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0-beta.2/angular.min.js" charset="utf-8"></script>
<script src="_js/main.js"></script>
<script src="_js/times.js"></script>

</body>
</html>
