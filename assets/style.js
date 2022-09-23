$(document).ready(function(){
    $('.btnImage_one').on("click", function () {
        console.log(1);
        var images = wp.media({
            title: "Upload Image",
            multiple: false,
       }).open().on("select",function (e) {
            var uploadedImages = images.state().get("selection").first();
            var selectedImages = uploadedImages.toJSON();
            $("#getImage_one").attr("src",selectedImages.url);
            var data = selectedImages.url;
            
            $("#value_logo_one").val(data);
       });
    });
    $('.btnImage_two').on("click", function () {
        console.log(1);
        var images = wp.media({
            title: "Upload Image",
            multiple: false,
       }).open().on("select",function (e) {
            var uploadedImages = images.state().get("selection").first();
            var selectedImages = uploadedImages.toJSON();
            $("#getImage_two").attr("src",selectedImages.url);
            var data = selectedImages.url;
            
            $("#value_logo_two").val(data);
       });
    });
    $('.btnImage_three').on("click", function () {
        console.log(1);
        var images = wp.media({
            title: "Upload Image",
            multiple: false,
       }).open().on("select",function (e) {
            var uploadedImages = images.state().get("selection").first();
            var selectedImages = uploadedImages.toJSON();
            $("#getImage_three").attr("src",selectedImages.url);
            var data = selectedImages.url;
            
            $("#value_logo_three").val(data);
       });
    });
});