const arrow = document.querySelectorAll(".arrow");

for (let i = 0; i < arrow.length; i++) {
    arrow[i].addEventListener("click", (e) => {
        const subMenu = e.target.closest("li").querySelector(".sub-menu");
        if (subMenu) {
            subMenu.classList.toggle("showMenu");
        }
    });
}

let sidebar = document.querySelector(".home-section");
let sidebarBtn = document.querySelector(".bx-menu");

sidebarBtn.addEventListener("click", () => {
    sidebar.classList.toggle("close");
});

document.addEventListener("DOMContentLoaded", function () {
    var breadcrumbs = document.getElementById('breadcrumbs');

    var path = window.location.pathname;

    var segments = path.split('/').filter(Boolean);
    
    var breadcrumbHtml = '<span><a href="/">Dashboard</a></span> /';

    for (var i = 0; i < segments.length; i++) {
        var segmentUrl = '/' + segments.slice(0, i + 1).join('/');
        var segmentName = segments[i];
        if (i === segments.length - 1) {
            breadcrumbHtml += '<span>' + segmentName + '</span>';
        } else {
            breadcrumbHtml += '<span><a href="' + segmentUrl + '">' + segmentName + '</a></span> /';
        }
    }

    breadcrumbs.innerHTML = breadcrumbHtml;
});
