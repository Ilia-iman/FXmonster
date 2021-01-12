jQuery(document).ready(function () {
    jQuery("img.lazyload").each(function () {
        const src = jQuery(this).data('src');
        jQuery(this).attr('src', src);
        }
    );
})

/*jQuery(document).ready(function () {
    jQuery("img.lazyload").lazyload();
});*/

/*
function myFirstLazyGif () {
    const img = document.getElementsByClassName("gif-preview");
    for (let i in img) {
        console.log(img[i]);
        const gifsrc = img[i].childNodes[1];
        const data = gifsrc.getAttribute("data-src");
        gifsrc.setAttribute("src", data);
    }
}

jQuery('.gif-preview').each(function() {
    console.info(this.data('src'));
})
*/
