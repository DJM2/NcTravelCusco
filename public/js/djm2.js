function search() {
    document.getElementById("popupSearch").style.display = "block";
    $("#search-content").hide().fadeIn(500); 
}
function cerrarSearch() {
    document.getElementById('popupSearch').style.display = 'none';
}
function stopPropagation(event) {
    event.stopPropagation();
}


var lazyImages = document.querySelectorAll('img.lazy');
var options = {
    rootMargin: '0px',
    threshold: 0.1
};
var observer = new IntersectionObserver(function (entries, observer) {
    entries.forEach(function (entry) {
        if (entry.isIntersecting) {
            var lazyImage = entry.target;
            lazyImage.setAttribute('loading', 'lazy');
            observer.unobserve(lazyImage);
        }
    });
}, options);

lazyImages.forEach(function (lazyImage) {
    observer.observe(lazyImage);
});