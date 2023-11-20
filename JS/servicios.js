//Servicios 

function showContent(tabName) {
    // Ocultar todos los contenidos
    var contents = document.querySelectorAll('.tab-content2');
    contents.forEach(function (content) {
        content.classList.remove('active');
    });

    // Mostrar el contenido correspondiente al hacer clic en la pestaña
    var selectedContent = document.querySelector('.tab-content2[data-tab="' + tabName + '"]');
    if (selectedContent) {
        selectedContent.classList.add('active');
    }

    // Resaltar la pestaña activa
    var tabs = document.querySelectorAll('.tab1');
    tabs.forEach(function (tab) {
        tab.classList.remove('active');
    });

    var selectedTab = document.querySelector('.tab1[data-tab="' + tabName + '"]');
    if (selectedTab) {
        selectedTab.classList.add('active');
    }
}