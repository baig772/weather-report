<template>
  <div v-if="!apiResponse">
    Pinging the api...
  </div>
  <div v-if="!payload">
    No Data found for this User
  </div>

  <div v-if="payload">

    <v-table theme="dark">
      <thead>
      <tr>
        <th class="text-left">
          Name
        </th>
        <th class="text-left">
          Country
        </th>
        <th>
          Temperature in Celsius
        </th>
        <th>
          Temperature in Fahrenheit
        </th>
        <th>
          Wind MPH
        </th>
        <th>
          Wind KPH
        </th>
        <th>
          Humidity
        </th>
        <th>
          Cloud
        </th>
        <th>
          Actual Feel - Celsius
        </th>
        <th>
          Actual Feel - Fahrenheit
        </th>
      </tr>
      </thead>
      <tbody>
      <tr>
        <td>{{payload.name}}</td>
        <td>{{payload.country}}</td>
        <td>{{payload.temperature_celsius}}</td>
        <td>{{payload.temperature_fahrenheit}}</td>
        <td>{{payload.wind_mph}}</td>
        <td>{{payload.wind_kph}}</td>
        <td>{{payload.humidity}}</td>
        <td>{{payload.cloud}}</td>
        <td>{{payload.feelslike_celsius}}</td>
        <td>{{payload.feelslike_fahrenheit}}</td>


      </tr>
      </tbody>
    </v-table>
  </div>
</template>

<script>
import {th} from "vuetify/locale";

export default {
  name: "WeatherReport",

  data: () => ({
    apiResponse: null,
    payload : null
  }),

  created() {
    this.fetchData()
  },

  methods: {
    async fetchData() {
      const url = 'http://api.test/detailed-weather/'+this.$route.params.id
      this.apiResponse = await (await fetch(url)).json()
      this.payload = this.apiResponse.payload

      console.info('Payload is =>', this.payload)
    },
  }
}
</script>

<style scoped>

</style>
