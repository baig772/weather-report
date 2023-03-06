<script>
export default {
  data: () => ({
    apiResponse: null,
  }),

  created() {
    this.fetchData()
  },

  methods: {
    async fetchData() {
      const url = 'http://api.test/'
      this.apiResponse = await (await fetch(url)).json()
    },
  }
}
</script>

<template>
  <div v-if="!apiResponse">
    Pinging the api...
  </div>

  <div v-if="apiResponse">
  <v-table>
    <thead>
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Latitude</th>
      <th>Longitude</th>
      <th>Details</th>
    </tr>
    </thead>
    <tbody v-for="user in apiResponse.users" v-on:click="getWeatherData(user)" :key="user.id">
    <tr>
      <td>{{user.name}}</td>
      <td>{{user.email}}</td>
      <td>{{user.latitude}}</td>
      <td>{{user.longitude}}</td>
      <td>
        <router-link :to="{name : 'weather-report', params :{id : user.id}}">Detailed Report</router-link>
      </td>
    </tr>
    </tbody>
  </v-table>
  </div>
</template>
