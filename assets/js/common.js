// Toast
let removeToast;

function toast(string) {
	let toast = document.getElementById("toast");

	toast.classList.contains("reveal") ?
		(clearTimeout(removeToast),removeToast = setTimeout(function () {
			document.getElementById("toast").classList.remove("reveal")
		}, 1300)) :
		removeToast = setTimeout(function () {
			document.getElementById("toast").classList.remove("reveal")
		}, 1300)
	toast.classList.add("reveal"),
		toast.innerText = string
}
