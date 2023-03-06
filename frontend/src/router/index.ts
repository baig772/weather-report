import { createRouter, createWebHistory } from "vue-router";
import HomeView from "../views/HomeView.vue";
import WeatherReport from "@/views/WeatherReport.vue";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/",
      name: "home",
      component: HomeView,
    },
    {
      path : "/weather-report/:id",
      name : 'weather-report',
      component : WeatherReport
    }
  ],
});

export default router;
