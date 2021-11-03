import { axiosInstance } from "../../services/axios"

export async function storeTaskAction({ dispatch }, payload) {
  await axiosInstance.post('/api/task', payload)
    .then(() => {
      dispatch('getTaskAction', {
        query: ''
      })
    }).catch((err) => {
      console.log(err.response.data.errors);
  })
}

export async function getTaskAction({ commit }, payload) {
  await axiosInstance.get(`/api/task/?query=${payload.query}`)
    .then((res) => {
      commit('tasksMutation', res.data)
    }).catch((err) => {
      console.log(err.response.data.errors);
  })
}

export async function deleteTaskAction({ dispatch }, payload) {
  
  await axiosInstance.delete(`/api/task/${payload}`)
    .then(() => {
     dispatch('getTaskAction', {
       query: ''
     })
    }).catch((err) => {
      console.log(err.response.data.errors);
  })
}

export async function showTaskAction({ commit }, payload) {
  await axiosInstance.get(`/api/task/${payload}`)
    .then((res) => {
      commit('taskMutation', res.data)
    }).catch((err) => {
      console.log(err.response.data.errors);
  })
}

export async function updateTaskAction({ dispatch }, payload) {
  await axiosInstance.patch(`/api/task/${payload.id}`, payload)
    .then(() => {
      dispatch('getTaskAction', {
        query: ''
      })
    }).catch((err) => {
      console.log(err.response.data.errors);
  })
}

export async function statusTaskAction({ dispatch }, payload) {
  await axiosInstance.get(`/api/task/status/${payload}`)
    .then((res) => {
      dispatch('getTaskAction', {
        query: ''
      })
    }).catch((err) => {
      console.log(err.response.data.errors);
  })
}
