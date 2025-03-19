<!-- <script setup>
import { ref } from "vue";
import api from "../api";
import { useRouter } from "vue-router";

const router = useRouter();

const form = ref({
  first_name: "",
  last_name: "",
  email: "",
  password: "",
  password_confirmation: "",
});

const register = async () => {
  try {
    await api.post("/register", form.value);
    alert("Registration successful!");
    router.push("/");
  } catch (error) {
    alert("Error registering user");
  }
};
</script>

<template>
  <div>
    <h2>Register</h2>
    <form @submit.prevent="register">
      <input v-model="form.first_name" placeholder="First Name" required />
      <input v-model="form.last_name" placeholder="Last Name" required />
      <input v-model="form.email" type="email" placeholder="Email" required />
      <input v-model="form.password" type="password" placeholder="Password" required />
      <input v-model="form.password_confirmation" type="password" placeholder="Confirm Password" required />
      <button type="submit">Register</button>
    </form>
  </div>
</template> -->


<template>
    <div class="auth-container">
      <div class="auth-card">
        <h2>Register</h2>
        <form @submit.prevent="register">
          <input
            v-model="form.first_name"
            type="text"
            placeholder="First Name"
            required
          />
          <input
            v-model="form.last_name"
            type="text"
            placeholder="Last Name"
            required
          />
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
          <input
            v-model="form.password_confirmation"
            type="password"
            placeholder="Confirm Password"
            required
          />
          <button type="submit">Register</button>
        </form>
        <p>
          Already have an account?
          <button @click="goToLogin" class="link-button">
            Login here
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
    first_name: "",
    last_name: "",
    email: "",
    password: "",
    password_confirmation: "",
  });
  
  const register = async () => {
    try {
      await api.post("/register", form.value);
      alert("Registration successful!");
      router.push("/");
    } catch (error) {
      alert("Error registering user");
    }
  };
  
  const goToLogin = () => {
    router.push("/");
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
    background: #28a745;
    color: #fff;
    border-radius: 4px;
    font-size: 1rem;
    cursor: pointer;
  }
  
  .auth-card form button:hover {
    background: #218838;
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
  