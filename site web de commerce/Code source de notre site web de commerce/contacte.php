<?php
session_start();
include('layoutfirst.php');

?>


<!-- END nav -->

<div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center">
        <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Accueil</a></span> <span>Contacte</span></p>
        <h1 class="mb-0 bread">Contacte nous</h1>
      </div>
    </div>
  </div>
</div>

<section class="ftco-section contact-section bg-light">
  <div class="container">

    <div class="row d-flex mb-5 contact-info">
      <div class="w-100"></div>
      <div class="col-md-3 d-flex">
        <div class="info bg-white p-4">
          <p><span>Addresse:</span> Rue 12 alhoriya ouled teima agadir</p>
        </div>
      </div>
      <div class="col-md-3 d-flex">
        <div class="info bg-white p-4">
          <p><span>Téléphone:</span> <a href="tel://1234567920">+212 673938202</a></p>
        </div>
      </div>
      <div class="col-md-3 d-flex">
        <div class="info bg-white p-4">
          <p><span>Email:</span> <a href="mailto:info@yoursite.com">amarighmustapha@gmail.com</a></p>
        </div>
      </div>
      <div class="col-md-3 d-flex">
        <div class="info bg-white p-4">
          <p><span>Website</span> <a href="http://e-commerce97.000webhostapp.com">e-commerce97.000webhostapp.com</a></p>
        </div>
      </div>
    </div>

    <div class="row d-flex mb-5 contact-info">
      <div class="w-100"></div>
      <div class="col-md-3 d-flex">
        <div class="info bg-white p-4">
          <p><span>Addresse:</span> 198 anzi, tiznit, maroc</p>
        </div>
      </div>
      <div class="col-md-3 d-flex">
        <div class="info bg-white p-4">
          <p><span>Téléphone:</span> <a href="#">0707909180</a></p>
        </div>
      </div>
      <div class="col-md-3 d-flex">
        <div class="info bg-white p-4">
          <p><span>Email:</span> <a href="#">faridelkharazi@gmail.com</a></p>
        </div>
      </div>
      <div class="col-md-3 d-flex">
        <div class="info bg-white p-4">
          <p><span>Website</span> <a href="http://e-commerce97.000webhostapp.com">e-commerce97.000webhostapp.com</a></p>
        </div>
      </div>
    </div>

    <div class="row block-9">
      <div class="col-md-6 order-md-last d-flex">
        <form action="" class="bg-white p-5 contact-form">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="votre nom">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" placeholder="votre email">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" placeholder="objet">
          </div>
          <div class="form-group">
            <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
          </div>
          <div class="form-group">
            <input type="submit" value="Envoyer Message" class="btn btn-primary py-3 px-5">
          </div>
        </form>

      </div>


      <div class="col-md-6 d-flex">
        <div class="img_about"></div>
      </div>


    </div>
  </div>
</section>




<?php


include("layoutlast.php");

?>