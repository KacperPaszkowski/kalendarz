var c_day = document.getElementById("calendar-prefab");
var c_cont = document.getElementById("calendar-container");


let curr = new Date 
// let week = []

for (let i = 1; i <= 7; i++) {
    let first = curr.getDate() - curr.getDay() + i 
    let day = new Date(curr.setDate(first)).toISOString().slice(0, 10)
    var pref = null

    pref = c_day.cloneNode(true);
    console.log(pref, i)
    pref.removeAttribute('id');
    for (var j = 0; j < pref.childNodes.length; j++) {
        if (pref.childNodes[i].className == "c-title") {
            pref.childNodes[i].innerHTML = day;
        }        
    }
    c_cont.appendChild(pref)

//   week.push(day)
}

console.log(week)