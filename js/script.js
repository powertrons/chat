const btOptions = document.getElementById("btOptions");
const options = document.getElementById("options");
const inColorBackground = document.getElementById("inColorBackground");
const inColorText = document.getElementById("inColorText");
const btSave = document.getElementById("btSave");
const btLoad = document.getElementById("btLoad");
const btReset = document.getElementById("btReset");
const outLog = document.getElementById("outLog");
const btLogout = document.getElementById("btLogout");

function exist(element) {
	if (typeof(element) != "undefined" && element != null) {
		return true;
	} else {
		return false;
	}
}

verify();
function verify() {
	if (localStorage.getItem("configs") == undefined) {
		create();
	} else {
		load();
	}
	setColor();
}

function create() {
	if (exist(inColorBackground) == true && exist(inColorText) == true) {
		localStorage.setItem("configs", JSON.stringify({
			colorBackground: "#ffffff",
			colorText: "#000000",
		}));
		log("Criado");
	}
}

function save() {
	if (exist(inColorBackground) == true && exist(inColorText) == true) {
		localStorage.setItem("configs", JSON.stringify({
			colorBackground: inColorBackground.value,
			colorText: inColorText.value,
		}));
		log("Salvo");
	}
}
function load() {
	if (exist(inColorBackground) == true && exist(inColorText) == true) {
		inColorBackground.value = JSON.parse(localStorage.getItem("configs")).colorBackground;
		inColorText.value = JSON.parse(localStorage.getItem("configs")).colorText;
		setColor();
		log("Carregado");
	}
}
function clear() {
	localStorage.removeItem("configs");
}

function reset() {
	if (confirm("Tem certeza que deseja resetar todas as configurações?") == true) {
		clear();
		create();
		load();
		setColor();
		log("Resetado");
	}
}

function showOptions() {
	if (options.classList.contains("invisibility") == false) {
		options.classList.add("invisibility");
		btOptions.value = "Mostrar opções";
	} else {
		options.classList.remove("invisibility");
		btOptions.value = "Esconder opções";
	}
}

function setColor() {
	if (exist(inColorBackground) == true && exist(inColorText) == true) {
		document.body.style.backgroundColor = inColorBackground.value;
		document.body.style.color = inColorText.value;
	}
}

function log(texto) {
	outLog.innerHTML = texto;
}

function logout() {
	$.ajax({
		method: "POST",
		url: "php/logout.php",
		data: {
			request: "logout",
		},
		success: function(result) {
			outAlert.innerHTML = result;
			if (result == "logout") {
				window.location.href = "login.php";
			}
		}
	});
}

btOptions.addEventListener("click", showOptions);
btSave.addEventListener("click", save);
btLoad.addEventListener("click", load);
btReset.addEventListener("click", reset);
inColorBackground.addEventListener("change", setColor);
inColorText.addEventListener("change", setColor);

if (exist(btLogout) == true) {

	btLogout.addEventListener("click", logout);

}