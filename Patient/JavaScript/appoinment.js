const form = document.querySelector(".login form "),
continueBtn = form.querySelector(".button input");

continueBtn.onclick = ()=>{
   console.log("Hello Hello");
   console.log(form['date'].value);
}