import { Calendar } from '@fullcalendar/core'
import interactionPlugin from "@fullcalendar/interaction";
import dayGridPlugin from '@fullcalendar/daygrid'

import axios from 'axios';

var calendarEl = document.getElementById("calendar");


axios.get("/get_data")
    .then(res => {
        console.log(res['data']);
        const calendar = new Calendar(calendarEl, {
            plugins: [dayGridPlugin],
            initialView: 'dayGridMonth',
            navLinks: true,
            locale: 'ja',
            dayCellContent: function(e) {
            e.dayNumberText = e.dayNumberText.replace('日', '');
            },
            headerToolbar: {
    		start: "prev",
    		center: "title",
    		end: "next"
	        },
 
            // 日付をクリック、または範囲を選択したイベント
            selectable: true,
            
            events: res['data']['records'],
            eventClick: function(info) {
               var eventUrl = '/records/' + info.event.id;
               //   console.log(eventUrl);
               window.location.href = eventUrl;
            }
        });                                 
        calendar.render();                                   
    })
    .fail(error => {
        console.log(error)
    });