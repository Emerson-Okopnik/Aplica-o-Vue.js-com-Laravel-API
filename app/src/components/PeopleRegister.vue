<template>
    <div class="d-flex justify-content-between align-items-center mb-3">
      <button @click="goBack" class="btn btn-secondary">Voltar</button>
    </div>
    <div class="container">
      <h2 class="mb-0">Cadastro de Pessoa</h2>
      <form @submit.prevent="submitForm">
        <div class="form-group">
          <label for="nome">Nome</label>
          <input type="text" v-model="form.nome" id="nome" class="form-control" required />
        </div>
        <div class="form-group">
          <label for="cpf">CPF</label>
          <input type="text" v-model="form.cpf" id="cpf" class="form-control" maxlength="11" required />
        </div>
        <div class="form-group">
          <label for="tipo">Tipo</label>
          <select v-model="form.tipo" id="tipo" class="form-control" required>
            <option value="fisica">Física</option>
            <option value="juridica">Jurídica</option>
          </select>
        </div>
        <div class="form-group">
          <label for="telefone">Telefone</label>
          <input type="text" v-model="form.telefone" id="telefone" class="form-control" required />
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" v-model="form.email" id="email" class="form-control" required />
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
      </form>
  
      <div v-if="successMessage" class="alert alert-success mt-3">
        {{ successMessage }}
      </div>
      <div v-if="errorMessage" class="alert alert-danger mt-3">
        {{ errorMessage }}
      </div>
    </div>
  </template>
  
  <script>
  import axios from "axios";
  
  export default {
    data() {
      return {
        form: {
          nome: "",
          cpf: "",
          tipo: "fisica",
          telefone: "",
          email: "",
        },
        successMessage: "",
        errorMessage: "",
      };
    },
    methods: {
      async submitForm() {
        try {
          const token = localStorage.getItem("token");
          const response = await axios.post("http://localhost:8000/api/people/create", this.form, {
            headers: {
              Authorization: `Bearer ${token}`,
            },
          });
      
          this.successMessage = "Pessoa cadastrada com sucesso!";
          this.errorMessage = "";
          this.$router.push({ name: 'PeopleList' });
        } catch (error) {
          this.successMessage = "";
          this.errorMessage = error.response.data.message || "Erro ao cadastrar pessoa.";
        }
      },
      goBack() {
        this.$router.push({ name: 'PeopleList' });
      }
    },
  };
  </script>
  
  <style scoped>
  .container {
    max-width: 500px;
    margin: 0 auto;
    padding: 20px;
  }
  .form-group {
    margin-bottom: 15px;
  }
  .btn-primary {
    width: 100%;
  }
  </style>
  