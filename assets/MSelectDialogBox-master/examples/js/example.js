$(document).ready(function() {


	Math.rand = function(min, max) {
		return Math.floor(Math.random() * (max - min + 1)) + min;
	};

	$.prototype.mSelectDBox.prototype._globalStyles[".m-select-d-box__list-item_selected"]["background-color"] = "mediumseagreen";
	$.prototype.mSelectDBox.prototype._globalStyles[".m-select-d-box__list-item_selected:hover, .m-select-d-box__list-item_selected.m-select-d-box__list-item_hover"]["background-color"] = "green";
	$.prototype.mSelectDBox.prototype._globalStyles[".m-select-d-box__list-item:active, .m-select-d-box__list-item_selected:active"]["background-color"] = "darkgreen";

	var greeceAlphabet = [
		// Kelas
		"VI TKRO 1",
		"VI TKRO 2",
		"VI TKRO 3",
		"VI TKRO 4"
	];


	$("#msdb-0").mSelectDBox({
		"list": greeceAlphabet,
		"multiple": 1,
		"autoComplete": true,
		"onInit": function(ctx) {
			new $.fn.mSelectDBox.MyCustomAppear1(ctx);
		}
	});


});