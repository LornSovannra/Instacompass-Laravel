const btn_change_profile = document.querySelector(".btn_change_profile");
const cancel = document.querySelector(".cancel");
const modal_change_profile_wrapper = document.querySelector(".modal_change_profile_wrapper");

btn_change_profile.addEventListener("click", () => {
    modal_change_profile_wrapper.style.display = "flex";
})

cancel.addEventListener("click", () => {
    modal_change_profile_wrapper.style.display = "none";
})

const upload_photo = document.querySelector(".upload_photo");
const input_upload_photo = document.querySelector(".input_upload_photo");
const btn_upload_photo = document.querySelector(".btn_upload_photo");

upload_photo.addEventListener("click", () => {
    input_upload_photo.click();
})

input_upload_photo.addEventListener("change", () => {
    btn_upload_photo.click();
})