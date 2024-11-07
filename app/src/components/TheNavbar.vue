<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
      <a class="navbar-brand" href="/Home">MeuApp</a>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item" v-if="isAuthenticated">
            <router-link class="nav-link" to="/PeopleList">Lista de Usuario</router-link>
          </li>
          <li class="nav-item" v-if="isAuthenticated">
            <router-link class="nav-link" to="/PeopleRegister">Cadastro de Usuario</router-link>
          </li>
          <li class="nav-item" v-if="!isAuthenticated">
            <router-link class="nav-link" to="/login">Login</router-link>
          </li>
          <li class="nav-item" v-if="!isAuthenticated">
            <router-link class="nav-link" to="/register">Register</router-link>
          </li>

          <li class="nav-item dropdown" v-if="isAuthenticated">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              id="userDropdown"
              role="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              {{ userName }}
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
              <li><button class="dropdown-item" @click="logout">Sair</button></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      userName: 'Usuário',
    };
  },
  computed: {
    isAuthenticated() {
      return !!localStorage.getItem('token');
    },
  },
  async created() {
    if (this.isAuthenticated) {
      try {
        const response = await axios.get('http://localhost:8000/api/user', {
          headers: {
            Authorization: `Bearer ${localStorage.getItem('token')}`,
          },
        });
        this.userName = response.data.name;
      } catch (error) {
        console.error('Erro ao buscar dados do usuário:', error);
      }
    }
  },
  methods: {
    logout() {
      localStorage.removeItem('token');
      this.userName = 'Usuário';
      this.$router.push({ name: 'Login' }).then(() => {
        window.location.reload();
      });
    },
  },
};
</script>

<style scoped>
.navbar {
  margin-bottom: 20px;
}
</style>
