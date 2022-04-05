var c_day = document.getElementById("calendar-prefab");
var c_cont = document.getElementById("calendar-container");
var c_timeline = document.getElementById("timeline");
var timeline_p = document.getElementById("timeline-p");


let curr = new Date 

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

for(let k = 0; k < 24; k++){
    let h = document.createElement('p');
    h.innerHTML = (String(k).length == 1 ? "0"+String(k) : String(k)) + ":00"
    h.style.position = 'absolute';
    h.style.top = String(mapHour(k, 0, 24, 0, 100)) + '%';
    c_timeline.appendChild(h)
}

const add_event = (dst, from, to, event) => {
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

var updateTimelineP = window.setInterval(updateTP, 10000);
updateTP()
function updateTP() {
    var day = new Date();
    console.log(day.getHours(), day.getMinutes())
    const time = parseInt(day.getHours()) + (parseInt(day.getMinutes()) / 60)
    const top = String(mapHour(time, 0, 24, 0, 100)) + '%';
    timeline_p.style.top = top;
}