<template>
  <div class="container mt-5">
   <div class="d-flex justify-content-between align-items-center mb-3">
     <h2 class="mb-0">Lista de Pessoas</h2>
     <button @click="PeopleRegister" class="btn btn-primary">Cadastrar</button>
   </div>
  <div class="table-responsive">
    <table class="table table-striped">
      <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Nome</th>
          <th>CPF</th>
          <th>Tipo</th>
          <th>Telefone</th>
          <th>Email</th>
          <th class="text-center">Ações</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="person in people" :key="person.id">
          <td>{{ person.id }}</td>
          <td>{{ person.nome }}</td>
          <td>{{ person.cpf }}</td>
          <td>{{ person.tipo }}</td>
          <td>{{ person.telefone }}</td>
          <td>{{ person.email }}</td>
          <td class="text-center">
            <button @click="editPeople(person.id)" class="btn btn-warning btn-sm me-1">
              <img src="/pencil-icon.png" alt="Editar" width="16" height="16">
            </button>
            <button @click="deletePeople(person.id)" class="btn btn-danger btn-sm">
              <img src="/trash-icon.png" alt="Excluir" width="16" height="16">
            </button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

  </template>
  
  <script>
  import axios from "axios";
  
  export default {
    data() {
      return {
        people: [],
      };
    },
    async created() {
      await this.fetchPeople();
    },
    methods: {
      async fetchPeople() {
        try {
          const token = localStorage.getItem("token");
          const response = await axios.get("http://localhost:8000/api/people", {
            headers: {
              Authorization: `Bearer ${token}`,
            },
          });
          this.people = response.data;
        } catch (error) {
          console.error("Erro ao buscar pessoas:", error);
          alert("Não foi possível carregar a lista de pessoas.");
        }
      },
      editPeople(id) {
        this.$router.push({ name: 'EditPeople', params: { id } });
      },
      async deletePeople(id) {
        if (!confirm("Tem certeza de que deseja excluir esta pessoa?")) return;
        try {
          const token = localStorage.getItem("token");
          await axios.delete(`http://localhost:8000/api/people/delete/${id}`, {
              headers: {
              Authorization: `Bearer ${token}`,
              },
          });
          alert("Pessoa excluída com sucesso!");
          
          this.people = this.people.filter(person => person.id !== id);
        } catch (error) {
          console.error("Erro ao excluir pessoa:", error);
          alert("Não foi possível excluir a pessoa.");
        }
      },
      PeopleRegister() {
        this.$router.push({ name: 'PeopleRegister' });
      },
    },
  };
  </script>
  
  <style scoped>
  .container {
    max-width: 800px;
    margin: 0 auto;
  }
  .table {
    width: 100%;
  }
  </style>
  