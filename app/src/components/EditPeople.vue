<template>
    <div class="container mt-5">
      <h2>Editar Pessoa</h2>
      <form @submit.prevent="updatePeople">
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
        <div class="d-flex justify-content-between align-items-center mb-3">
          <button @click="goBack" class="btn btn-secondary mt-3">Voltar</button>
          <button type="submit" class="btn btn-primary mt-3">Atualizar</button>
        </div>
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
  import axios from 'axios';
  
  export default {
    props: ['id'],
    data() {
      return {
        form: {
          nome: '',
          cpf: '',
          tipo: 'fisica',
          telefone: '',
          email: '',
        },
        successMessage: '',
        errorMessage: '',
      };
    },
    async created() {
      await this.fetchPeople();
    },
    methods: {
      async fetchPeople() {
        try {
          const token = localStorage.getItem('token');
          const response = await axios.get(`http://localhost:8000/api/people/${this.id}`, {
            headers: {
              Authorization: `Bearer ${token}`,
            },
          });
          this.form = response.data;
        } catch (error) {
          this.errorMessage = 'Erro ao carregar dados da pessoa.';
        }
      },
      async updatePeople() {
        try {
          const token = localStorage.getItem('token');
          await axios.put(`http://localhost:8000/api/people/edit/${this.id}`, this.form, {
            headers: {
              Authorization: `Bearer ${token}`,
            },
          });
          this.successMessage = 'Pessoa atualizada com sucesso!';
          this.errorMessage = '';
          this.$router.push({ name: 'PeopleList' });
        } catch (error) {
          this.errorMessage = 'Erro ao atualizar pessoa.';
          this.successMessage = '';
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
  </style>
  