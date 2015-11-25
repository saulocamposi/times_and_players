<html lang="pt" ng-app="futebol">
<head>
	<meta charset="utf-8">
	<title>Teste</title>
<link href="_css/style.css" media="screen" rel="stylesheet" type="text/css">

</head>
<body ng-controller="mainCtrl">

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

<h1>Jogadores</h1>

	<div class="barForm barCad">
		<h2>Cadastrar novo jogador:</h2>

		<form class="formHome" name="formJogadores" ng-submit="new()" novalidate>
			<div class="colF">
				<label>Nome</label>
			<input type="text"
				class="text"
				id="nomejogador"
				ng-model="nomejogador"
				required
				oninvalid="this.setCustomValidity('Por favor preencha o nome do jogador')"
				oninput="setCustomValidity('')"
				/>
			</div>

			<div class="colF">
				<label>Nacionalidade</label>
				<select name="field"
								class="min"
								ng-model="nacionalidade"
								ng-options="item.nacionalidade for item in nacionalidades"
								required>
								<option selected disabled value="">Nacionalidade</option>
				</select>
			</div>

			<div class="colF">
				<label>Posição</label>
				<select name="field"
								class="min"
								ng-model="posicao"
								ng-options="item.posicao for item in posicoes"
								required>
								<option selected disabled value="">Posição</option>
				</select>
			</div>

			<div class="colF">
				<label>Idade</label>
				<input type="text"
							class="text min"
							ng-model="idade"/>
			</div>

			<div class="colF last">
				<label>Time</label>
				<select name="field"
								ng-model="time"
								ng-options="item.nome for item in times"
								required>
								<option selected disabled value="">Time</option>
				</select>
			</div>

			<button class="button">Cadastrar</button>
		</form>
	</div>

	<table class="tableCad">
		<tr class="title">
			<td>Nome</td>
			<td>Nacionalidade</td>
			<td>Posição</td>
			<td>Idade</td>
			<td>Time</td>
			<td></td>
		</tr>
		<tr ng-repeat= "jogador in jogadores.collection" ng-class="{color: $odd}" ng-include="getTemplate(jogador)">
		</tr>
</table>


<script type="text/ng-template" id="display">
			<td class="nomeTime">{{jogador.nome}}</td>
			<td>{{jogador.nacionalidade}}</td>
			<td>{{jogador.posicao}}</td>
			<td>{{jogador.idade}}</td>
			<td>{{jogador.time}}</td>
			<td class="icons">
				<a href="#" class="icoEdit" title="Editar" ng-click="edit(jogador)"></a>
				<a href="#" class="icoDel" title="Excluir" ng-click="delete(jogador.id)"></a>
			</td>
			</script>
		<script type="text/ng-template" id="edit">
			<td class="nomeTime">
				<input type="text" class="text" ng-model="jogador.nome"/>
			</td>
			<td><select name="field"
							class="min"
							ng-model="jogador.nacionalidade"
							ng-options="item.nacionalidade as item.nacionalidade for item in nacionalidades"
							required>

							</select>
			</td>
			<td>
			<select name="field"
							class="min"
							ng-model="jogador.posicao"
							ng-options="item.posicao as item.posicao for item in posicoes"
							required>

					</select>
			</td>
			<td>
				<input type="text" class="text" ng-model="jogador.idade" required/>
			</td>
			<td>
			<select name="field"
							class="min"
							ng-model="jogador.time"
							ng-options="item.nome as item.nome for item in times"
							required>
					</select>
			</td>
			<td class="icons">
				<a href="#" class="icoSave" title="Editar" ng-click="update(jogador)"></a>
				<a href="#" class="icoCancel" title="Excluir" ng-click="delete(jogador.id)"></a>
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
<script src="_js/jogadores.js"></script>


</body>
</html>
