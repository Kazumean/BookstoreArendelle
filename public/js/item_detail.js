"use strict";

$(function() {
	$(".gender").on("change", function() {
		calc_price();
	});

	$(".quantity").on("change", function() {
		calc_price();
	});
	
	window.onload = calc_price();

	function calc_price() {
		let gender = $(".gender:checked").val();
		let itemPrice = 0;
		let quantity = $(".quantity").val();
		console.log(gender);
		console.log(quantity);
		if (gender === "オス") {
			itemPrice = $("#price-M").val();
		} else {
			itemPrice = $("#price-F").val();
		}
		let totalPrice = Number(itemPrice) * Number(quantity);
		$("#total-price").text(totalPrice.toLocaleString());
	}
});