<!-- <script setup>
import { ref } from "vue";
import api from "../api";
import { useRouter } from "vue-router";

const router = useRouter();

const form = ref({
  email: "",
  password: "",
});

const login = async () => {
  try {
    const response = await api.post("/login", form.value);
    localStorage.setItem("token", response.data.token);
    alert("Login successful!");
    router.push("/users");
  } catch (error) {
    alert("Invalid credentials");
  }
};
</script>

<template>
  <div>
    <h2>Login</h2>
    <form @submit.prevent="login">
      <input v-model="form.email" type="email" placeholder="Email" required />
      <input v-model="form.password" type="password" placeholder="Password" required />
      <button type="submit">Login</button>
    </form>
  </div>
</template> -->

<template>
    <div class="auth-container">
      <div class="auth-card">
        <h2>Login</h2>
        <form @submit.prevent="login">
          <input
            v-model="form.email"
            type="email"
            placeholder="Email"
            required
          />
          <input
            v-model="form.password"
            type="password"
            placeholder="Password"
            required
          />
          <button type="submit">Login</button>
        </form>
        <p>
          Don't have an account?
          <button @click="goToRegister" class="link-button">
            Register here
          </button>
        </p>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref } from "vue";
  import api from "../api";
  import { useRouter } from "vue-router";
  
  const router = useRouter();
  
  const form = ref({
    email: "",
    password: "",
  });
  
  const login = async () => {
    try {
      const response = await api.post("/login", form.value);
      localStorage.setItem("token", response.data.token);
      router.push("/users");
    } catch (error) {
      alert("Invalid credentials");
    }
  };
  
  const goToRegister = () => {
    router.push("/register");
  };
  </script>
  
  <style scoped>
  .auth-container {
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    background: #f2f2f2;
  }
  
  .auth-card {
    background: #fff;
    padding: 2rem;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 320px;
    text-align: center;
  }
  
  .auth-card h2 {
    margin-bottom: 1.5rem;
    color: #333;
  }
  
  .auth-card form input {
    display: block;
    width: 100%;
    padding: 0.75rem;
    margin-bottom: 1rem;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 1rem;
  }
  
  .auth-card form button {
    width: 100%;
    padding: 0.75rem;
    border: none;
    background: #007bff;
    color: #fff;
    border-radius: 4px;
    font-size: 1rem;
    cursor: pointer;
  }
  
  .auth-card form button:hover {
    background: #0056b3;
  }
  
  .link-button {
    background: none;
    border: none;
    color: #007bff;
    cursor: pointer;
    padding: 0;
    font-size: 1rem;
    text-decoration: underline;
  }
  </style>
  