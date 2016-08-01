$(function() {
	theTable = $("#tabla");
	$("#q").keyup(function() {
	$.uiTableFilter(theTable, this.value);
	});
});