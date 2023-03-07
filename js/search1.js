function search(search1,search2) {
    var input = search1;
    var number = search2;
            if (input != "") {
                const http=new XMLHttpRequest();
                http.onload = () =>{
                    if (http.readyState===XMLHttpRequest.DONE) {
                        if (http.status===200) {
                            let result = http.response;
                            document.getElementById("result").style.display = "block";
                            document.getElementById("result").innerHTML = result;
                        }
                    }
                }
                http.open("POST","php/search.php?search1="+input+"&search2="+number);
                http.send();
            }
        }         