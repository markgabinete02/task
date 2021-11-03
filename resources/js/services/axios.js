import Vue from 'vue'
import axios from 'axios'

const base = 'http://127.0.0.1:8000';

const axiosInstance = axios.create({ baseURL: base })

axiosInstance.interceptors.request.use(request => {
  const obj = JSON.parse(localStorage.getItem('access_key'))
  if (obj) request.headers.common['Authorization'] = `Bearer ${obj.token}`

  return request
})

Vue.prototype.$axios = axiosInstance

export { axiosInstance }
