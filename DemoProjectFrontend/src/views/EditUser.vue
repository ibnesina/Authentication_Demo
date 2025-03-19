<script setup>
import { ref, onMounted } from "vue";
import { useRoute, useRouter } from "vue-router";
import api from "../api";

const route = useRoute();
const router = useRouter();

const form = ref({
  first_name: "",
  last_name: "",
  password: "",
  address: "",
  city: "",
  state: "",
  zipcode: "",
  country: "",
});

const fetchUser = async () => {
  try {
    const response = await api.get(`/users/${route.params.id}`, {
      headers: { Authorization: `Bearer ${localStorage.getItem("token")}` },
    });
    // Populate the form with the user data
    form.value = response.data;
  } catch (error) {
    alert("Error fetching user data");
  }
};

const updateUser = async () => {
  try {
    await api.put(`/users/${route.params.id}`, form.value, {
      headers: { Authorization: `Bearer ${localStorage.getItem("token")}` },
    });
    alert("User updated successfully");
    router.push("/users");
  } catch (error) {
    alert("Error updating user");
  }
};

const logout = () => {
  localStorage.removeItem("token");
  router.push("/");
};

const goBack = () => {
  router.push("/users");
};

onMounted(fetchUser);
</script>

<template>
  <div>
    <header class="header">
      <button class="nav-button" @click="goBack">Back</button>
      <h1 class="title">Edit User</h1>
      <button class="nav-button" @click="logout">Logout</button>
    </header>
    <div class="form-container">
      <form @submit.prevent="updateUser">
        <input v-model="form.first_name" placeholder="First Name" required />
        <input v-model="form.last_name" placeholder="Last Name" required />
        <input
          v-model="form.password"
          type="password"
          placeholder="New Password (Optional)"
        />
        <input v-model="form.address" placeholder="Address" />
        <input v-model="form.city" placeholder="City" />
        <input v-model="form.state" placeholder="State" />
        <input v-model="form.zipcode" placeholder="Zipcode" />
        <input v-model="form.country" placeholder="Country" />
        <button type="submit">Update User</button>
      </form>
    </div>
  </div>
</template>

<style scoped>
.header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  background: #28a745;
  padding: 1rem;
  color: #fff;
  position: relative;
}

/* Title centered using absolute positioning and transform */
.title {
  position: absolute;
  left: 50%;
  transform: translateX(-50%);
  margin: 0;
  font-size: 1.5rem;
}

.nav-button {
  padding: 0.5rem 1rem;
  border: none;
  background: #1e7e34;
  color: #fff;
  border-radius: 4px;
  cursor: pointer;
}

.nav-button:hover {
  background: #155d27;
}

.form-container {
  margin: 2rem auto;
  width: 90%;
  max-width: 500px;
  background: #fff;
  padding: 2rem;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

form input {
  display: block;
  width: 100%;
  padding: 0.75rem;
  margin-bottom: 1rem;
  border: 1px solid #ccc;
  border-radius: 4px;
  font-size: 1rem;
}

form button {
  width: 100%;
  padding: 0.75rem;
  border: none;
  background: #007bff;
  color: #fff;
  border-radius: 4px;
  font-size: 1rem;
  cursor: pointer;
}

form button:hover {
  background: #0056b3;
}
</style>
