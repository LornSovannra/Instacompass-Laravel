const menu_profile_image = document.querySelector(".menu_profile_image");
const profile_span = document.querySelector(".profile_span");

menu_profile_image.addEventListener("click", () => {

    if(profile_span.style.display == "none")
    {
        profile_span.style.display = "flex";
    }
    else
    {
        profile_span.style.display = "none";
    }
})

/* const search_wrapper = document.querySelector(".search-wrapper");
const fa_search = document.querySelector(".fa-search");

search_wrapper.addEventListener("click", () => {
    fa_search.style.display = "none";
})

fa_search.addEventListener("click", () => {

}) */