var c_day = document.getElementById("calendar-prefab");
var c_cont = document.getElementById("calendar-container");


let curr = new Date 
// let week = []

for (let i = 1; i <= 7; i++) {
    let first = curr.getDate() - curr.getDay() + i 
    let day = new Date(curr.setDate(first)).toISOString().slice(0, 10)
    let pref = null

    pref = c_day.cloneNode(true);
    pref.removeAttribute('id');

    fetch("get_events.php?date="+day)
    .then(resp => resp.json())
    .then(resp => resp.length > 0 ? resp.forEach(event => add_event(pref, event.godz_start, event.godz_koniec, event)) : () => {})

    for (var j = 0; j < pref.childNodes.length; j++) {
        if (pref.childNodes[j].className == "c-title") {
            pref.childNodes[j].innerHTML = day;
        }        
    }
    c_cont.appendChild(pref)

}

const add_event = (dst, from, to, event) => {
    console.log("CALL")
    var calendar_event = document.getElementById('event-prefab').cloneNode(true);
    calendar_event.removeAttribute('id');

    const hoursStart = from.split(':')[0]
    const minutesStart = from.split(':')[1]
    const timeStart = parseInt(hoursStart) + (parseInt(minutesStart) / 60)

    const hoursEnd = to.split(':')[0]
    const minutesEnd = to.split(':')[1]
    const timeEnd = parseInt(hoursEnd) + (parseInt(minutesEnd) / 60)

    const top = String(mapHour(timeStart, 0, 24, 0, 100)) + '%';
    const height = String(((timeEnd - timeStart) / 24) * 100) + '%';
    
    calendar_event.style.top = top
    calendar_event.style.height = height

    for (var j = 0; j < calendar_event.childNodes.length; j++) {
        if (calendar_event.childNodes[j].className == "e-title") {
            calendar_event.childNodes[j].innerHTML = event.tytul;
        } 
        if (calendar_event.childNodes[j].className == "e-info") {
            calendar_event.childNodes[j].innerHTML = "od: "+from+" do: "+to;
        }        
    }

    dst.appendChild(calendar_event); 

}

function mapHour(hour, from_in, to_in, from_out, to_out) {
    return (hour - from_in) * (to_out - from_out) / (to_in - from_in) + from_out;
}