<script src="https://kit.fontawesome.com/27dad3c8cd.js" crossorigin="anonymous"></script>

<?php
	if(isset($_POST['primulNR'])) {
		$a = $_POST['primulNR'];
		$b = $_POST['aldoileaNR'];
		$operatie = $_POST['operatie'];
		$adunare = "+";
		$scadere = "-";
		$impartire = "/";
		$inmultire = "*";

		if($operatie == $adunare) {
			$resultat = $a + $b;
		}
		if($operatie == $scadere) {
			$resultat = $a - $b;
		}
		if($operatie == $impartire) {
			$resultat = $a / $b;
		}
		if($operatie == $inmultire) {
			$resultat = $a * $b;
		}
		$resultat = $resultat;
	} else {
		$resultat = 0;
	}
?>

<div class='calculator' id='calculator'>
	<form action='' method='POST' id='formCalc'>
		<div class='rezultat'>
			<div id='rezultat'><?php print $resultat; ?></div>
		</div>
		<?php if(isset($_POST['primulNR'])) {
				echo "<input type='hidden' name='primulNR' id='primulNR' value='$resultat'>";
			} else {
				echo "<input type='hidden' name='primulNR' id='primulNR'>";
			}
		?>
		
		<input type='hidden' name='aldoileaNR' id='aldoileaNR'>
		<input type='hidden' name='operatie' id='operatie'>
		<div class='operatii-sus'>
			<span class='tasta' id='impartire' onclick="clickTasta(this)">/</span>
			<span class='tasta' id='inmultire' onclick="clickTasta(this)">*</span>
			<span class='tasta' id='scadere' onclick="clickTasta(this)">-</span>
			<span class='tasta tasta-del' id='sterge' onclick="clickTasta(this)"><i class="fas fa-backspace"></i></span>
		</div>
		<div class='cifre-centru'>
			<div class='cifre'>
				<span class='tasta' id='sapte' onclick="clickTasta(this)">7</span>
				<span class='tasta' id='opt' onclick="clickTasta(this)">8</span>
				<span class='tasta' id='noua' onclick="clickTasta(this)">9</span>
				<span class='tasta' id='patru' onclick="clickTasta(this)">4</span>
				<span class='tasta' id='cinci' onclick="clickTasta(this)">5</span>
				<span class='tasta' id='sase' onclick="clickTasta(this)">6</span>
				<span class='tasta' id='unu' onclick="clickTasta(this)">1</span>
				<span class='tasta' id='doi' onclick="clickTasta(this)">2</span>
				<span class='tasta' id='trei' onclick="clickTasta(this)">3</span>
				<span class='tasta tasta-lata' id='zero' onclick="clickTasta(this)">0</span>
				<span class='tasta' id='punct' onclick="clickTasta(this)">.</span>
			</div>
			<div class='operatii-lateral'>
				<span class='tasta tasta-lunga' id='adunare' onclick="clickTasta(this)">+</span>
				<span class='tasta tasta-lunga' id='egal' onclick="clickTasta(this)" type='submit'>=</span>
			</div>
		</div>
	</form>
</div>

<style>
	body {
		display: flex;
		align-items: center;
		justify-content: center;
		user-select:none;
	}
	.calculator {
		width: 300px;
		background-color: #dadada;
		padding: 5px;
		border: 2px solid #1c1c1c;
		border-radius: 3px;
	}

	.rezultat {
		height: 70px;
		background-color: #fff;
		text-align: center;
		display: flex;
		align-items: center;
		justify-content: flex-end;
		border: 2px solid #1c1c1c;
		border-radius: 5px;
		color: #272727;
	}

	#rezultat {
		margin-right: 10px;
		text-align: right;
		width: 286px;
		font-size: 70px;
		word-wrap: break-word;
	}

	.operatii-sus {
		width: 100%;
		display: flex;
		justify-content: center;
		margin: 10px 0 0 0;
	}

	.operatii-jos {
		width: 100%;
		display: flex;
		justify-content: center;
		width: 216px;
		margin: 0 4px;
	}
	.cifre-centru {
		display: flex;
	}
	
	.cifre {
		display: flex;
		flex-wrap: wrap;
		width: 216px;
		margin: 0 4px;
	}

	.tasta {
		font-size: 50px;
		width: 60px;
		height: 60px;
		background-color: #1c1c1c;
		color: #fff;
		border: 1px solid #1c1c1c;
		border-radius: 5px;
		margin: 5px;
		cursor: pointer;
		display: flex;
		align-items: center;
		justify-content: center;
	}
	.tasta:hover {
		background-color: #363636;
	}
	.active {
		background-color: #363636;
	}
	.tasta-lunga {
		height: 134px;
	}
	.tasta-lata {
		width: 132px;
	}
	.tasta-del {
		font-size: 30px;
	}
