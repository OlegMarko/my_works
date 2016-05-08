$(document).ready(function() {
	
	$("#sendForm").submit(function() {
		
		$.ajax({
			type: "POST",
			url: "mail.php",
			data: $(this).serialize()
		}).done(function() {
			alert("Дякуємо за заявку!!! Ми з вами швидко зв'яжимося");
		});
		
		return false;
		
	});
	
});