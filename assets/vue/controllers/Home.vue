<template>
  <header class="masthead"
          style="
                    position: relative;
                    width: 100%;
                    height: auto;
                    min-height: 35rem;
                    padding: 15rem 0;
                    background-image: url('pictures/th.jpeg');
                    background-position: center;
                    background-repeat: no-repeat;
                    background-attachment: scroll;
                    background-size: cover;
        ">
    <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
      <div class="d-flex justify-content-center">
        <div class="text-center">
          <h1 class="mx-auto my-0 text-uppercase"
              style="color: #FFFFFF; backdrop-filter: blur(5px);"
          >
            Forum de l'Etudiant
          </h1>
          <h2 class="text-white mx-auto mt-2 mb-5" style="backdrop-filter: blur(5px);">
            Forum de présentation des métiers aux étudiants
          </h2>
          <a class="btn btn-primary" href="#atelier">Voir les ateliers</a>
        </div>
      </div>
    </div>
  </header>

  <section class="about-section text-center" id="atelier">
    <div class="container px-4 px-lg-5 mt-3">
      <div class="mx-3 d-flex flex-wrap">
        <div class="card" style="width: 18rem; "
             v-for="(atelier,id) in ateliers"
        >
          <img class="card-img-top" src="/pictures/logoforum.png" alt="">
          <div class="card-body d-flex flex-column align-items-center justify-content-center ">
            <h5 class="card-title">
              {{ atelier.nomAtelier }} {{ atelier.secteur.nom }}
            </h5>
            <p class="card-text">
              {{ atelier.secteur.description }}
            </p>
            <a href="/detail_atelier/{{ atelier.id }}" class="btn btn-primary">Voir plus</a>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  data: function () {
    return {
      ateliers: [
        {
          'id': '1',
          'nomAtelier': "Atelier 1",
          'secteur': {'nom': "Finance", 'description': 'dgscjsdjfghgfhgfgqfgsfgyerfgfqgyfghgf'}
        }
      ]
    }
  }
}
</script>