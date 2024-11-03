let counter = 1;
setInterval(function(){
    document.getElementById('radio' + counter).checked = true;
    counter++;
    if(counter > 4){
        counter = 1;
    }
}, 4000);

function setClock() {
    const now = new Date();
    const seconds = now.getSeconds();
    const minutes = now.getMinutes();
    const hours = now.getHours();

    const secondDegrees = ((seconds / 60) * 360) + 90;
    const minuteDegrees = ((minutes / 60) * 360) + ((seconds / 60) * 6) + 90;
    const hourDegrees = ((hours % 12) / 12) * 360 + ((minutes / 60) * 30) + 90;

    document.getElementById("second").style.transform = `rotate(${secondDegrees}deg)`;
    document.getElementById("minute").style.transform = `rotate(${minuteDegrees}deg)`;
    document.getElementById("hour").style.transform = `rotate(${hourDegrees}deg)`;
}

setInterval(setClock, 1000);
setClock();


 const monthYear = document.getElementById("monthYear");
        const calendarDates = document.getElementById("calendarDates");

        let currentYear = new Date().getFullYear();
        let currentMonth = new Date().getMonth();

        const months = [
            "January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];

        function renderCalendar() {
            const firstDayOfMonth = new Date(currentYear, currentMonth, 1).getDay();
            const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();

            calendarDates.innerHTML = "";
            monthYear.textContent = `${months[currentMonth]} ${currentYear}`;

            for (let i = 0; i < firstDayOfMonth; i++) {
                calendarDates.insertAdjacentHTML("beforeend", `<div></div>`);
            }

            for (let day = 1; day <= daysInMonth; day++) {
                const today = new Date();
                const isToday = day === today.getDate() && currentMonth === today.getMonth() && currentYear === today.getFullYear();
                calendarDates.insertAdjacentHTML(
                    "beforeend",
                    `<div class="${isToday ? "today" : ""}">${day}</div>`
                );
            }
        }

        function prevMonth() {
            currentMonth--;
            if (currentMonth < 0) {
                currentMonth = 11;
                currentYear--;
            }
            renderCalendar();
        }

        function nextMonth() {
            currentMonth++;
            if (currentMonth > 11) {
                currentMonth = 0;
                currentYear++;
            }
            renderCalendar();
        }

        renderCalendar();