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
        </div>
      </div>
    </div>
  </header>
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