<template>
  <div id="liste">
    <h2> Voici une liste de tous les ateliers </h2>

    <table>
      <thead id="entete">
      <tr>
        <th>Nom de l'atelier</th>
        <th>Description</th>
        <th>Date</th>
        <th>Heure</th>
        <th>Intervenant</th>
        <th>Salle</th>
        <th>Métiers</th>
        <th>Compétences</th>
        <th>Autre ressource</th>
        <th>Ressource PDF</th>
      </tr>
      </thead>

      <tbody id="corps">
      <tr>
        <td>Giraud</td>
        <td>Pierre</td>
        <td>28/01/2023</td>
        <td>11:00</td>
        <td>28</td>
        <td>28</td>
        <td>sdfgdf</td>
        <td>aaaaaaaa</td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>Durand</td>
        <td>Victor</td>
        <td>26/02/2023</td>
        <td>08:00</td>
        <td>26</td>
        <td>26</td>
        <td>dfgrtg</td>
        <td>rrrrrr</td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>Joly</td>
        <td>Julia</td>
        <td>27/02/2023</td>
        <td>12:00</td>
        <td>27</td>
        <td>27</td>
        <td>nfdn;snfjfn</td>
        <td>vvvvvvvvvvv</td>
        <td></td>
        <td></td>
      </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  name: "ListeAtelier"
}
</script>

<style scoped>
#liste {
  margin-top: 35px;
}

h2 {
  padding: 10px;
  color: #0c4a6e;
}

table {
  margin: auto;
}

#entete {
  background-color: #0c4a6e;
  border: 5px solid #0c4a6e;
}

#entete tr th, #corps tr {
  color: #FFFFFF;
}

#entete tr th, #corps tr td {
  padding: 10px;
}

#corps{
  border: 5px solid #0c4a6e;
}

#corps tr {
  cursor: pointer;
}

#corps tr:nth-child(odd){
  background-color: #1f5b83;
}

#corps tr:nth-child(even){
  background-color: #0c4a6e;
}
</style>