function search(search) {
    var input = search;
    if (this.value!="") {
        var tr = document.querySelectorAll("tr");
        var td = document.querySelector("td");
        for (let i = 0; i < tr.length; i++) {
            if (tr[i].firstChild[1].td[0].nodeValue == input) {
                tr[i].style.display = "block";
            }
            else{
                tr[i].style.display = "none";
            }
        }
    }else{
        for (let i = 0; i < tr.length; i++) {
            tr[i].style.display = "block";
            
        }
    }
}