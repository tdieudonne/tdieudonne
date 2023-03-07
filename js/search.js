function search() {
    // Declare variables
    var input,table,tr,td,i,txtValue;
    input = document.getElementById("search").value.toUpperCase();
    table = document.getElementById("table");
    tr = table.getElementsByTagName("tr");
    for (let i = 0; i < tr.length; i++) {
        td1 = tr[i].getElementsByTagName("td")[1];
        td2 = tr[i].getElementsByTagName("td")[2];
        if (td1 || td2) {
            txtValue = td1.textContent || td1.innerText;
            var number = td2.textContent || td2.innerText;
            if (txtValue.toUpperCase().indexOf(input)>-1 || number.indexOf(input)>-1 ) {
                tr[i].style.display = "";
            }else{
                tr[i].style.display = "none";
            }
        }
        
    }
}