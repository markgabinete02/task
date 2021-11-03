<template>
  <section style="max-height: 500px; overflow: auto" class="pa-1">
    <v-card flat v-for="(item, i) in tasks" :key="item.id" class="my-5">
      <v-card-text>
        <div class="d-flex justify-space-between align-start">
          <div class="">
            <div class="body-1 black--text">
            {{item.task}}
            </div>
          </div>
          <div class="">
            <v-avatar size="28">
              <v-img :src="`https://i.pravatar.cc/150?img=${i}`"/>
            </v-avatar>
          </div>
        </div>
        <div class="d-flex justify-space-between align-center mt-1">
          <div class="d-flex align-center caption">
            <v-icon 
            :color="!item.status ? '#FFEA00' : '#76FF03'" 
            @click="status(item.id)">
              mdi-circle-medium
            </v-icon>
            {{dateDiff(item.created_at)}}
          </div>
          <div class="mr-7">
            <v-btn icon x-small color="primary" @click="edit(item.id)">
              <v-icon>
                mdi-pencil-outline
              </v-icon>
            </v-btn>
            <v-btn icon x-small color="red" @click="del(item.id)">
              <v-icon>
                mdi-delete-outline
              </v-icon>
            </v-btn>
          </div>
        </div>
      </v-card-text>
    </v-card>
  </section>
</template>

<script>
var moment = require('moment')
import { mapActions } from 'vuex'

export default {
  props: ['tasks'],
  methods: {
    ...mapActions('task', [
      'deleteTaskAction',
      'showTaskAction',
      'statusTaskAction',
    ]),

    dateDiff(date) {
      return moment(date).fromNow()
    },

    del(id) {
      if(confirm('Delete this task?')) {
        
        this.deleteTaskAction(id)
      }
    },

    status(id) {
      this.statusTaskAction(id)
    },

    edit(id) {
      this.showTaskAction(id)
      this.$emit('taskEdit')
    }
  }
}
</script>
