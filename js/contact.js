
	function LoadContact(id)
	{
		var jqXHR = $.ajax("readcontact.php?id=" + id)
			.done(function(results) {
			
				console.log(results);
				var obj = eval ("(" + results + ")");
				
				$("#d_name").text(obj.contact[0].Name);
				$("#d_org").text(obj.contact[0].Organization);
				$("#d_number").text(obj.contact[0].Number);
				$("#d_address").text(obj.contact[0].Address);
				$("#d_postal").text(obj.contact[0].Postal);
			})
			.fail(function() {
				console.log( "error" );
			})
			.always(function() {
				console.log( "complete" );
			});
	}