</style>

<Script>

	function resize() {
		var rezultat = document.getElementById("rezultat");
		let rezultVal = rezultat.innerText;
		console.log(rezultVal.length);
		// reseteaza font-size pentru text prea lung
		if(rezultVal.length > 8) {
			rezultat.style.fontSize = "40px";
		}
		if(rezultVal.length > 13) {
			rezultat.style.fontSize = "30px";
		}
		if(rezultVal.length > 19) {
			rezultat.style.fontSize = "20px";
		}
		if(rezultVal.length > 50) {
			rezultat.style.fontSize = "15px";
	}
	}

	function calculator(code) {
		var tasta = [
			{cod: "Numpad0", id: "zero", val: "0", operatie: ""},
			{cod: "Numpad1", id: "unu", val: 1, operatie: ""},
			{cod: "Numpad2", id: "doi", val: 2, operatie: ""},
			{cod: "Numpad3", id: "trei", val: 3, operatie: ""},
			{cod: "Numpad4", id: "patru", val: 4, operatie: ""},
			{cod: "Numpad5", id: "cinci", val: 5, operatie: ""},
			{cod: "Numpad6", id: "sase", val: 6, operatie: ""},
			{cod: "Numpad7", id: "sapte", val: 7, operatie: ""},
			{cod: "Numpad8", id: "opt", val: 8, operatie: ""},
			{cod: "Numpad9", id: "noua", val: 9, operatie: ""},
			{cod: "NumpadDecimal", id: "punct", val: ".", operatie: ""},
			{cod: "NumpadEnter", id: "egal", val: "", operatie: "="},
			{cod: "NumpadAdd", id: "adunare", val: "", operatie: "+"},
			{cod: "NumpadSubtract", id: "scadere", val: "", operatie: "-"},
			{cod: "NumpadMultiply", id: "inmultire", val: "", operatie: "*"},
			{cod: "NumpadDivide", id: "impartire", val: "", operatie: "/"},
			{cod: "Backspace", id: "sterge", val: "", operatie: ""}
		];

		var calculator = document.getElementsByClassName("calculator");

		for(let index = 0; index < tasta.length; index++) {
			var tcod = tasta[index].cod;
			var tid = tasta[index].id;
			var tval = tasta[index].val;
			var top = tasta[index].operatie;
			var rezultat = document.getElementById("rezultat");
			let rezultVal = rezultat.innerText;
			var primulNR = document.getElementById("primulNR");
			var aldoileaNR = document.getElementById("aldoileaNR");
			var operatie = document.getElementById("operatie");
			let valOP = operatie.value;
			let valPNR = primulNR.value;
			let val2NR = aldoileaNR.value;

			var updRes = rezultat;
			var updNR = primulNR;

			if(valOP != "") {
				updNR = aldoileaNR;
			}

			if(code == tid) {
				var code = tcod;
			}

			if(code == tcod) {
				var tsta = document.getElementById(tid);
				// if(rezultVal.length < 56) {
					if(top == "=" && valOP != "") {
						if(valPNR == "") {
							primulNR.value = "0";
						}
						if(val2NR == "") {
							aldoileaNR.value = "0";
						}
						document.getElementById("formCalc").submit();
					}
					if(tcod == "Backspace") {
						rezultat.innerHTML = "0";
						primulNR.value = "";
						aldoileaNR.value = "";
						operatie.value = "";
					} else {

						if(tval == "") {
							operatie.value = top;
							rezultat.innerHTML = "";
						}

						if(rezultVal == "0") {
							if(tval == ".") {
								rezultat.innerHTML += tval;
								
							} else {
								rezultat.innerHTML = tval;
								updNR.value = tval;
							}
						} else {
							rezultat.innerHTML += tval;
							updNR.value += tval;
						}
						
					}
					resize();
					// reseteaza font-size pentru text prea lung
					if(tid == "zero" && rezultVal == 0 || tid == "sterge") {
						rezultat.style.fontSize = "70px";
					}

				tsta.classList.add("active");
				setTimeout(function(){
					tsta.classList.remove("active");
				}, 110);
			}
		}
	}

	document.addEventListener('keyup', (event) => {
		var code = event.code;
		calculator(code);
	});

	function clickTasta(tasta) {
		calculator(tasta.id);
	}
</Script>
