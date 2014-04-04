/*
File name : contact.js
Author's name : Zhixiang Hu
Web site name : Zhixiang Hu Tech Space
This is the external javascript file of the web site
*/

// LoadContact function call readcontact.php to get contact object in JSON format
// via AJAX call
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

