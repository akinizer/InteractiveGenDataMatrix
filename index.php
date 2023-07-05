<?php
//variables
$Result1 = "6";
$Result2 = "5";
?>

<html>
	<style>
		table, th, td {
			border: 1px solid black;
			border-collapse: collapse;
		    text-align: center;
		}	
		td {
			width: 60px;
			height: 60px;
		}
		#TissueStageContainer{
			width:50%;
			display:inline;
			float:left;
		}
		#TissueGeneContainer{
			width:50%;
			display:inline;
			float:left;
		}
		
		#OuterTitle {
			border:1px solid black;
			border-radius:10px;
			width:300px;
			margin:10px;

		}
		#NameTable{
			table-layout:fixed;
			display:inline;
			float:left;
		}
		#Name2Table{
			table-layout:fixed;
			display:inline;
			float:left;
		}

		#MatrixTable{
			table-layout:fixed;
			width:600px;
		}
		#Matrix2Table{
			table-layout:fixed;
			width:300px;
		}
	
		#MatrixTableDiv{
			border:1px solid black;
		}
		#Matrix2TableDiv{
			border:1px solid black;
		}
		#MatrixContainer{
			padding:0px;
			text-align:center;
			border:1px solid black;
			width:99%;
			height:91%;
			
		}
		#Matrix2Container{
			padding:0px;
			text-align:center;
			border:1px solid black;
			width:99%;
			height:91%;
			
		}
		.InfocardDiv{
			width:300px;
			height:275px;
			background-color:white;
			border:1px solid black;
			margin:0;
		}
	</style>
	<script>
		//STAGE DATA

		//matrix data: name & row: 0, 10, 1, 11, 2, 12
		var data=[
			{"name":"organ system","row":[0,0,0,0,0,0,0,0,0,0,0]},
			{"name":"alimentary system","row":[0,0,0,10,10,0,0,0,0,0,10]},
			{"name":"cardiovascular system","row":[0,0,10,10,10,0,0,0,0,0,0]},
			{"name":"blood","row":[11,12,12,12,2,12,0,2,10,0,12]},
			{"name":"cardiovascular system endothelium","row":[1,1,1,2,2,2,1,1,1,2,2]},
			{"name":"cardiovascular system mesenchyme","row":[1,1,1,1,1,1,1,1,1,1,1]},
			{"name":"heart","row":[12,10,10,10,10,10,10,10,10,10,10]},
			{"name":"atrioventricular canal","row":[1,12,2,2,12,2,1,1,1,1,1]},
			{"name":"bulbar cushion","row":[1,1,1,1,12,11,1,1,1,1,1]},
			{"name":"cardiac interstitium","row":[11,11,11,1,11,11,1,1,11,1,11]},
			{"name":"cardiac muscle tissue","row":[1,0,0,0,0,0,2,2,0,2,0]},
			{"name":"atrium cardiac muscle","row":[1,2,2,2,2,2,2,1,2,1,2]},
			{"name":"left atrium cardiac muscle","row":[1,11,1,1,1,2,1,1,1,1,2]},
			{"name":"right atrium cardiac muscle","row":[1,11,1,1,1,2,1,1,1,1,1]},
			{"name":"outflow tract cardiac muscle","row":[1,1,1,1,1,1,1,1,1,1,1]}		
		];

		var stages=["TS18","TS19","TS20","TS21","TS22","TS23","TS24","TS25","TS26","TS27","TS28"];
			
		// GENE DATA
		var data2=[
			{"name":"organ system","row":[2,0,0,0,0,0,0,0,0,0,,0,0,0]},
			{"name":"alimentary system","row":[12,0,0,2,1,12,12,0,2,0,2,2,0]},
			{"name":"cardiovascular system","row":[0,2,0,2,11,12,11,0,2,1,10,1,2]},
			{"name":"endocrine system","row":[1,2,2,1,2,11,11,2,1,1,1,1,2]},
			{"name":"exocrine system","row":[1,2,2,1,1,11,11,2,2,2,1,1,1]},
			{"name":"hemolymphoid system","row":[11,11,2,2,1,1,11,2,1,2,1,1,2]},
			{"name":"integumental system","row":[1,2,2,2,1,1,1,2,2,2,2,1,2]},
			{"name":"liver and biliary system","row":[2,1,2,1,2,11,11,0,2,2,2,11,1]},
			{"name":"musculoskeletal system","row":[11,2,0,1,2,0,1,0,1,0,2,11,0]},
			{"name":"nervous system","row":[11,0,10,0,0,0,1,0,0,1,0,10,2,0]},
			{"name":"reproductive system","row":[21,0,10,0,0,0,1,0,0,1,0,10,2,0]},
			{"name":"respiratory system","row":[21,0,10,0,0,0,1,0,0,1,0,10,2,0]},
			{"name":"urinary system","row":[21,0,10,0,0,0,1,0,0,1,0,10,2,02]},
			{"name":"genitourinary system","row":[21,0,10,0,0,0,1,0,0,1,0,10,2,0]},
			{"name":"musculature","row":[21,0,10,0,0,0,1,0,0,1,0,10,2,0]},	
			{"name":"sensory organ system","row":[21,0,10,0,0,0,1,0,0,1,0,10,2,0]},	
			{"name":"visceral organ system","row":[21,0,10,0,0,0,1,0,0,1,0,10,2,0]},	
		];

		var stages2=["Ankrd17","Axin2","Cxcr4","Foxa2","Foxc2","Gbx2","Igf2r","Pdgfa","Pdgfra","Sox9"];
		

		// FUNCTIONS

		function createNameLayout(layoutid,data){
			var layoutname=layoutid==2?"Name2Table":"NameTable";

			var matrix = document.getElementById(layoutname);
			var matrixRow = matrix.insertRow(0);
			for(var rowIndex=0;rowIndex<data.length;rowIndex++){
				var matrix = document.getElementById(layoutname);
				var matrixRow = matrix.insertRow(rowIndex);
				var nameCell = matrixRow.insertCell(0);
				nameCell.innerHTML = "<input type='checkbox' style='width:90%;height:90%'></input>";
				var nameCell2 = matrixRow.insertCell(0);
				nameCell2.innerHTML = data[rowIndex].name;
			}
			matrixRow = matrix.insertRow(0);
			var filterCell = matrixRow.insertCell(0);
			filterCell.innerHTML = "Legend (i)";

			matrixRow = matrix.insertRow(0);
			var legendCell = matrixRow.insertCell(0);
			legendCell.innerHTML = "Filter";
		}
		
		//draw the matrix using data provided
		function createMatrix(matrixid,data){
			var matrixtablename=matrixid==2?"Matrix2Table":"MatrixTable";
			var stagesName=matrixid==2?stages2:stages;

			//box section
			for(var rowIndex=0;rowIndex<data.length;rowIndex++){
				
				addMatrixRow(rowIndex,data[rowIndex].row,data[rowIndex].name,matrixtablename);
			}

			//checkbox section
			var matrix = document.getElementById(matrixtablename);
			var matrixRow = matrix.insertRow(0);
			for(var i=0;i<11;i++){
				let cell = matrixRow.insertCell(i);
				cell.innerHTML="<input type='checkbox' style='width:90%;height:90%'></input>";
			}
			var matrixRow = matrix.insertRow(0);
			for(var stageNo=0;stageNo<stagesName.length;stageNo++){
				let cell = matrixRow.insertCell(stageNo);
				cell.innerHTML=stages[stageNo];
			}
		}	

		function getInfoContent(name,stage){
		
		
			
			return "<center><div><div style='float:right'>X</div></div></br>" 	
				+ "<div style='background-color:yellow'>"+name+" in "+stages[stage-1]+"</div></br>"
				+ "<table>"
				+ "<tr><td style='width:150px;background-color:yellow'>Detected?"
				+ "</td><td style='width:150px;background-color:yellow'># of Results</td></tr>"
				+ "<tr><td>Yes</td>"
				+ "<td style='width:150px'><?php echo $Result1 ?></td></tr>"
				+ "<tr><td style='width:150px'>No</td>"
				+ "<td style='width:150px'><?php echo $Result2 ?></td></tr></table>"
				+ "<div style='margin: 10 10 0 10 '><button style='background-color:yellow'>View These Results</button><button style='background-color:yellow;float:right'>View The Images</button></div></center>";
				
		}
		
		//draw the matrix row by row
		function addMatrixRow(rowIndex,row,name,matrixtablename){
			
			
			//acquire the matrix element
			var matrix = document.getElementById(matrixtablename);
		
			//insert row to matrix
			var matrixRow = matrix.insertRow(rowIndex);
		
			
			//extract and insert each cell to current row
			for(var columnIndex=0;columnIndex<row.length;columnIndex++){
				
				//insert the cell
				var cell = matrixRow.insertCell(columnIndex);
				cell.id = "cell"+rowIndex+":"+columnIndex+"></td>";
				//classify and colorize the cell: 0 for blue,1 for very lightgray, 2 for dodgerblue

				switch(row[columnIndex]){
					case 0:
						cell.style.backgroundColor = "blue";
						break;
					case 1:
						cell.style.backgroundColor = "#e0e0e0";
						break;
					case 2:
						cell.style.backgroundColor = "#1e90ff";
						break;
					case 10:
						cell.style.backgroundImage = "linear-gradient(to top right, blue, blue 50%, #d2918c)";
						cell.addEventListener("click", function(e) {
							//turn on pop up	
							if(cell.getElementsByTagName('*').length == 0 && (!cell.hasAttribute("open") || cell.getAttribute("open")=="false")){
								cell.setAttribute("open","true");

								//generate info card
								var infocard = document.createElement("div"); 
								infocard.id="InfocardDiv"+rowIndex+":"+columnIndex;
								infocard.className="InfocardDiv";
								infocard.innerHTML = getInfoContent(name,columnIndex);
								infocard.addEventListener("click", function(e) {
									cell.setAttribute("open","false");
									infocard.remove();
								});

								//display
								document.getElementById("dialog").appendChild(infocard); 

								// cursor position
								var x = event.clientX;     
								var y = event.clientY;  

								// position 
								infocard.style.position = "fixed"; 
								infocard.style.left = x + "px";
								infocard.style.top = y + "px";

								
							}
							
							//turn off popup
						}, false);
						break;
					case 11:
						cell.style.backgroundImage = "linear-gradient(to top right, #e0e0e0, #e0e0e0 50%, #d2918c)";
						cell.addEventListener("click", function(e) {
							//turn on pop up	
							if(cell.getElementsByTagName('*').length == 0 && (!cell.hasAttribute("open") || cell.getAttribute("open")=="false")){
								cell.setAttribute("open","true");

								//generate info card
								var infocard = document.createElement("div"); 
								infocard.id="InfocardDiv"+rowIndex+":"+columnIndex;
								infocard.className="InfocardDiv";
								infocard.innerHTML = getInfoContent(name,columnIndex);
								infocard.addEventListener("click", function(e) {
									cell.setAttribute("open","false");
									infocard.remove();
								});

								//display
								document.getElementById("dialog").appendChild(infocard); 

								// cursor position
								var x = event.clientX;     
								var y = event.clientY;  

								// position 
								infocard.style.position = "fixed"; 
								infocard.style.left = x + "px";
								infocard.style.top = y + "px";

								
							}
							
							//turn off popup
						}, false);
						break;
					case 12:
						cell.style.backgroundImage = "linear-gradient(to top right, #1e90ff, #1e90ff 50%, #d2918c)";
						cell.addEventListener("click", function(e) {
							//turn on pop up	
							if(cell.getElementsByTagName('*').length == 0 && (!cell.hasAttribute("open") || cell.getAttribute("open")=="false")){
								cell.setAttribute("open","true");

								//generate info card
								var infocard = document.createElement("div"); 
								infocard.id="InfocardDiv"+rowIndex+":"+columnIndex;
								infocard.className="InfocardDiv";
								infocard.innerHTML = getInfoContent(name,columnIndex);
								infocard.addEventListener("click", function(e) {
									cell.setAttribute("open","false");
									infocard.remove();
								});

								//display
								document.getElementById("dialog").appendChild(infocard); 

								// cursor position
								var x = event.clientX;     
								var y = event.clientY;  

								// position 
								infocard.style.position = "fixed"; 
								infocard.style.left = x + "px";
								infocard.style.top = y + "px";

								
							}
							
							//turn off popup
						}, false);
						break;
				}				
			}			
		}
	</script>

	<div id="TissueStageContainer">
		<center>
			<div id="OuterTitle">		
				<h1>Tissue x Stage Matrix</h1>
			</div>
		</center>
		
		<div id="MatrixContainer">
			
			<h2>Theiler Stage</h2> 		
			
			<div id="MatrixTableDiv">
				<table id="NameTable"></table>
				<script>createNameLayout(1,data)</script>
				<table id="MatrixTable"></table>
				<script>createMatrix(1,data)</script>
			</div>
		</div>
	</div>
<div id="TissueGeneContainer">
		<center>
			<div id="OuterTitle">		
				<h1>Tissue x Gene Matrix</h1>
			</div>
		</center>
		
		<div id="Matrix2Container">	
			<h2>.</h2> 		
			
			<div id="Matrix2TableDiv">
				<table id="NameTable"></table>
				<script>createNameLayout(2,data)</script>
				<table id="Matrix2Table"></table>
				<script>createMatrix(2,data2)</script>
			</div>
		</div>
	</div>

	

	<div id="dialog"></div>
</html>

