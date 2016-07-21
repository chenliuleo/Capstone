var number, title, deadline, point, score;

function CreateRow(){
    var table=document.getElementById("homework");
    var row=table.insertRow(1);
    var cell0=row.insertCell(0);
    var cell1=row.insertCell(1);
    var cell2=row.insertCell(2);
    var cell3=row.insertCell(3);
    var cell4=row.insertCell(4);
    var cell5=row.insertCell(5);
    cell0.innerHTML=number;
    
    cell1.innerHTML=title;
    
    cell2.innerHTML=deadline;
     
    cell3.innerHTML=point;
    
    cell4.innerHTML=score;
    cell5.innerHTML="Solution";
}
if (CreateRow())
    window.alert("create row success!");
else
    window.alert("failed");
function DeleteRow(){
    document.getElementById("homework").deleteRow(1);
}
