			
			var aggeliesContainer = document.getElementById("aggelies-info");
			var btn = document.getElementById("submitbtn");
			btn.addEventListener("click", function(){
			
			var ajax = new XMLHttpRequest();
			var method = "GET";
			var url = "showrecords.php";
			var asynchronous = true;
			ajax.open(method, url, asynchronous);
			ajax.send();	
			
			
			ajax.onreadystatechange = function(){
				
				if (this.readyState == 4 && this.status == 200){
					
					var data = JSON.parse(this.responseText);
				
					//console.log(data);
					renderHTML(data);
				}
				
			}
	
			});
			
			function renderHTML(data){
				var htmlString = "";
				
				for (i=0; i < data.length; i++){
				htmlString += "<p>" +data[i].price + " ευρώ," + data[i].region + "," + data[i].availability + ",εμβαδόν: " + data[i].area + "</p>";
				}
				
				aggeliesContainer.insertAdjacentHTML ('beforeend',htmlString);
				
				
			}
