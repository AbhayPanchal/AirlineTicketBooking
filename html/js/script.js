window.addEventListener("load", function(){

    /**
     *  Name: Abhay Panchal
        Student Number : 000813104
        I Abhay Panchal Certify that this is my own Work!!
     * @param {*} text 
     */
    function success(text){
        let span = document.getElementById("name");
        console.log(span);
        span.innerHTML = text;
        console.log(text);
    }

    //this function use to change DOM!
    let pay = document.getElementById("pay");

    pay.addEventListener("click" , function(){
        let p = document.getElementById("span");
        console.log(p);

        p.innerHTML = "You paid successfully! Thank you!"
    })

});