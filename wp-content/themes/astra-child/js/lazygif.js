/*jQuery(document).ready(function () {
    const img = document.getElementsByClassName("gif-preview");
    for (let i in img) {
        console.log(img[i]);
        const gifsrc = img[i].childNodes[1];
        const data = gifsrc.getAttribute("data-src");
        gifsrc.setAttribute("src", data);
    }
});*/

jQuery('.gif-preview').each(function() {
    console.info(this.data('src'));
})