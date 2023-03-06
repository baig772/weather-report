<script>
export default {
  data: () => ({
    apiResponse: null
  }),

  created() {
    this.fetchData()
  },

  methods: {
    async fetchData() {
      const url = 'http://api.test/'
      this.apiResponse = await (await fetch(url)).json()
    },
    getWeatherData(user) {
      console.info('User is =>', user)
    }
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
    </tr>
    </thead>
    <tbody v-for="user in apiResponse.users" v-on:click="getWeatherData(user)" :key="user.id">
    <tr>
      <td>{{user.name}}</td>
      <td>{{user.email}}</td>
      <td>{{user.latitude}}</td>
      <td>{{user.longitude}}</td>
    </tr>
    </tbody>
  </v-table>
  </div>

  <v-row justify="space-around">

    <v-col cols="auto">
      <v-dialog
        transition="dialog-top-transition"
        width="auto"
      >
        <template v-slot:activator="{ props }">
          <v-btn
            color="primary"
            v-bind="props"
          >From the top</v-btn>
        </template>
        <template v-slot:default="{ isActive }">
          <v-card>
            <v-toolbar
              color="primary"
              title="Opening from the top"
            ></v-toolbar>
            <v-card-text>
              <div class="text-h2 pa-12">Hello world!</div>
            </v-card-text>
            <v-card-actions class="justify-end">
              <v-btn
                variant="text"
                @click="isActive.value = false"
              >Close</v-btn>
            </v-card-actions>
          </v-card>
        </template>
      </v-dialog>
    </v-col>
  </v-row>

</template>
