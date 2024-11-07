<template>
  <div class="container mt-5">
    <h2>Bem-vindo, {{ user.name }}!</h2>
    <p>Email: {{ user.email }}</p>
    <p>Esse é um projeto desenvolvido através de Vue.js e Laravel</p>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      user: {},
    };x
  },
  async created() {
    try {
      const response = await axios.get('http://localhost:8000/api/user', {
        headers: {
          Authorization: `Bearer ${localStorage.getItem('token')}`,
        },
      });
      this.user = response.data;
    } catch (error) {
      console.error('Erro ao buscar dados do usuário:', error);
      this.$router.push({ name: 'Login' }); 
    }
  },
  methods: {

  },
};
</script>

<style scoped>
.container {
  text-align: center;
}
</style>
