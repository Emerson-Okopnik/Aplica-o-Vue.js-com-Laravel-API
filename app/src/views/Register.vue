<template>
  <div class="d-flex align-items-center justify-content-center vh-100">
    <div class="card p-4" style="width: 24rem;">
      <h2 class="text-center mb-4">Register</h2>
      <form @submit.prevent="register">
        <div class="form-group mb-3">
          <label for="email">Nome</label>
          <input type="name" v-model="name" class="form-control" id="name" placeholder="Digite seu Nome" required />
        </div>
        <div class="form-group mb-3">
          <label for="email">Email</label>
          <input type="email" v-model="email" class="form-control" id="email" placeholder="Digite seu email" required />
        </div>
        <div class="form-group mb-3">
          <label for="password">Senha</label>
          <input type="password" v-model="password" class="form-control" id="password" placeholder="Digite sua senha" required />
        </div>
        <button type="submit" class="btn btn-primary w-100 mb-2">Registrar</button>
      </form>
      <button @click="goToLogin" class="btn btn-link w-100">Já tem uma conta? Faça login</button>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      name: '',
      email: '',
      password: '',
    };
  },
  methods: {
    async register() {
      try {
        const response = await axios.post('http://localhost:8000/api/register', {
          name: this.name,
          email: this.email,
          password: this.password,
        });
        
        localStorage.setItem('token', response.data.token);

        this.$router.push({ name: 'Home' }).then(() => {
          window.location.reload();
        });
      } catch (error) {
        console.error('Erro no registro:', error);
        alert('Erro ao registrar. Por favor, tente novamente.');
      }
    },
    goToLogin() {
      this.$router.push({ name: 'Login' });
    },
  },
};
</script>