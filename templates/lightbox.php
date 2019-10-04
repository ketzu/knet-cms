<?php
?>
<style>
    .lightbox {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 80px; /* Location of the box */
        padding-bottom: 20px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
    }

    .close {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
    }
    .close:hover,
    .close:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
    }
    /* Modal Content (Image) */
    .lightboxImage {
        margin: auto;
        display: block;
        max-height: calc(100vh - 100px);
        max-width:calc(100vw - 100px);
    }
</style>
<script>
    function showLightbox(image) {
        document.getElementById("lightboxModal").style.display='block';
        document.getElementById("lightboxImage").src = image;
        return false;
    }

    function closeLightbox() {
        document.getElementById("lightboxModal").style.display='none';
        document.getElementById("lightboxImage").src = '';
        return false;
    }
</script>

<div id="lightboxModal" class="lightbox">
    <span class="close" onclick="closeLightbox()">&times;</span>

    <img id="lightboxImage" class="lightboxImage">
</div>