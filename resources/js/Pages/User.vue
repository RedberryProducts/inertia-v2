<template>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2>Users</h2>
      </div>

      <div class="col-12">
        <ul class="list-group">
          <li v-for="user in users" :key="user.id" class="list-group-item">
            {{ user.name }}
          </li>
        </ul>
      </div>

      <WhenVisible data="top" :buffer="200">
        <template #default>
          <div class="col-12">
            <b>Top Users:</b>
            <ul class="list-group">
              <li v-for="user in top" :key="user.id" class="list-group-item">
                {{ user.name }}
              </li>
            </ul>
          </div>
        </template>

        <template #fallback>
          Loading Top Users
        </template>

      </WhenVisible>
    </div>
  </div>
</template>


<script setup>
import {WhenVisible} from '@inertiajs/vue3'

defineProps({
  users: Array,
  top: Array,
})
</script>

