// No seu arquivo calendar.js
document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar;

    function initCalendar() {
        calendar = new FullCalendar.Calendar(calendarEl, {
            // Suas configurações do calendário aqui
            headerToolbar: {
                left: 'prevYear,prev,next,today',
                center: 'title',
                right: 'dayGridMonth,dayGridWeek,dayGridDay'
            },
            themeSystem: 'bootstrap5',
            initialView: 'timeGridDay',
            slotDuration: '01:00:00',
            slotLabelFormat: { hour: 'numeric', minute: '2-digit', hour12: false },
            events: eventData
        });
        calendar.render();
    }

    // Chame a função de inicialização do calendário após a página ser totalmente carregada
    window.addEventListener('load', function() {
        initCalendar();
    });

    // Se a página usar AJAX ou interações que requeiram a reinicialização do calendário, você pode chamar initCalendar() novamente.
});
