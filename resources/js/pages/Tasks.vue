<template>
  <v-container fill-height>
    <v-row justify="center" align="center">
      <v-col cols="12" md="6">
        <v-card flat max-width="450" class="mx-auto red darken-2">
          <v-card-title class="d-flex align-center justify-space-between red darken-1 white--text">
            <div class="">Task Lists</div>
            <div class="d-flex">
              <div class="d-flex flex-column">
                <span class="caption m-0 p-0">SEARCH</span>
                <div>
                  <input 
                  style="
                    outline: none;
                    border-bottom: 1px solid #fff;
                    padding: 0px;
                    margin: 0px;
                    font-size:14px;
                    color: #fff;
                  "
                  v-model="search"
                  v-on:input="onSearch($event)"/> 
                  <v-icon @click="searchReset" v-if="search" color="#fff">
                   mdi-close
                  </v-icon>
                </div>
                
                             
              </div>
              <v-btn text small dark @click="addTask">
                <v-icon>
                {{!add ? 'mdi-plus' : 'mdi-close'}}
                </v-icon>
              </v-btn>
            </div>  
            
          </v-card-title>
          <v-card-text class="mt-5">
            <div class="mx-2" v-if="add">
              <label class="caption white--text">TASK NAME</label>
              <v-text-field solo
              v-model="text"
              append-icon="mdi-upload-outline"
              @click:append="save"/>
            </div>

            <div class="mx-2" v-if="edit">
              <label class="caption white--text">NEW TASK NAME</label>
              <v-text-field solo
              v-model="task.task"
              append-icon="mdi-close"
              v-on:input="update($event)"
              @click:append="edit=false"/>
            </div>

            <TaskCard :tasks="tasks" @taskEdit="taskEdit" v-if="tasks"/>

            <div class="text-center white--text " v-if="tasks.length == 0">
              No Data...
            </div>

            <div class="white--text pt-5">
              <v-icon color="#76FF03">
              mdi-circle-medium
              </v-icon>
              Status Done
            </div>
          </v-card-text>
        </v-card>
      </v-col>
    </v-row>
  </v-container>
</template>

<script>
import TaskCard from '../components/TaskCard.vue'
import { mapActions, mapState } from 'vuex'

export default {
  components: {
    TaskCard
  },
  data: () => ({
    text: '',
    add: false,
    edit: false,
    search: '',
  }),
  computed: {
    ...mapState('task', {
      tasks: (state) => state.tasks,
      task: (state) => state.task,
    })
  },
  mounted() {
    this.getTaskAction({
      query: ''
    })
  },
  methods: {
    ...mapActions('task', [
      'getTaskAction',
      'storeTaskAction',
      'updateTaskAction',
    ]),

    save() {
      this.storeTaskAction({
        task: this.text
      }).then(() => {
        this.text = ''
      })
    },

    update() {
      console.log(true)
      this.updateTaskAction(this.task)
    },

    addTask() {
      this.add = !this.add
      this.edit = false
    },

    onSearch() {
      this.getTaskAction({
        query: this.search
      })
    },

    taskEdit() {
      this.add = false
      this.edit = true
    },

    searchReset() {
      this.search = ''
      this.getTaskAction({
        query: ''
      })
    }
  }
}
</script>

<style>

</style>
