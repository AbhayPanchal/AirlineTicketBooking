window.addEventListener("load", function(){
    /**
     * Name: Abhay Panchal
        Student Number : 000813104
        I Abhay Panchal Certify that this is my own Work!!
     * @param {*} t 
     */

    function display(t){
        let html = "<div>";
        html += "<h4>" + t.Airline + "   " + t.Departure + "   " + t.Arrival + "   " + t.Cost + "</h4>";
        html += "</div>"
        return html;
    };


    function success(ticket){
        let object = "";

        for(let i=0; i<ticket.Length; i++ ){
            object += display(ticket[i]);
        }

        let tickets = document.getElementById("showticket");
        console.log(tickets);
        console.log(object);
        tickets.innerHTML = object;
    }

    let button = document.getElementById("showticket");
    button.style.display = "block";

    button.addEventListener("click",function(){

        let from = document.getElementById("from").value;
        let to = document.getElementById("to").value;
        let date = document.getElementById("date").value;
        let claass = document.getElementById("class").value;
        let member = document.getElementById("member").value;

        let url = "searchticket.php?from=" + from + "&to=" + to + "&date=" + date + "&member=" + member + "&class=" + claass;
        console.log(url);

        fetch(url, {credentials:'include'})
            .then(response => response.json())
            .then(success);
    });
});