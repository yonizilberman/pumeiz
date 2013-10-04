		/*---------  the login function  ----------*/

		$(document).ready(function(){
			$("#logindiv").hide();
			$("#signupdiv").hide();
			fadeFlag = 0;

			$("#login").click(function () {
				$("#searchcenter").fadeTo("fast", 0.5, function () {
					$("#logindiv").fadeTo("fast", 0.88);
					fadeFlag = 1;
				});
			});

			$("#signup").click(function () {
				$("#searchcenter").fadeTo("fast", 0.5, function () {
					$("#signupdiv").fadeTo("fast", 0.88);
					fadeFlag = 1;
				});
			});

			$("#searchcenter").click(function () {
				if (fadeFlag == 1) {
					$("#searchcenter").fadeTo("fast", 1, function () {
						$("#logindiv").fadeOut("fast");
						$("#signupdiv").fadeOut("fast");
						fadeFlag = 0;
					});
				};
			});
		});
