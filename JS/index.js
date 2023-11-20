
//Menu
function openNav(){
    document.getElementById("mobile-menu").style.width = "100%";
}

    function closeNav(){
    document.getElementById("mobile-menu").style.width = "0%";
}
   
//MISION Y VISION 

document.addEventListener('DOMContentLoaded', function () {
    const tabs = document.querySelectorAll('.tab');
    const tabContents = document.querySelectorAll('.tab-content');

    // Mostrar el primer elemento por defecto
    tabs[0].classList.add('active');
    tabContents[0].classList.add('active');

    tabs.forEach(tab => {
        tab.addEventListener('click', function () {
            const selectedTab = tab.getAttribute('data-tab');
            tabs.forEach(t => t.classList.remove('active'));
            tabContents.forEach(content => content.classList.remove('active'));
            tab.classList.add('active');
            document.querySelector(`.tab-content[data-tab="${selectedTab}"]`).classList.add('active');
        });
    });
});


